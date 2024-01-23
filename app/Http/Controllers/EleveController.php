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
        $hasCoursToday = $DataProfesseur->isNotEmpty();
       /*  dd($DataProfesseur); */
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
