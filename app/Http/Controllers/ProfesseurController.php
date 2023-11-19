<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cours;
use DateTime;
use DB;
use Auth;
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
        $CourProf      = DB::select('select cp.id as idcourprof,title,c.id as idcour from cours c,courprof cp,users u where u.id = cp.iduser and c.id = cp.idcours and u.id = ?',[Auth::user()->id]);
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
            if($item1->calculhour <=2)
            {
                $item1->heightdisponible = '20px';
                $item1->heightNoDisponible ='80px';
            }
            else if($item1->calculhour <=4)
            {
                $item1->heightdisponible = '40px';
                $item1->heightNoDisponible ='60px';
            }
            else if($item1->calculhour <=6)
            {
                $item1->heightdisponible = '60px';
                $item1->heightNoDisponible ='40px';
            }
            else if($item1->calculhour <=8)
            {
                $item1->heightdisponible = '80px';
                $item1->heightNoDisponible ='20px';
            }
            else
            {
                $item1->heightdisponible = '100px';
                $item1->heightNoDisponible ='0px';
            }
            $disponibilityByDay[$item1->jour] = $item1;
        }


        return view('Profile.show')
        ->with('FormationProf',$FormationProf)
        ->with('ExperinceProf',$ExperinceProf)
        ->with('DisponibleProf',$DisponibleProf)
        ->with('DataProf',$DataProf)
        ->with('disponibilityByDay',$disponibilityByDay)
        ->with('CourProf',$CourProf);
    }
}
