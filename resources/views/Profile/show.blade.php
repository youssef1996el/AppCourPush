@extends('Professeur.Sidebar')
@section('navsidebarProf')

<link rel="stylesheet" href="{{asset('css/StyleProfileProf.css')}}">
<script src="{{asset('js/ScriptShowProfile.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js"></script>

<div class="container mt-4">
    <div class="row ">
        <div id="divProfile" class="col-5">
            <div class="card text-center">
              <img class="card-img-top" src="{{asset($DataProf[0]->image)}}" alt="Profile image"  srcset="" style="border: 2px solid white;">
              <h2 class="name">{{$DataProf[0]->nom}}</h2>
              <h4 >Prof d'arabe</h4>
              <h4 ><i class="fa fa-briefcase" aria-hidden="true" ></i> 3 ans d'expérience</h4>                           
              <div class="card-body" >
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
              <div class="card-footer">
                <p style="display:inline;">contactez-moi via</p>
                <button
                            type="button"
                            class="btn btn-link"
                            data-mdb-ripple-color="dark"
                            >
                            <i class="fa-solid fa-phone"></i>
                </button>
                ou
                <button
                          type="button"
                          class="btn btn-link"
                          data-mdb-ripple-color="dark"
                          >
                          <i class="fa-regular fa-envelope"></i>
                          
                </button>
              </div>
            </div>
        </div>
        <div id="divFormation&Exp" class="col-7">
        <div class="card cardFormation" >
        <h5 class="title-card "> Formation</h5>
        <hr style="color:gray ; width:100%">
            <div class="card-body timeline" >
            @foreach ($FormationProf as $key => $item)
                <div class="item {{ $key >= 1 ? 'hidden' : '' }}">
                <ul class="list-unstyled ">
                    <li class="timeline-item" >
                        <div class="timeline-element">
                            <!--span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->annee)->format('m/Y') }}</span>
                            <p>{{ $item->pays }}</p>
                            <h5 class="mt-0 mb-1">{{ $item->diplome }} en {{ $item->specialise }}</h5>
                            <p>{{ $item->ecole }} </p-->
                            <a href="#">Web Designer</a>
                            <span class="date">jan 2021</span>
                            <span class="pays">Morocco</span>
                            <span class="circle"></span>
                            <div class="timeline-content">
                                <p>Software Inc.</p>
                            </div>
                        </div>

                    </li>
                </ul>


                </div>
            @endforeach
        </div>
        <div class="show" >
            <button id="showMoreFormation" class="btn showMore">Voir plus</button>
            <button id="showFirstItemFormation" class="btn showLess hidden">Voir moins</button>
            </div>
        </div>
    </div>
    <div class="card cardExperience" >
        <h5 class="title-card "> Experience</h5>
        <hr style="color:gray ; width:100%">
            <div class="card-body timeline" >
            @foreach ($FormationProf as $key => $item)
                <div class="item {{ $key >= 1 ? 'hidden' : '' }}">
                <ul class="list-unstyled ">
                    <li class="timeline-item" >
                        <div class="timeline-element">
                            <!--span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->annee)->format('m/Y') }}</span>
                            <p>{{ $item->pays }}</p>
                            <h5 class="mt-0 mb-1">{{ $item->diplome }} en {{ $item->specialise }}</h5>
                            <p>{{ $item->ecole }} </p-->
                            <a href="#">Web Designer</a>
                            <span class="date">jan 2021</span>
                            <span class="pays">Morocco</span>
                            <span class="circle"></span>
                            <div class="timeline-content">
                                <p>Software Inc.</p>
                            </div>
                        </div>

                    </li>
                </ul>


                </div>
            @endforeach
        </div>
        <div class="show" >
            <button id="showMoreFormation" class="btn showMore">Voir plus</button>
            <button id="showFirstItemFormation" class="btn showLess hidden">Voir moins</button>
            </div>
        </div>
    </div>
        <div class="row " hidden>
        <div id="divCours" class="col-4">
        <div class="card cardCours" >
            <h4 class="title-card">Les cours </h4>
            <hr style="color:gray ; width:100%">
              <div class="card-body">
              <h4 class="card-title" hidden>Selectionner un cours</h4>
                <p class="card-cours">BodyBodyBodyBodyBodyBody</p>
                <p class="card-cours">Body</p>
                <p class="card-cours">BodyBody</p>
                <p class="card-cours">BodyBodyBodyBody</p>
              </div>
            </div>
        </div>
        <div id="divDispo" class="col-8">
        <div class="card cardDispo text-left">
            <h4 class="title-card">Disponibilite de professeur </h4>
            <hr style="color:gray ; width:100%">
              <div class="card-body ">
              <div class="ClassDisponible">
                                    @foreach ($disponibilityByDay as $key => $data)
                                        <div class="ContentDisponible">
                                            <div class="Days">{{$key}}</div>
                                            <div class="ClassCalculHeight" >

                                                <div class="ClassTimeDisponible"  style="@if($data) color:#0c3c74;background:#00f8ff3b; @else '' @endif">
                                                    <p >
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
                                    @endforeach
                                </div>
               </div> 
            </div>
        </div>
        </div>  
        
    </div>
</div>



<script>
    $(document).ready(function () {
        $.ajax({
            type: "get",
            url: "{{url('GetAvailableProf')}}",
            dataType: "json",
            success: function (response) {
                if (response.statut == 200) {
                    var calendarEl = $('#calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl[0], {
                        initialView: 'timeGridWeek',
                        headerToolbar: {
                            left: '',
                            center: '',
                            right: ''
                        },
                        events: response.data.map(function (value) {
                            var startDate = "20" + value.date + "T" + value.debut + ":00";
                            var endDate = "20" + value.date + "T" + value.fin + ":00";
                            return {
                                title: 'Available',
                                start: startDate,
                                end: endDate,
                                className: 'available-event'
                            };
                        }),
                        eventTimeFormat: {
                            hour: 'numeric',
                            minute: '2-digit',
                            meridiem: 'short'
                        },
                        slotLabelFormat: {
                            hour: 'numeric',
                            minute: '2-digit',
                            omitZeroMinute: false,
                            meridiem: 'short'
                        },
                        locale: 'fr',
                        dayHeaderFormat: { weekday: 'long' },
                        slotLaneClassNames: function (args) {
                            // Apply a custom class to non-available slots
                            if (args.isStart && !args.event) {
                                return 'hide-column';
                            }
                            return '';
                        }
                    });
                    calendar.render();
                }
            }
        });
    });

    </script>

@endsection
