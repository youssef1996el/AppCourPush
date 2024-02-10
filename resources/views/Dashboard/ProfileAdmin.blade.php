@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfileAdmin.css')}}">
<script src="{{asset('js/ScriptProfileAdmin.js')}}"></script>


<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <form action="{{url('UpDateAdmin')}}" method="post" id="FormUpdateAdmin" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-5">
                        <div class="picture-container">
                            <div class="picture">
                                <img src="{{ $DataAdmin->image == '' ? asset('image/default-avatar.png') : $DataAdmin->image }}" class="picture-src" id="wizardPicturePreview" title=""/>

                                <input type="file" id="wizard-picture" name="image">
                            </div>

                            <h6>Choisir une photo</h6>
                            <div class="error"></div>
                        </div>
                    </div>
                    <div class="col-md-7 mt-5">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input name="nom" type="text" class="form-control" placeholder="Entrer votre nom" value="{{$DataAdmin->nom}}">
                            <div class="errorNom"></div>
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Entrer votre prénom" value="{{$DataAdmin->prenom}}">
                            <div class="errorPrenom"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Entrer votre email" value="{{$DataAdmin->email}}" readonly>
                            <div class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="motdepasse">Mot de passe</label>
                            <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="Entrer votre mot de passe" value=''>
                            <div class="errorPassword"></div>
                        </div>
                        <div class="form-group">
                            <label for="nouveaumotdepasse">Nouveau mot de passe</label>
                            <input type="password" id="nouveaumotdepasse" name="nouveaumotdepasse" class="form-control" placeholder="Entrer votre nouveau mot de passe ">
                            <div class="error"></div>
                        </div>
                        <div class="form-group">
                            <label for="Cnfnouveaumotdepasse">Confirmer votre mot de passe</label>
                            <input type="password" id="Cnfnouveaumotdepasse" name="Cnfnouveaumotdepasse" class="form-control" placeholder="Confirmer votre mot de passe">
                            <div class="alert ErrorConfirme" role="alert"></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 text-center">
                        <button type="button" class="btn  btn-primary BtnUpdateDataAdmin">Valider</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>





<script>
function displayImage(input) {
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
