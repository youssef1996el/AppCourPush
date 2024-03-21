<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use DB;
use Carbon\Carbon;
use App\Notifications\StripeNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
class StripeController extends Controller
{

    public function index($Time,$NameProfesseur,$Cours,$TypeCours,$Nomber,$Montant,$id)
    {
        
        session([
            'Cours' => $Cours,
            'Time' => $Time,
            'NameProfesseur' => $NameProfesseur,
            'TypeCours' => $TypeCours,
            'Montant' => $Montant,
            'id'       => $id,
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


        $CoursProf = session('Cours');
        $Time = session('Time');
        $NameProfesseur = session('NameProfesseur');
        $TypeCours = session('TypeCours');
        $Montant = session('Montant');
        $id      = session('id');
      

        // extract id professeur
        $professeur = DB::table('users')->where('name',$NameProfesseur)->first();
        $IdProfessuer = $professeur->id;

        // extract id cours
        $Cours = DB::table('cours')->where('title',$CoursProf)->first();
        $IdCours = $Cours->id;

        // extract Day
        $DisponibleProfessuer = DB::table('disponibleprof')
        
                                        ->where('ID',$id)
                                        /* ->where('debut',$Time)
                                        ->where('idcours',$IdCours) */
                                        ->select('jour')
                                        ->first();
                                       
                                        
        $Days                 = $DisponibleProfessuer->jour; 
        $Name_Eleve = Auth::user()->name;

        // Extract Admin send notficiation
        $adminUsers = DB::table('users')->where('role_name', 'admin');
        // Extract users Send Notification
        $selectedUsers = DB::table('users')
                        ->whereIn('name', [$Name_Eleve, $NameProfesseur]);

        $combinedQuery = $adminUsers->unionAll($selectedUsers);
        $DataUsersSendNotification = $combinedQuery->get();

        // Extract Role Eleve
        $role_name = Auth::user()->role_name;


        $SaveReserve =
        [

            'nom_eleve'                 =>$Name_Eleve,
            'nom_professeur'            =>$NameProfesseur,
            'times'                     =>$Time,
            'days'                      =>$Days,
            'typecours'                 =>$TypeCours,
            'idcours'                   =>$IdCours,
            'created_at'                =>Carbon::now(),
            'updated_at'                =>Carbon::now(),
        ];

        try
        {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $Charge = Stripe\Charge::create ([
                    "amount" => intval($Montant) * 100,
                    "currency" => "EUR",
                    "source" => $request->stripeToken,
                    "description" => "This payment is testing purpose of techsolutionstuff",
            ]);

            // Check if the charge was successful
            if ($Charge->status === 'succeeded')
            {
                $Reserves = DB::table('reserves')->insert($SaveReserve);
                Session::flash('success', 'Payment successful!');
                foreach($DataUsersSendNotification as $item)
                {
                    $userModel = User::find($item->id);
                    if($item->role_name === 'eleve')
                    {
                        $textEleve     = "Une notification immédiate confirmant que la réservation du cours a été effectuée avec succès.";
                        $Condition     = "MSG";
                        Notification::send($userModel,new StripeNotification(Auth::user()->id,$textEleve,$Condition));
                    }
                    if($item->role_name === 'professeur')
                    {
                        $textProfesseur = "Un éleve ".$Name_Eleve." a réserver votre cours intitulé ".$Cours->title." pour le ".$Days." et ".$Time;
                        $Condition     = "MSG";
                        Notification::send($userModel,new StripeNotification(Auth::user()->id,$textProfesseur,$Condition));
                    }
                    if($item->role_name === 'Admin')
                    {
                        $textAdmin     = "Un élève ".$Name_Eleve." a réservé un cours dans le système pour le ".$Days." et ".$Time;
                        $Condition     = "MSG";
                        Notification::send($userModel,new StripeNotification(Auth::user()->id,$textAdmin,$Condition));
                    }
                }
                return redirect()->route('Mescours');
            }
            else
            {
                Session::flash('failed', 'Payment failed!');
                return back();
            }
        }
        catch (\Stripe\Exception\CardException $e)
        {
            Session::flash('card', "Card declined: " . $e->getMessage());
            return back();
        }
        catch (\Stripe\Exception\StripeException $e)
        {
            Session::flash('Error', "Error: " . $e->getMessage());
            return back();
        }

        //session()->forget(['Cours', 'Time', 'NameProfesseur', 'TypeCours', 'Montant']);







    }
}
