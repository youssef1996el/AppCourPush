<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cours;
use DateTime;
use DB;
use Auth;
use App\Models\CoursProfesseur;
class ProfesseurController extends Controller
{
    public function StepByStep()
    {
        $Cours = Cours::all();
        return view('Step.index')->with('Cours',$Cours);
    }

    public function ShowProfile()
    {
        $FormationProf = DB::select('select diplome,specialise,annee,ecole,pays from formationprof where diplome is not null and iduser  =?',[Auth::user()->id]);
        $ExperinceProf = DB::select('select poste, entreprise, pays, du, au from experinceprof where poste is not null and  iduser=?',[Auth::user()->id]);
        $CourProf      = DB::select('select cp.id as idcourprof,c.title,c.id as idcour from cours c,courprof cp,users u where u.id = cp.iduser and c.id = cp.idcours and u.id = ?',[Auth::user()->id]);
        $DataProf = User::where('id',Auth::user()->id)->get();
        $DisponibleProf = DB::select('select jour,debut,fin from disponibleprof where iduser = ?',[Auth::user()->id]);
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



       /*  dd($ExperinceProf); */



        return view('Profile.show')
        ->with('FormationProf',$FormationProf)
        ->with('ExperinceProf',$ExperinceProf)
        ->with('DisponibleProf',$DisponibleProf)
        ->with('DataProf',$DataProf)
        ->with('disponibilityByDay',$disponibilityByDay)
        ->with('CourProf',$CourProf);
    }

    public function StoreCoursProf(Request $request)
    {

        try
        {
            $checkCoursIsExist = Cours::where('title',$request->nameCours)->count();
            if($checkCoursIsExist == 0)
            {
                $Cours = Cours::create([
                    'title'         => $request->nameCours,
                    'iduser'        => Auth::user()->id,
                ]);
                $CoursProfesseur = CoursProfesseur::create([
                    'idcours'       => $Cours->id,
                    'iduser'        => Auth::user()->id,
                ]);
                $dataCoursProf = DB::table('cours')
                ->join('courprof','courprof.idcours','cours.id')
                ->where('courprof.iduser',Auth::user()->id)
                ->select('cours.id','cours.title')
                ->get();
                return response()->json([
                    'status'        => 200,
                    'data'          => $dataCoursProf
                ]);
            }
            else
            {
                
                $idCours = Cours::where('title',$request->nameCours)->select('id')->get();
                $idCours = (int)$idCours[0]->id;
                $checkCoursisExistProf = CoursProfesseur::where('idcours',$idCours)->where('iduser',Auth::user()->id)->count();

                if($checkCoursisExistProf == 0)
                {
                    $CoursProfesseur = CoursProfesseur::create([
                        'idcours'       => $idCours,
                        'iduser'        => Auth::user()->id,
                    ]);
                }
                else
                {
                    return response()->json([
                        'status'       => 400,
                    ]);
                }
                $dataCoursProf = DB::table('cours')
                ->join('courprof','courprof.idcours','cours.id')
                ->where('courprof.iduser',Auth::user()->id)
                ->select('cours.id','cours.title')
                ->get();
                return response()->json([
                    'status'        => 200,
                    'data'          => $dataCoursProf
                ]);
            }
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

    public function DestroyCoursProf(Request $request)
    {
        try
        {
            $DeleteCoursProf = CoursProfesseur::where('idcours',$request->idCours)->delete();
            return response()->json([
                'status'        => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function getCoursByProf()
    {
        $dataCoursProf = DB::table('cours')
        ->join('courprof','courprof.idcours','cours.id')
        ->where('courprof.iduser',Auth::user()->id)
        ->select('cours.id','cours.title')
        ->get();
        return response()->json([
            'status'        => 200,
            'data'          => $dataCoursProf
        ]);
    }




}
