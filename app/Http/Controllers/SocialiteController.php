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
use Exception;
class SocialiteController extends Controller
{

    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
{
    try {
        $user = Socialite::driver('google')->stateless()->user();

        \Log::info('Google user retrieved', ['user' => $user]);

        $finduser = User::where('social_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);
            $users = DB::select('select id,role_name from users where social_id = ?', [$user->id]);

            if ($users[0]->role_name == 'professeur') {
                $Experince = ExperinceProfesseur::where('iduser', $users[0]->id)->count();
                if ($Experince == 0) {
                    return redirect('StepByStep');
                }
            } else {
                return redirect('profile/eleve');
            }

        } else {
            return view('Spaces.index')
                ->with('Email', $user->email)
                ->with('name', $user->name)
                ->with('idUser', $user->id);
        }

    } catch (Exception $e) {
        \Log::error('Google Login Error: ' . $e->getMessage());
        return response()->view('errors.500', ['message' => $e->getMessage()], 500);
    }
}

public function LoginWithGoogle(Request $request)
{
    try {
        // Ensure email is not null
        if (!$request->email) {
            return redirect('/login')->withErrors(['email' => 'Email non reçu.']);
        }

        // Prevent duplicate user
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            Auth::login($existingUser);
            return $existingUser->hasVerifiedEmail()
                ? redirect($existingUser->role_name === 'eleve' ? 'profile/eleve' : 'StepByStep')
                : view('auth.verify');
        }

        // Split full name
        $fullName = $request->nom ?? '';
        $nameParts = explode(' ', $fullName, 2);
        $nom = $nameParts[0] ?? '';
        $prenom = $nameParts[1] ?? '';

        // Create new user
        $newUser = User::create([
            'name'        => $fullName,
            'nom'         => $nom,
            'prenom'      => $prenom,
            'email'       => $request->email,
            'social_id'   => $request->idUser,
            'role_name'   => $request->role_name,
            'pays'        => $request->role_name === 'eleve' ? $request->pays : null,
            'social_name' => 'google',
            'password'    => Hash::make('my-google'),
        ]);

        Auth::login($newUser);

        if ($newUser->role_name === 'eleve') {
            $admins = User::where('role_name', 'Admin')->get();
            $name = $nom . ' ' . $prenom;
            Notification::send($admins, new RegisterNotification($name, $newUser->role_name, $newUser->id, 'MSG'));
        }

        if (!$newUser->hasVerifiedEmail()) {
            $newUser->sendEmailVerificationNotification();
            return view('auth.verify');
        }

        return $request->role_name === 'eleve' ? redirect('profile/eleve') : redirect('StepByStep');

    } catch (\Throwable $th) {
        return redirect('/login')->withErrors(['msg' => 'Erreur Google: ' . $th->getMessage()]);
    }
}}
