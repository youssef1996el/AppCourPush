<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
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
                return redirect('/home');
            }
            else
            {
                $newUser = User::create([
                    'name'  => $user->name,
                    'nom'   => $user->name,
                    'prenom' => $user->name,
                    'email' => $user->email,
                    'social_id' =>$user->id,
                    'social_name' => 'google',
                    'password' =>Hash::make('my-google'),
                ]);
                Auth::login($newUser);
                return redirect('/home');
            }
        }
        catch(Exception $e)
        {
            dd($e->getMessage());
        }
    }
}
