@extends('Dashboard.templateAdmin')
@section('navsidebar')
    <link  rel="stylesheet" href="{{asset('css/StyleDetails.css')}}">
 <script src="{{asset('js/ScriptShowProfile.js')}}"></script>

<div class="container">
    <div class="card text-left RCourse">
        <div class="titreImage">
            <h4 class="card-title " style="text-transform:initial"> Cours en {{$TypeCours}} de {{$NameProfesseur}}</h4>
            <img src="{{ $imageProfesseur->image == '' ? asset('image/default-avatar.png') : $imageProfesseur->image}}" class="picture-src imagep" id="wizardPicturePreview" title="" width="50"/>

        </div>
        <div class="card-body">
        <p class="card-text">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-xl-3 mb-3">
                    <label>
                        <i class="fa fa-book fa-xl" id="iconColor" aria-hidden="true"></i>
                        {{$Cours}}
                    </label>
                </div>
                <div class="col-sm-12 col-md-3 col-xl-3 mb-3">
                    <label>
                        <i class="fa fa-clock fa-xl" id="iconColor" aria-hidden="true"></i>
                        {{$DateSelected}}
                        <span style="font-weight:bolder"> {{$DebutCours}} - {{$FinCours}} </span> {{($TimeZone)}}
                    </label>
                </div>
                <div class="col-sm-12 col-md-3 col-xl-3 mb-3">
                    <label>
                        <i class="fa fa-users  fa-xl" id="iconColor" aria-hidden="true"></i>
                        {{$nomberReserveThisCours}} Participants
                    </label>
                </div>
                <div class="col-sm-12 col-md-3 col-xl-3 mb-3">
                    <label>
                        <i class="fa fa-video-camera fa-xl" id="iconColor" aria-hidden="true"></i>
                        Hébergé sur Meet
                    </label>
                </div>
                
            </div>
        </p>
        <a name="" id="" class="btn btn-primary btn-reserver1" href="#" role="button" style="border-radius:0px">Reserver</a>
      </div>
    </div>
    <!-- 
    <div class="row ">
        <div class="card card-reserve1 text-left mt-5 mb-5" style="">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
                <div class="titreImage">
                <h4 class="card-title ">{{$Cours}} "{{$TypeCours}}" de "{{$NameProfesseur}}"</h4>

                <img src="{{ $imageProfesseur->image == '' ? asset('image/default-avatar.png') : $imageProfesseur->image}}" class="picture-src" id="wizardPicturePreview" title="" width="50"/>
                </div>
                <p class="card-text-label mt-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-xl-3 p-2">
                            <label>
                                <i class="fa fa-book fa-xl" aria-hidden="true"></i>
                                {{$Cours}}
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-3 col-xl-3 p-2">
                            <label>
                                <i class="fa fa-clock fa-xl" aria-hidden="true"></i>
                                {{$DateSelected}}
                                <span> {{$DebutCours}} - {{$FinCours}} {{($TimeZone)}}</span>
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-3 col-xl-3  p-2">
                            <label>
                                <i class="fa fa-users  fa-xl" aria-hidden="true"></i>
                                {{$nomberReserveThisCours}} Participants
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-3 col-xl-3  p-2">
                            <label>
                                <i class="fa fa-video-camera fa-xl" aria-hidden="true"></i>
                                Hébergé sur Zoom
                            </label>
                        </div>
                    </div>
                </p>
                <a name="" id="" class="btn btn-primary btn-reserver" href="#" role="button" style="border-radius:6px">Reserver</a>
            </div>
        </div> -->
        <div class="card text-left mt-3">
          <div class="card-body">
            <h4 class="card-title">Réservation de cours</h4>
            <p class="card-text">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-xl-4  mb-3">
                        <label for="cours" >Sélectionner un cours :</label>
                        <select id="cours" class="form-select">
                            <option value="cours">....</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3 mb-3 ">
                        <label for="" style="display:block">Groupe/Parliculier: </label>
                        <div class="btn-group stylebtngrp" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                            <input type="radio" class="btn-check typeCours" value="groupe" name="btnradio" id="group" autocomplete="off" {{$TypeCours == "groupe" ? 'checked' : ''}} >
                            <label class="btn btn-outline-primary" for="group"><i class="fas fa-users "></i></label>

                            <input type="radio" class="btn-check typeCours" value="prive" name="btnradio" id="private" autocomplete="off" {{$TypeCours == "prive" ? 'checked' : ''}} >
                            <label class="btn btn-outline-primary " for="private" style="width:45px ; border-radius:0px"><i class="fas fa-user "></i></label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-xl-4  mb-3 ">
                        <label for="dateCours"  style=" display:block">Sélectionner une date :</label>
                        <input type="date" class="form-control" id="dateCours" >
 
                    </div>
                    <div class="col-sm-12 col-md-1 col-xl-1  mb-3">
                        <a name="" id="" class="btn btn-primary btn-reserver2" href="#" role="button" style="border-radius:0px"><i class="fas fa-check"></i></a>

                    </div>

                    
                </div>
            </p>
          </div>
        </div>
        <!--<div class="card card-reserve2 text-left mt-3 mb-5" style="">
            <div class="card-body">
                <h4 class="card-title ">Réservation de cours</h4>
                <p class="card-text-label mt-5">
                <div class="row mb-3">
                        <div class="col-sm-12 col-md-4 col-xl-4 ">
                            <label for="typeCours"  style="display:block">Sélectionner un cours :</label>
                            <select id="typeCours">
                                <option value="cours">Cours</option>
                            </select>
                        </div> 
                        <div class="col-sm-12 col-md-3 col-xl-3 " id="responsiveDiv">
                            <label for="" style="margin-left: 5px; display:block">Groupe ou Privé: </label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                                    <input type="radio" class="btn-check typeCours" value="groupe" name="btnradio" id="group" autocomplete="off" {{$TypeCours == "groupe" ? 'checked' : ''}} >
                                    <label class="btn btn-outline-primary" for="group"><i class="fas fa-users "></i></label>

                                    <input type="radio" class="btn-check typeCours" value="prive" name="btnradio" id="private" autocomplete="off" {{$TypeCours == "prive" ? 'checked' : ''}} >
                                    <label class="btn btn-outline-primary " for="private" style="width:45px ; "><i class="fas fa-user "></i></label>
                                </div>
                        </div> 

                        <div class="col-sm-12 col-md-3 col-xl-3 ">
                            <label for="dateCours"  style=" display:block">Sélectionner une date :</label>
                            <input type="date" id="dateCours">
                        </div>
                        <div class="col-sm-12 col-md-2 col-xl-2 mt-4">
                            <a name="" id="" class="btn btn-primary btn-reserver" href="#" role="button" style="border-radius:0px">Reserver</a>
                        </div>
                </div>
            </div>
        </div> -->
        <div class="card text-left mt-3">
          <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
            <h4 class="card-title">A propos de {{$NameProfesseur}}</h4>
            <p class="card-text">
                <div class="card cardProfile text-center">
                <img class=" prof-image " src="{{ $imageProfesseur->image == '' ? asset('image/default-avatar.png') : $imageProfesseur->image}}" alt="Profile image"  srcset="" >
                    <div class="card-body">
                        <h2 class="name">{{$NameProfesseur}}</h2>
                        <h4 >Prof d'arabe</h4>
                        <h4 ><i class="fa fa-briefcase" aria-hidden="true" ></i> <span>{{$CalculExperince[0]->experince}}</span> ans d'expérience</h4>
                    <p class="card-text">{{$InformationProfesseur->description}}</p>
                    </div>
                </div> 
                <div class="row">
                    <div id="divDispo" class="col-sm-12 col-md-8 col-xl-8  mt-5">
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
                    <div id="divCours" class="col-sm-12 col-md-4 col-xl-4 mt-5">
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
                    <div id="divExperience" class="col-sm-12 col-md-6 col-xl-6 mt-5">
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

                    @if (count($FormationProf) > 0)
                        <div id="divFormation" class="col-sm-12 col-md-6 col-xl-6  mt-5">
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
                    @endif
                </div> 
            </p>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <p style="display: contents;">contactez-moi via</p>
                <button type="button" class="btn btn-link" data-mdb-ripple-color="dark" onclick="showPhoneNumber()" >
                    <i class="fa-solid fa-phone"></i>
                </button>
                ou
                <button type="button" class="btn btn-link" data-mdb-ripple-color="dark" onclick="sendMessage()" >
                    <i class="fa-regular fa-envelope"></i>
                </button>
            </div>
        </div>
</div>
        <!-- <div class="row row-card " style=" display:flex; margin:auto ; padding-bottom:36px">
        <h3 class="mt-5 mb-4">A propos {{$InformationProfesseur->title}}</h3>
            <div id="divProfile" class="col-12">
                <div class="card text-center">
                    <img class=" prof-image mt-5" src="{{ $imageProfesseur->image == '' ? asset('image/default-avatar.png') : $imageProfesseur->image}}" alt="Profile image"  srcset="" >
                    <h2 class="name">{{$NameProfesseur}}</h2>
                    <h4 >Prof d'arabe</h4>
                    <h4 ><i class="fa fa-briefcase" aria-hidden="true" ></i> <span>{{$CalculExperince[0]->experince}}</span> ans d'expérience</h4>
                    <div class="card-body" >
                        <p class="card-text">{{$InformationProfesseur->description}}</p>
                    </div>
                </div>
            </div> 
            <div id="divDispo" class="col-sm-12 col-md-8 col-xl-8  mt-5">
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
            <div id="divCours" class="col-sm-12 col-md-4 col-xl-4 mt-5">
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

            <div id="divExperience" class="col-sm-12 col-md-6 col-xl-6 mt-5">
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
            @if (count($FormationProf) > 0)
                <div id="divFormation" class="col-sm-12 col-md-6 col-xl-6  mt-5">
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
            @endif
        </div>
    </div> 
</div>-->
<style>
    

</style>
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
@endsection
