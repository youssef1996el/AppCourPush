
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/StyleEleve.css')}}">



<div class="container ">
    <div class="WelcomeEleve">
        <h1>Bienvenue , Nom !</h1>
    </div>
    <div class="card text-left" id="bookCard">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <i class="fa-solid fa-calendar-days fa-2xl"></i>
                </div>
                <div class="col-10">  <h4 class="card-title">Réservez votre premier cours</h4>
                    <p class="card-text" style="color:gray">Consultez la liste des professeurs et sélectionnez une classe qui correspond à vos besoins pour commencer.
                        Vous avez également la possibilité de rechercher parmi les enseignants disponibles aux horaires qui vous conviennent.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="bookClass" style="display: none">
    <div class="searchSpace mt-5"  >
        <form action="/submit" method="post" class="form-inline">

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="time">l'heure:</label>
                <input type="time" class="form-control" id="time" name="time">
            </div>

            <div class="form-group">

                <label for="btnGroup" style="display:block">Groupe ou Privé</label>

                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                    <input type="radio" class="btn-check" name="btnradio" id="group" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="group"><i class="fas fa-users "></i></label>

                    <input type="radio" class="btn-check" name="btnradio" id="private" autocomplete="off">
                    <label class="btn btn-outline-primary " for="private" style="width:45px ; "><i class="fas fa-user "></i></label>
                </div>
            </div>



            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Reinitialiser</button>
            </div>
        </form>
    </div>
    <div class="card text-left" style="" >

        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <img class="card-img-top" style=" width: 45%;border-radius: 50%;border: 3px solid aliceblue; margin-left: 84px;" src="{{asset('image/prof.jpg')}}" alt="">
                </div>
                <div class="col-7">  <h4 class="card-title">Nom du professeur</h4>
                    <p class="card-text" style="color:gray">Nombre d'exp</p>
                    <p class="card-text" style="color:gray">description</p>
                </div>
                <div class="col-3 " style="float:right">
                    <button type="submit" class="btn btn-primary" >Reserver</button>
                    <button type="submit" class="btn btn-secondary" >Details</button>
                </div>


            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function () {
        $('#bookCard').on('click',function()
        {
            $('#bookClass').css('display', 'block');
        });
    });
</script>


@endsection
