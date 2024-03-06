<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FormationProfesseur;
use App\Models\ExperinceProfesseur;
use DB;
use App\Models\DisponibleProfesseur;
use Carbon\Carbon;
use DateTime;
use App\Models\CertificationProf;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\TypeCours;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Reserves;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
class AdminController extends Controller
{
    public function professeurs()
    {
        /* $listProfesseur  = User::where('role_name','professeur')->get(); */
        $listProfesseur = DB::select('select u.id,u.image,email,u.name,ifnull(u.title,"Vide") as title,u.verification,u.role_name,sum(TIMESTAMPDIFF(YEAR,du, au)) AS numberExperince
        from users u ,experinceprof e where u.id = e.iduser and u.role_name= "professeur"
        group by iduser');
        return view('Dashboard.professeur')->with('listProfesseur',$listProfesseur);
    }

    public function eleves()
    {
        $listeleve = User::where('role_name','eleve')->get();
        return view('Dashboard.eleve')->with('listeleve',$listeleve);
    }

    public function Viewprofesseur(Request $request)
    {
        $professeur         = User::where('id',$request->id)->get();
        $formation          = FormationProfesseur::where('iduser',$request->id)->get();
        $Experince          = ExperinceProfesseur::where('iduser',$request->id)->get();
        $CertificationProf  = CertificationProf::where('iduser',$request->id)->get();
        $NumberExperince = DB::select('select sum(TIMESTAMPDIFF(YEAR,du, au)) AS numberExperince from experinceprof where iduser = ?',
                                    [$request->id]);
        $CourProf   = DB::table('courprof')
                                ->join('users','users.id','=','courprof.iduser')
                                ->join('cours','cours.id','=','courprof.idcours')
                                ->select('cours.title')
                                ->where('courprof.iduser','=',$request->id)
                                ->get();

        $DisponibleProf = DB::select('select jour,debut,fin,c.title,d.typecours from disponibleprof d,cours c where d.idcours = c.id and d.iduser = ?',[$request->id]);
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


        $CountFormationProf = FormationProfesseur::where('iduser',$request->id)->count();
        return response()->json([
            'status'            => 200,
            'data'              => $professeur[0],
            'formation'         => $formation,
            'Experince'         => $Experince,
            'CourProf'          => $CourProf,
            'Disponible'        => $disponibilityByDay,
            'image'             => $professeur[0]->image,
            'NumberExperince'   => $NumberExperince[0]->numberExperince,
            'CertificationProf' => $CertificationProf[0]->certification,
            'idProf'            => $request->id,
            'CountFormationProf'=> $CountFormationProf
        ]);
    }

    public function verificationProf(Request $request)
    {
        $verification = User::where('id', $request->idprof)->update([
            'verification'     => $request->verification
        ]);
        return response()->json([
            'status'   => 200,
        ]);
    }

    public function AdminDashboard()
    {
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
        $formattedDate = Carbon::now()->translatedFormat('l d F, Y', null, 'fr', $translations);

        $professeurActive = DB::table('users')
                            ->join('experinceprof','experinceprof.iduser','=','users.id')
                            ->where('users.verification','=','Verifie')
                            ->count();
        $Eleve            = User::where('role_name','eleve')->count();
        $professeurNoActive = User::where('role_name','professeur')->where('verification',null)->count();

        return view('Dashboard.dashboard',
        compact('professeurActive', 'Eleve','formattedDate','professeurNoActive'));

    }

    public function AdminProfile()
    {
        $DataAdmin = User::where('role_name','Admin')->where('id',Auth::user()->id)->get();

        return view('Dashboard.ProfileAdmin')
                ->with('DataAdmin', $DataAdmin[0]);
    }

    public function UpDateAdmin(Request $request)
    {
        try
        {
            // Check if the "eleves" folder exists in the storage path
            $storagePath = storage_path('app/public/images/admin');
            if (!File::exists($storagePath)) {
                // If not, create the "admin" folder
                File::makeDirectory($storagePath, 0755, true, true);
            }
            $user = Auth::user();
            if ($request->hasFile('image'))
            {
                // Extract the old image name from the database
                $oldImageName = basename($user->image);
                // Remove the old image from the storage directory
                $oldImagePath = storage_path("app/public/images/admin/{$oldImageName}");
                if ($oldImageName !== null && File::exists($oldImagePath))
                {
                    File::delete($oldImagePath);
                }

                // Remove the old image from the public directory
                $publicOldImagePath = public_path("storage/images/admin/{$oldImageName}");
                if ($oldImageName !== null && File::exists($publicOldImagePath))
                {
                    File::delete($publicOldImagePath);
                }

                $imageName = 'admin/' . uniqid() . '.' . $request->image->getClientOriginalExtension();

                // Store the new image in the storage directory
                $request->image->storeAs('public/images/admin', $imageName);

                // Create the public path for the new image
                $publicImagePath = public_path("storage/images/admin/{$imageName}");

                // Make sure the directory exists before copying
                File::ensureDirectoryExists(dirname($publicImagePath));

                // Copy the new image to the public directory
                File::copy(storage_path("app/public/images/admin/{$imageName}"), $publicImagePath);

                $user->image = "/storage/images/admin/{$imageName}";
            }

             // Update other user data
            $user->nom              = $request->nom;
            $user->prenom           = $request->prenom;
            if ($request->filled('nouveaumotdepasse') && $request->filled('Cnfnouveaumotdepasse'))
            {
                $user->password = Hash::make($request->nouveaumotdepasse);
            }
            $user->save();







            return redirect()->back()->with('success', 'Profile updated successfully');

        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }


    public function ShowUser($id)
    {
        $actualId = Hashids::decode($id);
        $userProfesseurOrEleve = User::find($actualId);
        $updatenotification = DB::table('notifications')
                            ->where('data->id', $actualId)->update(['read_at' => now()]);

        $data             = $userProfesseurOrEleve[0]->role_name;
        if($data === 'professeur')
        {
            $data =  $listProfesseur = DB::select('select u.id,u.image,email,u.name,ifnull(u.title,"Vide") as title,u.verification,u.role_name,sum(TIMESTAMPDIFF(YEAR,du, au)) AS numberExperince
            from users u ,experinceprof e where u.id = e.iduser and u.role_name= "professeur" and u.id = ?
            group by iduser',[$actualId[0]]);
        }
        else
        {
            $data =  User::find($actualId);
        }

        return view('Dashboard.ShowUsers')->with('data', $data)
        ->with('role_name',$userProfesseurOrEleve[0]->role_name);
    }

    public function getStartYearAndEnd()
    {
        $YearStart = DB::select("select max(year(created_at)) as yearEnd, min(year(created_at)) as yearStart from users");
        return response()->json([
            'status'       => 200,
            'yearStart'    => $YearStart[0]->yearStart,
            'yearend'      => $YearStart[0]->yearEnd,
        ]);
    }
    public function StartPayement()
    {
        $YearStart = DB::select("select max(year(created_at)) as yearEnd, min(year(created_at)) as yearStart from payements");
        return response()->json([
            'status'       => 200,
            'yearStart'    => $YearStart[0]->yearStart,
            'yearend'      => $YearStart[0]->yearEnd,
        ]);
    }
    public function GetChartEleveCount(Request $request)
    {

        $GetChartEleveCount = DB::select("SELECT months.month_name AS month,COALESCE(COUNT(users.created_at), 0) AS user_count
                                FROM (SELECT 1 AS month, 'January' AS month_name UNION SELECT 2, 'February' UNION SELECT 3,
                                     'March' UNION SELECT 4, 'April' UNION SELECT 5, 'May' UNION SELECT 6, 'June' UNION SELECT 7,
                                     'July' UNION SELECT 8, 'August' UNION SELECT 9, 'September' UNION SELECT 10, 'October' UNION SELECT 11,
                                     'November' UNION SELECT 12, 'December') AS months
                                LEFT JOIN
                                    users AS users ON MONTH(users.created_at) = months.month AND YEAR(users.created_at) =?
                                                            and users.role_name = 'eleve'
                                GROUP BY
                                    months.month, months.month_name
                                ORDER BY
                                    months.month;
                                ",[$request->date]);



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
        $translatedResults = [];

        foreach ($GetChartEleveCount as $result) {
            $month = $translations[$result->month];
            $translatedResults[] = (object) [
                'month' => $month,
                'user_count' => $result->user_count,
            ];
        }


       return response()->json([
            'status'       => 200,
            'data'    => $translatedResults,

        ]);
    }

    public function GetTotalByDate(Request $request)
    {


        $getMoneyByDate = DB::select("SELECT months.month_name AS month,COALESCE(sum(payements.total), 0) AS total
                                        FROM (SELECT 1 AS month, 'January' AS month_name UNION SELECT 2, 'February' UNION SELECT 3,
                                            'March' UNION SELECT 4, 'April' UNION SELECT 5, 'May' UNION SELECT 6, 'June' UNION SELECT 7,
                                            'July' UNION SELECT 8, 'August' UNION SELECT 9, 'September' UNION SELECT 10, 'October' UNION SELECT 11,
                                            'November' UNION SELECT 12, 'December') AS months
                                        LEFT JOIN
                                            payements AS payements ON MONTH(payements.created_at) = months.month AND YEAR(payements.created_at) =?
                                        Left JOIN
                                            users ON users.id = payements.ideleve
                                        GROUP BY
                                            months.month, months.month_name
                                        ORDER BY
                                            months.month;",[$request->date]);

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
        $translatedResults = [];

        foreach ($getMoneyByDate as $result) {
            $month = $translations[$result->month];
            $translatedResults[] = (object) [
                'month' => $month,
                'total' => $result->total,
            ];
        }

        return response()->json([
            'status'       => 200,
            'data'    => $translatedResults,

        ]);
    }
    public function GetChartByCountry()
    {
        $GetChartByCountry = DB::select("select pays,count(*) as number from users where role_name='eleve' and pays is not null group by pays");

        $listCountry =
        [
            "US" => "United States",
            "AF" => "Afghanistan",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BA" => "Bosnia and Herzegowina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cabo Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CD" => "Congo, the Democratic Republic of the",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Cote d'Ivoire",
            "HR" => "Croatia (Hrvatska)",
            "CU" => "Cuba",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "TL" => "East Timor",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard and Mc Donald Islands",
            "VA" => "Holy See (Vatican City State)",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran (Islamic Republic of)",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic of",
            "KR" => "Korea, Republic of",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao, People's Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libyan Arab Jamahiriya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macao",
            "MK" => "Macedonia, The Former Yugoslav Republic of",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States of",
            "MD" => "Moldova, Republic of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SK" => "Slovakia (Slovak Republic)",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SH" => "St. Helena",
            "PM" => "St. Pierre and Miquelon",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen Islands",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan, Province of China",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic of",
            "TH" => "Thailand",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VE" => "Venezuela",
            "VN" => "Vietnam",
            "VG" => "Virgin Islands (British)",
            "VI" => "Virgin Islands (U.S.)",
            "WF" => "Wallis and Futuna Islands",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "YU" => "Serbia",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe",
        ];
        $chartWithCountryNames = [];
        foreach ($GetChartByCountry as $chartData) {

            if (isset($listCountry[$chartData->pays])) {

                $chartData->country_name = $listCountry[$chartData->pays];

                $chartWithCountryNames[] = $chartData;
            }
        }
        $maxValue = DB::select("SELECT SUM(cnt) as total_count FROM (
                    SELECT COUNT(*) as cnt FROM users WHERE role_name = 'eleve' AND pays IS NOT NULL
                    GROUP BY pays) AS counts");

        return response()->json([
            'status'       => 200,
            'data'    => $chartWithCountryNames,
            'maxValue' =>$maxValue[0]->total_count
        ]);
    }

    public function CoursPaiement()
    {
        return view('Dashboard.CoursPaiement');
    }

    public function fetchDataTypeCours()
    {
        $ListTypeCours = TypeCours::all();
        return response()->json([
            'status'       => 200,
            'data'         => $ListTypeCours,
        ]);
    }

    public function StoreDataTypeCours(Request $request)
    {
        try
        {
            $checkTypeCoursIsExist =TypeCours::where('type',$request->type)->count();
            if($checkTypeCoursIsExist == 0)
            {
                $TypeCours = TypeCours::create([
                    'type'         => $request->type,
                    'prix'         => $request->prix,
                    'iduser'       => Auth::user()->id,
                ]);

                return response()->json([
                    'status'       => 200,

                ]);
            }
            else
            {
                return response()->json([
                    'status'       => 400,
                ]);
            }
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function GetTypeCours(Request $request)
    {
        try
        {
            $TypeCours =  TypeCours::where('id',$request->id)->get();

            return response()->json([
                'status'       => 200,
                'data'         => $TypeCours[0]

            ]);
        }
         catch (\Throwable $th) {
            throw $th;
        }
    }

    public function UpdateDataTypeCourse(Request $request)
    {

        try
        {
            $updateTypeCours = TypeCours::where('id',$request->id)->update([

                'prix'         => $request->prix,
            ]);
            return response()->json([
                'status'       => 200,
            ]);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }

    public function Validation()
    {
        $Reserve = DB::table('reserves')
                    ->join('cours','reserves.idcours','=','cours.id')
                    ->select('reserves.id','reserves.times','reserves.typecours','reserves.days','cours.title','reserves.nom_eleve','reserves.nom_professeur','reserves.status','reserves.valide')
                    ->get();
        // Extract name eleves and email
        $DataEleves = User::where('role_name','eleve')->get();

        foreach($Reserve as $item)
        {
            foreach($DataEleves as $item1)
            {
                if($item->nom_eleve === $item1->name)
                {
                    $item->email = $item1->email;
                }
            }
        }
        // Add Id Professeur
        $DataProf    = User::where('role_name','professeur')->get();
        foreach($Reserve as $item)
        {
            foreach($DataProf as $item1)
            {
                if($item->nom_professeur === $item1->name)
                {
                    $item->idProf = $item1->id;
                }
            }
        }

        foreach($Reserve as $item)
        {
            $AddFinAndTimeZone = DB::select("select jour, debut, fin, typecours, timezone, name,c.title from disponibleprof d,users u,cours c  where d.iduser = u.id and d.idcours = c.id and d.iduser = ?",
                [$item->idProf]);
        }
        foreach ($Reserve as &$cours) {
            foreach ($AddFinAndTimeZone as $info) {
                if (
                    $cours->title == $info->title &&
                    $cours->nom_professeur == $info->name &&
                    $cours->times == $info->debut &&
                    $cours->typecours == $info->typecours
                ) {
                    $cours->fin = $info->fin;
                    $cours->timezone = $info->timezone;
                }
            }
        }

        return view('Dashboard.Validation')
        ->with('Data',$Reserve);
    }


    public function ValidationCoursProf(Request $request)
    {
        $role_name = Auth::user()->role_name;
        if($role_name === 'Admin')
        {

            $data = $request->input('data');
            $ids = array_column($data, 'id');

            $reserves = DB::table('reserves')
                        ->join('cours','cours.id','=','reserves.idcours')
                        ->select('reserves.*','cours.title')
                        ->whereIn('reserves.id', $ids)
                        ->get();
            foreach ($reserves as $reserve)
            {
                if ($reserve->status === '0')
                {
                    return response()->json([
                        'status'  => 400,
                        'message' => "Cours ".$reserve->title." is not completed"
                    ]);
                }
                else
                {
                    $upDateReserves  =  Reserves::where('id',$reserve->id)->update([
                        'status' => '1',
                        'valide' => '1',
                    ]);
                }
            }
            return response()->json([
                'status'   => 200,
            ]);


        }
        else
        {
            $data = $request->input('data');
            $ids = array_column($data, 'id');
            $reserves = DB::table('reserves')
                            ->join('cours','cours.id','=','reserves.idcours')
                            ->select('reserves.*','cours.title')
                            ->whereIn('reserves.id', $ids)
                            ->get();
            foreach ($reserves as $reserve)
            {
                if ($reserve->status === '1')
                {
                    return response()->json([
                        'status'  => 404,
                        'message' => "Cours ".$reserve->title." is  completed"
                    ]);
                }
                else if($reserve->status === '0')
                {
                    $upDateReserves  =  Reserves::where('id',$reserve->id)->update([
                        'status' => '2',
                        'valide' => '0',
                    ]);
                }
            }
            return response()->json([
                'status'   => 200,
            ]);
        }
    }

}
