<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FormationProfesseur;
use App\Models\ExperinceProfesseur;
use DB;
use App\Models\DisponibleProfesseur;
use Carbon\Carbon;
use DateTime;
use App\Models\CertificationProf;
use Vinkla\Hashids\Facades\Hashids;

class AdminController extends Controller
{
    public function professeurs()
    {
        /* $listProfesseur  = User::where('role_name','professeur')->get(); */
        $listProfesseur = DB::select('select u.id,u.image,email,u.name,ifnull(u.title,"Vide") as title,u.verification,u.role_name,sum(TIMESTAMPDIFF(YEAR,du, au)) AS numberExperince
        from users u ,experinceprof e where u.id = e.iduser and u.role_name= "professeur"
        group by iduser');
        return view('Dashboard.professeur')->with('listProfesseur',$listProfesseur);
    }

    public function eleves()
    {
        $listeleve = User::where('role_name','eleve')->get();
        return view('Dashboard.eleve')->with('listeleve',$listeleve);
    }

    public function Viewprofesseur(Request $request)
    {
        $professeur         = User::where('id',$request->id)->get();
        $formation          = FormationProfesseur::where('iduser',$request->id)->get();
        $Experince          = ExperinceProfesseur::where('iduser',$request->id)->get();
        $CertificationProf  = CertificationProf::where('iduser',$request->id)->get();
        $NumberExperince = DB::select('select sum(TIMESTAMPDIFF(YEAR,du, au)) AS numberExperince from experinceprof where iduser = ?',
                                    [$request->id]);
        $CourProf   = DB::table('courprof')
                                ->join('users','users.id','=','courprof.iduser')
                                ->join('cours','cours.id','=','courprof.idcours')
                                ->select('cours.title')
                                ->where('courprof.iduser','=',$request->id)
                                ->get();

        $DisponibleProf = DB::select('select jour,debut,fin from disponibleprof where iduser = ?',[$request->id]);
        $day_names_fr = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $disponibilityByDay = [];
        foreach ($day_names_fr as $item)
        {
            $disponibilityByDay[$item] = null;
        }
        foreach ($DisponibleProf as $item1) {
            $debut = new DateTime($item1->debut);
            $fin = new DateTime($item1->fin);
            $diff = $debut->diff($fin);
            $hours = $diff->h + $diff->i / 60;

            $item1->calculhour = $hours;
            $disponibilityByDay[$item1->jour] = $item1;
        }



        return response()->json([
            'status'            => 200,
            'data'              => $professeur[0],
            'formation'         => $formation,
            'Experince'         => $Experince,
            'CourProf'          => $CourProf,
            'Disponible'        => $disponibilityByDay,
            'image'             => $professeur[0]->image,
            'NumberExperince'   => $NumberExperince[0]->numberExperince,
            'CertificationProf' => $CertificationProf[0]->certification,
            'idProf'            => $request->id,
        ]);
    }

    public function verificationProf(Request $request)
    {
        $verification = User::where('id', $request->idprof)->update([
            'verification'     => $request->verification
        ]);
        return response()->json([
            'status'   => 200,
        ]);
    }

    public function AdminDashboard()
    {
        return view('Dashboard.dashboard');
    }

    public function AdminProfile()
    {
        return view('Dashboard.ProfileAdmin');
    }

    public function ShowUser($id)
    {
        $actualId = Hashids::decode($id);
        $userProfesseurOrEleve = User::find($actualId);
        $updatenotification = DB::table('notifications')
                            ->where('data->id', $actualId)->update(['read_at' => now()]);

        $data             = $userProfesseurOrEleve[0]->role_name;
        if($data === 'professeur')
        {
            $data =  $listProfesseur = DB::select('select u.id,u.image,email,u.name,ifnull(u.title,"Vide") as title,u.verification,u.role_name,sum(TIMESTAMPDIFF(YEAR,du, au)) AS numberExperince
            from users u ,experinceprof e where u.id = e.iduser and u.role_name= "professeur" and u.id = ?
            group by iduser',[$actualId[0]]);
        }
        else
        {
            $data =  User::find($actualId);
        }

        return view('Dashboard.ShowUsers')->with('data', $data)
        ->with('role_name',$userProfesseurOrEleve[0]->role_name);


    }

}
