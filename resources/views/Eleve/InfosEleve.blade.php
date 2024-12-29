@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleInfoEleve.css')}}">
<script src="{{asset('js/ScriptInfosEleve.js')}}"></script> 
<div class="container" >
    <div class="card shadow " style="margin: auto;padding: 20px 24px; background: #ffffff5c;" >
        <div class="card-body">
            <h3 class="mb-5" style="font-style:italic; text-align:center">Les informations personnelles</h3>
            <form action="{{route('UpdateDataEleve')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-sm-12 col-md-4 col-xl-4 mt-5">

                        <div class="picture-container">
                            <div class="picture">
                                <img src="{{ $DataEleve->image == '' ? asset('image/default-avatar.png') : $DataEleve->image}}" class="picture-src" id="wizardPicturePreview" title=""/>
                                <input type="file" id="wizard-picture" name="image">
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-8 col-xl-8 ">
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Nom complet</label>
                            <input type="text" class="form-control" placeholder="Nom Complet" name="name" value="{{$DataEleve->name}}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Email</label>
                            <input type="email" class="form-control" placeholder="Mail" name="email" value="{{$DataEleve->email}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Pays</label>
                            <select name="pays" id="" class="form-select form-control">
                                @foreach ($Pays as $key => $value)
                                    <option value="{{$key}}" selected>{{$value}} </option>
                                @endforeach
                                @foreach ($codeCountry as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-2 col-xl-2 "></div>
                    <div class="col-sm-12 col-md-8 col-xl-8 ">
                        <div class="showInputs ">
                            <a href="#" id="showInputsLink" class="d-flex justify-content-center bold mb-5">Modifier votre mot de passe</a>

                            <div class="hidden-inputs" id="inputsContainer">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Mot de passe actuelle</label>
                                    <input type="password" class="form-control" id="mdpActuelle" name="mypassword" placeholder="Entrer votre mot de passe actuelle" value="" >
                                    <i class="fa-solid fa-eye-slash show-password" id="actualEye" ></i>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Nouveau mot de passe </label>
                                    <input type="password" class="form-control"  id="nouveaumdp" name="newpassword" placeholder="Entrer votre nouveau mot de passe " value="" >
                                    <i class="fa-solid fa-eye-slash show-password" id="newEye" ></i>
                                    <span class="error-message" id="errorNewPassword"></span>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Confirmer votre mot de passe </label>
                                    <input type="password" class="form-control"  id="Confirmermdp" name="confirmpassword" placeholder="Confirmer votre mot de passe " value="" >
                                    <i class="fa-solid fa-eye-slash show-password" id="cfrmEye" ></i>
                                    <span class="error-message" id="errorConfirmPassword"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-xl-2 "></div>
                </div>
            </div>
            <div class="mt-5 m-auto">
                <button type="submit" class="btn btn-success BtnUpdateDataProfesseur " >Valider</button>
            </div>
            </form>
        </div>
    </div>

    <script type= "text/javascript" src ={{asset('js/countries.js')}} ></script>

@endsection
