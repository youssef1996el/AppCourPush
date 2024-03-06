<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\Models\ExperinceProfesseur;
use DB;
use App\Notifications\RegisterNotification;
use Illuminate\Support\Facades\Notification;
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
                        return redirect('StepByStep');
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
                if($newUser->role_name === 'eleve')
                {
                    $users = User::where('role_name', 'Admin')->get();
                    $name = $newUser->nom.' '.$newUser->prenom;
                    $iduser   = DB::select('select id from users where email = ?',[$newUser->email]);
                    $iduser = (int)$iduser[0]->id;
                    $Condition ='MSG';
                    Notification::send($users,new RegisterNotification($name,$newUser->role_name,$iduser,$Condition));
                }


                if (!$newUser->email_verified)
                {
                    $newUser->sendEmailVerificationNotification();

                    return view('auth.verify');
                }
                return $request->role_name == 'eleve' ? redirect('profile/eleve') : redirect('StepByStep');


        } catch (\Throwable $th) {
            throw $th;
        }
    }


}
