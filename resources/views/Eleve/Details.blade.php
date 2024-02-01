@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/StyleDetails.css')}}">
<script src="{{asset('js/ScriptShowProfile.js')}}"></script>
<div class="container">
    <div class="row mt-5">
        <div class="card card-reserve1 text-left mt-5 mb-5" style="">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
                <div class="titreImage">
                <h4 class="card-title ">Cours "G/P" de "Nom"</h4>
                <img src="{{asset('image/default-avatar.png') }}" class="avatar" alt="" >
                </div>
                <p class="card-text-label mt-5"> 
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-xl-3 ">
                        <label> <i class="fa fa-book fa-xl" aria-hidden="true"></i>  cours1 </label>        
                        </div>
                        <div class="col-sm-12 col-md-3 col-xl-3">
                        <label> <i class="fa fa-clock fa-xl" aria-hidden="true"></i>  Dimanche, 21 janvier 2024 <span> 19:00 - 20:00 (GMT+1)</span> </label>        
                        </div>
                        <div class="col-sm-12 col-md-3 col-xl-3 ">
                        <label> <i class="fa fa-users  fa-xl" aria-hidden="true"></i>  2 Participants</label> 
                        </div>
                        <div class="col-sm-12 col-md-3 col-xl-3 ">
                        <label> <i class="fa fa-video-camera fa-xl" aria-hidden="true"></i>  Hébergé sur Zoom</label> 
                        </div>
                    </div>
                     </p>
            
                <a name="" id="" class="btn btn-primary btn-reserver" href="#" role="button" style="border-radius:6px">Reserver</a>
            </div>
        </div>
        <div class="card card-reserve2 text-left mt-3 mb-5" style="">
            <div class="card-body">
                <h4 class="card-title ">Réservation de cours</h4>
                <p class="card-text-label mt-5"> 
                <div class="row mb-3">
                        <div class="col-sm-12 col-md-4 col-xl-4 ">
                            <label for="typeCours"  style="display:block">Sélectionner le type de cours :</label>
                            <select id="typeCours">
                                <option value="cours">Cours</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3 col-xl-3 text-center">
                            <label for="" style="margin-left: 5px; display:block">Groupe ou Privé: </label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                                    <input type="radio" class="btn-check typeCours" value="groupe" name="btnradio" id="group" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary" for="group"><i class="fas fa-users "></i></label>

                                    <input type="radio" class="btn-check typeCours" value="prive" name="btnradio" id="private" autocomplete="off">
                                    <label class="btn btn-outline-primary " for="private" style="width:45px ; "><i class="fas fa-user "></i></label>
                                </div>
                        </div>
                     
                        <div class="col-sm-12 col-md-3 col-xl-3 ">
                            <label for="dateCours"  style=" display:block">Sélectionner une date :</label>
                            <input type="date" id="dateCours">
                        </div>
                        <div class="col-sm-12 col-md-2 col-xl-2 mt-4">
                            <a name="" id="" class="btn btn-primary btn-reserver" href="#" role="button" style="border-radius:6px">Reserver</a>
                        </div>
                </div>
            </div>
        </div>
        <div class="row row-card " style=" display:flex; margin:auto ; padding-bottom:36px">
        <h3 class="mt-5 mb-4">A propos "Nom"</h3>
            <div id="divProfile" class="col-12">
                <div class="card text-center">
                    <img class=" prof-image mt-5" src="{{asset('image/default-avatar.png') }}" alt="Profile image"  srcset="" >
                    <h2 class="name">Ouardi douha</h2>
                    <h4 >Prof d'arabe</h4>
                    <h4 ><i class="fa fa-briefcase" aria-hidden="true" ></i> <span>4 </span> ans d'expérience</h4>
                    <div class="card-body" >
                        <p class="card-text">description de description</p>
                    </div>
                </div>
            </div>
            <div id="divDispo" class="col-8 mt-5">
                <div class="card cardDispo text-left">
                    <h4 class="title-card"  style="  border-bottom: 1px solid #c0c1c1;">Disponibilite de professeur </h4>
                    <div class="card-body ">
                        <div class="ClassDisponible">
                        {{-- @foreach ($disponibilityByDay as $key => $data)
                            <div class="ContentDisponible">
                                <div class="Days">{{$key}}</div>
                                    <div class="ClassCalculHeight" >
                                        <div class="ClassTimeDisponible"  style="@if($data) color:#0c3c74;background:#00f8ff3b; @else '' @endif">
                                            <p>
                                                @if($data)
                                                    <i class="fa-solid fa-clock" style="color: #0078ff"></i>
                                                @endif
                                                {{$data ? $data->debut : "Vide"}}
                                            </p>
                                            <p>
                                                @if($data)
                                                    <i class="fa-solid fa-clock" style="color: #0078ff"></i>
                                                    @endif
                                                {{$data ? $data->fin : 'Vide'}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach --}} {{-- mate9isich had Code li dayr lih comment --}}
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
            <div id="divCours" class="col-4 mt-5">
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
            
            <div id="divExperience" class="col-6 mt-5">
                <div class="card cardExperience" >
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
            <div id="divFormation" class="col-6 mt-5">
                <div class="card cardFormation" >
                    <h4 class="title-card "  style="  border-bottom: 1px solid #c0c1c1;"> Formation</h4>
                        <div class="card-body timeline" >
                            <ul class="list-unstyled " id="ListFormation">
                                @foreach ($FormationProf as $key => $item)
                                    <div class="item" data-index="{{$key}}" style="{{$key > 0 ? 'display:none;' : ''}}" {{-- {{ $key >= 1 ? 'hidden' : '' }}" --}}>
                                        <li class="timeline-item" >
                                            <div class="timeline-element">
                                                <span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->annee)->format('m/Y') }}</span>
                                                <span class="pays">{{ $item->pays }}</span>
                                                <div class="timeline-content">
                                                    <h3>{{ $item->diplome }}</h3>
                                                    <p>{{ $item->specialise }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    <div class="show"  >
                        <button id="showMoreFormation" class="btn  showMore">Voir plus</button>
                        <button id="showFirstItemFormation" class="btn showLess " style="display: none">Voir moins</button>
                    </div>
                </div>
            </div>

           
        </div>
 
                    
    </div>
</div>

@endsection