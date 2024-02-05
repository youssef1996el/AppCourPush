@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/StyleCourse.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('css/evo-calendar.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/evo-calendar.midnight-blue.css')}}"/>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="{{asset('js/evo-calendar.js')}}"></script>

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
                <div id="programmes" class="tab-pane fade show active">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-xl-8 p-2">
                            <div class="row">
                                @if ($hasCours)
                                    @foreach ($MesCours as $item)
                                        <div class="col-sm-12 col-md-4 col-xl-4 mt-4">
                                            <div class="card-sl">
                                                <div class="name-course">{{$item->name_cours}}</div>
                                                <a class="card-action" href="#"><img src="{{ $item->image}}" class="avatar" alt="" ></a>
                                                <div class="card-heading" style="white-space: normal">
                                                    {{$item->nom_professeur}}
                                                </div>

                                                <div class="card-text">
                                                    <i class="fa fa-clock"></i> <label>{{$item->times}}</label>
                                                </div>
                                                <div class="card-text d-flex">
                                                    <i class="fa fa-calendar"></i> <label >{{$item->days}}<span style="display:block">  {{$item->times}} - {{$item->fin}} ({{$item->timezone}})</span></label>
                                                </div>
                                                <div class="card-text">
                                                    <i class="{{ $item->typecours == 'prive' ? 'fa fa-user' : 'fa fa-users' }}"></i><label> {{ $item->typecours }}</label>
                                                </div>
                                                <div class="card-text">
                                                    <a class="link-zoom" href="#"><i class="fa fa-video-camera" aria-hidden="true"></i>  <label>Cliquer ici</label></a>
                                                </div>
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
                        <div class="col-sm-12 col-md-4 col-xl-4 p-2">
                            <div id="calendarProgrammes" style="text-align: center">Calendar for Programmes</div>
                            <div class="card bg-primary">
                                <div class="card-body">
                                    <img style="cursor: pointer;transform: scaleX(-1)" src="{{asset('image/Calander.svg')}}" width="105%" alt="" srcset="" data-bs-toggle="modal" data-bs-target="#ModalCalander">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
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
                            {{-- <div id="calendar"></div> --}}
                        </div>

                    </div>
                </div>
            </div>




        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="ModalCalander" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                    <!-- Modal content goes here -->
                        <div id="calendar"></div>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- Additional buttons or actions can be added here -->
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        var url = "{{url('CalanderCours')}}";
    </script>
    <style>

    </style>




@endsection
