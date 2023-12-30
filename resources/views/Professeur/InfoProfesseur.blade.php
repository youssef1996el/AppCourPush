@extends('Professeur.Sidebar')
@section('navsidebarProf')
    <div class="container">
        <div class="card shadow" style=" width: 800px;
  margin: auto;
  padding: 20px 24px; background: #ffffff4a;" >
            <div class="card-body">
                <h3 class="mb-5" style="font-style:italic">Les informations personnelles</h3>
                <div class="row">
                    <div class="picture-container">
                        <div class="picture">
                            <img src="{{ $DataProfesseur->image == '' ? asset('image/default-avatar.png') : $DataProfesseur->image}}" class="picture-src" id="wizardPicturePreview" title=""/>
                            <input type="file" id="wizard-picture" name="image">
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Nom complet</label>
                            <input type="text" class="form-control" placeholder="nom" value="{{$DataProfesseur->nom}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">télephone</label>
                            <input type="text" class="form-control" placeholder="Prénom" value="{{$DataProfesseur->telephone}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Titre</label>
                            <input type="text" class="form-control" placeholder="nom" value="{{$DataProfesseur->title}}">
                        </div>  
                     
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Email</label>
                            <input type="email" class="form-control" placeholder="nom" value="{{$DataProfesseur->email}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Date naissance</label>
                            <input type="date" class="form-control" placeholder="Prénom" value="{{$DataProfesseur->datenaissance}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Méthode</label>
                            <textarea name="" id="" class="form-control"  rows="3">{{$DataProfesseur->description}}</textarea>
                        <div>
                    </div>
                </div> 
            </div>
            <div class="mt-5">
               <button type="button" class="btn btn-success  BtnUpdateDataProfesseur" style="display:flex; margin:auto">Valider</button>
            </div>
        </div>
    </div>

    <style>
        *{
            font-family:times;
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


    </style>

    <script>
$(document).ready(function ()
{

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
});
    </script>
@endsection
