@extends('Professeur.Sidebar')
@section('navsidebarProf')
    <div class="container">
        <div class="card shadow" style=" width: 800px;
  margin: auto;
  padding: 20px 24px; background: #ffffff4a;" >
            <div class="card-body">
        
                    <div class="card text-left">
                      <div class="card-body">
                        <h4 class="card-title">Modification de l'education</h4>
                        <button type="button" class="btn btn-primary  BtnAjoutEducationProf float-end" >Ajouter</button>

                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Dernier diplôme</label>
                                    <input type="text" class="form-control" placeholder="Dernier diplôme" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Année d'obtention</label>
                                    <input type="text" class="form-control" placeholder="Année d'obtention" value="">
                                </div>
                                <div class="form-group mb-3">
                                     <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name="paysExperience[]" required require></select>
                                </div>  
                            </div>

                            <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Spécialité</label>
                                    <input type="text" class="form-control" placeholder="Spécialité" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Lycée / Université</label>
                                    <input type="date" class="form-control" placeholder="Lycée / Université" value="">
                                </div>
                                <div class="form-group mb-3">               
                                    <button type="button" class="btn btn-danger BtnSuppEducationProf float-end" >Supprimer</button>
                                </div>

                            </div>
                            <div class="form-group mb-3">               
                                    <button type="button" class="btn btn-success  BtnUpdateEducationProf" style="display:flex; margin:auto">Valider</button>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="card text-left">
                      <div class="card-body">
                        <h4 class="card-title">Modification de l'experience</h4>
                        <button type="button" class="btn btn-primary  BtnAjoutExperienceProf float-end" >Ajouter</button>

                        <div class="row">

                            <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Filière</label>
                                    <input type="text" class="form-control" placeholder="Filière" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Du</label>
                                    <input type="date" class="form-control"  value="">
                                </div>
                                <div class="form-group mb-3">
                                     <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name="paysExperience[]" required require></select>
                                </div>  
                            </div>

                            <div class="col-sm-12 col-md-6 col-xl-6 mt-5">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Lycée / Université</label>
                                    <input type="text" class="form-control" placeholder="Lycée / Université" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Au</label>
                                    <input type="date" class="form-control"  value="">
                                </div>
                                <div class="form-group mb-3">               
                                    <button type="button" class="btn btn-danger BtnSuppExperienceProf float-end" >Supprimer</button>
                                </div>

                            </div>
                            <div class="form-group mb-3">               
                                    <button type="button" class="btn btn-success  BtnUpdateExperienceProf" style="display:flex; margin:auto">Valider</button>
                            </div>
                        </div>
                    </div>
                </div> 
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
