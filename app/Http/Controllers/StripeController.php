<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{

    public function index($Time,$NameProfesseur,$Cours,$TypeCours,$Nomber,$Montant)
    {
        session([
            'Cours' => $Cours,
            'Time' => $Time,
            'NameProfesseur' => $NameProfesseur,
            'TypeCours' => $TypeCours,
            'Montant' => $Montant,
        ]);

        return view('Stripe.index')
        ->with('Cours',$Cours)
        ->with('Time',$Time)
        ->with('NameProfesseur',$NameProfesseur)
        ->with('TypeCours',$TypeCours)
        ->with('Montant',$Montant);
    }

    public function StripePost(Request $request)
    {
        $Cours = session('Cours');
        $Time = session('Time');
        $NameProfesseur = session('NameProfesseur');
        $TypeCours = session('TypeCours');
        $Montant = session('Montant');

        // Optionally, you can remove the values from the session after retrieving them
        //session()->forget(['Cours', 'Time', 'NameProfesseur', 'TypeCours', 'Montant']);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 1 * 100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of techsolutionstuff",
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
