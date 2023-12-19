@extends('Dashboard.index')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfileAdmin.css')}}">

 
    <div class="container mt-4">
        <div class="title">        
                <h2 style="padding-left: 12px;font-family: times;">Profile </h2>
        </div>
            
        <div class="row content">
         
            <div class="col-sm-4 col-sm-offset-1">
                <div class="picture-container">
                    <div class="picture">
                        <img src="{{asset('image/default-avatar.png')}}" class="picture-profile" id="wizardPicturePreview" title=""/>
                        <input type="file" id="wizard-picture" name="image">
                    </div>

                    <h6>choisir une photo</h6>
                    <div class="error"></div>
                </div>
            </div>
            <div class="col-sm-8" style="width:50%">
                <div class="form-group">
                    <label for="nom" >Nom</label>
                    <input name="nom" type="text" class="form-control" placeholder="Entrer votre nom" >
                    <div class="error"></div>
                </div>
                <div class="form-group">
                    <label for="prenom" >Prénom </label>
                    <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Entrer votre prénom">
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"  class="form-control"  placeholder="Entrer votre email"  >

                </div>
                <div class="form-group">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" id="motdepasse" name="motdepasse"  class="form-control" placeholder="Entrer votre mot de passe" >
                </div>
                <div class="form-group">
                    <label for="nouveaumotdepasse">Nouveau mot de passe</label>
                    <input type="password" id="nouveaumotdepasse" name="nouveaumotdepasse"  class="form-control"  placeholder="Entrer votre nouveau mot de passe " >

                </div>
                <div class="form-group">
                    <label for="Cnfnouveaumotdepasse">Confirmer votre mot de passe</label>
                    <input type="passowrd" id="Cnfnouveaumotdepasse" name="Cnfnouveaumotdepasse"  class="form-control"  placeholder="Confimer votre mot de passe" >

                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-12 col-xl-12 ">
                <button class="btn btn-success float-end">Valider</button>
            </div>
        </div>
    </div>


@endsection
