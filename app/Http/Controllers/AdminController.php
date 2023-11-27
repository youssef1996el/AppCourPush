<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function professeurs()
    {
        $listProfesseur = User::where('role_name','professeur')->get();

        return view('Dashboard.professeur')->with('listProfesseur',$listProfesseur);
    }

    public function eleves()
    {
        $listeleve = User::where('role_name','eleve')->get();
        return view('Dashboard.eleve')->with('listeleve',$listeleve);
    }
}
