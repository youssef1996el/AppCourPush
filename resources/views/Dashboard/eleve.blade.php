@extends('Dashboard.index')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfesseurDash.css')}}">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<div class="container mt-4">
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-xl-12">
          <h2 style="padding-left: 12px;font-family: times;">Liste des élèves </h2>
          <table class="table-primary  align-middle mb-0 bg-white w-100" id="tableListEleve" style="margin-top: 20px;width: 84%;">
            <thead class="">
              <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Pays</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($listeleve as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{$item->image}}" class="rounded-circle" id="imgEleve" alt="" />
                                <div class="ms-3">
                                <p class="fw-bold mb-1">{{$item->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-muted mb-0">{{$item->email}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Maroc</p>
                        </td>
                        <td>
                            <span class="">Active</span>
                        </td>
                        <td class="d-flex align-items-end">
                            <button type="button" class="btn btn-link showEleve" data-mdb-ripple-color="dark" data-value={{$item->id}}>
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-link " data-mdb-ripple-color="dark" data-value="{{$item->id}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>

{{-- Modal View Eleve --}}
<div class="modal fade" id="ModalView" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Dossier de professeur</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">

               <div class="col-sm-12 col-md-3 col-xl-3">
                    <div class="card bg-light cardProfile shadow-sm">

                        <img class="img" id="imageEleve"  />
                            <span class="text-uppercase text-black nameProfesseur"></span>
                            <p class="text-secondary text-center titleProfesseur" style="margin-top: 12px;" ></p>
                            <p class="text-secondary text-center numberExperince"></p>
                            <p class="info text-black methodeProfesseur"></p>
                  </div>

               </div>
               <div class="col-sm-12 col-md-9 col-xl-9">

                    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarID">
                                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active text-uppercase" aria-current="page" href="#" data-target="CardProfile">Profile</a>
                                    </li>
                                    <li class="nav-item" id="formationTab">
                                        <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="CardFormation">Formation</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="Cardexperience">expérience</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="CardCoursAndDispo">cours / disponible</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" aria-current="page" href="#" data-target="Cardcertification">certification</a>
                                    </li>
                                </div>
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

                    <div class="card mt-3 p-5 CardProfile" style="height: 314px;">
                        <div class="row">
                            <div class="col-6 ">
                                <div class="form-group">
                                    <label for="" class="text-uppercase">Nom Complet</label>
                                    <input type="text" class="form-control nomCompletEleve" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-uppercase">Email</label>
                                    <input type="text" class="form-control emailEleve" disabled>
                                </div>

                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="" class="text-uppercase">Pays</label>
                                    <input type="text" class="form-control paysEleve" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-uppercase">Douha</label>
                                    <textarea type="text" class="form-control" rows="5"  disabled>hani hatit lik modal hena yak
                                        ghadi yab9a na9sna prof deyal eleve hadik khaso hta yadiir reserve bach njibo man table akher bima3na
                                        khas had table li kan dewi 3liha man mor stripe so had étap deyal bayno prof deyal barhoch
                                        khabiha hta raj3o liha
                                        f modal chofi diri lamsa deyalk raha data katji
                                    </textarea>
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
                            <div class="col-3">
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
                            <div class="col-9">
                                <label for="" class="text-uppercase">disponible</label>
                                <div class="ClassDisponible">

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card mt-3 p-5 Cardcertification" style="display: none">
                       {{--  <a target="_blank" id="FileCertification">Certification</a> --}}

                        <a class="button" id="FileCertification" target="_blank">

                            <svg class="svg-icon" width="24" viewBox="0 0 24 24" height="24" fill="none">
                                <g stroke-width="2" stroke-linecap="round" stroke="#056dfa" fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="m3 7h17c.5523 0 1 .44772 1 1v11c0 .5523-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1z"></path>
                                    <path d="m3 4.5c0-.27614.22386-.5.5-.5h6.29289c.13261 0 .25981.05268.35351.14645l2.8536 2.85355h-10z"></path>
                                </g>
                            </svg>

                            <span class="lable">  Certification</span>
                        </a>
                        <div class="radio-input">
                            <input value="Verifie" name="verification" id="value-1" type="radio">
                            <label for="value-1">Verifie</label>
                            <input value="Refuser" name="verification" id="value-2" type="radio">
                            <label for="value-2">Non verifie</label>
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

<script src="{{asset('js/ScriptDashboardEleve.js')}}"></script>
@endsection()
