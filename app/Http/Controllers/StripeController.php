<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function index($Time,$NameProfesseur,$Cours,$TypeCours,$Nomber,$Montant)
    {

        return view('Stripe.index')
        ->with('Cours',$Cours)
        ->with('Time',$Time)
        ->with('NameProfesseur',$NameProfesseur)
        ->with('TypeCours',$TypeCours)
        ->with('Montant',$Montant);
    }
}
