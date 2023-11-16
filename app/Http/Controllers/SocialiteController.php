<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\Models\ExperinceProfesseur;
use DB;
class SocialiteController extends Controller
{

    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    public function handGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('social_id',$user->id)->first();

            if($finduser)
            {
                Auth::login($finduser);
                $users = DB::select('select id,role_name from users where social_id = ?',[$user->id]);
                if($users[0]->role_name == 'professeur')
                {
                    $Experince = ExperinceProfesseur::where('iduser',$users[0]->id)->count();
                    if($Experince == 0)
                    {
                        return redirect('professeur/StepByStep');
                    }
                }
                else
                {
                    return redirect('profile/eleve');
                }

            }
            else
            {
                return view('Spaces.index')
                ->with('Email',$user->email)
                ->with('name',$user->name)
                ->with('idUser',$user->id);
                /* return redirect('spaces/index'); */
               /*  $newUser = User::create([
                    'name'  => $user->name,
                    'nom'   => $user->name,
                    'prenom' => $user->name,
                    'email' => $user->email,
                    'social_id' =>$user->id,
                    'social_name' => 'google',
                    'password' =>Hash::make('my-google'),
                ]);
                Auth::login($newUser);
                return redirect('/home'); */
            }
        }
        catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }

    public function LoginWithGoogle(Request $request)
    {

        try
        {
            $newUser = User::create([
                    'name'              => $request->nom,
                    'nom'               => $request->nom,
                    'prenom'            => $request->nom,
                    'email'             => $request->email,
                    'social_id'         => $request->idUser,
                    'role_name'         =>  $request->role_name,
                    'pays'              => $request->role_name == 'eleve' ? $request->pays : null,
                    'social_name'       => 'google',
                    'password'          => Hash::make('my-google'),
                ]);
                Auth::login($newUser);
                return $request->role_name == 'eleve' ? redirect('profile/eleve') : redirect('professeur/StepByStep');


        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
