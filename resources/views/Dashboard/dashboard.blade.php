@extends('Dashboard.index')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleDashboardAdmin.css')}}">
<?php
    use Carbon\Carbon;
    $today = Carbon::now();
    $formattedDate = ucfirst(trans($today->format('l'))) . ' ' . ucfirst(trans($today->format('F'))) . ' ' . $today->format('j, Y, H:i:s');
    $name = $formattedDate . ' GMT' . '-' . ($today->offset / 3600);
?>
    <div class="row">
        <div class="col-12">
            <div class="container">
                <h1 class="text-uppercase">Dashboard</h1>
                <h3 class="text-primary">{{$name}}</h3>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="container">
            <div class="container">
                <div class="card shadow " style="background: transparent;border-radius: 20px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-xl-6 p-4">
                                <h3 class="text-primary" >Welcome back, your dashboard is ready !</h3>
                                <p class="text-dark fs-4 ">We're honored to have you with us. Your dashboard is primed and optimized for seamless navigation. Should you require any support or have inquiries, our team is at your service. Let's embark on a productive journey together!
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 p-4 ">
                                <img class="ImageDashboard" src="{{asset('image/ImageDashboard.svg')}}" height="250px" alt="" srcset="" >
                            </div>
                        </div>
                    </div>
                    <div>
                        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                            <defs>
                                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                            </defs>
                            <g class="parallax">
                                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(185,239,248,0.7" />
                                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(136,226,242,0.7)" />
                                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                                <use xlink:href="#gentle-wave" x="48" y="7" fill="rgba(111,178,190,0.7)" />
                            </g>
                        </svg>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">Professeur</h5>
                                </div>
                                <h5>{{$professeurActive}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/student.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">Eleve</h5>
                                </div>
                                <h5>{{$Eleve}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">test 1</h5>
                                </div>
                                <h5>50</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-xl-3">
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">test 2</h5>
                                </div>
                                <h5>50</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="card shadow">
                            <div class="bg-light text-primary p-3">
                                <h5>Nombre d'étudiants inscrits sur le site dans chaque pays</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div id="chartMaps"></div>
                                </div>
                            </div>
                        </div>
                       {{--  <div class="card" style="border-radius: 20px">
                            <div id="chartMaps"></div>
                        </div> --}}
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="card shadow">
                            <div class="bg-light text-primary p-3">
                                <h4>inshalhe hada floas ki roz</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div id="chartColumn"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card shadow">
                            <div class="bg-light text-primary p-3">
                                <div class="row  bg-light text-primary p-3">
                                    <div class="col-sm-6 col-md-6 col-xl-6 ">
                                        <h3>Chart Count Eleve created</h3>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xl-6 ">
                                        <select name="yearpicker" class="form-select" id="yearpicker"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="ChartCountCreatedEleve"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="{{asset('js/ScriptDashboardAmin.js')}}"></script>

    <script>
        var urlStartAndEnd = "{{url('getStartYearAndEnd')}}";
        var urlChartCountEleve = "{{url('GetChartEleveCount')}}";
        var urlChartCountByCountry = "{{url('GetChartByCountry')}}";
    </script>
    <script>


    </script>

<style>
    #chartMaps {
      width: 100%;
      height: 500px
    }
    </style>

@endsection
