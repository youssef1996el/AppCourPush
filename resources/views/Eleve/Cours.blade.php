@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:65px;">
        <div class="card shadow " style=" width: 900px;
  margin: auto;
  padding: 20px 24px; background: #ffffff5c;" >
            <div class="card-body">
                <h3 class="mb-5" style="font-style:italic; text-align:center">Mon apprentissage</h3>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="programmes-tab" data-toggle="tab" href="#programmes">Mes Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="cours-tab" data-toggle="tab" href="#cours">Cours Déjà Pris</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!-- Tab 1: Programmes -->
                    <div id="programmes" class="tab-pane fade show active">
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-6 col-xl-6 ">

                                @if ($hasCours)
                                    @foreach ($MesCours as $item)
                                        <div class="card-sl">
                                            <div class="name-course">{{$item->name_cours}}</div>
                                            <a class="card-action" href="#"><img src="{{ $item->image}}" class="avatar" alt="" ></a>
                                            <div class="card-heading">
                                                {{$item->nom_professeur}}
                                            </div>

                                            <div class="card-text">
                                                <i class="fa fa-clock"></i> <label>{{$item->times}}</label>
                                            </div>
                                            <div class="card-text">
                                                <i class="fa fa-calendar"></i> <label>{{$item->days}}</label>
                                            </div>
                                            <div class="card-text">
                                                <i class="{{ $item->typecours == 'prive' ? 'fa fa-user' : 'fa fa-users' }}"></i><label> {{ $item->typecours }}</label>
                                            </div>
                                            <div class="card-text">
                                                <a class="link-zoom" href="#"><i class="fa fa-video-camera" aria-hidden="true"></i>  <label>Cliquer ici</label></a>
                                            </div>
                                        </div>
                                    @endforeach

                                @else
                                    <img  class="" src="{{asset('image/cours.png') }}" alt="cours" style="width:200px">
                                    <h5 class="mt-3">Rien de prévu pour le moment</h5>
                                    <p class="text-muted">Vous n'êtes actuellement inscrit dans aucun cours.</p>
                                    <p>Pour commencer, <a href="#"> resever un cours</a></p>
                                @endif


                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 ">
                                <div id="calendarProgrammes">Calendar for Programmes</div>
                            </div>

                        </div>
                    </div>
                    <!-- Tab 2: Cours Déjà Pris -->
                    <div id="cours" class="tab-pane fade">
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-6 col-xl-6 ">
                                <img  class="" src="{{asset('image/nonpris.png')}}" alt="cours" style="width:200px">
                                <h5 class="mt-3">Vous pouvez retrouver tous vos cours terminés ici.</h5>
                                <p class="text-muted">Vous n'avez pas suivi de cours... pour l'instant !</p>
                                <p>Pour commencer, <a href="#"> resever un cours</a></p>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 ">
                                <div id="calendarCours">Calendar for Programmes</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>




    </style>

{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1oFY1AJXQFAFPPFVIyIZbOT6KELr1U9zFk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha256-GLt00i6C1Wq2A7p0sH/cF4AtI5N99l8dZLCzZ9dAd2Q=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha256-pzjw8E+RpuCyTp4ARb5hj2bRiFaR9p5VRO9z1FDTNI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha256-u/nt5S9ZNqwQIg0pLQkMt2VrC0M8Qb/ZQFdAsj+nUxE=" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha256-r3kKJT5/PjR9O5JQ8i0Np8WVXuRKMbukp3WE5oD6E8=" crossorigin="anonymous"></script> --}}

    <script>
 $(document).ready(function(){
        $('.nav-tabs a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        // Initialize FullCalendar in each tab
        $('#calendarProgrammes').fullCalendar({
            // FullCalendar options for Programmes tab
            // ...
        });

        $('#calendarCours').fullCalendar({
            // FullCalendar options for Cours Déjà Pris tab
            // ...
        });
    });
    </script>

<style>
      .card-sl {
        border-radius: 8px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        width:300px;
    }

 a{
     text-decoration:none;
     cursor: pointer;
 }
 .card-sl label{
margin-left:14px;
 }
.avatar{
    width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 2px solid #3a7dc6;
  margin-left: -15px;
  margin-top: -15px;
}
    .card-action {
        width:50px;
        height:50px;
        position: relative;
        float: left;
        margin-top: -25px;
        margin-left: 20px;
        z-index: 2;
        color: #3fa5c6;
        background: #fff;
        border-radius: 100%;
        padding: 15px;
        font-size: 15px;
    }

    .card-action:hover {
        color: #fff;
        background: #3a7dc6;
        -webkit-animation: pulse 1.5s infinite;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);

    }
    .avatar:hover{
        background-color: #3a7dc6;;

    }

    .card-heading {
        font-size: 18px;
        font-weight: bold;
        background: #fff;
        padding: 10px 15px;
    }

    .card-text {
        padding: 10px 15px;
        background: #fff;
        font-size: 14px;
        color: #636262;
    }

    .card-button {
        display: flex;
        justify-content: center;
        padding: 10px 0;
        width: 100%;
        background-color: #1F487E;
        color: #fff;
        border-radius: 0 0 8px 8px;
    }

    .card-button:hover {
        text-decoration: none;
        background-color: #1D3461;
        color: #fff;

    }

.name-course {
    font-size: 40px; /* Large font size */
    font-weight: bold; /* Make the font bold */
    color: white; /* White text color */
    background-color: #3a7dc6; /* Background color */
    padding: 30px 10px 30px 10px; /* Some padding around the text */
    border-radius: 4px; /* Rounded corners */
    text-shadow: 2px 2px 4px #000000; /* Text shadow for a 3D effect */
    width: 100%; /* Fit the width to the content */
    margin: auto; /* Centering the block */
    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
  text-align:center;/* Box shadow for depth */
}
</style>
@endsection
