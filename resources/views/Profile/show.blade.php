@extends('Dashboard.templateAdmin')
@section('navsidebar')

<link rel="stylesheet" href="{{asset('css/StyleProfileProf.css')}}">
<script src="{{asset('js/ScriptShowProfile.js')}}"></script>

<div class="container mt-4">
    <div class="card text-center">
        <img class="imageprof" src="{{asset($DataProf[0]->image)}}" alt="Profile image"  srcset="" >
        <h2 class="name">{{$DataProf[0]->name }}</h2>
        <h4 >{{$DataProf[0]->title}}</h4>
        <h4 ><i class="fa fa-briefcase" aria-hidden="true" ></i> <span>{{$CalculExperince}}</span> ans d'expérience</h4>
        <div class="card-body" >
            <p class="card-text">{{$DataProf[0]->description}}</p>
        </div>
        <div class="card-footer">
            <p style="display:inline;">contactez-moi via</p>
            <button type="button" class="btn btn-link" data-mdb-ripple-color="dark" onclick="showPhoneNumber('{{ $DataProf[0]->telephone }}')" >
                <i class="fa-solid fa-phone"></i>
            </button>
            ou
            <button type="button" class="btn btn-link" data-mdb-ripple-color="dark" onclick="sendMessage('{{ $DataProf[0]->email }}')" >
                <i class="fa-regular fa-envelope"></i>
            </button>
        </div>
    </div>

    
    <div class="row mt-4">   
        <div class="col-sm-12 col-md-6 col-xl-6 ">
            <div class="card cardExperience mb-3" >
                <h4 class="title-card "  style="  border-bottom: 1px solid #c0c1c1;"> Experience</h4>
                <div class="timeline">
                    <ul id="ListExperince">
                        @foreach ($ExperinceProf as $key => $item)
                            <div class="item" data-index="{{ $key }}" style="{{ $key > 0 ? 'display:none;' : '' }}">
                                <li>
                                    <span>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->du)->format('m/Y') }}
                                        <span style="padding-left: 4px;padding-right: 4px;">-</span>
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->au)->format('m/Y') }}
                                    </span>
                                    <div class="timeline-content">
                                        <h3>{{ $item->poste}}</h3>
                                        <p>{{ $item->entreprise}} /{{ $item->pays}}</p>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
                <div class="show">
                    <button id="showMoreExperience" class="btn showMore">Voir plus</button>
                    <button id="showFirstItemExperience" class="btn showLess " style="display: none">Voir moins</button>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-6 ">
            <div class="card cardFormation mb-5" >
                <h4 class="title-card "  style="  border-bottom: 1px solid #c0c1c1;"> Formation</h4>
                <div class="card-body timeline" >
                    <ul class="list-unstyled " id="ListFormation">
                        @foreach ($FormationProf as $key => $item)
                            <div class="item" data-index="{{$key}}" style="{{$key > 0 ? 'display:none;' : ''}}">
                                <li class="timeline-item" >
                                    <div class="timeline-element">
                                        <a href="#">{{ $item->diplome }} </a>
                                        <span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->annee)->format('m/Y') }}</span>
                                        <span class="pays">{{ $item->pays }}</span>
                                        <span class="circle"></span>
                                        <div class="timeline-content">
                                            <p>{{ $item->specialise }}</p>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
                <div class="show"  >
                    <button id="showMoreFormation" class="btn showMore">Voir plus</button>
                    <button id="showFirstItemFormation" class="btn showLess " style="display: none">Voir moins</button>
                </div>
            </div>
        </div> 
    </div>
  
  

    
    <div class="row ">
        <div class="col-sm-12 col-md-8 col-xl-8 " id="divDispo">
            <div class="card cardDispo text-left">
                <h4 class="title-card"  style="  border-bottom: 1px solid #c0c1c1;">Disponibilite de professeur </h4>
                <div class="card-body ">
                    <div class="ClassDisponible">
                        @foreach ($disponibilityByDay as $key => $data)
                            <div class="ContentDisponible" >
                                <div class="Days">{{$key}}</div>
                                    <div class="ClassCalculHeight">
                                        @foreach($data as $item)
                                            <div class="ClassTimeDisponible" style="color:#0c3c74;background:#00f8ff3b;">
                                                <p>
                                                    <i class="fa-solid fa-clock" style="color: #0078ff"></i>
                                                    {{$item->debut}}
                                                </p>
                                                <p>
                                                    <i class="fa-solid fa-clock" style="color: #0078ff"></i>
                                                    {{$item->fin}}
                                                </p>
                                            </div>
                                        @endforeach
                                        @if(empty($data))
                                            <div class="ClassTimeDisponible" style="color: #0c3c74;background: #00f8ff3b;">
                                                <p>Vide</p>
                                                <p>Vide</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                        @endforeach
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 col-xl-4 ">
            <div class="card cardCours">
                <h4 class="title-card"  style="  border-bottom: 1px solid #c0c1c1;">Les cours </h4>
                <div class="card-body">
                    <div class="divScrollCours" >
                        @foreach ($CourProf as $item)
                            <p class="card-cours">{{$item->title}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 

<script>
    function sendMessage(email) {
        // Use the nom parameter as needed
        alert('Sending message to: ' + email);
    }

    function showPhoneNumber(phoneNumber) {
        // Use the phoneNumber parameter as needed
        alert('Numéro de téléphone : ' + phoneNumber);
    }
</script>
<style>
    .imageprof{
        width: 150px;
  height: 150px;
  border-radius: 50%;
  border: 2px solid black;
  margin: 16px auto;
    }
</style>

@endsection
