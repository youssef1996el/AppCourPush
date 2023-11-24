@extends('Dashboard.index')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleShowProfile.css')}}">
<script src="{{asset('js/ScriptShowProfile.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js"></script>

<div class="container mt-5">
    <div class="row" style="margin-top:8rem">
        <!--div class="col-sm-12 col-md-3 col-xl-3 ">
            <div class="card">
                <div class="card-body" style="height: 13rem">
                    <ul class="listProfile">
                        <li >
                            <a href="#" >
                                <i class="fa-solid fa-gauge-high"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="lastChildORginList">
                            <div class="dropdown">
                                <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-regular fa-user"></i>
                                    Profile
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item" href="#" id="ShowFormation">Formation</a></li>
                                  <li><a class="dropdown-item" href="#" id="ShowExperience">Expérience</a></li>
                                  <li><a class="dropdown-item" href="#" id="ShowDisponoble">Disponibilité</a></li>
                                </ul>
                              </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div-->
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
                           
                            <div class="card" style="background-color:aliceblue">
                                
                                <h5 class="card-title " style="font-family: Gabriola, Times, serif ;font-weight: 700;
                                margin-left: 22px;
                                margin-top: 10px;
                                font-size: 30px;
                                margin-bottom: -4px;">Formation</h5>
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
                        <li class="timeline-item" >
                            <div class="timeline-element">
                                <!--span class="date">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->annee)->format('m/Y') }}</span>
                                <p>{{ $item->pays }}</p>
                                <h5 class="mt-0 mb-1">{{ $item->diplome }} en {{ $item->specialise }}</h5>
                                <p>{{ $item->ecole }} </p-->
                                <a  href="#">Web Designer</a>
                                <span class="date">jan 2021</span>
                                <span class="pays">Morocco</span>
                                <span class="circle"></span>
                                <div class="timeline-content">
                                    <p>Software Inc.</p>
                                </div>
                            </div>
                           
                        </li>
                       
                        <style>
                            /*.ListFormation .box{
                                position: relative;
                                padding: 10px;
                                border: 1px solid aliceblue;
                                background-color: white;
                                cursor: pointer;
                                transition: all 0.4s;
                                margin-bottom: 20px;
                                margin-left: 12px;
                            }
                            .ListFormation .box:hover{
                                box-shadow:0px 3px 12px 0px gray;
                                border:1px solid white;

                            }
                            .ListFormation .box::before{

                              content:'';
                              position:absolute;
                              width:16px;
                              height:16px;
                              border-radius:50%;
                              right:calc(100% +22px);
                              top:0;
                              background-color:black;
                              border:2px solid white;

                            }*/
                            .timeline{
                                width: 1200px;
                                margin: -38px auto;
                            }
                            .timeline ul{
                                margin-left: 90px;
                                padding-left: 22px;
                                border-left: 4px solid gray;
                            }
                            .timeline li{
                                margin: 40px 0;
                                position:relative;

                            }
                            .timeline a{
                                text-decoration: none;
                                font-size: 22px;
                                color: #343232;
                                top: 20px;
                                z-index: 2;
                                transition: 0.2s linear;
                                font-weight: 700;
                            }
                            .timeline .date{
                                position: absolute;
                                top: 50%;
                                left: -102px;
                                margin-top: -20px;
                                font-size: 16px;
                                color: gray;
                            }
                            .timeline .pays{
                                position: absolute;
                                top: 90%;
                                left: -102px;
                                margin-top: -20px;
                                font-size: 14px;
                                color: gray;
                                font-style: italic;
                            }
                            .timeline .circle{
                                position: absolute;
                                top: 50%;
                                left: -34px;
                                margin-top: -10px;
                                width: 20px;
                                height: 20px;
                                background: aliceblue;
                                border: 2px solid gray;
                                border-radius: 50%;
                            }
                            .timeline .timeline-content{
                                max-height:20px;
                                padding:50px 20p 0 20px;
                                border:2px solid transparent;
                                border-radius:10px;
                                position:relative;
                                transition:0.2s linear;
                            }
                           
                            .timeline .timeline-content::after{
                                content:'';
                                width:0;
                                height:0;
                                position: absolute;
                                right:100%;
                                border:solid transparent;
                                transition:0.2s linear;

                            }
                          
                            .timeline .timeline-content::after{
                                border-right-color: #8080804d;
                                border-width: 14px;
                                margin: -61px 0px;
                            }
                          
                            .timeline .timeline-content p{
                               max-height:0;
                               color:transparent;
                               margin-bottom:15px;
                               transition:0.2s linear;

                            }
                            .timeline .timeline-item:hover a{
                                transform: translateX(42px);
                                border: 1px solid #8080804d;
                                padding: 8px 110px 42px 4px;
                                background-color: #8080804d;
                                margin-left: 2px;
                               
                            }
                            .timeline .timeline-item:hover .circle{
                                background:white;

                            }
                          
                            .timeline .timeline-item:hover .timeline-content p{
                                max-height:200px;
                                color:black;
                                margin-left: 6px;
                                
                            }
                          



                        </style>

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="show" >
                                            <button id="showMoreFormation" class="btn showMore">Voir plus</button>
                                            <button id="showFirstItemFormation" class="btn showLess hidden">Voir moins</button>
                                        </div>
                                    </div>
                                </div>

                                <!--div class="card mt-3" >
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
                        </div-->
                        <!--div class="row">
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
                                </div-->
                                <div class="container-calendrier">

                                    <div id="calendar"></div>
                                </div>

                           </div>
                            <div class="container">
                          
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <div class="card" style="background-color:aliceblue">
                                
                                <h5 class="card-title " style="font-family: Gabriola, Times, serif ;font-weight: 700;
                                margin-left: 22px;
                                margin-top: 10px;
                                font-size: 30px;
                                margin-bottom: -4px;">Les cours</h5>
                                <hr style="color:#7e9db8;">
                                    <div class="card-body">
                                    
                                    @foreach ($CourProf as $cour)
                                            
                                                <p style="background-color: white;
  width: 100px;
  text-align: center;
  padding: 10px 0px;
  cursor: pointer;
  border-radius: 24px;">{{$cour->title}}</p>
                                            
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
                        </body>
<style>
    .available-event {
        background-color: #4CAF50; /* Green */
        color: #fff;
    }

    .course-event {
        background-color: #F0D75A; /* Yellow */
        color: #000;
    }

    /* .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    } */

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
