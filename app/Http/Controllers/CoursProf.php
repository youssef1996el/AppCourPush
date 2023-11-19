<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursProfesseur;
use Auth;
use DB;
class CoursProf extends Controller
{
   public function Store(Request $request)
   {
        $cours = $request->courProf;

        if(!is_null($cours))
        {
            for($i = 0 ; $i< count($cours) ; $i++)
            {
                $DataSava =
                [
                    'idcours'              => $cours[$i],
                    'iduser'               => Auth::user()->id,
                ];
                DB::table('courprof')->insert($DataSava);
            }
        }
   }
}
