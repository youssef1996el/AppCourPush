@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleInfoEleve.css')}}">
<script src="{{asset('js/ScriptInfosEleve.js')}}"></script> 
<div class="container" >
    <div class="card shadow " style="margin: auto;padding: 20px 24px; background: #ffffff5c;" >
        <div class="card-body">
            <h5 class="mb-5" style="font-style:italic; text-align:center">Votre réservation du cours a été confirmée avec succès.</h5>
            
        </div>
    </div>


@endsection
