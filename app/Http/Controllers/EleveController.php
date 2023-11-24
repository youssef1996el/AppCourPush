<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class EleveController extends Controller
{
    public function index()
    {


        $professeurs = DB::table(DB::raw('(SELECT u.id, u.image, u.name, 0 as years_difference, u.description
        FROM users u
        JOIN experinceprof e ON u.id = e.iduser
        WHERE u.role_name = "professeur"
        GROUP BY u.id, u.image, u.name, u.description

        UNION ALL

        SELECT iduser, "" as image, "" as name, SUM(TIMESTAMPDIFF(YEAR, du, au)) AS years_difference, "" as description
        FROM experinceprof
        GROUP BY iduser) as t'))
        ->select('t.id', DB::raw('MAX(t.image) as image'), DB::raw('MAX(t.name) as name'), DB::raw('SUM(t.years_difference) as experience'), DB::raw('MAX(t.description) as description'))
        ->groupBy('t.id')
        ->paginate(1);
        return view('profile.eleve')->with('professeurs',$professeurs);
    }

    public function GetpProfesseur()
    {


    $professeurs = DB::table(DB::raw('(SELECT u.id, u.image, u.name, 0 as years_difference, u.description
        FROM users u
        JOIN experinceprof e ON u.id = e.iduser
        WHERE u.role_name = "professeur"
        GROUP BY u.id, u.image, u.name, u.description

        UNION ALL

        SELECT iduser, "" as image, "" as name, SUM(TIMESTAMPDIFF(YEAR, du, au)) AS years_difference, "" as description
        FROM experinceprof
        GROUP BY iduser) as t'))
    ->select('t.id', DB::raw('MAX(t.image) as image'), DB::raw('MAX(t.name) as name'), DB::raw('SUM(t.years_difference) as experience'), DB::raw('MAX(t.description) as description'))
    ->groupBy('t.id')
    ->paginate(1);




        return response()->json([
            'status'    =>200,
            'Data'      => $professeurs
        ]);
    }
}
