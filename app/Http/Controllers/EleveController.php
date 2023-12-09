<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Cours;
class EleveController extends Controller
{
    public function index()
    {


        $cours = Cours::all();
        return view('profile.eleve')->with('cours', $cours);
    }

    public function GetpProfesseur()
    {

        $professeurs = DB::table('users')
                        ->join('experinceprof','experinceprof.iduser','=','users.id')
                        ->select('users.id','users.image','users.name','users.description',DB::raw('sum(TIMESTAMPDIFF(YEAR,du,au)) as experience'))
                        ->where('users.verification','=','Verifie')
                        ->paginate(1);

        return response()->json([
            'status'    =>200,
            'Data'      => $professeurs
        ]);
    }
}
