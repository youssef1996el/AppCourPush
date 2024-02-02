@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/StyleInfoEleve.css')}}">
<script src="{{asset('js/ScriptInfosEleve.js')}}"></script>
<div class="container" style="margin-top:65px;">
        <div class="card shadow " style=" width: 600px;margin: auto;padding: 20px 24px; background: #ffffff5c;" >
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
                            <input type="text" class="form-control" placeholder="Nom Complet" name="name" value="{{$DataEleve->name}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Email</label>
                            <input type="email" class="form-control" placeholder="Mail" name="email" value="{{$DataEleve->email}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Pays</label>
                            <select name="" id="" class="form-select">
                                @foreach ($Pays as $key => $value)
                                    <option value="{{$key}}" selected>{{$value}} </option>
                                @endforeach


                               {{--  <option value="{{$mycodeFromDatabase}}">{{$mycodeFromDatabase}}</option> --}}
                                @foreach ($codeCountry as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            {{-- <select  onchange="print_state('state',this.selectedIndex);" class="form-control countryDropdown" name="paysFormation[]" required require></select> --}}
                        </div>

                    </div>
                </div>
                </form>
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-2 col-xl-2 "></div>
                    <div class="col-sm-12 col-md-8 col-xl-8 ">
                        <div class="showInputs ">
                            <a href="#" id="showInputsLink" class="d-flex justify-content-center bold">Modifier votre mot de passe</a>

                            <div class="hidden-inputs" id="inputsContainer">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Mot de passe actuelle</label>
                                    <input type="text" class="form-control" id="mdpActuelle" name="mdpActuelle" placeholder="Entrer votre mot de passe actuelle" value="" required>
                                    <i class="fa-solid fa-eye show-password" id="actualEye" ></i>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Nouveau mot de passe </label>
                                    <input type="text" class="form-control"  id="nouveaumdp" name="nouveaumdp" placeholder="Entrer votre nouveau mot de passe " value="" required>
                                    <i class="fa-solid fa-eye show-password" id="newEye" ></i>

                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Confirmer votre mot de passe </label>
                                    <input type="text" class="form-control"  id="Confirmermdp" name="Confirmermdp" placeholder="Confirmer votre mot de passe " value="" required>
                                    <i class="fa-solid fa-eye show-password" id="cfrmEye" ></i>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-xl-2 "></div>
                </div>
            </div>
            <div class="mt-5">
               <button type="button" class="btn btn-success  BtnUpdateDataProfesseur" style="display:flex; margin:auto">Valider</button>
            </div>
        </div>
    </div>

    <script type= "text/javascript" src ={{asset('js/countries.js')}} ></script>

@endsection
