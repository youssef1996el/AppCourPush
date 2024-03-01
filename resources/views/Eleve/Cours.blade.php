
@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleCourse.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('css/evo-calendar.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('css/evo-calendar.midnight-blue.css')}}"/>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<script src="{{asset('js/evo-calendar.js')}}"></script>

<script src="{{asset('js/CourseScript.js')}}"></script>

<div class="container" >
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
                <div id="programmes" class="tab-pane fade show active mt-4 ">
                <div class="card-container">
                    @if ($hasCours)
                        @foreach ($MesCours as $item)
                            <div class="card-sl " style="max-width:280px">
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
                            
                        @endforeach
                        @foreach ($MesCours as $item)
                            <div class="card-sl " style="max-width:280px">
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
                            
                        @endforeach
                        @foreach ($MesCours as $item)
                            <div class="card-sl " style="max-width:280px">
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
                            
                        @endforeach
                        @foreach ($MesCours as $item)
                            <div class="card-sl " style="max-width:280px">
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
                            
                        @endforeach
                        @foreach ($MesCours as $item)
                            <div class="card-sl " style="max-width:280px">
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
                            
                        @endforeach

                        @else
                        <div class="text-center">
                            <img  class="" src="{{asset('image/cours.png') }}" alt="cours" style="width:200px">
                            <h5 class="mt-3">Rien de prévu pour le moment</h5>
                            <p class="text-muted">Vous n'êtes actuellement inscrit dans aucun cours.</p>
                            <p>Pour commencer, <a href="#"> resever un cours</a></p>
                        </div>
                        @endif
                </div>
</div>
                <div id="cours" class="tab-pane fade text-center">
                    <div class="courspris mt-4  ">
                        <img  class="" src="{{asset('image/nonpris.png')}}" alt="cours" style="width:200px">
                        <h5 class="mt-3">Vous pouvez retrouver tous vos cours terminés ici.</h5>
                        <p class="text-muted">Vous n'avez pas suivi de cours... pour l'instant !</p>
                        <p>Pour commencer, <a href="#"> resever un cours</a></p>
                    </div>
                </div>
            </div>




        </div>

    </div>
</div>
<style>
    .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}




}
</style>
    <script>
        var url = "{{url('CalanderCours')}}";
    </script>
    <style>

    </style>




@endsection
