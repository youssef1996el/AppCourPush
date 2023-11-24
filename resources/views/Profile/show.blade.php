@extends('Professeur.Sidebar')
@section('navsidebarProf')
<link rel="stylesheet" href="{{asset('css/StyleShowProfile.css')}}">
<script src="{{asset('js/ScriptShowProfile.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js"></script>


<div class="container mt-5">
    <div class="row" style="margin-top:8rem">
   
        <div class="col-sm-12 col-md-9 col-xl-9">
            <div class="divProfile">
                <div class="card  " >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <div class="card" style="background-color:aliceblue ;width: 350px; margin-left: 16px;">

                                    <div class="text-center" >

                                        <img class="profileimg" src="{{asset($DataProf[0]->image)}}" alt=""  srcset="" style="border: 2px solid white;">
         
                                        <h2 style="font-size: 28px;" >{{$DataProf[0]->nom}}</h2>
                                        <h4 style="font-size: 20px;color: gray;">work</h4>
                                        <h4 style="font-size: 20px;color: gray;">experience</h4>
                                    </div>

                                    <div class="card-body">

                                        <!--div class="form-group">
                                            <label for="" class="form-label">First name</label>
                                            <input type="text" class="form-control" value="{{$DataProf[0]->nom}}">

                                            <label for="" class="form-label">Last name</label>
                                            <input type="text" class="form-control" value="{{$DataProf[0]->prenom}}">

                                            <label for="" class="form-label">Email</label>
                                            <input type="text" class="form-control" value="{{$DataProf[0]->email}}">

                                            <label for="" class="form-label">Date naissamce</label>
                                            <input type="text" class="form-control" value="{{$DataProf[0]->datenaissance}}">

                                            <label for="" class="form-label">téléphone</label>
                                            <input type="text" class="form-control" value="{{$DataProf[0]->telephone}}" autocomplete="off">
                                        </div-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6">

                            <div class="card" >

                                <h5 class="card-title "> Formation</h5>
                                <hr style="color:#7e9db8;">
                                        <div class="timeline" >
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

                       

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="show" >
                                            <button id="showMoreFormation" class="btn showMore">Voir plus</button>
                                            <button id="showFirstItemFormation" class="btn showLess hidden">Voir moins</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3" >
                                    <div class="card-body">

                                        <h5 class="card-title text-center border border-secondary shadow rounded-3 fs-2" style="font-family: Gabriola, Times, serif">Expérience</h5>
                                        <div class="ListExperience">
                                            @foreach ($ExperinceProf as $key => $item)
                                                <div class="itemExperience {{ $key >= 1 ? 'hidden' : '' }}">
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td>Poste</td>
                                                            <td>{{ $item->poste }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Entreprise</td>
                                                            <td>{{ $item->entreprise }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pays</td>
                                                            <td>{{ $item->pays }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Du</td>
                                                            <td>{{ $item->du }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Au</td>
                                                            <td>{{ $item->au }}</td>
                                                        </tr>
                                                        <hr>
                                                    </table>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div style="margin-top: 8px;">
                                            <button id="showMoreExperience" class="btn btn-secondary">Show More</button>
                                            <button id="showFirstItemExperience" class="hidden">Show First Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12-col-xl-12">
                                <h5 class="card-title text-center border border-secondary shadow rounded-3 fs-2 mt-2" style="font-family: Gabriola, Times, serif">Disponibilités du professeur</h5>
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
                                <div class="container-calendrier">

                                    <div id="calendar"></div>
                                </div>

                           </div>
                            <div class="container">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <div class="card" >

                                <h5 class="card-title " >Les cours</h5>
                                <hr style="color:#7e9db8;">
                                    <div class="card-body">

                                    @foreach ($CourProf as $cour)

                                                <p class="cours-titre">{{$cour->title}}</p>

                                        @endforeach
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="divFormation" style="display: none">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title text-center border border-secondary shadow rounded-3 fs-2 mt-2" style="font-family: Gabriola, Times, serif">Formation</h5>
                        <div class="ListTableFormation">
                            @foreach ($FormationProf as $key => $item)
                                <div class="itemTableFormation {{ $key >= 1 ? 'hidden' : '' }}">
                                    <table class="w-10 table tableFormation">
                                        <tr>
                                            <td>Diplome</td>
                                            <td>Specialise</td>
                                            <td>Annee</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" value="{{ $item->diplome }}" class="form-control" disabled>

                                            </td>
                                            <td>
                                                <input type="text" value="{{ $item->specialise }}" class="form-control" disabled>

                                            </td>
                                            <td>
                                                <input type="text" value="{{ $item->annee }}" class="form-control" disabled>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ecole</td>
                                            <td>Pays</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" value="{{ $item->ecole }}" disabled>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{ $item->pays }}" disabled>
                                            </td>
                                        </tr>
                                        <hr>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                        <div style="margin-top: 8px;">
                            <button id="showMoreListTableFormation" class="btn btn-secondary">Show More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divExperience" style="display: none">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center border border-secondary shadow rounded-3 fs-2 mt-2" style="font-family: Gabriola, Times, serif">Expérience</h5>
                        @foreach ($ExperinceProf as $key => $item)
                            <div class="itemTableExperience {{ $key >= 1 ? 'hidden' : '' }}">
                                <table class="w-10 table tableExperience">
                                    <tr>
                                        <td>Poste</td>
                                        <td>Entreprise</td>
                                        <td>Pays</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" value="{{ $item->poste }}" class="form-control" disabled>

                                        </td>
                                        <td>
                                            <input type="text" value="{{ $item->entreprise }}" class="form-control" disabled>

                                        </td>
                                        <td>
                                            <input type="text" value="{{ $item->pays }}" class="form-control" disabled>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>du</td>
                                        <td>au</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $item->du }}" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $item->au }}" disabled>
                                        </td>
                                    </tr>
                                    <hr>
                                </table>
                            </div>
                        @endforeach
                        <div style="margin-top: 8px;">
                            <button id="showMoreListTableExperience" class="btn btn-secondary">Show More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divDisponible" style="display: none">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center border border-secondary shadow rounded-3 fs-2 mt-2" style="font-family: Gabriola, Times, serif">Disponibilités du professeur</h5>
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

<style>
    .available-event {
        background-color: #4CAF50; /* Green */
        color: #fff;
    }

    .course-event {
        background-color: #F0D75A; /* Yellow */
        color: #000;
    }



    h1 {
        color: #007BFF;
    }
    </style>
    <script>
        $(document).ready(function ()
        {
            $.ajax({
                type    : "get",
                url     : "{{url('GetAvailableProf')}}",
                dataType: "json",
                success: function (response)
                {
                    if(response.statut == 200)
                    {


                        var calendarEl = $('#calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl[0],
                        {
                            initialView: 'timeGridWeek',
                            headerToolbar:
                            {
                                left: '',
                                center: '',
                                right: ''
                            },
                            events: response.data.map(function (value) {
                                var startDate = "20" + value.date + "T" + value.debut + ":00";
                                var endDate = "20" + value.date + "T" + value.fin + ":00";
                                return {
                                    title       : 'Available',
                                    start       : startDate,
                                    end         : endDate,
                                    className   : 'available-event'
                                };
                            }),
                        /*  events:
                            [

                                {
                                    title: 'Available',
                                    start: '2023-11-11T07:00:00',
                                    end: '2023-11-11T17:00:00',
                                    className: 'available-event'
                                },
                                {
                                    title: 'Course',
                                    start: '2023-11-12T09:00:00',
                                    end: '2023-11-12T12:00:00',
                                    className: 'course-event'
                                },
                                {
                                    title: 'Available',
                                    start: '2023-11-08T09:00:00',
                                    end: '2023-11-08T17:00:00',
                                    className: 'available-event'
                                }
                            ], */
                            eventTimeFormat:
                            {
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
                            dayHeaderFormat: { weekday: 'long' }
                        });
                        calendar.render();
                    }
                }
            });
        });
    </script>


@endsection
