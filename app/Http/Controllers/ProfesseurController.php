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
use Illuminate\Support\Facades\File;
use App\Models\Reserves;
use Carbon\Carbon;
use App\Mail\SendLinkMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\SendLinkMeetNotification;
use Illuminate\Support\Facades\Notification;
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
        $HasMeeting = false;
        $checkHasMeeting = Reserves::where('nom_professeur',Auth::user()->name)->count();
        if($checkHasMeeting > 0)
        {
            $HasMeeting = true;
        }

        return view('Profile.show')
        ->with('FormationProf'          ,$FormationProf)
        ->with('ExperinceProf'          ,$ExperinceProf)
        ->with('DisponibleProf'         ,$DisponibleProf)
        ->with('DataProf'               ,$DataProf)
        ->with('disponibilityByDay'     ,$disponibilityByDay)
        ->with('CourProf'               ,$CourProf)
        ->with('CalculExperince'        ,$CalculExperince[0]->experince)
        ->with('HasMeeting'             ,$HasMeeting);
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
        $HasMeeting = false;
        $checkHasMeeting = Reserves::where('nom_professeur',Auth::user()->name)->count();
        if($checkHasMeeting > 0)
        {
            $HasMeeting = true;
        }
        $DataProfesseur = User::where('id',Auth::user()->id)->get();
        return view('Professeur.InfoProfesseur')
        ->with('DataProfesseur',$DataProfesseur[0])
        ->with('HasMeeting',$HasMeeting);
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
        $HasMeeting = false;
        $checkHasMeeting = Reserves::where('nom_professeur',Auth::user()->name)->count();
        if($checkHasMeeting > 0)
        {
            $HasMeeting = true;
        }
        return view('Professeur.ExpEduInfos')
        ->with('Formation',$Formation)
        ->with('Experince',$Experince)
        ->with('idFormation',$idFormation)
        ->with('idExperince',$idExperince)
        ->with('HasMeeting',$HasMeeting)
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
        $HasMeeting = false;
        $checkHasMeeting = Reserves::where('nom_professeur',Auth::user()->name)->count();
        if($checkHasMeeting > 0)
        {
            $HasMeeting = true;
        }
        return view('Professeur.CoursDispo')
            ->with('disponibilityByDay',$disponibilityByDay)
            ->with('HasMeeting',$HasMeeting)
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

    public function UpdateInfoProfesseur(Request $request)
    {

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


        // Update other user data
        $user->name             = $request->name;
        $user->telephone        = $request->telephone;
        $user->title            = $request->title;
        $user->email            = $request->email;
        $user->description      = $request->description;

        $user->save();
        return redirect()->back()->with('message', 'Your success message here');
    }

    public function MesEleves()
    {
        // name professuer
        $myName        = Auth::user()->name;

        // Extract name my eleves
        $NamesEleves   = Reserves::where('nom_professeur',$myName)->select('nom_eleve')->groupBy('nom_eleve')->get();
        $nomEleveArray = $NamesEleves->pluck('nom_eleve')->toArray();

        // Extract Data My Eleves
        $DataEleves    = User::whereIn('name', $nomEleveArray)->get();

        $codeCountry =
        [
            'AF' => 'Afghanistan',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo',
            'CD' => 'Congo, the Democratic Republic of the',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote D\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island and McDonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran, Islamic Republic of',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea, Democratic People\'s Republic of',
            'KR' => 'Korea, Republic of',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia, the Former Yugoslav Republic of',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia, Federated States of',
            'MD' => 'Moldova, Republic of',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory, Occupied',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena, Ascension and Tristan da Cunha',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin (French part)',
            'PM' => 'Saint Pierre and Miquelon',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SX' => 'Sint Ma',
            'SX' => 'Sint Maarten (Dutch part)',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'SS' => 'South Sudan',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard and Jan Mayen',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan, Province of China',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania, United Republic of',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Minor Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela, Bolivarian Republic of',
            'VN' => 'Viet Nam',
            'VG' => 'Virgin Islands, British',
            'VI' => 'Virgin Islands, U.S.',
            'WF' => 'Wallis and Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
        ];
        foreach ($DataEleves as $user)
        {
            if (array_key_exists($user->pays, $codeCountry))
            {
                $user->pays = $codeCountry[$user->pays];
            }
            else
            {
                $user->pays = 'Unknown';
            }
        }
        $HasMeeting = false;
        $checkHasMeeting = Reserves::where('nom_professeur',Auth::user()->name)->count();
        if($checkHasMeeting > 0)
        {
            $HasMeeting = true;
        }
        return view('Professeur.MesEleves')
        ->with('HasMeeting',$HasMeeting)
        ->with('MesEleves',$DataEleves);
    }

    public function ElevesReserve()
    {
        // Extract my name professeur
        $myName = Auth::user()->name;

        // Extract Eleves Reserve Cours with my name
        $Reserve = DB::table('reserves')
                    ->join('cours','reserves.idcours','=','cours.id')
                    ->select('reserves.times','reserves.typecours','reserves.days','cours.title','reserves.nom_eleve','reserves.nom_professeur')
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

        $AddFinAndTimeZone = DB::select("select jour, debut, fin, typecours, timezone, name,c.title from disponibleprof d,users u,cours c  where d.iduser = u.id and d.idcours = c.id and d.iduser = ?",
                            [Auth::user()->id]);
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
        // Make Array List days convert from english to franch
        $translations = [
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi',
            'Sunday' => 'Dimanche',
        ];
        // Extract name Today english
        $Today = Carbon::now()->format('l');
        // Convert From English to franch use Variable translations
        $nameFrench = isset($translations[$Today]) ? $translations[$Today] : '';

        // Add Att in variable reserve is has today meet or no
        foreach($Reserve as $item)
        {
            if($item->days === $nameFrench)
            {
                $item->hasCours = true;
            }
            else
            {
                $item->hasCours = false;
            }
        }
        $sortedReserve = $Reserve->sortByDesc('hasCours');

      /*   dd($sortedReserve); */

        $HasMeeting = false;
        $checkHasMeeting = Reserves::where('nom_professeur',Auth::user()->name)->count();
        if($checkHasMeeting > 0)
        {
            $HasMeeting = true;
        }
        return view('Professeur.Meeting')
        ->with('ElevesMeeting',$sortedReserve)
        ->with('HasMeeting',$HasMeeting);
    }

    public function SendLinkToEleves(Request $request)
    {
        try
        {

            // Extract id eleves send link in notfication website
            $IdEleve = [];
            foreach($request->input('Data') as $data)
            {
                $Eleves = User::where('email', $data['Email'])->select()->get();
                foreach($Eleves as $item)
                {
                    $IdEleve[] = $item->id;
                }
            }
            // make code send notification to eleve in website
            $uniqueIdEleve = array_unique($IdEleve);
            // Extract Eleves
            $DataEleves = [];
            foreach($uniqueIdEleve as $item)
            {
                $DataEleves = DB::table('users')->where('role_name','eleve')->where('id',$item)->get();
            }

            // Extract link meeting
            $meetingLink = $request['link'];

            foreach($DataEleves as $item)
            {
                $userModel = User::find($item->id);
                $textEleve = "Vous avez rendez-vous avec le Professeur ".$request['Data'][0]['nom_professeur']." pour le cours de ".$request['Data'][0]['title'].".
                              Veuillez cliquer sur le lien suivant pour rejoindre la réunion avec le professeur: <a href='".$meetingLink."' target='_blank'>lien de réunion</a>.";
                Notification::send($userModel,new SendLinkMeetNotification(Auth::user()->id,$textEleve));

                // Send Notification to Email
                Mail::send('email.Send',
                                        [
                                            'meetingLink' => $meetingLink,
                                            'name_eleve'  => $item->name,
                                            'Debut'       => $request['Data'][0]['debut'],
                                            'Cours'       => $request['Data'][0]['title'],
                                            'EmailProf'   => Auth::user()->email,
                                        ],
                                        function ($message) use ($item)
                                        {
                                            $message->to($item->email)
                                                    ->subject('Invitation à rejoindre une session de classe virtuelle');
                                        });
            }


            return response()->json([
                'status'  => 200,
                'message' => 'Réunion envoyée avec succès',
            ]);


        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }




}
