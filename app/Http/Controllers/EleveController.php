<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Cours;
use Carbon\Carbon;
use App\Models\DisponibleProfesseur;
class EleveController extends Controller
{
    public function index()
    {
        $cours = Cours::all();




        return view('profile.eleve')
                ->with('cours'          , $cours);
    }

    public function GetpProfesseur(Request $request)
    {
        $requestData = $request->all();
        $englishDayName = Carbon::now()->format('l');
        // Define a mapping of English to French day names
        $englishToFrenchDays = [
            'Monday'    => 'Lundi',
            'Tuesday'   => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday'  => 'Jeudi',
            'Friday'    => 'Vendredi',
            'Saturday'  => 'Samedi',
            'Sunday'    => 'Dimanche',
        ];
        // Use the mapping to get the French day name
        $frenchDayName = $englishToFrenchDays[$englishDayName];

        $hasCoursToday = false;
        $NameDaysCours = DisponibleProfesseur::all();
        foreach ($NameDaysCours as $item)
        {
            if($item->jour === $frenchDayName)
            {
                $hasCoursToday = true;
            }
        }

        $query = DB::table('users as u')
        ->join('disponibleprof as d', 'u.id', '=', 'd.iduser')
        ->join('cours as c', 'd.idcours', '=', 'c.id')
        ->join('experinceprof as e', 'u.id', '=', 'e.iduser')
        ->select('u.id', 'd.debut', 'u.image', 'u.title', 'u.name', 'd.typecours', 'c.title as cours', DB::raw('sum(timestampdiff(YEAR,e.du,e.au)) as experince'))
        ->where('u.verification', 'Verifie')
        /* ->where('d.jour', $frenchDayName) */
        ->groupBy('u.id');


        if($requestData['cours'] != "false")
        {
            $query->where('c.id', $requestData['cours']);
        }
        if($requestData['hour'] != "false")
        {
            $query->where('d.debut', $requestData['hour']);
        }
        if($requestData['day'] != "false")
        {
            $date = Carbon::parse($requestData['day']);
            $dayName = $date->format('l');
            $frenchDayName = $englishToFrenchDays[$dayName];
        }
        else
        {
           $frenchDayName = $frenchDayName;
        }
        if($requestData['type'] != "false")
        {
            $query->where('d.typecours', $requestData['type']);
        }
        $query->where('d.jour', $frenchDayName);

        $DataProfesseur = $query->paginate(1);


        return response()->json([
            'status'        =>200,
            'Data'          => $DataProfesseur,
            'frenchDayName' => $englishDayName,
            'hasCoursToday' => $hasCoursToday,
            'TodayTitle'    => \Carbon\Carbon::now()->format('l, j M Y'),
        ]);
    }


    public function Reservation($Time,$NameProfesseur,$Cours,$TypeCours)
    {
        return view('Eleve.Reserve');
    }
}
