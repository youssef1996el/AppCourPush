@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleDashboardAdmin.css')}}">

    <div class="row">
        <div class="col-12">
            <div class="container">
                <h1 class="text-uppercase">Tableau de bord</h1>
                <h3 class="text-primary">{{ ucfirst($formattedDate)}}</h3>
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
                                <h3 class="text-primary" >Bonjour et bienvenue de retour, votre tableau de bord est prêt !</h3>
                                <p class="text-dark mt-3" style="  font-size: 18px;">Le tableau de bord résume les principaux indicateurs de votre établissement éducatif : le nombre de professeurs et d'élèves, les professeurs non actifs, la répartition des étudiants par pays, et un graphique illustrant l'évolution du nombre d'élèves. Ces données fournissent une vue d'ensemble précieuse pour la gestion et l'optimisation de votre institution.
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 p-4 ">
                                <img class="ImageDashboard" src="{{asset('image/ImageDashboard.svg')}}" height="250px" width="" alt="" srcset="" >
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
                    <div class="col-sm-12 col-md-4 col-xl-4 p-2">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/proactive.png')}}"  width="90px" height="90px" alt="" srcset="" style="border-radius: 50px;">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">Professeur</h5>
                                </div>
                                <h5 style="text-align: center;font-size: 24px;color: #416cb0;font-weight:bold">{{$professeurActive}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-xl-4 p-2">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/professor.svg')}}"  width="90px" height="90px" alt="" srcset="">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">Professeur non active</h5>
                                </div>
                                <h5 style="text-align: center;font-size: 24px;color: #416cb0;font-weight:bold">{{$professeurNoActive}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-xl-4 p-2">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="card-body">
                                <div class="d-flex">
                                    <img src="{{asset('image/elevee.jpeg')}}"  width="90px" height="90px" alt="" srcset="" style="border-radius: 50px;">
                                    <h5 class="card-title mt-4" style="margin-left:10px;">Eleve</h5>
                                </div>
                                <h5 style="text-align: center;font-size: 24px;color: #416cb0;font-weight:bold">{{$Eleve}}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-6 col-xl-6 p-2">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="bg-light text-primary p-3" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                                <h5>Nombre d'étudiants inscrits sur le site dans chaque pays</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div id="chartMaps"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="bg-light text-primary p-3" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                                <h4>inshalhe hada floas ki roz</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div id="chartdiv"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="card shadow" style="border-radius: 20px">
                            <div class="bg-light text-primary p-3">
                                <div class="row bg-light text-primary p-3" >
                                    <div class="col-sm-6 col-md-6 col-xl-6 " >
                                        <h3>Graphique du nombre d'élèves créé</h3>
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
