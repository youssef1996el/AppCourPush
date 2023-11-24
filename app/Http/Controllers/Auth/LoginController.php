<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::user()->role_name === 'eleve' )
        {
            $this->redirectTo = route('profile/eleve');
            return $this->redirectTo;
        }
        if(Auth::user()->role_name === 'professeur')
        {
            $checkProfIsExperince = DB::table('experinceprof')->where('iduser', '=', Auth::user()->id)->count();
            if($checkProfIsExperince == 0)
            {
                $this->redirectTo = route('professeur/StepByStep');
                return $this->redirectTo;
            }
            else
            {
                $this->redirectTo = route('ShowProfileProf');
                return $this->redirectTo;
            }

        }
        if(Auth::user()->role_name === 'Admin')
        {
            $this->redirectTo = route('Dashboard');
            return $this->redirectTo;
        }
    }
}
