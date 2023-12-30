<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\App;
use DB;
use Carbon\Carbon;
class FormationProf extends Controller
{
    public function Store(Request $request)
    {

        $diplome    = $request->diplome;
        $specialise = $request->Specialise;
        $annee      = $request->annee;
        $ecole      = $request->ecole;
        $pays       = $request->paysFormation;

        if ($request->diplome[0] !== null)
        {
            for($i = 0 ; $i< count($diplome) ; $i++)
            {
                $DataSava =
                [
                    'diplome'               =>$diplome[$i],
                    'specialise'            =>$specialise[$i],
                    'annee'                 =>$annee[$i].'-01-01',
                    'ecole'                 =>$ecole[$i],
                    'pays'                  =>$pays[$i],
                    'created_at'           =>Carbon::now(),
                    'updated_at'           =>Carbon::now(),
                    'iduser'                =>Auth::user()->id,
                ];
                DB::table('formationprof')->insert($DataSava);
            }
            $response = App::call('App\Http\Controllers\ExperinceProf@Store', [
                'request' => $request
            ]);

        }
        else
        {
            $response = App::call('App\Http\Controllers\ExperinceProf@Store', [
                'request' => $request
            ]);
        }


    }
}
