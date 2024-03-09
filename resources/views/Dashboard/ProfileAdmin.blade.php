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
                        <!-- <div class="showInputs ">
                            <a href="#" id="showInputsLink" class="d-flex justify-content-center bold mb-5">Modifier votre mot de passe</a>

                            <div class="hidden-inputs" id="inputsContainer">
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
                        </div> -->
                        <div class="showInputs m-auto mt-5">
                        <a href="#" id="showInputsLink" class="d-flex justify-content-center bold mb-5">Modifier votre mot de passe</a>
                        <div class="hidden-inputs" id="inputsContainer">

                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Mot de passe actuelle</label>
                                <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="Entrer votre mot de passe actuelle" value=''>
                                <i class="fa-solid fa-eye-slash show-password" id="actualEye" ></i>
                                <div class="errorPassword"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Nouveau mot de passe </label>
                                <input type="password" id="nouveaumotdepasse" name="nouveaumotdepasse" class="form-control" placeholder="Entrer votre nouveau mot de passe ">
                                <i class="fa-solid fa-eye-slash show-password" id="newEye" ></i>
                                <div class="error"></div>

                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Confirmer votre mot de passe </label>
                                <input type="password" id="Cnfnouveaumotdepasse" name="Cnfnouveaumotdepasse" class="form-control" placeholder="Confirmer votre mot de passe">
                                <i class="fa-solid fa-eye-slash show-password" id="cfrmEye" ></i>
                                <div class="alert ErrorConfirme" role="alert"></div>
                     
                              
                            </div>
                        </div>
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
    document.getElementById('showInputsLink').addEventListener('click', function()
    {
        var inputsContainer = document.getElementById('inputsContainer');
        inputsContainer.style.display = (inputsContainer.style.display === 'none' || inputsContainer.style.display === '') ? 'block' : 'none';
    });
    const passwordInputIds =
    [
        { inputId: "motdepasse", eyeId: "actualEye" },
        { inputId: "nouveaumotdepasse", eyeId: "newEye" },
        { inputId: "Cnfnouveaumotdepasse", eyeId: "cfrmEye" },

    ];

    passwordInputIds.forEach(function(pair) {
        const passwordInput = document.getElementById(pair.inputId);
        const togglePasswordButton = document.getElementById(pair.eyeId);

        if (passwordInput && togglePasswordButton) {
            togglePasswordButton.addEventListener("click", function () {
                const type = passwordInput.getAttribute("type");
                passwordInput.setAttribute("type", type === "password" ? "text" : "password");

                // Toggle the eye icon
                togglePasswordButton.classList.toggle("fa-eye");
                togglePasswordButton.classList.toggle("fa-eye-slash");
            });
        }
    });
</script>

@endsection
