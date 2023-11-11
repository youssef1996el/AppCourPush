
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/StyleEleve.css')}}">

<body>
<div class="container ">
    <h1>Bienvenue , Nom !</h1>

<div class="card text-left">

<div class="card-body">
    <div class="row">
        <div class="col-2"><i class="fa-solid fa-calendar-days fa-2xl"></i></div>
        <div class="col-10">  <h4 class="card-title">Réservez votre premier cours</h4>
    <p class="card-text" style="color:gray">Consultez la liste des professeurs et sélectionnez une classe qui correspond à vos besoins pour commencer.
        Vous avez également la possibilité de rechercher parmi les enseignants disponibles aux horaires qui vous conviennent.
    </p></div>

  
  </div>
  </div>
</div>

</div>
</body>
@endsection