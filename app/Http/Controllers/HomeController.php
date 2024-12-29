<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\App;
use Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use DateTime;
use App\Notifications\RegisterNotification;
use Illuminate\Support\Facades\Notification;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function welcome()
    {
        $listProf = DB::table('users')
        ->join('experinceprof','experinceprof.iduser','=','users.id')
        ->where('users.verification','=','Verifie')
        ->where('users.role_name','=','professeur')
        ->select('users.name','users.image','users.description','users.telephone','users.id','users.title','users.email')
        ->groupBy('users.id')
        ->get();

        return view('welcome')->with('listProf',$listProf);
    }
    /* public function __construct()
    {
        $this->middleware('auth');
    }
 */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->role_name === 'professeur') {
            return redirect('StepByStep');
        }
        else if(Auth::user()->role_name === 'eleve')
        {
           /*  return view('home'); */
          /*  return route('profile/eleve'); */
          return redirect('profile/eleve');
        }

    }

    public function Store(Request $request)
    {
        /* $fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('images/prof',$fileName,'public');
        $requestDataImage['image'] = '/storage/'.$path; */
        // Check if the "eleves" folder exists in the storage path
        $storagePath = storage_path('app/public/images/prof');
        if (!File::exists($storagePath)) {
            // If not, create the "eleves" folder
            File::makeDirectory($storagePath, 0755, true, true);
        }
        $user = Auth::user();

        if ($request->hasFile('image')) {
            // Extract the old image name from the database
            $oldImageName = basename($user->image);

            // Remove the old image from the storage directory
            $oldImagePath = storage_path("app/public/images/prof/{$oldImageName}");
            if ($oldImageName !== null && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Remove the old image from the public directory
            $publicOldImagePath = public_path("storage/images/prof/{$oldImageName}");
            if ($oldImageName !== null && File::exists($publicOldImagePath)) {
                File::delete($publicOldImagePath);
            }

            $imageName = 'prof/' . uniqid() . '.' . $request->image->getClientOriginalExtension();

            // Store the new image in the storage directory
            $request->image->storeAs('public/images/prof', $imageName);

            // Create the public path for the new image
            $publicImagePath = public_path("storage/images/prof/{$imageName}");

            // Make sure the directory exists before copying
            File::ensureDirectoryExists(dirname($publicImagePath));

            // Copy the new image to the public directory
            File::copy(storage_path("app/public/images/prof/{$imageName}"), $publicImagePath);

            $user->image = "/storage/images/prof/{$imageName}";
        }
        $UpdateDataProf = User::where('id','=',Auth::user()->id)->update([
            'image'             => $user->image,
            'datenaissance'     => $request->datenaissance,
            'description'       => $request->methode,
            'telephone'         => $request->phone,
            'pays'              => $request->paysProf,
            'title'             => $request->titre,
        ]);
        $users = User::where('role_name', 'Admin')->get();
        $name  = Auth::user()->name;
        $role_name = Auth::user()->role_name;
        $iduser   = Auth::user()->id;
        $Condition ='MSG';
        Notification::send($users,new RegisterNotification($name,$role_name,$iduser,$Condition));

        $response = App::call('App\Http\Controllers\FormationProf@Store', [
            'request' => $request
        ]);
        return redirect('ShowProfileProf');
    }




    function getDatesForDays()
    {
        $dayMapping = [
            'lundi' => 'Monday',
            'mardi' => 'Tuesday',
            'mercredi' => 'Wednesday',
            'jeudi' => 'Thursday',
            'vendredi' => 'Friday',
            'samedi' => 'Saturday',
            'dimanche' => 'Sunday',
        ];

        $DisponibleProf = DB::select('select jour, debut, fin from disponibleprof where iduser = ?', [Auth::user()->id]);

        $englishDays = collect($DisponibleProf)->pluck('jour')->map(function ($day) use ($dayMapping) {
            return $dayMapping[strtolower($day)] ?? $day;
        })->unique()->values()->toArray();

        $validDayNames = $englishDays;

        $currentYear = Carbon::now()->year;

        $dayDates = collect(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
            ->filter(function ($dayName) use ($validDayNames) {
                return in_array($dayName, $validDayNames);
            })
            ->mapWithKeys(function ($dayName) use ($currentYear) {
                $date = Carbon::now()->startOfWeek();

                while ($date->format('l') !== $dayName) {
                    $date->addDay();
                }

                while ($date->year !== $currentYear) {
                    $date->addYear();
                }

                $date->month(Carbon::now()->month);
                return [$dayName => $date->format('y-m-d')];
            });



        return $dayDates;
    }
   public function GetAvailableProf(Request $request)
   {
        $dayMapping = [
            'Lundi' => 'Monday',
            'Mardi' => 'Tuesday',
            'Mercredi' => 'Wednesday',
            'Jeudi' => 'Thursday',
            'Vendredi' => 'Friday',
            'Samedi' => 'Saturday',
            'Dimanche' => 'Sunday',
        ];
        $dateResults = $this->getDatesForDays();
        $dates = [];
        $dateResults->each(function ($formattedDate, $dayName) use (&$dates) {
            $dates[$dayName] = $formattedDate;
        });
        $DisponibleProf = DB::select('select jour, debut, fin from disponibleprof where iduser = ?', [Auth::user()->id]);

        foreach ($DisponibleProf as &$dispo) {
            $dispo->jour = $dayMapping[$dispo->jour];
        }

        foreach ($DisponibleProf as &$disponible) {

            if (array_key_exists($disponible->jour, $dates)) {

                $disponible->date = $dates[$disponible->jour];
            }
        }


        return response()->json([
            'statut'    =>200,
            'data'      =>$DisponibleProf
        ]);
   }

   public function DetailProfesseur($id)
   {
        $actualId = Hashids::decode($id);
        $Professuer = User::where('id',$actualId)->first();

        $DisponibleProf = DB::select('select d.idcours,d.id,jour,debut,fin,c.title,d.typecours,d.timezone from
                disponibleprof d,cours c where d.idcours = c.id and d.iduser = ?',[$Professuer->id]);

        $day_names_fr = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $disponibilityByDay = [];

        foreach ($day_names_fr as $item)
        {
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

        $CourProf      = DB::select('select c.title,c.id from courprof cp,cours c where cp.idcours = c.id and cp.iduser =?',[$Professuer->id]);
        $FormationProf = DB::select('select diplome,specialise,annee,ecole,pays from formationprof where diplome is not null and iduser  =?',[$Professuer->id]);
        $ExperinceProf = DB::select('select poste, entreprise, pays, du, au from experinceprof where poste is not null and  iduser=?',[$Professuer->id]);

        // Extract debut and fin from disponible


        $DebutCours = '';
        $FinCours   = '';
        $TimeZone   = '';
        foreach($DisponibleProf as $item)
        {
            $DebutCours = $item->debut;
            $FinCours   = $item->fin;
            $TimeZone   = $item->timezone;
        }



        // information Professeur
        $InformationProfesseur = User::where('id',$Professuer->id)->first();
        // sum experince professeur
        $CalculExperince = DB::select('select sum(timestampdiff(year,du,au) ) as experince from experinceprof where iduser = ?',[$Professuer->id]);



        $imageProfesseur = User::where('name',$InformationProfesseur->name)->first();



        // Convert the date to a Carbon instance
        $carbonDate = Carbon::now();

        // Array for translating days and months
        $translations = [
            'Monday' => 'lundi',
            'Tuesday' => 'mardi',
            'Wednesday' => 'mercredi',
            'Thursday' => 'jeudi',
            'Friday' => 'vendredi',
            'Saturday' => 'samedi',
            'Sunday' => 'dimanche',
            'January' => 'janvier',
            'February' => 'février',
            'March' => 'mars',
            'April' => 'avril',
            'May' => 'mai',
            'June' => 'juin',
            'July' => 'juillet',
            'August' => 'août',
            'September' => 'septembre',
            'October' => 'octobre',
            'November' => 'novembre',
            'December' => 'décembre',
        ];

        // Format the date as desired
        $formattedDate = $carbonDate->translatedFormat('l d F, Y', null, 'fr', $translations);

    // Output the result

   /*  dd($disponibilityByDay); */
        return view('professeur.detailprof')
        ->with('CalculExperince'         , $CalculExperince)
        ->with('InformationProfesseur'   , $InformationProfesseur)
        ->with('DebutCours'              , $DebutCours)
        ->with('TimeZone'                , $TimeZone)
        ->with('FinCours'                , $FinCours)
        ->with('DateSelected'            , $formattedDate)
        ->with('disponibilityByDay'      , $disponibilityByDay)
        ->with('CourProf'                , $CourProf)
        ->with('FormationProf'           , $FormationProf)
        ->with('ExperinceProf'           , $ExperinceProf)
        ->with('imageProfesseur'         , $imageProfesseur);

   }


   public function checkDispoProf(Request $request)
   {
        try
        {
            $Check = DB::table('disponibleprof')
                    ->where('jour'      ,$request->dayName)
                    ->where('idcours'   ,$request->cours)
                    ->where('typecours' ,$request->typecours)
                    ->where('iduser'    ,$request->iduser)
                    ->count();

            if($Check == 0)
            {
                return response()->json([
                    'status'   => 400,
                ]);
            }
            else
            {
                $Data  = DB::table('disponibleprof')
                        ->join('users','users.id','=','disponibleprof.iduser')
                        ->join('cours','cours.id','=','disponibleprof.idcours')
                        ->where('jour'      ,$request->dayName)
                        ->where('idcours'   ,$request->cours)
                        ->where('typecours' ,$request->typecours)
                        ->where('disponibleprof.iduser'    ,$request->iduser)
                        ->select('disponibleprof.debut','users.name','cours.title','disponibleprof.typecours','disponibleprof.iduser')
                        ->get();
                return response()->json([
                    'status'   => 200,
                    'Data'    => $Data
                ]);
            }
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
   }




}
