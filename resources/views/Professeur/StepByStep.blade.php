<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>

    <div class="containerCss">

        <div class="cardCss">
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
                                <div class="ContentImage">
                                    <img src="{{asset('image/default-avatar.png')}}"  class="picture-src" id="wizardPicturePreview" alt="" width="60px" height="60px" required require >
                                    <input type="file" id="wizard-picture" name="image" required require > 
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
                            <div class="buttons mt-3">
                                <button type="button" class="next_button">Suivant</button>
                            </div>
                        </div>
                        {{-- End Step 1 --}}

                        {{-- Step 2 --}}
                        <div class="main">
                            <div class="row">
                                <div class="col-sm-12 col-md-10 col-xl-10">
                                    <h2>Éducation</h2>
                                    <p>Informez les étudiants et leurs parents de votre vie éducative.</p>
                                </div>
                                <div class="col-sm-12 col-md-2 col-xl-2">
                                    <button class="btn btn-secondary float-end " id="AddFormation">Ajouter</button>
                                </div>
                            </div>
                            <div class="HeightEducation ">
                                
                                <div class="input-text">
                                    <div class="input-div">
                                        <input type="text" name="diplome[]" required require>
                                        <span>Dernier diplôme</span>
                                    </div>
                                    <div class="input-div">
                                        <input type="text" name="Specialise[]" require required>
                                        <span>Spécialité</span>
                                    </div>
                                </div>
                                <div class="input-text" style="margin-top: 2.5rem;">
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
                                        <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name="paysFormation[]"></select>
                                    </div>
                                </div>
                                <hr style="border-style: dashed">
                            </div>
                            <div class="buttons button_space">
                                <button type="button" class="back_button">Précédent</button>
                                <button type="button" class="next_button">Suivant</button>
                            </div>
                        </div>
                        {{-- End Stpe 2 --}}

                        {{-- Step 3 --}}
                        <div class="main">

                            <div class="row">
                                <div class="col-sm-12 col-md-10 col-xl-10">
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
                                    <div class="input-div">
                                        <label style="margin-left: 6px;">Du</label>
                                        <input type="date" name="du[]" required require>
                                        <!-- <span>Du</span> -->
                                     </div>
                                     <div class="input-div">
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
                            <div class="buttons button_space">
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
                            <div class="buttons button_space">
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
                            <div class="buttons button_space">
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
                            </div>
                            <div class="List-Courses">
                                <div class="input-cours">
                                    <div class="input-text">
                                        <div class="input-div" class="d-flex">

                                            <input type="text" id="input-tag">
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
                            <div class="buttons button_space mt-3">
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
                                <br>
                                <div class="divHours">

                                </div>
                            </div>
                            <div class="buttons button_space">
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
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title">Confirmer la sauvegarde</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Acceptez-vous nos conditions générales ? Cette question est requise *</p>
                                        <input type="checkbox" id="confirmCheckbox">
                                        <label for="confirmCheckbox">J'accepte </label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary" id="btnSaveData">sauvegarder</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type= "text/javascript" src ={{asset('js/countries.js')}} ></script>

    <script language="javascript">

        $(document).ready(function ()
        {
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
                    $('.HeightEducation').addClass('card shadow');
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
                                                <div class="input-text" style="margin-top: 2.5rem;">
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
                                                        <select class="countryDropdown" onchange="print_state('state', this.selectedIndex);" name="paysFormation[]"></select>
                                                    </div>
                                                    <div class="input-div">
                                                        <button class="btn btn-danger float-end">Supprimer</button>
                                                    </div>
                                                </div>
                                               
                                                <hr style="border-style: dashed">
                                            </div>`);
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
                                                        <div class="input-text" style="margin-top: 1rem !important; font-weight:bold;font-size:14px;">
                                                            <div class="input-div">
                                                                <label style="margin-left:6px">Du</label>
                                                                <input type="date"  name="du[]" required require>
                                                        </div>
                                                        <div class="input-div">
                                                                <label style="margin-left:6px">Au</label>
                                                                <input type="date" name="au[]" required require>
                                                            </div>
                                                        </div>
                                                        <div class="input-text">
                                                            <div class="input-div">
                                                                <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name="paysExperience[]" required require></select>
                                                            </div>
                                                            <div class="input-div">
                                                                <button class="btn btn-danger float-end">Supprimer</button>
                                                            </div>
                                                        </div>

                                                    <hr style="border-style: dashed">
                                                </div>`);
                                                print_country("countryDropdown");
            });

            $(document).on('click', '.formFormation .btn-danger', function() {
                var lenghtFormFormation =$('.HeightEducation .formFormation').length ;
                if(lenghtFormFormation ==1)
                {
                    $('.HeightEducation').removeClass('card shadow');
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


            $('.day-item').on('click', function () {
                var finalSelect = '';
                var textToAppend = $(this).text();
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
                                        <input  type="text" name="days[]" class="DaysDispo" value="${textToAppend}" style="text-align: center;
  border: none;
  font-size: 22px;
  font-weight: bold;
  
  background: #3047671a;
 
  border-radius: 0px;">
                                    </div>
                                    <div class=col-sm-1 col-md-1 col-xl-1 ">
                                        <svg height="30" width="30" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; cursor: pointer;margin-left: 12px;" class="RemoveFormDisponiblite">
                                            <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                            <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                        </svg>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-3 col-xl-3">
                                        <label for="" style="white-space: nowrap">Choisir un cours</label>
                                        ${finalSelect}
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-xl-3">
                                        <label for="">Groupe / Privé</label>
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
                                    <div class="col-sm-12 col-md-3 col-xl-3">
                                        <label for="">Heure de début</label>
                                        <input type="time" name="heuredebut[]" class="form-control heuredebut">
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-xl-3">
                                        <label for="">Heure de fin</label>
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

    <style>
        .activeRadio
        {
            background: #0d6efd;
        }
        .activeIcon
        {
            color: white
        }
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
        .days-list
        {
            display: contents;
            justify-content: space-around;
            margin: 0px 30px;
        }
        .day-item
        {
            font-size: 18px;
            padding: 5px 10px;
            background-color: #304767;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
            flex-grow: 1;
            max-width: calc(21.333% - 10px);
        }


        .day-item:hover
        {
            background-color: #3b5170;
        }
        .divHours
        {
            border: 2px solid #304767;
            border-radius: 20px;
            height: 200px;
            overflow: auto;
                overflow-x: auto;
            margin: 12px 0px 0 -18px;
                margin-bottom: 0px;
            padding: 30px 12px;
            margin-bottom: 7px;
            overflow-x: clip;
            min-width: 530px;
        }
        .divHours label
        {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
        }
        @media (max-width: 768px) {
            .days-list {
                flex-direction: column;
            }

            .day-item {
                max-width: 100%;
            }
        }
        /*********** */
        *{
            padding:0;
            margin:0;
            font-family:times;
        }
        .containerCss{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background-color:#eee;
        }
        .containerCss .cardCss{
            height: 540px;
            width: 830px;
            background-color: #fff;
            position: relative;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            font-family: 'Poppins', sans-serif;
            border-radius: 20px;
        }
        .containerCss .cardCss .form{
            width:100%;
            height:100%;

            display:flex;
        }
        .containerCss .cardCss .left-side{
            width:35%;
            background-color:#304767;
            height:100%;
        border-top-left-radius:20px;
        border-bottom-left-radius:20px;
        padding:20px 30px;
        box-sizing:border-box;

        }
/*left-side-start*/
.left-heading{
    color:#fff;

}
.steps-content{
    /* margin-top:30px; */
    color:#fff;
}
.steps-content p{
    font-size:12px;
    margin-top:15px;
}
.progress-bar{
    list-style:none;
    /*color:#fff;*/
    /* margin-top:30px; */
    font-size:13px;
    font-weight:700;
    counter-reset:containerCss 0;
}
.progress-bar li{
       position:relative;
       margin-left:40px;
       margin-top:26px;
       counter-increment:containerCss 1;
      color:#4f6581;
}
.progress-bar li::before{
    content:counter(containerCss);
    line-height:25px;
    text-align:center;
    position:absolute;
    height:25px;
    width:25px;
    border:1px solid #4f6581;
    border-radius:50%;
    left:-40px;
    top:-5px;
    z-index:10;
    background-color:#304767;


}


.progress-bar li::after{
    content: '';
    position: absolute;
    height: 90px;
    width: 2px;
    background-color: #4f6581;
    z-index: 1;
    left: -27px;
    top: -50px;
}


.progress-bar li.active::after{
    background-color: #fff;

}

.progress-bar li:first-child:after{
  display:none;
}

/*.progress-bar li:last-child:after{*/
/*  display:none;  */
/*}*/
.progress-bar li.active::before{
    color:#fff;
      border:1px solid #fff;
}
.progress-bar li.active{
    color:#fff;
}
.d-none{
   display:none;
}


/*left-side-end*/
.containerCss .cardCss .right-side{
    width:65%;
    background-color:#fff;
    height:100%;
  border-radius:20px;
}
/*right-side-start*/
.main{
    display:none;
}
.active{
    display:block;
}
.main{
    padding:35px;
}
.main small{
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top:2px;
    height:30px;
    width:30px;
    background-color:#ccc;
    border-radius:50%;
    color:yellow;
    font-size:19px;
}
.text{
    margin-top:10px;
}
.congrats{
    text-align:center;
}
.text p{
    margin-top:5px;
    font-size:13px;
    font-weight:700;
    color:#cbced4;
}
.input-text{
    margin: 30px 0px 4px 0;
     display:flex;
    gap:20px;
}

.input-text .input-div{
    width:100%;
    position:relative;

}

/**************** */
textarea
{
    width:100%;

    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
input[type="date"]{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
input[type="time"]{
    width:111%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
    margin-right: 5rem;
}
.ContentImage
{
    display: flex;
    justify-content: center;
    align-items: center
}
.HeightEducation
{
 
  padding: 8px;
  max-height: 20rem;
  overflow-y: auto;
  margin-bottom: 16px;

}
.heightExperience
{
    padding: 8px;
    max-height: 20rem;
    overflow-y: auto;
    margin-bottom: 16px;
}

/* .heightExperience .card{  
  width: 532px !important;
  padding: 12px !important;
}
.HeightEducation .card{  
  width: 532px;
  padding: 12px !important;
} */
/********** */
.heightExperience::-webkit-scrollbar {
    width: 15px;
}
.HeightEducation::-webkit-scrollbar {
    width: 15px;
}
.divHours::-webkit-scrollbar {
    width: 15px;
}
/******** */

.heightExperience::-webkit-scrollbar-thumb {
    background-color: #304767;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
.HeightEducation::-webkit-scrollbar-thumb {
    background-color: #304767;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
.divHours::-webkit-scrollbar-thumb {
    background-color: #304767;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
/************ */
.HeightEducation::-webkit-scrollbar-track {
    background-color: #eee;
}
.heightExperience::-webkit-scrollbar-track {
    background-color: #eee;
}
.divHours::-webkit-scrollbar-track {
    background-color: #eee;
}
.tags-input
{

  Position: relative;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 12px 10px;
  box-shadow: 2px 2px 5px #00000033;
  width: 100%;
  margin-top: 9px;
  max-height: 212px;
  overflow-y: auto;
  height: 195px;
}

.tags-input ul
{
    list-style: none;
    padding: 0;
    margin: 0;
}

.tags-input li
{
    display: inline-block;
    background-color: #f2f2f2;
    color: #333;
    border-radius: 20px;
    padding: 5px 10px;
    margin-right: 5px;
    margin-bottom: 5px;
}

.tags-input input[type="text"]
{
    border: none;
    outline: none;
    padding: 5px;
    font-size: 14px;

}
#input-tag{
  width: 78%;
  height: 40px;
  border: none;
  outline: 0;
  border-radius: 5px;
  border: 1px solid #cbced4;
  gap: 20px;
  box-sizing: border-box;

}

.tags-input input[type="text"]:focus
{
    outline: none;
}

.tags-input .delete-button
{
    background-color: transparent;
    border: none;
    color: #999;
    cursor: pointer;
    margin-left: 5px;
}
#AddCours
{
    background-color: #4e99e9;
    border: none;
    color: #fff;
    cursor: pointer;
    padding: 8px 20px;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

    transition: .9s ease;
}
/**************** */

input[type="text"]{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
select{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
.input-text .input-div span{
    position:absolute;
    top:10px;
    left:10px;
    font-size:14px;
    transition:all 0.5s;
}
.input-div input:focus ~ span,.input-div input:valid ~ span  {
    top:-20px;
    left:6px;
    font-size:14px;
    font-weight:600;
}

.input-div span{
    top:-15px;
    left:6px;
    font-size:10px;
}
.buttons button{
    height:40px;
    width:100px;
    border:none;
    border-radius:5px;
    background-color:#0075ff;
    font-size:12px;
    color:#fff;
    cursor:pointer;
}
.button_space{
    display:flex;
    gap:20px;

}
.button_space button:nth-child(1){
    background-color:#fff;
    color:#000;
    border:1px solid#000;
}
.user_card{
    margin-top:20px;
    margin-bottom:40px;
    height:200px;
    width:100%;
    border:1px solid #c7d3d9;
    border-radius:10px;
    display:flex;
    overflow:hidden;
    position:relative;
    box-sizing:border-box;
}
.user_card span{
    height:80px;
    width:100%;
    background-color:#dfeeff;
}
.circle{
    position:absolute;
    top:40px;
    left:60px;
}
.circle span{
    height:70px;
    width:70px;
    background-color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    border:2px solid #fff;
    border-radius:50%;
}
.circle span img{
    width:100%;
    height:100%;
    border-radius:50%;
    object-fit:cover;
}
.social{
    display:flex;
    position:absolute;
    top:100px;
    right:10px;
}
.social span{
    height:30px;
    width:30px;
    border-radius:7px;
    background-color:#fff;
    border:1px solid #cbd6dc;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-left:10px;
    color:#cbd6dc;

}
.social span i{
        cursor:pointer;
}
.heart{
    color:red !important;
}
.share{
        color:red !important;
}
.user_name{
    position:absolute;
    top:110px;
    margin:10px;
    padding:0 30px;
    display:flex;
    flex-direction:column;
    width:100%;

}
.user_name h3{
    color:#4c5b68;
}
.detail{
    /*margin-top:10px;*/
   display:flex;
   justify-content:space-between;
   margin-right:50px;
}
.detail p{
    font-size:12px;
    font-weight:700;

}
.detail p a{
    text-decoration:none;
    color:blue;
}






.checkmark__circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #7ac142;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: block;
  stroke-width: 2;
  stroke: #fff;
  stroke-miterlimit: 10;
  margin: 10% auto;
  box-shadow: inset 0px 0px 0px #7ac142;
  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #7ac142;
  }
}










.warning{
    border:1px solid red !important;
}


/*right-side-end*/
@media (max-width:750px) {
    .containerCss{
        height:scroll;


    }
    .containerCss .cardCss {
        max-width: 350px;
        height:auto !important;
        margin:30px 0;
    }
    .containerCss .cardCss .right-side {
     width:100%;

    }
     .input-text{
         display:block;
     }

     .input-text .input-div{
  margin-top:20px;

}

    .containerCss .cardCss .left-side {

     display: none;
    }
}
    .textDateNaissance
    {
        display: none;
    }
    .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
 .ContentImage {
  width: 100px;
  height: 100px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  border-radius: 50%;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  margin: auto;
}
.ContentImage:hover {
  border-color: #2ca8ff;
}
.ContentImage input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.picture-src {
  width: 100px ;
  height: 100px ;
  
}

/******************************** CSS GRoupe Prive*/
.radio-inputs {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 176px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.radio-inputs > * {
  margin: 2px;
}

.radio-input:checked + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  color: #2260ff;
}

.radio-input:checked + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
  background-color: #2260ff;
  border-color: #2260ff;
}

.radio-input:checked + .radio-tile .radio-icon svg {
  fill: #2260ff;
}

.radio-input:checked + .radio-tile .radio-label {
  color: #2260ff;
}

.radio-input:focus + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}

.radio-input:focus + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
}

.radio-tile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 51px;
  min-height: 39px;
  border-radius: 0.5rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0.15s ease;
  cursor: pointer;
  position: relative;
}

.radio-tile:before {
  content: "";
  position: absolute;
  display: block;
  width: 0.75rem;
  height: 0.75rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  border-radius: 50%;
  top: 0.25rem;
  left: 0.1rem;
  opacity: 0;
  transform: scale(0);
  transition: 0.25s ease;
}

.radio-tile:hover {
  border-color: #2260ff;
}

.radio-tile:hover:before {
  transform: scale(1);
  opacity: 1;
}

.radio-icon svg {
  width: 2rem;
  height: 2rem;
  fill: #494949;
}

.radio-label {
  color: #707070;
  transition: 0.375s ease;
  text-align: center;
  font-size: 13px;
}

.radio-input {
  clip: rect(0 0 0 0);
  -webkit-clip-path: inset(100%);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}
    </style>







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
            var validate_inputs=document.querySelectorAll(".main.active input");
            validate_inputs.forEach(function(vaildate_input){
                vaildate_input.classList.remove('warning');
                if(vaildate_input.hasAttribute('require')){
                    if(vaildate_input.value.length==0){
                        validate=false;
                        vaildate_input.classList.add('warning');
                    }
                }
            });
            return validate;



        }
    </script>
    
</body>
</html>
