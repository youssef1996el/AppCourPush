@extends('layouts.app')
@section('content')
<<<<<<< HEAD
<div class="container" style="margin-top: 7rem">
        <div class="card shadow" style=" width: 800px;margin: auto;padding: 20px 24px; background: #ffffff4a;" >
            <div class="card-body">
                <h3 class="mb-5" style="font-style:italic">Les informations personnelles</h3>
                <form action="{{route('UpdateDataEleve')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="picture-container">
                            <div class="picture">
                                <img src="{{ $DataEleve->image == '' ? asset('image/default-avatar.png') : $DataEleve->image}}" class="picture-src" id="wizardPicturePreview" title=""/>
                                <input type="file" id="wizard-picture" name="image">
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Nom complet</label>
                                <input type="text" class="form-control" placeholder="Nom Complet" name="name" value="{{$DataEleve->name}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">télephone</label>
                                <input type="text" class="form-control" placeholder="Téléphone" name="telephone" value="{{$DataEleve->telephone}}">
                            </div>


                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Email</label>
                                <input type="email" class="form-control" placeholder="Mail" name="email" value="{{$DataEleve->email}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-1">Date naissance</label>
                                <input type="date" class="form-control" placeholder="Date naissance" name="datenaissance" value="{{$DataEleve->datenaissance}}">
                            </div>

                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success  BtnUpdateDataProfesseur" style="display:flex; margin:auto">Valider</button>
                     </div>
                </form>

=======
<div class="container" style="margin-top:65px;">
        <div class="card shadow " style=" width: 600px;
  margin: auto;
  padding: 20px 24px; background: #ffffff5c;" >
            <div class="card-body">
                <h3 class="mb-5" style="font-style:italic; text-align:center">Les informations personnelles</h3>
                <div class="row">
            
                    <div class="col-sm-12 col-md-4 col-xl-4 mt-5">
                      
                        <div class="picture-container">
                            <div class="picture">
                                <img src="" class="picture-src" id="wizardPicturePreview" title=""/>
                                <input type="file" id="wizard-picture" name="image">
                            </div>
                        </div>
                     
                    </div>
                    <div class="col-sm-12 col-md-8 col-xl-8 ">
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Nom complet</label>
                            <input type="text" class="form-control" placeholder="Nom" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Email</label>
                            <input type="email" class="form-control" placeholder="Email" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Pays</label>
                            <select  onchange="print_state('state',this.selectedIndex);" class="form-control countryDropdown" {{-- id="country" --}} name="paysFormation[]" required require></select>
                        </div>
                     
                    </div>
                </div>  
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
>>>>>>> 3dbccc3cd0f01e1d398faa379a517e0bdfc0bea7
            </div>

        </div>
    </div>

    <style>
        #showInputsLink{
            font-weight: bold;
            font-size: 18px;
        }
        *{
            font-family:times;
        }
        .countryDropdown{
            border-bottom: 1px solid #999;
  border: none none gray none;
  border-left: none;
  border-right: none;
  border-top: none;
        }
        .picture-src{
            width: 160px;
  height: 160px;

        }

        .form-control:focus{
            border-bottom:1px solid black !important;
            box-shadow: none;
        }
        .form-control{
        border-radius: 0px;}
        .form-group input {
            padding: 6px 12px;
        }
        .form-control:focus {
            padding: 6px 12px;
        }
        

        .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
 .picture {
  width: 160px;
  height: 160px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  border-radius: 50%;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  margin:auto;
}
.picture:hover {
  border-color: #4479a7;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.hidden-inputs {
      display: none;
    }

.form-group .show-password {
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 70%;
    transform: translateY(-50%);
}


    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type= "text/javascript" src ={{asset('js/countries.js')}} ></script>


    <script>
$(document).ready(function ()
{
    print_country("countryDropdown");
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#wizard-picture").change(function(){
        readURL(this);
    });
    document.getElementById('showInputsLink').addEventListener('click', function() {
    var inputsContainer = document.getElementById('inputsContainer');
    inputsContainer.style.display = (inputsContainer.style.display === 'none' || inputsContainer.style.display === '') ? 'block' : 'none';
  });
  const passwordInputIds = [
    { inputId: "mdpActuelle", eyeId: "actualEye" },
    { inputId: "nouveaumdp", eyeId: "newEye" },
    { inputId: "Confirmermdp", eyeId: "cfrmEye" },
   
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
});
    </script>
@endsection
