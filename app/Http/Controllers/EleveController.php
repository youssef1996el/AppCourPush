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
use App\Models\Reserves;
use Illuminate\Support\Facades\Hash;
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

            $test = DisponibleProfesseur::select('disponibleprof.id','idcours', 'debut', 'image','timezone', 'name', DB::raw('cours.title as cours' ), 'jour', 'typecours', 'disponibleprof.iduser','users.title')
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
                    $test = DisponibleProfesseur::select('disponibleprof.id','idcours', 'debut', 'image','timezone', 'name', DB::raw('cours.title as cours' ), 'jour', 'typecours', 'disponibleprof.iduser','users.title')
                    ->join('users', 'disponibleprof.iduser', '=', 'users.id')
                    ->join('cours', 'disponibleprof.idcours', '=', 'cours.id')
                    ->where('users.verification', 'verifie')
                    ->where('disponibleprof.jour',$englishToFrenchDays[$englishDayName]) // today // i add this row
                    ->get();
                }
                else
                {
                    $CarbonNameDaysIsNotLoad = Carbon::parse($requestData['day']);
                    $NameDaysIsNotLoad       = $CarbonNameDaysIsNotLoad->format('l');
                    $NameDaysIsNotLoadFranch = $englishToFrenchDays[$NameDaysIsNotLoad];
                    $test = DisponibleProfesseur::select('disponibleprof.id','idcours', 'debut', 'image','timezone', 'name', DB::raw('cours.title as cours' ), 'jour', 'typecours', 'disponibleprof.iduser','users.title')
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

    public function Details($Time,$NameProfesseur,$Cours,$TypeCours,$DateSelected)
    {
        // Extract id professeur
        $idProfesseur = User::where('name',$NameProfesseur)->get();

        if(!empty($idProfesseur))
        {

            $DisponibleProf = DB::select('select d.idcours,d.id,jour,debut,fin,c.title,d.typecours,d.timezone from
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

            // Extract debut and fin from disponible
            $filteredArray = array_filter($DisponibleProf, function($item) use ($TypeCours,$Cours,$Time) {
                return $item->typecours === $TypeCours && $item->title === $Cours && $item->debut === $Time;
            });
            $DebutCours = $filteredArray[0]->debut;
            $FinCours   = $filteredArray[0]->fin;
            $TimeZone   = $filteredArray[0]->timezone;
            // information Professeur
            $InformationProfesseur = User::where('id',$idProfesseur[0]->id)->first();
            // sum experince professeur
            $CalculExperince = DB::select('select sum(timestampdiff(year,du,au) ) as experince from experinceprof where iduser = ?',[$idProfesseur[0]->id]);
        }

        $getIdCours = DB::select("select id from cours where title = ?",[$Cours]);

        $nomberReserveThisCours = DB::select("select  count(*) as c from reserves where nom_professeur = ? and idcours = ? and typecours ='groupe' group by nom_eleve ;",[$NameProfesseur,$getIdCours[0]->id]);

        $imageProfesseur = User::where('name',$NameProfesseur)->first();

        ///////////
        $dateVariable = $DateSelected;

        // Convert the date to a Carbon instance
        $carbonDate = Carbon::parse($dateVariable);

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


        return view('Eleve.Details')
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
        ->with('Time'                    , $Time)
        ->with('Cours'                   , $Cours)
        ->with('TypeCours'               , $TypeCours)
        ->with('NameProfesseur'          , $NameProfesseur)
        ->with('imageProfesseur'         , $imageProfesseur)
        ->with('nomberReserveThisCours'  , $nomberReserveThisCours !== null && count($nomberReserveThisCours) > 0 ? count($nomberReserveThisCours) : 1);
    }

    public function InfosProfile()
    {
        $DataEleve = User::where('id',Auth::user()->id)->get();
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
        $Pays = [];
        $mycodeFromDatabase = $DataEleve[0]->pays;
        foreach ($codeCountry as $key => $value) {
            if ($key === $mycodeFromDatabase) {
                $Pays = [
                    $key => $value
                ];
                break;
            }
        }

       /*  dd($Pays); */

        return view('Eleve.InfosEleve')
        ->with('DataEleve',$DataEleve[0])
        ->with('mycodeFromDatabase',$mycodeFromDatabase)
        ->with('codeCountry',$codeCountry)
        ->with('Pays',$Pays);
    }

    public function UpdateDataEleve(Request $request)
    {
        $storagePath = storage_path('app/public/images/eleves');

if (!File::exists($storagePath)) {
    // If not, create the "eleves" folder
    File::makeDirectory($storagePath, 0755, true, true);
}

$user = Auth::user();

// Handle image upload
if ($request->hasFile('image')) {
    // Extract the old image name from the database
    $oldImageName = basename($user->image);

    // Remove the old image if it exists
    if ($oldImageName !== null && File::exists(storage_path("app/public/images/eleves/{$oldImageName}"))) {
        File::delete(storage_path("app/public/images/eleves/{$oldImageName}"));
    }

    $imageName = 'eleves/' . uniqid() . '.' . $request->image->getClientOriginalExtension();

    // Store the new image in the storage directory
    $request->image->storeAs('public/images/eleves', $imageName);

    // Create the public path for the new image
    $publicImagePath = public_path("storage/images/eleves/{$imageName}");

    // Make sure the directory exists before copying
    File::ensureDirectoryExists(dirname($publicImagePath));

    // Copy the new image to the public directory
    File::copy(storage_path("app/public/images/eleves/{$imageName}"), $publicImagePath);

    $user->image = "/storage/images/eleves/{$imageName}";
}

        // Update other user data
        $user->name             = $request->name;
        $user->telephone        = $request->telephone;
        $user->email            = $request->email;
        $user->datenaissance    = $request->datenaissance;
        $user->pays             = $request->pays;

        if ($request->filled('newpassword')) {
            $user->password = Hash::make($request->newpassword);
        }
        // Save the changes
        $user->save();
        return redirect()->back();

    }

    public function Mescours()
    {
        $ExtractNameEleve    = User::where('id',Auth::user()->id)->select('name')->first();
        $ExtractNameEleve    = $ExtractNameEleve->name;
        // check this eleve Auth is has cours or not
        $check               =  Reserves::where('nom_eleve',$ExtractNameEleve)->count();
        $hasCours            = false;
        $MesCours =[];

        if($check > 0)
        {

            $hasCours = true;
            $MesReserve    = DB::select("select r.id,times,days,typecours,c.title as name_cours,r.nom_professeur from reserves r, cours c where r.idcours = c.id and r.nom_eleve = ?",
                            [Auth::user()->name]);
            $nomProfesseurs = [];

            foreach ($MesReserve as $reserve) {
                $nomProfesseurs[] = ucfirst(strtolower($reserve->nom_professeur));
            }

            $nomProfesseursString = "'" . implode("', '", $nomProfesseurs) . "'";

            $MesProfesseur = DB::select("SELECT image, name FROM users WHERE name IN ($nomProfesseursString)");

            $imageLookup = [];
            foreach ($MesProfesseur as $images) {
                $imageLookup[strtolower(trim($images->name))] = $images->image;
            }
            foreach ($MesReserve as $item) {
                $imaged = strtolower(trim($item->nom_professeur));
                $item->image = isset($imageLookup[$imaged]) ? $imageLookup[$imaged] : "";
            }



            $MesCours  =$MesReserve;

            $AddDebutAndTimeZone = DB::select("select jour, debut, fin, typecours, timezone, name,c.title from disponibleprof d,users u,cours c  where d.iduser = u.id and d.idcours = c.id");
            dd($AddDebutAndTimeZone);
            foreach ($MesCours as &$cours) {
                foreach ($AddDebutAndTimeZone as $info) {
                    if (
                        $cours->name_cours == $info->title &&
                        $cours->nom_professeur == $info->name &&
                        $cours->times == $info->debut &&
                        $cours->typecours == $info->typecours
                    ) {
                        $cours->fin = $info->fin;
                        $cours->timezone = $info->timezone;
                    }
                }
            }
        }


        /* $query = DB::select('select r.id,times,days,typecours,c.title as name_cours,r.nom_professeur from reserves r, cours c where r.idcours = c.id;');

        $daysTranslations = [
            'dimanche' => 'Sunday',
            'lundi' => 'Monday',
            'mardi' => 'Tuesday',
            'mercredi' => 'Wednesday',
            'jeudi' => 'Thursday',
            'vendredi' => 'Friday',
            'samedi' => 'Saturday',
        ];

        $englishDaysArray = [];

        foreach ($query as $item) {
            $dayFrench = strtolower($item->days);

            if (array_key_exists($dayFrench, $daysTranslations)) {
                $dayEnglish = $daysTranslations[$dayFrench];
                $englishDaysArray[] = $dayEnglish;
            } else {
                $englishDaysArray[] = 'UnknownDay';
            }
        }

        $currentMonth = date('n');

        $daysOfWeekDates = [];
$currentMonth = date('n');

foreach (range(1, 31) as $day) {
    $date = date("Y-m-$day");

    foreach ($query as $item) {
        $dayFrench = strtolower($item->days);

        if (array_key_exists($dayFrench, $daysTranslations)) {
            $dayEnglish = $daysTranslations[$dayFrench];

            if (date('l', strtotime($date)) == $dayEnglish && date('n', strtotime($date)) == $currentMonth) {
                $formattedDate = date('M d, Y', strtotime($date));

                $daysOfWeekDates[] = [
                    'id' => $item->id,
                    'name_cours' => $item->name_cours,
                    'date' => $formattedDate,
                    'typecours' => $item->typecours,
                    'name_professeur' => $item->nom_professeur,
                    'time' => $item->times,
                ];
            }
        }
    }
}

dd($daysOfWeekDates); */


dd($MesCours);

        return view('Eleve.Cours')
        ->with('hasCours',$hasCours)
        ->with('MesCours',$MesCours);
    }

    public function GetMesCourCalander()
    {
        $ExtractNameEleve    = User::where('id',Auth::user()->id)->select('name')->first();
        $ExtractNameEleve    = $ExtractNameEleve->name;
        // check this eleve Auth is has cours or not
        $check               =  Reserves::where('nom_eleve',$ExtractNameEleve)->count();
        $hasCours            = false;
        $MesCours =[];

        if($check > 0)
        {

            $hasCours = true;
            $query = DB::select('select r.id,times,days,typecours,c.title as name_cours,r.nom_professeur from reserves r, cours c where r.idcours = c.id;');

            $daysTranslations = [
                'dimanche' => 'Sunday',
                'lundi' => 'Monday',
                'mardi' => 'Tuesday',
                'mercredi' => 'Wednesday',
                'jeudi' => 'Thursday',
                'vendredi' => 'Friday',
                'samedi' => 'Saturday',
            ];

            $englishDaysArray = [];

            foreach ($query as $item) {
                $dayFrench = strtolower($item->days);

                if (array_key_exists($dayFrench, $daysTranslations)) {
                    $dayEnglish = $daysTranslations[$dayFrench];
                    $englishDaysArray[] = $dayEnglish;
                } else {
                    $englishDaysArray[] = 'UnknownDay';
                }
            }

            $currentMonth = date('n');

            $daysOfWeekDates = [];
            $currentMonth = date('n');

            foreach (range(1, 31) as $day) {
                $date = date("Y-m-$day");

                foreach ($query as $item) {
                    $dayFrench = strtolower($item->days);

                    if (array_key_exists($dayFrench, $daysTranslations)) {
                        $dayEnglish = $daysTranslations[$dayFrench];

                        if (date('l', strtotime($date)) == $dayEnglish && date('n', strtotime($date)) == $currentMonth) {
                            $formattedDate = date('M d, Y', strtotime($date));

                            $daysOfWeekDates[] = [
                                'id' => $item->id,
                                'name_cours' => $item->name_cours,
                                'date' => $formattedDate,
                                'typecours' => $item->typecours,
                                'name_professeur' => $item->nom_professeur,
                                'time' => $item->times,
                            ];
                        }
                    }
                }
            }
        }

        if(!empty($daysOfWeekDates))
        {
            return response()->json([
                'status'         =>200,
                'data' => $daysOfWeekDates
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
            ]);
        }

    }
}
