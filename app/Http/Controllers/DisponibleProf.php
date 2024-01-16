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
        $courByDate = $request->courByDate;
        $typeCours  = $request->typeCours;
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
                    'idcours'              =>$courByDate[$i],
                    'typecours'            =>$typeCours[$i],
                ];
                DB::table('disponibleprof')->insert($DataSava);
            }
        }

        $response = App::call('App\Http\Controllers\CoursProf@Store', [
            'request' => $request
        ]);
    }

    public function UpdateDisponible(Request $request)
    {
        // check Professeur has disponoble
        $CheckData = DB::table('disponibleprof')->where('iduser',Auth::user()->id)->count();
        if($CheckData >0)
        {
            DB::table('disponibleprof')->where('iduser',Auth::user()->id)->delete();
        }
        else
        {
            $data = $request->input('data');

            foreach ($data as $day => $dayData)
            {
                foreach ($dayData as $row) {
                    $cours = $row['cours'];
                    $typeCours = $row['typeCours'];
                    $heureDebut = $row['heureDebut'];
                    $heureFin = $row['heureFin'];

                    // Insert into the database
                    DB::table('disponibleprof')->insert([
                        'jour' => $day,
                        'debut' => $heureDebut,
                        'fin' => $heureFin,
                        'iduser' => Auth::user()->id,
                        'idcours' => $cours,
                        'typecours' => $typeCours,
                    ]);
                }
            }
        }

    }
}
