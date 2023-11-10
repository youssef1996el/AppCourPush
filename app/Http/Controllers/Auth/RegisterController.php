<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        if($data['role_name'] === 'eleve')
        {
            return Validator::make($data, [
                'nom'           => ['required', 'string', 'max:255'],
                'prenom'        => ['required', 'string', 'max:255'],
                'pays'          => ['required'],
                'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'      => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'email.unique' => 'Cet email est déjà inscrit. Essayez de vous connecter plutot que de vous inscrire',
            ]);

        }
        else
        {

            return Validator::make($data, [
                'nom'             => ['required', 'string', 'max:255'],
                'prenom'          => ['required', 'string', 'max:255'],
                'email'           => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'        => ['required', 'string', 'min:8', 'confirmed'],

            ],
            [
                'email.unique' => 'Cet email est déjà inscrit. Essayez de vous connecter plutot que de vous inscrire',
            ]);


        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $name = $data['nom'].' '.$data['prenom'];
        return User::create([

            'nom'               => $data['nom'],
            'prenom'            => $data['prenom'],
            'name'              => $name,
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'pays'              => $data['role_name'] == 'eleve' ? $data['pays'] : null,
            'telephone'         => null ,
            'image'             => null,
            'role_name'         => $data['role_name'],
        ]);
    }

    protected function registered( $user)
    {
        if ($user->role_name === 'professeur') {
            return redirect('professeur/StepByStep'); // Change this to the actual route for professeurs.
        }

        return redirect($this->redirectPath());
    }
}
