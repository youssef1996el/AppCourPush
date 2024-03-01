@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleExpEducation.css')}}">
<script src="{{asset('js/countries.js')}}"></script>
<div class="container">
    <div class="card shadow" style=" margin: auto; background: #ffffff4a;" >
        <div class="card-body">
            <h4 class="card-title mt-3">Modification de l'education</h4>
            <div class="d-flex justify-content-end  mb-3">
                <button type="button" class="btn btn-primary  BtnAjoutEducationProf " >Ajouter</button>
            </div>
            <div class="card text-left">
                <div class="card-body cardForm">
                    <form action="{{url('UpdateFormation')}}" method="post" id="SubmitFormFormation">
                        @csrf
                        <input type="text" name="IdFormation" class="" value="{{$idFormation}}" hidden>
                        <div class="HeightEduction ">

                            @foreach ($Formation as $key => $item)
                                <div class="row education-row">
                                    <div class="FormEduction row m-auto mt-3">

                                        <div class="col-sm-12 col-md-6 col-xl-6  ">
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Dernier diplôme</label>
                                                <input type="text" class="form-control diplome" name="diplome[]" placeholder="Dernier diplôme" value="{{$item->diplome}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Année d'obtention</label>
                                                <input type="text" class="form-control annee" name="annee[]" placeholder="Année d'obtention" value="{{$item->annee}}">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Pays</label>
                                                <select name="pays[]" class="form-select pays" id="">
                                                    <option value="{{$item->pays}}">{{$item->pays}}</option>
                                                    @foreach ($country_arr as $country)
                                                        <option value="{{$country}}">{{$country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-xl-6  ">
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Spécialité</label>
                                                <input type="text" class="form-control specialise" name="specialise[]" placeholder="Spécialité" value="{{$item->specialise}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Lycée / Université</label>
                                                <input type="text" name="ecole[]" class="form-control ecole" placeholder="Lycée / Université" value="{{$item->ecole}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <button type="button" class="btn btn-danger BtnSuppEducationProf float-end" data-value="{{$item->id}}">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                            <div class="form-group mb-3 form-groupEducation mt-5">
                                <button type="button" class="btn btn-success  BtnUpdateEducationProf" style="display:flex; margin:auto">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mt-5" style=" margin: auto; background: #ffffff4a;" >
        <div class="card-body ">
            <h4 class="card-title mt-3">Modification de l'experience</h4>
                <div class="d-flex justify-content-end  mb-3">
                    <button type="button" class="btn btn-primary  BtnAjoutExperienceProf " >Ajouter</button>
                </div>
            <div class="card text-left">
                <div class="card-body cardEx">
                    <form action="{{url('UpdateExperince')}}" method="post" id="SubmitFormExperience">
                        @csrf
                        <input type="text" name="IdExperince" class="" value="{{$idExperince}}" hidden>
                        <div class="HeightExperince">
                            @foreach ($Experince as $key => $item)
                                <div class="row Experince-row">
                                    <div class="FormExperince row mt-3 m-auto">

                                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Filière</label>
                                                <input type="text" name="poste[]" class="form-control" placeholder="Filière" value="{{$item->poste}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Du</label>
                                                <input type="date" name="du[]" class="form-control"  value="{{$item->du}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Pays</label>
                                                <select class="select-form"  name="paysExperience[]" >
                                                    <option value="{{$item->pays}}">{{$item->pays}}</option>
                                                    @foreach ($country_arr as $country)
                                                        <option value="{{$country}}">{{$country}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-xl-6 ">
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Lycée / Université</label>
                                                <input type="text" name="entreprise[]" class="form-control" placeholder="Lycée / Université" value="{{$item->entreprise}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="mb-1">Au</label>
                                                <input type="date" name="au[]" class="form-control"  value="{{$item->au}}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <button type="button" class="btn btn-danger BtnSuppExperienceProf float-end" data-value="{{$item->id}}">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($key != count($Experince) - 1)
                                        <hr class="lineeduform mb-4 mt-4">
                                    @endif



                                </div>
                            @endforeach
                            <div class="form-group mb-3 form-groupExperince mt-5">
                                <button type="button" class="btn btn-success  BtnUpdateExperienceProf" style="display:flex; margin:auto">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function ()
{
    /* print_country("countryDropdown"); */
        var inputNameToCheck = 'diplome[]';


        var hasEmpty = false;


        if (hasInputWithName(inputNameToCheck))
        {
            hasEmpty = true;
            $('.BtnUpdateEducationProf').css('display', 'block');
            $('.HeightEduction').css('display', 'block');


        } else
        {
            hasEmpty = false;
            AppEndFormation();

        }

        function hasInputWithName(inputName) {
            return $('[name="' + inputName + '"]').length > 0;
        }
        /////////////////////
        var inputNameToCheckFilier = 'poste[]';
        var hasEmptyExperience = false;
        if(hasInputWithNameFilier(inputNameToCheckFilier))
        {
            hasEmptyExperience = true;
            $('.BtnUpdateExperienceProf').css('display', 'block');
            $('.HeightExperince').css('display', 'block');


        }
        else
        {
            hasEmpty = false;
            AppEndExperince();

        }




        function hasInputWithNameFilier(inputNamee)
        {
            return $('[name="' + inputNamee + '"]').length > 0;
        }

        // Delete Education
       $(document).on('click','.BtnSuppEducationProf',function()
        {
            Swal.fire({
                title: "Êtes-vous sûr ?",
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, supprimez-le !"
            }).then((result) => {
                if (result.isConfirmed)
                {
                    Swal.fire({
                        title: "Supprimé !",
                        text: "Votre fichier a été supprimé.",
                        icon: "success"
                    });
                    $.ajax({
                        type: "post",
                        url: "{{url('DeleteFormationPro')}}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data:
                        {
                            id : $(this).attr('data-value'),
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                location.reload();
                            }
                        }
                    });
                }
            });

        });
        // Delete Experince from DataBase
        $(document).on('click','.BtnSuppExperienceProf',function()
        {
            Swal.fire({
                title: "Êtes-vous sûr ?",
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, supprimez-le !"
            }).then((result) => {
                if (result.isConfirmed)
                {
                    Swal.fire({
                        title: "Supprimé !",
                        text: "Votre fichier a été supprimé.",
                        icon: "success"
                    });
                    $.ajax({
                        type: "post",
                        url: "{{url('DeleteExperincePro')}}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data:
                        {
                            id : $(this).attr('data-value'),
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                location.reload();
                            }
                        }
                    });
                }
            });
        });
        // Add Education
        function AppEndFormation()
        {
            var newEducationForm = $(`<div class="FormEduction">
                                            <div class="row education-row mt-3 m-auto">
                                                <div class="col-sm-12 col-md-6 col-xl-6 ">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-1">Dernier diplôme</label>
                                                        <input type="text" class="form-control" name="diplome[]" placeholder="Dernier diplôme" >
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-1">Année d'obtention</label>
                                                        <input type="text" class="form-control" name="annee[]" placeholder="Année d'obtention" >
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-1">Pays</label>
                                                        <select class="countryDropdown" onchange="print_state('state', this.selectedIndex);" name="pays[]" required require></select>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-xl-6">
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-1">Spécialité</label>
                                                        <input type="text" class="form-control" name="specialise[]" placeholder="Spécialité" >
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="" class="mb-1">Lycée / Université</label>
                                                        <input type="text" name="ecole[]" class="form-control" placeholder="Lycée / Université" >
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <button type="button" class="btn btn-danger BtnDeleteThisAppend float-end" >Supprimer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`);
                                        newEducationForm.insertBefore('.form-groupEducation');
                                        print_country("countryDropdown");
        }
        $('.BtnAjoutEducationProf').on('click', function () {


            if($(".HeightEduction").find(".FormEduction").length == 0)
            {
                AppEndFormation();
            }
            else
            {
                $('<div class="FormEduction">\
                <hr class="lineeduform mb-4 mt-4">\
                    <div class="row education-row mt-3 m-auto">\
                        <div class="col-sm-12 col-md-6 col-xl-6 ">\
                            <div class="form-group mb-3">\
                                <label for="" class="mb-1">Dernier diplôme</label>\
                                <input type="text" class="form-control" name="diplome[]" placeholder="Dernier diplôme">\
                            </div>\
                            <div class="form-group mb-3">\
                                <label for="" class="mb-1">Année d\'obtention</label>\
                                <input type="text" class="form-control" name="annee[]" placeholder="Année d\'obtention">\
                            </div>\
                            <div class="form-group mb-3">\
                                <label for="" class="mb-1">Pays</label>\
                                <select class="countryDropdown" onchange="print_state(\'state\', this.selectedIndex);" name="pays[]" required require></select>\
                            </div>\
                        </div>\
                        <div class="col-sm-12 col-md-6 col-xl-6">\
                            <div class="form-group mb-3">\
                                <label for="" class="mb-1">Spécialité</label>\
                                <input type="text" class="form-control" name="specialise[]" placeholder="Spécialité">\
                            </div>\
                            <div class="form-group mb-3">\
                                <label for="" class="mb-1">Lycée / Université</label>\
                                <input type="text" name="ecole[]" class="form-control" placeholder="Lycée / Université">\
                            </div>\
                            <div class="form-group mb-3">\
                                <button type="button" class="btn btn-danger BtnDeleteThisAppend float-end">Supprimer</button>\
                            </div>\
                        </div>\
                    </div>\
                </div>').insertAfter('.FormEduction:last');
                print_country("countryDropdown");
            }

        });
        // function AppEndExperince
        function AppEndExperince()
        {
            var newExperinceForm = $(`<div class="FormExperince">
                                        <div class="row Experince-row mt-3 m-auto">
                                            <div class="col-sm-12 col-md-6 col-xl-6 ">
                                                <div class="form-group mb-3">
                                                    <label for="" class="mb-1">Filière</label>
                                                    <input type="text" name="poste[]" class="form-control" placeholder="Filière" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="" class="mb-1">Du</label>
                                                    <input type="date" name="du[]" class="form-control"  >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Pays</label>
                                                    <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown select-form" {{-- id="country" --}} name="paysExperience[]" required require>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-xl-6 ">
                                                <div class="form-group mb-3">
                                                    <label for="" class="mb-1">Lycée / Université</label>
                                                    <input type="text" name="entreprise[]" class="form-control" placeholder="Lycée / Université" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="" class="mb-1">Au</label>
                                                    <input type="date" name="au[]" class="form-control"  >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <button type="button" class="btn btn-danger BtnDeleteThisExperince float-end" >Supprimer</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>`);
                                        newExperinceForm.insertBefore('.form-groupExperince');
                                        print_country("countryDropdown");
        }
        // Btn Ajouter Experince
        $('.BtnAjoutExperienceProf').on('click',function()
        {
            if($(".HeightExperince").find(".FormExperince").length == 0)
            {
                AppEndExperince();
            }
            else
            {
                $(`<div class="FormExperince ">
                    <hr class="lineeduform mb-4 mt-4">\
                        <div class="row Experince-row mt-3 m-auto">
                            <div class="col-sm-12 col-md-6 col-xl-6 ">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Filière</label>
                                    <input type="text" name="poste[]" class="form-control" placeholder="Filière" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Du</label>
                                    <input type="date" name="du[]" class="form-control"  >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Pays</label>
                                    <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown select-form" {{-- id="country" --}} name="paysExperience[]" required require>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 ">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Lycée / Université</label>
                                    <input type="text" name="entreprise[]" class="form-control" placeholder="Lycée / Université" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="mb-1">Au</label>
                                    <input type="date" name="au[]" class="form-control"  >
                                </div>
                                <div class="form-group mb-3">
                                    <button type="button" class="btn btn-danger BtnDeleteThisExperince float-end" >Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>`).insertAfter('.FormExperince:last');
                    print_country("countryDropdown");
            }
        });

        $(document).on('click','.FormEduction .BtnDeleteThisAppend',function()
        {
            var length = $('.HeightEduction .FormEduction').length;
            if(length == 1)
            {
                Swal.fire({
                    icon: "erreur",
                    title: "Oops...",
                    text: "Quelque chose s'est mal passé !",
                    footer: '<a href="#">Pourquoi est-ce que j\'ai ce problème ?</a>'
                });
            }
            else
            {
                $(this).closest('.FormEduction').remove();
            }

        });
        // btn btn delete Append Experince
        $(document).on('click','.FormExperince .BtnDeleteThisExperince',function()
        {
            var length = $('.HeightExperince .FormExperince').length;
            if(length == 1)
            {
                Swal.fire({
                    icon: "erreur",
                    title: "Oops...",
                    text: "Quelque chose s'est mal passé !",
                    footer: '<a href="#">Pourquoi est-ce que j\'ai ce problème ?</a>'
                });
            }
            else
            {
                $(this).closest('.FormExperince').remove();
            }
        });
        // Update Education or Add Eduction
        $('.BtnUpdateEducationProf').on('click',function()
        {
            $(".form-control").removeClass("border border-danger");
            var isValid = true;
            $(".education-row").each(function() {
                // Find input fields within the current row
                var inputs = $(this).find(".form-control");
                var select = $(this).find(".countryDropdown");


                inputs.each(function() {
                    if ($(this).val().trim() === "") {

                        $(this).addClass("border border-danger");
                        isValid = false;
                    }
                });

                // Check if the selected option is "choisissez le pays"
                if (select.find("option:selected").text().trim() === "choisissez le pays") {
                    select.addClass("border border-danger");
                    isValid = false;

                }
                else
                {
                    select.removeClass("border border-danger");
                }
            });
            if (isValid)
            {
                var content = $('.FormEduction').text();
                Swal.fire({
                    title: "Voulez-vous sauvegarder les changements ?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Sauvegarder",
                    denyButtonText: `Ne pas sauvegarder`
                }).then((result) => {

                    if (result.isConfirmed)
                    {
                        Swal.fire("Enregistré!", "", "success");

                        $('#SubmitFormFormation').submit();

                        this.submit();
                    }
                    else if (result.isDenied)
                    {
                        Swal.fire("Les modifications ne sont pas enregistrées.", "", "info");
                    }
                });
            }

        });
        // btn Valide Experince
        $('.BtnUpdateExperienceProf').on('click',function()
        {
            $(".form-control").removeClass("border border-danger");
            var isValid = true;
            $(".Experince-row").each(function() {
                // Find input fields within the current row
                var inputs = $(this).find(".form-control");
                var select = $(this).find(".select-form");


                inputs.each(function() {
                    if ($(this).val().trim() === "") {

                        $(this).addClass("border border-danger");
                        isValid = false;
                    }
                });

                // Check if the selected option is "choisissez le pays"
                if (select.find("option:selected").text().trim() === "choisissez le pays") {
                    select.addClass("border border-danger");
                    isValid = false;

                }
                else
                {
                    select.removeClass("border border-danger");
                }
            });
            if (isValid)
            {

                Swal.fire({
                    title: "Voulez-vous sauvegarder les changements ?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Sauvegarder",
                    denyButtonText: `Ne pas sauvegarder`
                }).then((result) => {

                    if (result.isConfirmed)
                    {
                        Swal.fire("Enregistré!", "", "success");

                        $('#SubmitFormExperience').submit();

                    }
                    else if (result.isDenied)
                    {
                        Swal.fire("Les modifications ne sont pas enregistrées.", "", "info");
                    }
                });
            }
        });
        function readURL(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();

                reader.onload = function (e)
                {
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
