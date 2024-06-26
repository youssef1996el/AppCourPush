@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfesseurDash.css')}}">

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


<div id="overlay">
    <div class="three-body">
        <div class="three-body__dot"></div>
        <div class="three-body__dot"></div>
        <div class="three-body__dot"></div> 
    </div>
</div>
<div class="container mt-4 ">
    <div class="card">
       {{--  <img class="card-img-top" src="holder.js/100px180/" alt=""> --}}
        <div class="card-body">
            <h4 class="card-title">Liste des professeurs</h4>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <div class="table-responsive ">
                        <table class="table-primary align-middle mb-0 bg-white table-striped" id="tableListProfesseur">
                            <thead class="">
                                <tr>
                                    <th>Nom</th>
                                    <th>Titre</th>
                                    <th>Status</th>
                                    <th>Position</th>
                                    <th>Verification</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listProfesseur as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img id="verificationImage" src="{{asset($item->image)}}" class="pic-prof rounded-circle" alt="">
                                            <div class="">
                                                <p class="fw-bold mb-1">{{$item->name}}</p>
                                                <p class="text-muted mb-0">{{$item->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1 " style="text-align: center;width: 116px;">{{$item->title}}</p>
                                    </td>
                                    <td>
                                        <span class="activeText">Active</span>
                                    </td>
                                    @if ($item->numberExperince <= 3)
                                    <td>
                                        <span class="">Junior</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="">Professionnel</span>
                                    </td>
                                    @endif
                                    @if ($item->verification === 'Verifie')
                                    <td class="verificationCell" style=" display: inline-flex;margin-top: 14px;color:rgb(0, 149, 246);font-weight:bold">
                                        <svg aria-label="Vérifié" class="x1lliihq x1n2onr6" fill="rgb(0, 149, 246)" height="18" role="img" viewBox="0 0 40 40" width="18" style="margin-top:4px">
                                            <title>Vérifié</title>
                                            <path d="M19.998 3.094 14.638 0l-2.972 5.15H5.432v6.354L0 14.64 3.094 20 0 25.359l5.432 3.137v5.905h5.975L14.638 40l5.36-3.094L25.358 40l3.232-5.6h6.162v-6.01L40 25.359 36.905 20 40 14.641l-5.248-3.03v-6.46h-6.419L25.358 0l-5.36 3.094Zm7.415 11.225 2.254 2.287-11.43 11.5-6.835-6.93 2.244-2.258 4.587 4.581 9.18-9.18Z" fill-rule="evenodd"></path>
                                        </svg>
                                        <p>{{$item->verification}}</p>
                                    </td>
                                    @else
                                    <td class="verificationCell" style=" display: ruby-base;margin-top: 14px;color:rgb(246 0 0)">
                                        <p>{{$item->verification}}</p>
                                    </td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-link BtnView" data-mdb-ripple-color="dark" data-value="{{$item->id}}" data-target="#ModalView">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalView" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Dossier de professeur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-3 resposiveCardProfile">
                            <div class="card bg-light cardProfile shadow-sm m-auto mb-2">
                                <img class="img" id="imageProfesseur"  />
                                    <span class="text-uppercase nameProfesseur" style="color:rgb(0, 149, 246)"></span>
                                    <p class=" text-center titleProfesseur" style="margin-top: 16px; color:black ; font-style:italic" ></p>
                                    <p class="text-secondary text-center numberExperince"></p>
                                    <p class="info text-black methodeProfesseur"></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-9">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID"
                                        aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarID">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="nav-link active text-uppercase" aria-current="page" href="#" data-target="CardProfile">Profile</a>
                                            </li>
                                            <li class="nav-item" id="formationTab">
                                                <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="CardFormation">Formation</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="Cardexperience">Expérience</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="CardCoursAndDispo">Cours / Disponibilité</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="Cardcertification">Certification</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>

                            <div class="divLoading" style="display: none">
                                <div class="newtons-cradle">
                                    <div class="newtons-cradle__dot"></div>
                                    <div class="newtons-cradle__dot"></div>
                                    <div class="newtons-cradle__dot"></div>
                                    <div class="newtons-cradle__dot"></div>
                                </div>
                            </div>

                            <div class="card mt-3 p-5 CardProfile" {{-- style="height: 314px;" --}}>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-xl-6 p-2">

                                        <div class="form-group">
                                            <label for="" class="text-uppercase">Email</label>
                                            <input type="text" class="form-control emailProfesseur" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-uppercase">Date naissance</label>
                                            <input type="text" class="form-control datenaissanceProfesseur" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-xl-6 p-2">

                                        <div class="form-group">
                                            <label for="" class="text-uppercase">Téléphone</label>
                                            <input type="text" class="form-control telephoneProfesseur" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 p-5 CardFormation" style="display: none; ">
                                {{-- append --}}
                            </div>
                            <div class="card mt-3 p-5 Cardexperience" style="display: none;">
                                <div class="InforCardexperience" >
                                    {{-- append --}}
                                </div>
                            </div>
                            <div class="card mt-3 p-4 CardCoursAndDispo" style="display: none; height: 392px;">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xl-3 resposiveCardCours">
                                        <label for="" class="text-uppercase">Cours</label>
                                        <div style=" " class="divScrollCours">
                                            {{-- DivScroll cour --}}
                                            <div class="InfoCours" >
                                                <button class="buttonCours">
                                                    Button
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-ms-12 col-md-12 col-xl-9">
                                        <label for="" class="text-uppercase titleCenterResponsive">disponibilité</label>
                                        <div class="ClassDisponible">

                                        </div>
                                        <div class="card-footer d-block">
                                            <div class="d-flex align-items-center " style="gap:12px"><div class="gr " style="width:12px; height:12px;background:#0d6efd;border-radius: 50%;"></div>Cours en groupe</div>
                                            <div class="d-flex align-items-center" style="gap:12px"><div class="pr" style="width:12px; height:12px; background: #20c997;border-radius: 50%;"></div>Cours particulier</div>
                                            <div class="d-flex align-items-center" style="gap:12px"><div class="vide" style="width:12px; height:12px;  background-image: linear-gradient(127deg,#fff 35.71%,#e3e3e3 0,#e3e3e3 50%,#fff 0,#fff 85.71%,#e3e3e3 0,#e3e3e3) !important;background-size: 8.76px 11.63px !important;border-radius: 50%"></div>Indisponible</div>
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="card mt-3 p-5 Cardcertification" style="display: none">

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-xl-6 p-2">
                                        <a class="button" id="FileCertification" target="_blank">

                                            <svg class="svg-icon" width="24" viewBox="0 0 24 24" height="24" fill="none" >
                                                <g stroke-width="2" stroke-linecap="round" stroke="#056dfa" fill-rule="evenodd" clip-rule="evenodd">
                                                    <path d="m3 7h17c.5523 0 1 .44772 1 1v11c0 .5523-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1z"></path>
                                                    <path d="m3 4.5c0-.27614.22386-.5.5-.5h6.29289c.13261 0 .25981.05268.35351.14645l2.8536 2.85355h-10z"></path>
                                                </g>
                                            </svg>

                                            <span class="lable">  Certification</span>
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-xl-6 p-2">
                                        <div class="radio-input">
                                            <input value="Verifie" name="verification" id="value-1" type="radio" class="custom-input">
                                            <label for="value-1">Verifie</label>
                                            <input value="Refuser" name="verification" id="value-2" type="radio">
                                            <label for="value-2">Non verifie</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success BtnVerification" >Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/ScriptDahsboardProfesseur.js')}}"></script>
<script>
    var urlViewProfesseur = "{{url('view/professeur')}}";
    var scrimage          ='{{ asset("") }}';
    var scrCertification  ='{{ asset("") }}';
    var verificationCertification = "{{url('verificationProf')}}"
</script>

<style>
    .modal-backdrop {
        --bs-backdrop-zindex: unset;
    }
    .btn .badge {
        position: absolute !important;
    }
    .badge {
    --bs-badge-padding-x: -1.35em;
    }
</style>


@endsection()
