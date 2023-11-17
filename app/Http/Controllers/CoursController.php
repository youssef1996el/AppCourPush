<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use DB;
use Auth;
class CoursController extends Controller
{
    public function StoreCours(Request $request)
    {

        try
        {
            $problematicTitles = [];
            foreach ($request->cours as $cour)
            {

                $CheckTitle = DB::table('cours')->where('title',$cour)->count();
                if($CheckTitle !=0)
                {
                    array_push($problematicTitles,$cour);
                }
                else
                {
                    $Cours =Cours::create([
                        'title'        =>$cour,
                        'iduser'       =>Auth::user()->id,
                    ]);

                }
            }

            return response()->json([
                'status'       => 200,
                'problematic_titles' => array_unique($problematicTitles),
            ]);

        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

    public function GetTableCour()
    {
        $Cours = Cours::all();

        return response()->json([
            'status'      =>200,
            'data'        =>$Cours
        ]);
    }

    public function EditCour(Request $request)
    {
        try
        {
            $updateCour = Cours::where('id',$request->id)->update([
                'title'      =>$request->title
            ]);
            if($updateCour)
            {
                return response()->json([
                    'status'     =>200,
                ]);
            }
        }
        catch (\Throwable $th)
        {
            throw $th;
        }
    }
}
