<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
class DisponibleProf extends Controller
{
    public function Store(Request $request)
    {
        $days = $request->days;
        $heuredebut = $request->heuredebut;
        $heurefin =$request->heurefin;

        if(!is_null($days))
        {
            for($i = 0 ; $i< count($days) ; $i++)
            {
                $DataSava =
                [
                    'jour'                 =>$days[$i],
                    'debut'                =>$heuredebut[$i],
                    'fin'                  =>$heurefin[$i],
                    'created_at'           =>Carbon::now(),
                    'updated_at'           =>Carbon::now(),
                    'iduser'               =>Auth::user()->id,
                ];
                DB::table('disponibleprof')->insert($DataSava);
            }
        }

        $response = App::call('App\Http\Controllers\CoursProf@Store', [
            'request' => $request
        ]);



    }
}
