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
class AdminController extends Controller
{
    public function professeurs()
    {
        $listProfesseur = User::where('role_name','professeur')->get();

        return view('Dashboard.professeur')->with('listProfesseur',$listProfesseur);
    }

    public function eleves()
    {
        $listeleve = User::where('role_name','eleve')->get();
        return view('Dashboard.eleve')->with('listeleve',$listeleve);
    }

    public function Viewprofesseur(Request $request)
    {
        $professeur = User::where('id',$request->id)->get();
        $formation  = FormationProfesseur::where('iduser',$request->id)->get();
        $Experince  = ExperinceProfesseur::where('iduser',$request->id)->get();
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
            'status'       => 200,
            'data'         => $professeur[0],
            'formation'    => $formation,
            'Experince'    => $Experince,
            'CourProf'     => $CourProf,
            'Disponible'   => $disponibilityByDay,
            'image'        => $professeur[0]->image,
        ]);
    }

}
