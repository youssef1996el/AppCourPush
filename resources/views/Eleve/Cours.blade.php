@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/StyleCourse.css')}}">
<script src="{{asset('js/CourseScript.js')}}"></script>

<div class="container" style="margin-top:65px;">
        <div class="card shadow bg-light card-apprentissage" >
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
                            <div class="col-sm-12 col-md-8 col-xl-8 ">
                                <div class="d-flex" style="gap: 20px;">
                        
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
                                            <div class="card-text d-flex">
                                                <i class="fa fa-calendar"></i> <label >{{$item->days}},1 février 2024<span style="display:block">  19:00 - 20:00 (GMT+1)</span></label>
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

                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-4 ">
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


@endsection
