<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ExperinceProfesseur;
use Illuminate\Support\Facades\App;
use DB;
use Carbon\Carbon;
class ExperinceProf extends Controller
{
    public function Store(Request $request)
    {
        $poste          = $request->poste;
        $entreprise     = $request->entreprise;
        $paysExperience = $request->paysExperience;
        $du             = $request->du;
        $au             = $request->au;

        if(!is_null($poste))
        {
            for($i = 0 ; $i< count($poste) ; $i++)
            {
                $DataSava =
                [
                    'poste'                 =>$poste[$i],
                    'entreprise'            =>$entreprise[$i],
                    'pays'                  =>$paysExperience[$i],
                    'du'                    =>$du[$i],
                    'au'                    =>$au[$i],
                    'created_at'           =>Carbon::now(),
                    'updated_at'           =>Carbon::now(),
                    'iduser'                =>Auth::user()->id,
                ];
                DB::table('experinceprof')->insert($DataSava);
            }


            $response = App::call('App\Http\Controllers\DisponibleProf@Store', [
                'request' => $request
            ]);
        }


    }
}
