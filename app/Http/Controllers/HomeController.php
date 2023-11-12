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
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function welcome()
    {
        $listProf = User::where('role_name','professeur')->get();

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
        return view('home');
    }

    public function Store(Request $request)
    {
        //dd($request->all());
        $fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('images/prof',$fileName,'public');
        $requestDataImage['image'] = '/storage/'.$path;
        $UpdateDataProf = User::where('id','=',Auth::user()->id)->update([
            'image'             => $requestDataImage['image'],
            'datenaissance'     => $request->datenaissance,
            'description'       => $request->description,
            'telephone'         => $request->phone,
            'pays'              => $request->paysProf
        ]);
        $response = App::call('App\Http\Controllers\FormationProf@Store', [
            'request' => $request
        ]);
        return redirect('ShowProfileProf');
    }

    public function ShowProfile()
    {
        $FormationProf = DB::select('select diplome,specialise,annee,ecole,pays from formationprof where diplome is not null and iduser  =?',[Auth::user()->id]);
        $ExperinceProf = DB::select('select poste, entreprise, pays, du, au from experinceprof where poste is not null and  iduser=?',[Auth::user()->id]);

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
        /* foreach ($DisponibleProf as $item1)
        {
            $disponibilityByDay[$item1->jour] = $item1;
        } */

        return view('Profile.show')
        ->with('FormationProf',$FormationProf)
        ->with('ExperinceProf',$ExperinceProf)
        ->with('DisponibleProf',$DisponibleProf)
        ->with('DataProf',$DataProf)
        ->with('disponibilityByDay',$disponibilityByDay);
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




}
