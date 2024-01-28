<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Cours;
use Carbon\Carbon;
use Auth;
use App\Models\DisponibleProfesseur;
use Illuminate\Support\Facades\File;
use DateTime;
use Session;
use Illuminate\Support\Facades\Lang;
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
        $frenchDayName = "";
        $englishToFrenchDays = [
            'Monday'    => 'Lundi',
            'Tuesday'   => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday'  => 'Jeudi',
            'Friday'    => 'Vendredi',
            'Saturday'  => 'Samedi',
            'Sunday'    => 'Dimanche',
        ];
        if($requestData['isLoadPage'] == 1)
        {

            $test = DisponibleProfesseur::select('disponibleprof.id','idcours', 'debut', 'image', 'name', DB::raw('cours.title as cours' ), 'jour', 'typecours', 'disponibleprof.iduser','users.title')
            ->join('users', 'disponibleprof.iduser', '=', 'users.id')
            ->join('cours', 'disponibleprof.idcours', '=', 'cours.id')
            ->where('users.verification', 'verifie')
            ->where('disponibleprof.jour',$englishToFrenchDays[$englishDayName]) // today
            ->get();
            $frenchDayName = $englishToFrenchDays[$englishDayName];
        }
        else
        {
            if($requestData['isLoadPage'] == 0)
            {
                if($requestData['day'] === "false")
                {
                    $test = DisponibleProfesseur::select('disponibleprof.id','idcours', 'debut', 'image', 'name', DB::raw('cours.title as cours' ), 'jour', 'typecours', 'disponibleprof.iduser','users.title')
                    ->join('users', 'disponibleprof.iduser', '=', 'users.id')
                    ->join('cours', 'disponibleprof.idcours', '=', 'cours.id')
                    ->where('users.verification', 'verifie')
                    ->get();
                }
                else
                {
                    $CarbonNameDaysIsNotLoad = Carbon::parse($requestData['day']);
                    $NameDaysIsNotLoad       = $CarbonNameDaysIsNotLoad->format('l');
                    $NameDaysIsNotLoadFranch = $englishToFrenchDays[$NameDaysIsNotLoad];
                    $test = DisponibleProfesseur::select('disponibleprof.id','idcours', 'debut', 'image', 'name', DB::raw('cours.title as cours' ), 'jour', 'typecours', 'disponibleprof.iduser','users.title')
                    ->join('users', 'disponibleprof.iduser', '=', 'users.id')
                    ->join('cours', 'disponibleprof.idcours', '=', 'cours.id')
                    ->where('users.verification', 'verifie')
                    ->where('disponibleprof.jour',$NameDaysIsNotLoadFranch)
                    ->get();
                    $frenchDayName = $NameDaysIsNotLoadFranch;
                }

            }

        }

        $experienceData = DB::select('SELECT iduser, SUM(TIMESTAMPDIFF(YEAR, e.du, e.au)) AS experience FROM experinceprof e GROUP BY iduser;');

        $experienceLookup = [];
        foreach ($experienceData as $experience) {
            $experienceLookup[$experience->iduser] = $experience->experience;
        }

        foreach ($test as $item) {
            $userId = $item->iduser;
            $item->experience = isset($experienceLookup[$userId]) ? $experienceLookup[$userId] : 0;
        }


        $filteredResults = $test->filter(function ($item) use ($requestData) {
            $coursCondition = ($requestData['cours'] !== "false") ? in_array($item->idcours, $requestData['cours']) : true;
            $hourCondition = ($requestData['hour'] !== "false") ? ($item->debut == $requestData['hour']) : true;
            $typeCondition = ($requestData['type'] !== "false") ? ($item->typecours == $requestData['type']) : true;

            return $coursCondition && $hourCondition && $typeCondition;
        });


        $DataProfesseur = $filteredResults;



        $hasCoursToday = false;
        $NameDaysCours = DisponibleProfesseur::all();
        if($frenchDayName !=="")
        {
            foreach ($NameDaysCours as $item) {
                if ($item->jour === $frenchDayName) {
                    $hasCoursToday = true;
                }
            }
        }

        $now = Carbon::now();

        // Manually translate day names to French
        $daysTranslations = [
            'sunday' => 'dimanche',
            'monday' => 'lundi',
            'tuesday' => 'mardi',
            'wednesday' => 'mercredi',
            'thursday' => 'jeudi',
            'friday' => 'vendredi',
            'saturday' => 'samedi',
        ];

        // Manually translate month names to French
        $monthsTranslations = [
            1 => 'janvier',
            2 => 'février',
            3 => 'mars',
            4 => 'avril',
            5 => 'mai',
            6 => 'juin',
            7 => 'juillet',
            8 => 'août',
            9 => 'septembre',
            10 => 'octobre',
            11 => 'novembre',
            12 => 'décembre',
        ];



            $carbonDate = Carbon::createFromFormat('Y-m-d', $requestData['dateInput']);

            $day = $daysTranslations[strtolower($carbonDate->format('l'))];
            $month = $monthsTranslations[$carbonDate->format('n')];

            // Format the date in the desired format
            $DateSelected = ucfirst($day) . ', ' . $carbonDate->format('j') . ' ' . $month . ' ' . $carbonDate->format('Y');



        return response()->json([
            'status'            => 200,
            'Data'              => $DataProfesseur,
            'DateSelected'      => $DateSelected,
            'frenchDayName'     => $englishDayName,
            'hasCoursToday'     => $hasCoursToday,

            'hasRequestDate'    => $requestData['day'],
            'TodayTitle'        => \Carbon\Carbon::now()->format('l, j M Y'),
        ]);

    }


    public function Reservation($Time,$NameProfesseur,$Cours,$TypeCours)
    {

        return view('Eleve.Reserve')
        ->with('Cours',$Cours)
        ->with('Time',$Time)
        ->with('NameProfesseur',$NameProfesseur)
        ->with('TypeCours',$TypeCours);
    }

    public function Details($Time,$NameProfesseur,$Cours,$TypeCours)
    {
        // Extract id professeur
        $idProfesseur = User::where('name',$NameProfesseur)->get();

        if(!empty($idProfesseur))
        {
            $DisponibleProf = DB::select('select d.idcours,d.id,jour,debut,fin,c.title,d.typecours from
                disponibleprof d,cours c where d.idcours = c.id and d.iduser = ?',[$idProfesseur[0]->id]);

            $day_names_fr = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
            $disponibilityByDay = [];

            foreach ($day_names_fr as $item) {
                $disponibilityByDay[$item] = [];
            }
            foreach ($DisponibleProf as $item1)
            {
                $debut = new DateTime($item1->debut);
                $fin = new DateTime($item1->fin);
                $diff = $debut->diff($fin);
                $hours = $diff->h + $diff->i / 60;

                $item1->calculhour = $hours;


                $disponibilityByDay[$item1->jour][] = $item1;
            }
            foreach ($disponibilityByDay as &$dayArray) {
                usort($dayArray, function($a, $b) {
                    return strtotime($a->debut) - strtotime($b->debut);
                });
            }
            $CourProf      = DB::select('select c.title from courprof cp,cours c where cp.idcours = c.id and cp.iduser =?',[$idProfesseur[0]->id]);
            $FormationProf = DB::select('select diplome,specialise,annee,ecole,pays from formationprof where diplome is not null and iduser  =?',[$idProfesseur[0]->id]);
            $ExperinceProf = DB::select('select poste, entreprise, pays, du, au from experinceprof where poste is not null and  iduser=?',[$idProfesseur[0]->id]);
        }


        return view('Eleve.Details')
        ->with('disponibilityByDay',$disponibilityByDay)
        ->with('CourProf',$CourProf)
        ->with('FormationProf',$FormationProf)
        ->with('ExperinceProf',$ExperinceProf);
    }

    public function InfosProfile()
    {
        $DataEleve = User::where('id',Auth::user()->id)->get();
        return view('Eleve.InfosEleve')->with('DataEleve',$DataEleve[0]);
    }

    public function UpdateDataEleve(Request $request)
    {
        // Check if the "eleves" folder exists in the storage path
        $storagePath = storage_path('app/public/images/eleves');
        if (!File::exists($storagePath)) {
            // If not, create the "eleves" folder
            File::makeDirectory($storagePath, 0755, true, true);
        }

        $user = Auth::user();

        // Handle image upload
        if ($request->hasFile('image'))
        {
            // Extract the old image name from the database
            $oldImageName = basename($user->image);

            // Remove the old image if it exists
            if ($oldImageName !== null && File::exists(storage_path("app/public/images/eleves/{$oldImageName}"))) {
                File::delete(storage_path("app/public/images/eleves/{$oldImageName}"));
            }

            $imageName = 'eleves/' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $imageName);
            $user->image = "/storage/images/{$imageName}";
        }

        // Update other user data
        $user->name             = $request->name;
        $user->telephone        = $request->telephone;
        $user->email            = $request->email;
        $user->datenaissance    = $request->datenaissance;

        // Save the changes
        $user->save();
        return redirect()->back();

    }
}
