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


}
