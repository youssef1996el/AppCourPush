@extends('Dashboard.index')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfileAdmin.css')}}">
<script src="{{asset('js/ScriptProfileAdmin.js')}}"></script>


    <div class="container mt-4">
        <div class="title">
                <h2 style="padding-left: 12px;font-family: times;">Profile </h2>
        </div>
        <form action="{{url('UpDateAdmin')}}" method="post" id="FormUpdateAdmin">
            @csrf

            <div class="row content">

                <div class="col-sm-4 col-sm-offset-1">
                    <div class="picture-container">
                        <div class="picture">
                            <img src="{{asset('image/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title=""/>
                            <input type="file" id="wizard-picture" name="image">
                        </div>

                        <h6>choisir une photo</h6>
                        <div class="error"></div>
         
                    </div>
                </div>
                <div class="col-sm-8" style="width:50%">
                    <div class="form-group">
                        <label for="nom" >Nom</label>
                        <input name="nom" type="text" class="form-control" placeholder="Entrer votre nom" value="{{$DataAdmin->nom}}">
                        <div class="errorNom"></div>
                    </div>
                    <div class="form-group">
                        <label for="prenom" >Prénom </label>
                        <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Entrer votre prénom" value="{{$DataAdmin->prenom}}">
                        <div class="errorPrenom"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"  class="form-control"  placeholder="Entrer votre email"  value="{{$DataAdmin->email}}" readonly>
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" id="motdepasse" name="motdepasse"  class="form-control" placeholder="Entrer votre mot de passe" value=''>
                        <div class="errorPassword"></div>
                    </div>
                    <div class="form-group">
                        <label for="nouveaumotdepasse">Nouveau mot de passe</label>
                        <input type="password" id="nouveaumotdepasse" name="nouveaumotdepasse"  class="form-control"  placeholder="Entrer votre nouveau mot de passe " >
                        <div class="error"></div>
                    </div>
                    <div class="form-group">
                        <label for="Cnfnouveaumotdepasse">Confirmer votre mot de passe</label>
                        <input type="password" id="Cnfnouveaumotdepasse" name="Cnfnouveaumotdepasse"  class="form-control"  placeholder="Confimer votre mot de passe" >
                        <div class="alert ErrorConfirme" role="alert"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12 col-md-12 col-xl-12 ">
                    <button type="submit" class="btn btn-success float-end BtnUpdateDataAdmin">Valider</button>
                </div>
            </div>
        </form>
    </div>

<style>
     .wizard-card .picture input[type="file"] {
   cursor: pointer;
   display: block;
   height: 100%;
   left: 0;
   opacity: 0 !important;
   position: absolute;
   top: 0;
   width: 100%;
 }
</style>
<style>#picture-container {
    position: relative;
    overflow: hidden;
    display: inline-block;
    cursor: pointer;
}

.picture-src {
    width: 100px; /* Adjust the width as needed */
    height: 100px; /* Adjust the height as needed */
}

#wizard-picture {
    position: absolute;
    top: 0;
    left: 0;
    font-size: 100px; /* Make sure the file input covers the entire image */
    opacity: 0;
    cursor: pointer;
}</style>

<script>function displayImage(input) {
    var preview = document.getElementById('wizardPicturePreview');
    var file = input.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}</script>
@endsection
