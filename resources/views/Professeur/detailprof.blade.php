@extends('layouts.app')
@section('content')
<link  rel="stylesheet" href="{{asset('css/StyleDetailsProf.css')}}">
<script src="{{asset('js/ScriptShowProfile.js')}}"></script>

<div class="container containerDetails">
    <div class="card text-left mt-3">
        <div class="card-body">
            <h4 class="card-title">Réservation de cours</h4>
            <p class="card-text">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-xl-4  mb-3">
                        <label for="cours" >Sélectionner un cours :</label>
                        <select id="cours" class="form-select">
                                @foreach ($CourProf as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3 mb-3 ">
                        <label for="" style="display:block">Groupe/Parliculier: </label>
                        <div class="btn-group stylebtngrp" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                            <input type="radio" class="btn-check typeCours" value="groupe" name="btnradio" id="group" autocomplete="off" checked    >
                            <label class="btn btn-outline-primary" for="group"><i class="fas fa-users "></i></label>

                            <input type="radio" class="btn-check typeCours" value="prive" name="btnradio" id="private" autocomplete="off" >
                            <label class="btn btn-outline-primary " for="private"><i class="fas fa-user "></i></label>
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

    <div class="card text-left mt-3">
          <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
            <h4 class="card-title">A propos de  {{$InformationProfesseur->name}}  </h4>
            <p class="card-text">
                <div class="card cardProfile text-center">
                <img class=" prof-image " src="{{ $imageProfesseur->image == '' ? asset('image/default-avatar.png') : $imageProfesseur->image}}" alt="Profile image"  srcset="" >
                    <div class="card-body">
                        <h2 class="name">  {{$InformationProfesseur->name}} </h2>
                        <h4 >Prof d'arabe</h4>
                        <h4 ><i class="fa fa-briefcase" aria-hidden="true" ></i> <span>{{$CalculExperince[0]->experince}}</span> ans d'expérience</h4>
                    <p class="card-text" style="font-size: 18px;">{{$InformationProfesseur->description}}</p>
                    </div>
                </div>
                <div class="row">
                    <div id="divDispo" class="col-sm-12 col-md-8 col-xl-8  mt-5">
                        <div class="card cardDispo text-left">
                            <h4 class="title-card"  style="  border-bottom: 1px solid #c0c1c1;">Disponibilite de professeur </h4>
                            <div class="card-body ">
                                <div class="ClassDisponible">
                                    @foreach ($disponibilityByDay as $key => $data)
                                        <div class="ContentDisponible "><!-- {{ empty($data) ? 'ContentNonDisponible' : '' }} -->
                                            <div class="Days">{{$key}}</div>
                                                <div class="ClassCalculHeight padContent">
                                                    @foreach($data as $item)
                                                        <div class="ClassTimeDisponible" style="color:#0c3c74;background:{{$item->typecours === 'groupe' ? '#ffc302' : '#22bb33'}}; ">
                                                            <p class="text-white">
                                                                <i class="fa-solid fa-clock" style="color: white"></i>
                                                                {{$item->debut}} 
                                                            </p>
                                                            <p class="text-white" style="font-style:italic; font-weight:bold; font-size:16px">
                                                                {{$item->title}} 
                                                            </p>
                                                            <p class="text-white">
                                                                <i class="fa-solid fa-clock" style="color: white"></i>
                                                                {{$item->fin}}
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                    @if(empty($data))
                                                        <div class="ClassTimeDisponible " style=";background: #00f8ff3b;">
                                                
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                    @endforeach

                                </div>
                                

                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-center" style="gap:12px"><div class="gr" style="width:12px; height:12px;background: #ffc302;border-radius: 50%;"></div>Cours en groupe</div>
                                <div class="d-flex align-items-center" style="gap:12px"><div class="pr" style="width:12px; height:12px; background: #22bb33;border-radius: 50%;"></div>Cours particulier</div>
                                <div class="d-flex align-items-center" style="gap:12px"><div class="vide" style="width:12px; height:12px;  background-image: linear-gradient(127deg,#fff 35.71%,#e3e3e3 0,#e3e3e3 50%,#fff 0,#fff 85.71%,#e3e3e3 0,#e3e3e3) !important;background-size: 8.76px 11.63px !important;border-radius: 50%"></div>Indisponible</div>
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
            <div class="card-footer d-flex justify-content-center align-items-center">
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
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sendMessage(email) {
        // Use the nom parameter as needed
        alert('Sending message to: ' + @json($InformationProfesseur->email));
    }

    function showPhoneNumber(phoneNumber) {
        // Use the phoneNumber parameter as needed
        alert('Numéro de téléphone : ' + @json($InformationProfesseur->telephone));
    }
    $(document).ready(function () {
        $('.btn-reserver2').on('click', function()
        {
            var dateString = $('#dateCours').val();
            var date = new Date(dateString);

            // English day names
            var englishDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            // French day names
            var frenchDays = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

            // Get the day index and use it to retrieve the corresponding French day name
            var dayIndex = date.getDay();
            var dayName = frenchDays[dayIndex];



            var typecours;
            $('.typeCours:checked').each(function() {
                typecours = $(this).val();
            });

            if($('#dateCours').val() == '')
            {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please Selected Date Cours!",

                });
                return false;
            }

            $.ajax({
                type: "get",
                url: "{{url('checkDispoProf')}}",
                data:
                {
                    cours       : $('#cours').val(),
                    typecours   : typecours,
                    dayName     : dayName,
                    iduser      : @json($InformationProfesseur->id),
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {

                        var reservationUrl = "/Reservation/" + encodeURIComponent(response.Data[0].debut) + "/" + encodeURIComponent(response.Data[0].name) + "/" + encodeURIComponent(response.Data[0].title) + "/" + encodeURIComponent(response.Data[0].typecours);


                        window.location.href = reservationUrl;
                    }
                    else if(response.status == 400)
                    {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Erreur de réservation : Votre cours n'est pas inclus dans la réservation. Veuillez vérifier les détails  !",

                        });
                    }
                }
            });

        });
    });
</script>
@endsection
