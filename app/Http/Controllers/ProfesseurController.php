<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cours;
use DateTime;
use DB;
use Auth;
use App\Models\CoursProfesseur;
use App\Models\TypeCours;
use App\Models\FormationProfesseur;
use App\Models\ExperinceProfesseur;
use Illuminate\Support\Facades\App;
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
        $CourProf      = DB::select('select c.title from courprof cp,cours c where cp.idcours = c.id and cp.iduser =?',[Auth::user()->id]);
        $DataProf = User::where('id',Auth::user()->id)->get();


        $CalculExperince = DB::select('select sum(timestampdiff(year,du,au) ) as experince from experinceprof where iduser = ?',[Auth::user()->id]);

        $DisponibleProf = DB::select('select jour,debut,fin,c.title,d.typecours from disponibleprof d,cours c where d.idcours = c.id and d.iduser = ?',[Auth::user()->id]);

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

       /*  dd($ExperinceProf); */



        return view('Profile.show')
        ->with('FormationProf',$FormationProf)
        ->with('ExperinceProf',$ExperinceProf)
        ->with('DisponibleProf',$DisponibleProf)
        ->with('DataProf',$DataProf)
        ->with('disponibilityByDay',$disponibilityByDay)
        ->with('CourProf',$CourProf)
        ->with('CalculExperince' , $CalculExperince[0]->experince);
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

    public function InfoProfesseur()
    {
        $DataProfesseur = User::where('id',Auth::user()->id)->get();
        return view('Professeur.InfoProfesseur')
        ->with('DataProfesseur',$DataProfesseur[0]);
    }

    public function GetPriceGroupeOrPrive()
    {
        $TypeCoursPrive = TypeCours::select('prix')->where('type','=','Cours particulier')->get();
        $TypeCoursGroupe = TypeCours::select('prix')->where('type','=','Cours en groupe')->get();
        return response()->json([
            'status'   => 200,
            'Groupe'   => $TypeCoursGroupe,
            'Prive'    => $TypeCoursPrive
        ]);
    }

    public function ExpEduInfos()
    {
        $Formation  =FormationProfesseur::where('iduser',Auth::user()->id)->get();
        $Experince  =ExperinceProfesseur::where('iduser',Auth::user()->id)->get();
        $country_arr = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Angola", "Anguilla", "Antartica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Ashmore and Cartier Island", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo, Democratic Republic of the", "Congo, Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czeck Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "Gambia, The", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Holy See (Vatican City)", "Honduras", "Hong Kong", "Howland Island", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Ireland, Northern", "Israel", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jarvis Island", "Jersey", "Johnston Atoll", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Man, Isle of", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Midway Islands", "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcaim Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romainia", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Scotland", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and South Sandwich Islands", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Tobago", "Toga", "Tokelau", "Tonga", "Trinidad", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands", "Wales", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];
        $idFormation = implode(',',$Formation->pluck('id')->toArray());
        $idExperince = implode(',',$Experince->pluck('id')->toArray());
        return view('Professeur.ExpEduInfos')
        ->with('Formation',$Formation)
        ->with('Experince',$Experince)
        ->with('idFormation',$idFormation)
        ->with('idExperince',$idExperince)
        ->with('country_arr',$country_arr);
    }

    public function CoursDisponibilite()
    {

        $DisponibleProf = DB::select('select d.idcours,d.id,jour,debut,fin,c.title,d.typecours from disponibleprof d,cours c where d.idcours = c.id and d.iduser = ?',[Auth::user()->id]);

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

        $dataCoursProf = DB::table('cours')
        ->join('courprof','courprof.idcours','cours.id')
        ->where('courprof.iduser',Auth::user()->id)
        ->select('cours.id','cours.title')
        ->get();

        return view('Professeur.CoursDispo')
            ->with('disponibilityByDay',$disponibilityByDay)
            ->with('cours',$dataCoursProf);

    }

    public function DeleteDisponible(Request $request)
    {
        try
        {
            $DeleteDisponibleProf = DB::table('disponibleprof')->where('id',$request->id)->delete();
            return response()->json([
                'status' =>200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }
    public function DeleteDisponibleByDay(Request $request)
    {
        try
        {
            $DeleteDisponibleByDayProf = DB::table('disponibleprof')->where('jour',trim($request->jour))->delete();
            return response()->json([
                'status' =>200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function CheckDayIsExiste(Request $request)
    {
        try
        {
            $checkDayIsExisteDispoByProf = DB::table('disponibleprof')->where('jour',trim($request->jour))->where('iduser',Auth::user()->id)->count();

            if($checkDayIsExisteDispoByProf == 0)
            {
                return response()->json([
                    'status'   => 200,
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 220,
                ]);
            }
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function UpDateDisponibleByProf(Request $request)
    {
        try
        {
            $response = App::call('App\Http\Controllers\DisponibleProf@UpdateDisponible', [
                'request' => $request
            ]);
            return response()->json([
                'status' => 200
            ]);
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }




}
