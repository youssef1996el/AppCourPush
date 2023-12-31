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
        ->select('users.name','users.image','users.description','users.telephone')
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



        $fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('images/prof',$fileName,'public');
        $requestDataImage['image'] = '/storage/'.$path;
        $UpdateDataProf = User::where('id','=',Auth::user()->id)->update([
            'image'             => $requestDataImage['image'],
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
        Notification::send($users,new RegisterNotification($name,$role_name,$iduser));

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




}
