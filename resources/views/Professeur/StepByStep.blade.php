@extends('layouts.app')

@section('content')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/Step.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iqraa</title>
<div class="container">
    <div class="cardCss ">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3><small><b>CRÉEZ </b> VOTRE PROFILE <br></small></h3>
                </div>

                <div class="steps-content">
                    <h5><i>Étape </i><span class="step-number">1</span></h5>
                    <p class="step-number-content active">Ces informations nous permettront d'en savoir plus sur vous. </p>
                    <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
                    <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                    <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                </div>
                <ul class="progress-bar">
                    <li class="active">informations personnelles</li>
                    <li>Éducation</li>
                    <li>Expériences professionnelles</li>
                    <li>Vos méthodes</li>
                    <li>Certification</li>
                    <li>Cours</li>
                    <li>Disponibilité</li>
                </ul>



            </div>
            <div class="right-side">

                <form action="{{url('StoreData')}}" method="post" id="FormDetailProf" enctype="multipart/form-data">
                    @csrf
                    {{-- Step 1 --}}
                    <div class="main active">
                        <div class="text">
                            <h2>Vos informations personnelles</h2>
                            <p>Saisissez vos informations personnelles pour vous rapprocher des étudiants.</p>
                        </div>
                        <div class="picture-container">
                            <div class="ContentImage ">
                                <img src="{{asset('image/default-avatar.png')}}"  class="picture-src" id="wizardPicturePreview" alt="" width="60px" height="60px" required require >
                                <input type="file" id="wizard-picture" name="image"  require required >
                            </div>
                        </div>
                        <div class="input-text" style="margin-top: 2.5rem;">
                            <div class="input-div">
                                <input type="text" name="titre" required require id="user_name">
                                <span>Titre de votre annonce</span>
                            </div>
                            <div class="input-div">
                                <input type="date" id="DateNaissanceProf" name="datenaissance" require  required>
                                <span class="textDateNaissance">Date de naissance</span>
                            </div>
                        </div>
                        <div class="input-text" style="margin-top: 2.5rem;">
                            <div class="input-div">
                                <input type="text" id="phone" name="phone" required require>
                                <span>Numéro de téléphone</span>
                            </div>

                        </div>
                        <div class="buttons mb-3 mt-3 float-end">
                            <button type="button" class="next_button ">Suivant</button>
                        </div>
                    </div>
                    {{-- End Step 1 --}}

                    {{-- Step 2 --}}
                    <div class="main">
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-xl-10 text">
                                <h2>Education</h2>
                                <p>Informez les étudiants et leurs parents de votre vie éducative.</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-xl-2">
                                <button class="btn btn-secondary float-end " id="AddFormation">Ajouter</button>
                            </div>
                        </div>
                        <div class="HeightEducation ">

                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="diplome[]" >
                                    <span >Dernier diplôme</span>
                                </div>
                                <div class="input-div">
                                    <input type="text" name="Specialise[]" >
                                    <span>Spécialité</span>
                                </div>
                            </div>
                            <div class="input-text" >
                                <div class="input-div">
                                    <input type="text" name="annee[]" >
                                    <span>Année d'obtention</span>
                                </div>
                                <div class="input-div">
                                    <input type="text" name="ecole[]" >
                                    <span>Lycée / Université</span>
                                </div>

                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name="paysFormation[]" ></select>
                                </div>
                            </div>
                            <hr style="border-style: dashed">
                        </div>
                        <div class="buttons button_space float-end">
                            <button type="button" class="back_button">Précédent</button>
                            <button type="button" class="next_button">Suivant</button>
                        </div>
                    </div>
                    {{-- End Stpe 2 --}}

                    {{-- Step 3 --}}
                    <div class="main">

                        <div class="row">
                            <div class="text col-sm-12 col-md-10 col-xl-10">
                                <h2>Expériences professionnelles</h2>
                                <p>Pouvez-vous parler de votre expérience professionnelle passée ?</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-xl-2">
                                <button class="btn btn-secondary float-end " id="AddExperience">Ajouter</button>
                            </div>
                        </div>
                        <div class="heightExperience">
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" name="poste[]" required require>
                                    <span>Filière</span>
                                </div>
                                <div class="input-div">
                                    <input type="text" name="entreprise[]" required require>
                                    <span>Lycée / Université</span>
                                </div>
                            </div>
                            <div class="input-text " style="margin-top: 1rem !important; font-weight:bold;font-size:14px;">
                                <div class="input-div du">
                                    <label style="margin-left: 6px;">Du</label>
                                    <input type="date" name="du[]" required require>
                                    <!-- <span>Du</span> -->
                                    </div>
                                    <div class="input-div au">
                                    <label  style="margin-left: 6px;">Au</label>
                                    <input type="date" name="au[]" required require>
                                    <!-- <span>Au</span> -->
                                    </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name="paysExperience[]" required require></select>
                                </div>
                            </div>
                            <hr style="border-style: dashed">
                        </div>
                        <div class="buttons button_space float-end">
                            <button type="button" class="back_button">Précédent</button>
                            <button type="button" class="next_button">Suivant</button>
                        </div>
                    </div>
                    {{-- End step 3 --}}

                    {{-- Step 4 --}}
                    <div class="main">
                        <div class="text">
                            <h2>Vos méthodes</h2>
                            <p>Vos expériences en cours de soutien et en pédagogie .</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <label for="" class="mb-2">
                                    Plus votre description sera détaillée, plus vous aurez de chances d'avoir des élèves.
                                    Vous pouvez rajouter les résultats et/ou les retours de vos élèves.
                                    Cette présentation sera affichée sur votre profil.
                                </label>
                                <textarea name="methode" id="" cols="65" rows="5" required require></textarea>

                            </div>
                        </div>
                        <div class="buttons button_space mt-3 float-end">
                            <button type="button" class="back_button">Précédent</button>
                            <button type="button" class="next_button">Suivant</button>

                        </div>
                    </div>
                    {{-- End Step 4 --}}

                    {{-- Step 5 --}}
                    <div class="main">
                        <div class="text">
                            <h2>Certification</h2>
                            <p>Veuillez ajouter votre dernier certificat de travail.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <label for="" class="sr-only">Attestation de travail</label>
                                <input type="file" name="attestation" class="form-control">
                            </div>
                        </div>
                        <div class="buttons button_space mt-5 float-end">
                            <button type="button" class="back_button">Précédent</button>
                            <button type="button" class="next_button">Suivant</button>
                        </div>
                    </div>
                    {{-- End Step 5 --}}

                        {{-- Step 6 --}}
                    <div class="main ">
                        <div class="text">
                            <h2>Cours</h2>
                            <p>Quelles sont les cours dans lesquelles vous pouvez aider des élèves ?</p>
                            <h5 style="color:red">Vous devez ajouter au moins un cours ?</h5>
                        </div>
                        <div class="List-Courses">
                            <div class="input-cours">
                                <div class="input-text">
                                    <div class="input-div d-flex" style="gap:12px">
                                        <input type="text" id="input-tag" >
                                        <button type="button" id="AddCours" >Ajouter</button>
                                    </div>

                                </div>

                                <div class="errorCours"></div>
                            </div>
                            <div class="ListeCours" >
                                <div class="tags-input" >
                                    <ul id="tags"></ul>
                                </div>
                            </div>
                        </div>
                        <div class="buttons button_space mt-4 float-end">
                            <button type="button" class="back_button">Précédent</button>
                            <button type="button" class="next_button">Suivant</button>
                        </div>
                    </div>
                    {{-- End Step 6 --}}

                    {{-- Step 7 --}}
                    <div class="main ">
                        <div class="text">
                            <h2>Disponibilité</h2>
                            <p>Quelles sont vos disponibilités pour donner des cours ?</p>
                            <h5 style="color:red">NB. Les cours particuliers coûtent <span class="PricePrive"></span> euros et les cours collectifs coûtent <span class="PriceGroupe"></span> euros</h5>
                        </div>
                        <div class="row rowDays">
                            <div class="days-list">
                                <div class="day-item d-inline ml-2">Lundi</div>
                                <div class="day-item d-inline ml-2">Mardi</div>
                                <div class="day-item d-inline ml-2">Mercredi</div>
                                <div class="day-item d-inline ml-2">Jeudi</div>
                                <div class="day-item d-inline ml-2">Vendredi</div>
                                <div class="day-item d-inline ml-2">Samedi</div>
                                <div class="day-item d-inline ml-2">Dimanche</div>
                            </div>
                            <select class="form-control dropdownTimeZone mt-3 form-select" name="timezone"></select>
                            <br>
                            <div class="card mt-3 shadow">
                              <div class="card-body divHours ">

                              </div>
                            </div>

                        </div>
                        <div class="buttons button_space mt-2 float-end">
                            <button type="button" class="back_button">Précédent</button>
                            <button type="button" class="submit_button finish" >Valider</button>
                        </div>
                    </div>
                    {{-- End Step 7 --}}

                    {{-- Modal Finish --}}
                    <div class="modal fade" tabindex="-1" role="dialog" id="ModalConfirm">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Confirmer la sauvegarde</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous sauvegarder vos donnees personnelles ?*</p>
                                    <input type="checkbox" id="confirmCheckbox">
                                    <label for="confirmCheckbox">Oui, j'accepte </label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary" id="btnSaveData">sauvegarder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type= "text/javascript" src ={{asset('js/countries.js')}} ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/timezones.full.js')}}" ></script>
    <script language="javascript">

        $(document).ready(function ()
        {
            $('.dropdownTimeZone').timezones({
                lang: 'fr'
            });
            // Not add any caracter
            $(document).on('keypress','.DaysDispo',function(event)
            {
                    event.preventDefault();
            });
            // Not Remove any caracter
            $(document).on('keydown','.DaysDispo',function(event)
            {
                if (event.which === 8 || event.which === 46) {
                    event.preventDefault();
                }
            });
            // Get Price By Groupe / Prive
            function GetPrice()
            {
                $.ajax({
                    type: "get",
                    url: "{{url('GetPriceGroupeOrPrive')}}",
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            $('.PricePrive').text(response.Prive[0]['prix']).css('color','red');
                            $('.PriceGroupe').text(response.Groupe[0]['prix']).css('color','red');
                        }
                    }
                });
            }
            GetPrice();


            print_country("countryDropdown");

            $('#AddFormation').on('click',function()
            {
                var lenghtFormFormation =$('.HeightEducation .formFormation').length ;
                if(lenghtFormFormation >=0)
                {
                    $('.HeightEducation').addClass('card ');
                }
                $('.HeightEducation').append(`<div class="formFormation">
                                                <div class="input-text">
                                                    <div class="input-div">
                                                        <input type="text" name="diplome[]" required require>
                                                        <span>Dernier diplôme</span>
                                                    </div>
                                                    <div class="input-div">
                                                        <input type="text"  name="Specialise[]" require required>
                                                        <span>Spécialité</span>
                                                    </div>
                                                </div>
                                                <div class="input-text">
                                                    <div class="input-div">
                                                        <input type="text" name="annee[]" required require>
                                                        <span>Année d'obtention</span>
                                                    </div>
                                                    <div class="input-div">
                                                        <input type="text" name="ecole[]" required require>
                                                        <span>Lycée / Université</span>
                                                    </div>
                                                </div>
                                                <div class="input-text">
                                                    <div class="input-div">
                                                        <select class="countryDropdown" onchange="print_state('state', this.selectedIndex);" name="paysFormation[]" required require></select>
                                                    </div>
                                                    <div class="input-div">
                                                        <button class="btn btn-danger float-end" id="deleteAppend">Supprimer</button>
                                                    </div>
                                                </div>
                                                <hr style="border-style: dashed">
                                            </div>

`);
                                            print_country("countryDropdown");
            });
            $('#AddExperience').on('click', function()
            {
                var lenghtFormExperience =$('.heightExperience .formExperience').length ;
                if(lenghtFormExperience >=0)
                {
                    $('.heightExperience').addClass('card shadow');
                }
                $('.heightExperience').append(`<div class="formExperience">
                                                       <div class="input-text">
                                                            <div class="input-div">
                                                                <input type="text" name="poste[]" required require>
                                                                <span>Filière</span>
                                                            </div>
                                                            <div class="input-div">
                                                                <input type="text" name="entreprise[]" required require>
                                                                <span>Lycée / Université</span>
                                                            </div>
                                                        </div>
                                                        <div class="input-text du" style="margin-top: 1rem !important; font-weight:bold;font-size:14px;">
                                                            <div class="input-div du">
                                                                <label style="margin-left:6px">Du</label>
                                                                <input type="date"  name="du[]" required require>
                                                        </div>
                                                        <div class="input-div au">
                                                                <label style="margin-left:6px">Au</label>
                                                                <input type="date" name="au[]" required require>
                                                            </div>
                                                        </div>
                                                        <div class="input-text">
                                                            <div class="input-div">
                                                                <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name="paysExperience[]" required require></select>
                                                            </div>
                                                            <div class="input-div">
                                                                <button class="btn btn-danger float-end" id="deleteAppend">Supprimer</button>
                                                            </div>
                                                        </div>
                                                        <hr style="border-style: dashed">
                                                </div>
                                                `);
                                                print_country("countryDropdown");
            });

            $(document).on('click', '.formFormation .btn-danger', function() {
                var lenghtFormFormation =$('.HeightEducation .formFormation').length ;
                if(lenghtFormFormation ==1)
                {
                    $('.HeightEducation').removeClass('card ');
                }
                $(this).closest('.formFormation').remove();
            });
            $(document).on('click', '.formExperience .btn-danger', function() {

                var lenghtFormExperience =$('.heightExperience .formExperience').length ;
                if(lenghtFormExperience ==1)
                {
                    $('.heightExperience').removeClass('card shadow');
                }

                $(this).closest('.formExperience').remove();
            });
            function readURL(input)
            {
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

            var totalDays = [];
            $('.day-item').on('click', function ()
            {

                var finalSelect = '';
                var textToAppend = $(this).text();

                totalDays.push(textToAppend);
                var selectedDayCount = totalDays.filter(day => day === textToAppend).length;
                if (selectedDayCount > 3)
                {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Le nombre maximum de créneaux disponibles pour " + textToAppend + " est de 3.",
                        footer: '<a href="#">Why do I have this issue?</a>'
                    });
                    /* alert("Maximum available slots for " + textToAppend + " is 3."); */
                    // Remove the last occurrence of the selected day to stay within the limit
                    totalDays.pop();
                    return;
                }

                $.ajax({
                    type: "get",
                    url: "{{url('getCoursByProf')}}",
                    dataType: "json",
                    success: function (response)
                    {
                        if (response.status == 200)
                        {
                            finalSelect = '<select id="day-type" name="courByDate[]" class="form-select" >';
                            $.each(response.data, function (index, value) {
                                finalSelect += '<option value="' + value.id + '">' + value.title + '</option>';
                            });
                            finalSelect += '</select>';
                            $('.divHours').append(`<div class="FormDisponibilite">
                                <div class="row g-0">

                                    <div class="col-sm-11 col-md-11 col-xl-11">
                                        <input  type="text" name="days[]" class="DaysDispo" value="${textToAppend}" style="text-align: center;border: none;font-size: 22px;font-weight: bold;background: #3047671a;border-radius: 0px;">
                                    </div>
                                    <div class=col-sm-1 col-md-1 col-xl-1 ">
                                        <svg height="30" width="30" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; cursor: pointer;margin-left: 12px;" class="RemoveFormDisponiblite">
                                            <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                            <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                        </svg>
                                    </div>
                                </div>

                                <div class="row mt-3 text-center">
                                    <div class="col-sm-12 col-md-4 col-xl-4 mt-2">
                                        <label for="" style="white-space: nowrap">Choisir un cours</label>
                                        ${finalSelect}
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-xl-4 mt-2">
                                        <label for="">Groupe/Privé</label>
                                        <div class="radio-inputs">
                                            <label>
                                                <input class="radio-input" value="groupe" type="checkbox" name="typeCours[]">
                                                    <span class="radio-tile">
                                                        <span class="radio-icon">
                                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                                <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                            </svg>
                                                        </span>
                                                    </span>
                                            </label>
                                            <label>
                                                <input checked class="radio-input" value="prive" type="checkbox" name="typeCours[]">
                                                <span class="radio-tile">
                                                    <span class="radio-icon">
                                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                                            <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                                        </svg>
                                                    </span>

                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-xl-2 mt-2">
                                        <label for="">Début</label>
                                        <input type="time" name="heuredebut[]" class="form-control heuredebut">
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-xl-2 mt-2">
                                        <label for="">Fin</label>
                                        <input type="time" name="heurefin[]" class="form-control heurefin">
                                    </div>

                                </div>
                                <hr style="border-style: dashed">
                            </div>`);
                        }
                    }
                });
            });

            $(document).on('change','.FormDisponibilite .radio-input',function()
            {
                var checkboxes = $(this).closest('.FormDisponibilite').find('.radio-input');
                checkboxes.not(this).prop('checked', false);
            });
            $(document).on('click','.FormDisponibilite .RemoveFormDisponiblite',function()
            {
                $(this).closest('.FormDisponibilite').remove();

            });
            // get Cours By Professeur
            function GetCoursProfSession()
            {
                const $tags = $('#tags');
                $tags.empty();
                $.ajax({
                    type: "get",
                    url: "{{url('getCoursByProf')}}",
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 200) {
                            if(response.data.length == 0)
                            {
                                $('.tags-input').css('display','none');
                            }
                            else
                            {
                                $('.tags-input').css('display','block');
                            }
                            $.each(response.data, function (index, value)
                            {

                                const $tag = $('<li></li>');


                                $tag.text(value.title);


                                $tag.append('<button type="button" class="delete-button" value=' + value.id + '>X</button>');


                                $tags.append($tag);
                            });
                        }
                    }
                });
            }
            GetCoursProfSession();
            // add cours
            const $tags = $('#tags');
            const $input = $('#input-tag');
            $('#AddCours').on('click',function(event)
            {
                event.preventDefault();
                const $tag = $('<li></li>');
                const tagContent = $input.val().trim();
                if (tagContent !== '')
                {
                    $.ajax({
                        type: "post",
                        url: "{{url('StoreCoursProf')}}",
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data:
                        {
                            nameCours : tagContent,
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                $('.tags-input').css('display','block');
                                $.each(response.data, function (index, value)
                                {
                                    $tag.text(value.title);
                                    $tag.append('<button type="button" class="delete-button" value='+value.id+'>X</button>');
                                    $tags.append($tag);
                                });
                                $input.val('');

                            }
                            if(response.status == 400)
                            {
                                $('.errorCours').text('cours déja existe');
                                $input.val('');
                            }
                        }
                    });
                }
            });
            // Add Cours By click Entre
            $input.on('keydown', function (event) {
                if (event.key === 'Enter')
                {
                    $('.errorCours').empty();
                    event.preventDefault();
                    const $tag = $('<li></li>');
                    const tagContent = $input.val().trim();
                    if (tagContent !== '')
                    {
                        $.ajax({
                            type: "post",
                            url: "{{url('StoreCoursProf')}}",
                            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                            data:
                            {
                                nameCours : tagContent,
                            },
                            dataType: "json",
                            success: function (response)
                            {

                                if(response.status == 200)
                                {
                                    $('.tags-input').css('display','block');
                                    $.each(response.data, function (index, value)
                                    {
                                        $tag.text(value.title);
                                        $tag.append('<button type="button" class="delete-button" value='+value.id+'>X</button>');
                                        $tags.append($tag);

                                    });
                                    $input.val('');

                                }
                                if(response.status == 400)
                                {
                                    $('.errorCours').text('cours déja existe');
                                    $input.val('');
                                }
                            }
                        });

                    }
                }
            });
            // Delete Cours By Prof
            $tags.on('click', '.delete-button', function ()
            {
                $.ajax({
                    type: "post",
                    url: "{{url('DestroyCoursProf')}}",
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data:
                    {
                        idCours : $(this).attr('value'),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            GetCoursProfSession();
                            $(this).parent().remove();
                        }
                    }
                });

            });
            // Disabled future Date naissance
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('DateNaissanceProf').setAttribute('max', today);
            $('.finish').on('click',function()
            {
                $('#ModalConfirm').modal("show");
            });

            $('#FormDetailProf').on('submit',function(e)
            {

                e.preventDefault();
                if(!$('#confirmCheckbox').is(':checked'))
                {
                    alert('Please confirm before proceeding.');
                }
                else
                {
                    this.submit();
                }
            });
            $('#phone').on('input', function()
            {
                var inputValue = $(this).val();
                var numericValue = inputValue.replace(/[^0-9+]/g, '');
                $(this).val(numericValue);
            });
            // set value time just hours without minutes
            $(document).on('input', '.heuredebut, .heurefin', function(e) {
                let hour = $(this).val().split(':')[0];
                $(this).val(`${hour}:00`);
            });

        });
    </script>









    <script>


        var next_click=document.querySelectorAll(".next_button");
        var main_form=document.querySelectorAll(".main");
        var step_list = document.querySelectorAll(".progress-bar li");
        var num = document.querySelector(".step-number");
        let formnumber=0;

        next_click.forEach(function(next_click_form){
            next_click_form.addEventListener('click',function(){
                if(!validateform()){
                    return false
                }
            formnumber++;
            updateform();
            progress_forward();
            contentchange();
            });
        });

        var back_click=document.querySelectorAll(".back_button");
        back_click.forEach(function(back_click_form){
            back_click_form.addEventListener('click',function(){
            formnumber--;
            updateform();
            progress_backward();
            contentchange();
            });
        });

        var username=document.querySelector("#user_name");
        var shownname=document.querySelector(".shown_name");


        var submit_click=document.querySelectorAll(".submit_button");
        submit_click.forEach(function(submit_click_form){
            submit_click_form.addEventListener('click',function(){
            shownname.innerHTML= username.value;
            formnumber++;
            updateform();
            });
        });

        var heart=document.querySelector(".fa-heart");
        heart.addEventListener('click',function(){
        heart.classList.toggle('heart');
        });


        var share=document.querySelector(".fa-share-alt");
        share.addEventListener('click',function(){
        share.classList.toggle('share');
        });



        function updateform(){
            main_form.forEach(function(mainform_number){
                mainform_number.classList.remove('active');
            })
            main_form[formnumber].classList.add('active');
        }

        function progress_forward(){
            // step_list.forEach(list => {

            //     list.classList.remove('active');

            // });


            num.innerHTML = formnumber+1;
            step_list[formnumber].classList.add('active');
        }

        function progress_backward(){
            var form_num = formnumber+1;
            step_list[form_num].classList.remove('active');
            num.innerHTML = form_num;
        }

        var step_num_content=document.querySelectorAll(".step-number-content");

        function contentchange(){
            step_num_content.forEach(function(content){
                content.classList.remove('active');
                content.classList.add('d-none');
            });
            step_num_content[formnumber].classList.add('active');
        }


        function validateform(){
            validate=true;
            var validate_inputs =document.querySelectorAll(".main.active input ");
            var validate_selects =document.querySelectorAll(".main.active select ");
            var validate_textarea =document.querySelectorAll(".main.active textarea ");
            var validate_tags = document.querySelectorAll(".main .ListeCours #tags li");

            validate_inputs.forEach(function(vaildate_input){
                vaildate_input.classList.remove('warning');
                if(vaildate_input.hasAttribute('require')){
                    if(vaildate_input.value.length==0){

                        validate=false;
                        vaildate_input.classList.add('warning');

                    }

                }
            });
           if(validate == false)
           {
                setTimeout(function() {
                    validate_inputs.forEach(function(validate_input){

                        if (validate_input.hasAttribute('require')) {
                            if (validate_input.type === 'file') {
                                if (validate_input.files.length == 0) {
                                    validate_input.closest('.ContentImage').classList.add('warning');
                                } else {
                                    validate_input.closest('.ContentImage').classList.remove('warning');
                                }
                            } else if (validate_input.value.length == 0) {
                                validate_input.closest('.ContentImage').classList.add('warning');
                            } else {
                                validate_input.closest('.ContentImage').classList.remove('warning');
                            }
                        }
                    });
                }, 100);
           }

           validate_textarea.forEach(function(vaildate_textarea) {
                vaildate_textarea.classList.remove('warning');
                if(vaildate_textarea.hasAttribute('require')){
                    if(vaildate_textarea.value.length==0){

                        validate=false;
                        vaildate_textarea.classList.add('warning');

                    }

                }
            });
            validate_selects.forEach(function(validate_select){
                validate_select.classList.remove('warning');
                if(validate_select.hasAttribute('require')){
                    if(validate_select.value.length==0){
                        validate=false;
                        validate_select.classList.add('warning');
                        /* validate_select.closest('.ContentImage').classList.add('warning'); */
                    }
                }
            });

            if (validate_tags.length == 0)
            {
                validate = false;
                document.querySelector(".ListeCours").classList.add('warning');
            }
            else
            {
                document.querySelector(".ListeCours").classList.remove('warning');
            }

            return validate;



        }
    </script>
</div>
@endsection
