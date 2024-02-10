@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleCoursPaiement.css')}}">
<script src="{{asset('js/ScriptCoursPaiement.js')}}"></script>

    <div class="container mt-4">
        <!-- <div class="row" style="  margin-top: 20px;">
            <div class="col sm-12 col-md-6 col-xl-6">
                <h2 style="padding-left: 12px;font-family: times;">Cours de paiement </h2>
            </div>
            <div class="col sm-12 col-md-6 col-xl-6">
                <button class="btn" id="BtnAddPrixCours" data-bs-toggle="modal" data-bs-target="#ModalAddPrix">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                    </svg>
                    <span>Ajouter le prix du cours </span>
                </button>
            </div>
        </div>
        <div class="cardType row" >
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="row mt-2">
                    <div class="col-sm-12 col-md-6 -col-xl-6">
                        <div class="CardTypeGroupe">

                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 -col-xl-6">
                        <div class="CardTypePrive">

                        </div>

                    </div>
                </div>
            </div>
        </div> -->
        <div class="card " style=" background-color: #ffffff63;">
            <div class="card-body">
                <h4 class="card-title mb-5">Cours de paiement</h4>
                <div class="row">
                    <div class="buttonPrice">
                            <button class="btn" id="BtnAddPrixCours" data-bs-toggle="modal" data-bs-target="#ModalAddPrix">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                                </svg>
                                <span style="font-size:16px">Ajouter le prix du cours </span>
                            </button>
                    </div>
                </div>
                <div class="row">
                    <div class="cards">
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <div class="card-item CardTypeGroupe">

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <div class="card-item CardTypePrive">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
  
        {{-- Modal Add Prix --}}
        <div class="modal fade" id="ModalAddPrix" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-settings modal-l">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter le prix du cours</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="sectiontablecours mt-1 card p-2 " style="border:none; max-height: 310px;">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="form-group" >
                                        <select name="typeCours" class="form-select TypeCours">
                                            <option value="0">veuillez sélectionner le type de cours</option>
                                            <option value="Cours particulier">Cours particulier</option>
                                            <option value="Cours en groupe" >Cours en groupe</option>
                                        </select>
                                        <div class="ErrorTypeCours" style="display: none"></div>
                                    </div>
                               </div>
                               <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="form-group" >
                                        <input type="number" name="" id="" class="form-control PrixType" min="1" placeholder="Prix type cours">
                                        <div class="ErrorPrix" style="display: none"></div>
                                    </div>
                               </div>
                            </div>
                            <button class="Send mt-4" >
                                <span >valider</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        {{-- Modal edit Prix --}}
        <div class="modal fade" id="ModalEditPrix" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-settings modal-l">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier les prix des cours </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="sectiontablecours mt-1 card p-2 " style="border:none; max-height: 310px;">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="form-group">
                                        <select name="typeCours" class="form-select TypeCoursEdit">
                                            <option value="0">veuillez sélectionner le type de cours</option>
                                            <option value="Cours particulier">Cours particulier</option>
                                            <option value="Cours en groupe">Cours en groupe</option>
                                        </select>

                                    </div>
                               </div>
                               <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="form-group">
                                        <input type="number" name="" id="" class="form-control PrixTypeEdit" min="1" placeholder="Prix type cours">
                                        <div class="ErrorPrix" style="display: none"></div>
                                    </div>
                               </div>
                            </div>
                            <button class="Send SendEdit mt-4" >
                                <span >Modifier</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var urlFetchData = "{{url('fetchDataTypeCours')}}";
        var urlStoreData = "{{url('StoreDataTypeCours')}}";
        var urlGetTypeCours = "{{url('GetTypeCours')}}";
        var urlUpdateData   = "{{url('UpdateDataTypeCourse')}}";
    </script>

    <style>
        .card-prix {
    margin-left:18px;
    flex-wrap: wrap;
    align-items: stretch;
    margin-bottom: 2rem;
    width: 290px;
    display: flex;
    flex-direction: column;
    border-radius: 0.25rem;
    background-color: rgb(17, 52, 83);
    padding: 1.5rem;
  }

  .header {
    display: flex;
    flex-direction: column;
  }

  .title {
    font-size: 1.5rem;
    line-height: 2rem;
    font-weight: 700;
    color: #fff
  }

  .PricePrive , .PriceGroupe {
    font-size: 3.75rem;
    line-height: 1;
    font-weight: 700;
    color: #fff
  }

  .desc {
    margin-top: 0.75rem;
    margin-bottom: 0.75rem;
    line-height: 1.625;
    color: rgba(156, 163, 175, 1);
  }
  .lists {
      margin-bottom: 1.5rem;
    flex: 1 1 0%;
    color: rgba(156, 163, 175, 1);
    margin-left: -35px;
    margin-top: 1rem;

  }

  .lists .list {
    margin-bottom: 0.5rem;
    display: flex;
    margin-left: 0.5rem
  }

  .lists .list svg {
    height: 1.5rem;
    width: 1.5rem;
    flex-shrink: 0;
    margin-right: 0.5rem;
    color: rgb(56, 138, 210);
  }

  .action {
    border: none;
    outline: none;
    display: inline-block;
    border-radius: 0.25rem;
    background-color: rgb(56, 138, 210);
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    text-align: center;
    font-weight: 600;
    letter-spacing: 0.05em;
    color: white;
  }

  .text-p{
    font-style: oblique;
    font-weight: bold;
    color: rgb(8, 30, 57);
    font-size: 16px;
  }
    </style>

@endsection
