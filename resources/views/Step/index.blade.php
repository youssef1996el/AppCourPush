<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kottab</title>
    <link rel="icon" href="{{asset('image/faviconnobg.png')}}" type="image/x-icon">    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/gsdk-bootstrap-wizard.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


</head>
 <body  style="background-image:url('{{asset('image/25099.jpg')}}');height:100vh;background-repeat: no-repeat;background-position:center;background;background-size:cover">

    <nav class="navbar navbar-default  " role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'App de soutien') }}</a>
            </div>


            <div class="collapse navbar-collapse" id="navbar-collapse">


                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li>
                            @if (Route::currentRouteName() === "login")
                                <p class="navbar-text">Vous n'avez pas encore de compte ?</p>
                                <a class="btn btn-primary navbar-btn" href="{{ route('register') }}">S'inscrire</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-default navbar-btn">Login</a>
                            @endif
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


	<!--  Made With Get Shit Done Kit  -->
	{{-- 	<a href="http://demos.creative-tim.com/get-shit-done/index.html?ref=get-shit-done-bootstrap-wizard" class="made-with-mk">
			<div class="brand">GK</div>
			<div class="made-with">Made with <strong>GSDK</strong></div>
		</a> --}}

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form action="{{url('StoreData')}}" method="post" id="FormDetailProf" enctype="multipart/form-data">
                            @csrf
                            <div class="wizard-header">
                                <h3>
                                <b>CRÉEZ </b> VOTRE PROFILE <br>
                                <small>Ces informations nous permettront d'en savoir plus sur vous.</small>
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#about" data-toggle="tab">A propos</a></li>
                                    <li><a href="#account" data-toggle="tab">Votre Parcours</a></li>
                                    <li><a href="#cours" data-toggle="tab">Cours</a></li>
                                    <li><a href="#address" data-toggle="tab">Disponibilte</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h4 class="info-text"> Commençons par les informations de base</h4>
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
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label  >Titre de votre annonce</label>
                                                <input name="titre" type="text" class="form-control" placeholder="Ex: Professeur d'arabe" >
                                                <div class="error"></div>
                                            </div>
                                            <div class="form-group">
                                                <label  >Date de naissance </label>
                                                <input name="datenaissance" type="date" class="form-control" id="DateNaissanceProf">
                                                <div class="error"></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Numero de telephone:</label>
                                                <input type="tel" id="phone" name="phone" maxlength="13" placeholder=""{{--  oninput="formatPhoneNumber(this)" --}} required>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h4 class="info-text"> Remplir votre parcours professionnelle </h4>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default" >
                                                    <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Formation
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body panelBodyFormation">
                                                            <div class="row">
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Dernier diplôme</label>
                                                                    <input type="text" class="form-control" name="diplome[]"/>
                                                                </div>
                                                                <div class=" form-group -sm-4 col-md-4 col-xl-4">
                                                                    <label>Spécialité</label>
                                                                    <input type="text" class="form-control" name="Specialise[]"/>
                                                                </div>
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Année d'obtention</label>
                                                                    <input type="date" class="form-control" name="annee[]"/>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin-bottom: 20px">
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Lycée / Université </label>
                                                                    <input type="text" class="form-control" name="ecole[]"/>
                                                                </div>
                                                                <div class="form-group  col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Pays</label>

                                                                    <div class="niceCountryInputSelector selectPaysFormation @error('pays') is-invalid @enderror"  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                                                        data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallbackpaysFormation" >
                                                                        <input type="text" name="paysFormation[]" class="paysFormation" hidden>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr style="width: 80%">


                                                        </div>
                                                        <span class="SpanAddFormation" style="display: flex;width: 80px;margin-bottom:10px">
                                                            <i class="fa-solid fa-plus"></i>
                                                            Ajouter
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default" >
                                                    <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Experience
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="panel-body panelBodyExperience">
                                                            <div class="row">
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Filière</label>
                                                                    <input type="text" class="form-control" name="poste[]"/>
                                                                    <div class="error"></div>
                                                                </div>
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Lycée / Université </label>
                                                                    <input type="text" class="form-control" name="entreprise[]"/>
                                                                    <div class="error"></div>
                                                                </div>
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Pays</label>
                                                                    <div class="niceCountryInputSelector selectPaysExperience @error('pays') is-invalid @enderror"  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                                                        data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallbackpaysExperience" >
                                                                        <input type="text"  name="paysExperience[]" class="paysExperience " hidden>
                                                                        <div class="error"></div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group  col-sm-6 col-md-6 col-xl-6">
                                                                    <label>Du</label>
                                                                    <input type="date" class="form-control" name="du[]"/>
                                                                    <div class="error"></div>
                                                                </div>
                                                                <div class="form-group col-sm-6 col-md-6 col-xl-6">
                                                                    <label>Au</label>
                                                                    <input type="date" class="form-control" name="au[]"/>
                                                                    <div class="error"></div>
                                                                </div>
                                                            </div>
                                                            <hr style="width: 80%">

                                                        </div>
                                                        <span class="SpanAddExperience" style="display: flex;width: 80px;margin-bottom:10px">
                                                            <i class="fa-solid fa-plus"></i>
                                                            Ajouter
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default" >
                                                    <div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            Vos méthodes, vos expériences en cours de soutien et en pédagogie .   </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body panelBodyMethode">
                                                            <div class="form-group">
                                                                <label for="">Plus votre description sera détaillée, plus vous aurez de chances d'avoir des élèves.
                                                                    Vous pouvez rajouter les résultats et/ou les retours de vos élèves.
                                                                    Cette présentation sera affichée sur votre profil.</label>
                                                                <textarea class="form-control" name="methode" id="" rows="3"></textarea>
                                                                <div class="error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default" >
                                                    <div class="panel-heading" role="tab" id="headingfour" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                                            Certification   </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                                        <div class="panel-body panelBodyAttestation">
                                                            <div class="form-group">
                                                            <label for="">Attestation de travail </label>
                                                                <input type="file" id="attestation" name="attestation">
                                                                <div class="error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="cours">
                                    <div class="row">
                                        <h4 class="info-text"> Quelles sont les cours dans lesquelles vous pouvez aider des élèves ? </h4>
                                        <div class="List-Courses">
                                            <div class="input-cours">
                                                <input placeholder="Ajouter des cours" type="text" id="input-tag">
                                                <button type="button" id="AddCours" >Ajouter</button>
                                                <div class="errorCours"></div>
                                            </div>
                                            {{-- cours tags --}}
                                            <div class="tags-input">
                                                <ul id="tags"></ul>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>

                               {{--  </div> --}}
                                <div class="tab-pane" id="address">
                                    <h4 class="info-text">Quelles sont vos disponibilités pour donner des cours ? </h4>
                                    <h5>Choisissez un maximum de créneaux que vous pourriez bloqué pour des cours avec (name website)</h5>
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
                                        <div class="divHours" ></div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Suivant' />
                                    <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Valider' />
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Précedent' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="modal fade" tabindex="-1" role="dialog" id="ModalConfirm">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
    </div>
    <div class="footer">
        <div class="container">
        </div>
    </div>


</div>

    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.bootstrap.wizard.js')}}"></script>
    <script src="{{asset('js/gsdk-bootstrap-wizard.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/niceCountryInput.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
<style>
    .error
    {
        color: red;
    }
    .errorCours
    {
        color: red;
    }
    .tags-input {
        
        display: inline-block;
        position: relative;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
        box-shadow: 2px 2px 5px #00000033;
        width: 100%;
        margin-top: 12px;
        max-height: 212px;
        overflow-y: auto;
        height: 212px;
              }

        .tags-input ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tags-input li {
            display: inline-block;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 20px;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .tags-input input[type="text"] {
            border: none;
            outline: none;
            padding: 5px;
            font-size: 14px;
        }

        .tags-input input[type="text"]:focus {
            outline: none;
        }

        .tags-input .delete-button {
            background-color: transparent;
            border: none;
            color: #999;
            cursor: pointer;
            margin-left: 5px;
        }
</style>
    <script>
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

            document.querySelectorAll('.checkboxes .checkCour').forEach(function(checkbox) {

                var parentDiv = checkbox.closest('.checkboxes');
                parentDiv.classList.toggle('checked', checkbox.checked);
                parentDiv.classList.toggle('unchecked', !checkbox.checked);
                checkbox.addEventListener('change', function() {
                    parentDiv.classList.toggle('checked', this.checked);
                    parentDiv.classList.toggle('unchecked', !this.checked);
                });
            });
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('DateNaissanceProf').setAttribute('max', today);
            $(document).on('click', '.SpanAddFormation', function()
            {
                var DivAppendFormation = `  <div class="custom-form-section">
                                                <div class="row" style="margin-top:20px">
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Dernier diplome</label>
                                                        <input type="text" class="form-control"  name="diplome[]"/>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Spécialisé</label>
                                                        <input type="text" class="form-control" name="Specialise[]"/>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Annee d'obtention</label>
                                                        <input type="text" class="form-control" name="annee[]"/>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 20px">
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Ecole</label>
                                                        <input type="text" class="form-control" name="ecole[]"/>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Pays</label>
                                                        <div class="niceCountryInputSelector selectPaysFormation @error('pays') is-invalid @enderror"  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                                            data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallbackpaysFormation" >
                                                            <input type="text"  class="paysFormation" name="paysFormation[]" hidden>
                                                        </div>

                                                    </div>
                                                </div>
                                                <hr style="width: 80%">
                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12 col-xl-12 text-right justify-content-end">
                                                        <span class="SpanSuppFormation">
                                                            <i class="fa-solid fa-x"></i>
                                                            Supprimer
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>`;
                $('.panelBodyFormation').append(DivAppendFormation);
                $('.custom-form-section .niceCountryInputSelector').each(function(i, e) {
                    new NiceCountryInput(e).init();
                });



            });
            $(document).on('click', '.SpanSuppFormation', function() {

                $(this).closest('.custom-form-section').remove();
            });

            $(document).on('click','.SpanAddExperience',function()
            {
                var divAppendExperience = `<div class="custom-form-section">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Filière</label>
                                                        <input type="text" class="form-control" name="poste[]"/>
                                                        <div class="error"></div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Lycée / Université</label>
                                                        <input type="text" class="form-control" name="entreprise[]"/>
                                                        <div class="error"></div>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Pays</label>
                                                        <div class="niceCountryInputSelector selectPaysExperience @error('pays') is-invalid @enderror"  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                                            data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallbackpaysExperience" >
                                                            <input type="text"  class="paysExperience" name="paysExperience[]" hidden>
                                                            <div class="error"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6 col-md-6 col-xl-6">
                                                        <label>Du</label>
                                                        <input type="date" class="form-control" name="du[]"/>
                                                        <div class="error"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-xl-6">
                                                        <label>Au</label>
                                                        <input type="date" class="form-control" name="au[]"/>
                                                        <div class="error"></div>
                                                    </div>
                                                </div>
                                                <hr style="width: 80%">
                                                <div class="row">

                                                    <div class="col-sm-12 col-md-12 col-xl-12 text-right justify-content-end">
                                                        <span class="SpanSuppExperience">
                                                            <i class="fa-solid fa-x"></i>
                                                            Supprimer
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>`;
                $('.panelBodyExperience').append(divAppendExperience);
                $('.custom-form-section .niceCountryInputSelector').each(function(i, e) {
                    new NiceCountryInput(e).init();
                });
            });
            $(document).on('click', '.SpanSuppExperience', function() {

                $(this).closest('.custom-form-section').remove();
            });
            $('input[name="finish"]').on('click',function()
            {
                $('#ModalConfirm').modal("show");
            });
            function onChangeCallbackpaysProf(ctr)
            {
                document.getElementById('pays').value = ctr;
            }
            var paysFormation ='';
            var paysExperince ='';
            function onChangeCallbackpaysExperience(ctr)
            {
                paysExperince=ctr;

            }

            function onChangeCallbackpaysFormation(ctr)
            {
                paysFormation=ctr;
            }
            $(document).on('mouseleave','.selectPaysFormation',function(e)
            {
                var name = $(this).find('.niceCountryInputMenuCountryFlag').next('span').text();
                var countryMatches = name.match(/([^\s]+) \(([^)]+)\)/g);
                var countryName = '';
                if (countryMatches) {

                    countryMatches.some(function (match) {
                        var parts = match.split(" ");
                        countryName = parts[0];
                        var arabicName = parts.slice(1).join(" ");

                        return true;
                    });
                    if(countryName !=="Afghanistan")
                    {
                        countryName = countryName.replace(/Afghanistan$/, '');
                    }


                }

                $(this).find('.paysFormation').val(countryName);

            });

            $(document).on('mouseleave','.selectPaysExperience',function(e)
            {
                var name = $(this).find('.niceCountryInputMenuCountryFlag').next('span').text();
                var countryMatches = name.match(/([^\s]+) \(([^)]+)\)/g);
                var countryName = '';
                if (countryMatches) {

                    countryMatches.some(function (match) {
                        var parts = match.split(" ");
                        countryName = parts[0];
                        var arabicName = parts.slice(1).join(" ");

                        return true;
                    });
                    if(countryName !=="Afghanistan")
                    {
                        countryName = countryName.replace(/Afghanistan$/, '');
                    }


                }
                $(this).find('.paysExperience').val(countryName);
            });






            $(document).ready(function ()
            {
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

                $(".niceCountryInputSelector").each(function(i,e){
                    new NiceCountryInput(e).init();
                });

                $('#phone').on('input', function()
                {
                    var inputValue = $(this).val();
                    var numericValue = inputValue.replace(/[^0-9+]/g, '');
                    $(this).val(numericValue);
                });

                var $divHours = $('.divHours');
                $divHours.hide();
                $('.day-item').on('click', function()
                {

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
                                finalSelect = '<select id="day-type" name="courByDate[]" style="height: 26px; width: 136px; padding: 4px; background: transparent; border: 1px solid gray;">';
                                $.each(response.data, function (index, value) {
                                    finalSelect += '<option value="' + value.id + '">' + value.title + '</option>';
                                });
                                finalSelect += '</select>';

                                var $divHours = $('.divHours');
                                if ($('.divHours').find('div:contains(' + textToAppend + ')').length === 0)
                                {

                                    var divToAppend = $('<div style="display: flex; align-items: center; padding: 0px 20px;">' +
                                                            '<table style="width: 100%;">' +
                                                                '<tr>' +
                                                                    '<th colspan="6" style="font-size: 26px;text-align: center;" class="nameDays">' +
                                                                    '<label style="border:none; text-align: center;" name="days[]" >' + textToAppend + '</label>' +
                                                                    '</th>' +
                                                                '</tr>' +
                                                                '<tr>' +
                                                                    '<th><label for="day-type">Choisir un cours</label></th>' +
                                                                    '<th>' + finalSelect +'</th>' +
                                                                    '<th class="radioGP">' +
                                                                    '<label>' +
                                                                        '<input type="radio" name="radio" id="group" checked="">' +
                                                                        '<span><i class="fas fa-users "></i></span>' +
                                                                    '</label>' +
                                                                    '<label>' +
                                                                        '<input type="radio" name="radio" id="particulier">' +
                                                                        '<span><i class="fas fa-user "></i></span>' +
                                                                    '</label>' +
                                                                
                                                                '</th>' +
                                                                    '<th><label for="start-time1">Heure de début</label></th>' +
                                                                    '<th><input type="time" id="start-time1" class="heuredebut" name="heuredebut[]"></th>' +
                                                                    '<th><label for="start-time2">Heure de fin</label></th>' +
                                                                    '<th><input type="time" id="start-time2" class="heurefin" name="heurefin[]"></th>' +
                                                                    '<th><i class="fa-solid fa-xmark" style=" cursor: pointer; font-size: 30px; color: red; "></i></th>' +
                                                                '</tr>' +
                                                            '</table>' +
                                                        '</div>' +
                                                        '<hr style="width:80%">');



                                    var $divToAppend = $(divToAppend);
                                    $divToAppend.find('.fa-xmark').on('click', function()
                                    {
                                        $divToAppend.remove();
                                        if($divHours.find('div').length === 0) {
                                            $divHours.hide();
                                        }
                                    });
                                    $divHours.append($divToAppend);
                                    $divHours.show();
                                }
                            }


                        }
                    });

                });




                $(document).on('input', '.heuredebut, .heurefin', function(e) {
                    let hour = $(this).val().split(':')[0];
                    $(this).val(`${hour}:00`);
                });

                function convertTo24Hour(time)
                {
                    const [hour, minute, ampm] = time.match(/(\d+):(\d+)\s*([APap][Mm])?/).slice(1, 4);
                    let hours = parseInt(hour, 10);
                    if (ampm) {
                        if (ampm.toLowerCase() === 'pm' && hours < 12) {
                            hours += 12;
                        }
                        if (ampm.toLowerCase() === 'am' && hours === 12) {
                            hours = 0;
                        }
                    }
                    return `${hours}:${minute}`;
                }
                $(document).on('input','.heurefin',function()
                {
                    const StartHour = $(this).closest('tr').find('.heuredebut').val();
                    const FinHour   = $(this).val();

                    const startHour24 = convertTo24Hour(StartHour);
                    const finHour24 = convertTo24Hour(FinHour);

                    if (startHour24 < finHour24) {
                    } else if (startHour24 === finHour24) {
                        Swal.fire({
                            icon    : "error",
                            title   : "Oops...",
                            text    : "L'heure de fin est égale à l'heure de début!",
                        });
                        $(this).val('');
                    } else {
                        Swal.fire({
                            icon    : "error",
                            title   : "Oops...",
                            text    : "heure de fin est plus petite que heure de début!",
                        });
                        $(this).val('');
                    }
                });

            });


  </script>
<script>
    function displaySelectedOption() {
        // Get the selected option value
        var selectedOption = document.getElementById("optionSelect").value;

        // Display the selected option in the card
        var card = document.getElementById("selectedOptionCard");
        var selectedList = document.getElementById("selectedOptionList");

        if (selectedOption) {
            card.style.display = "block";

            // Create a new list item for the selected option
            var listItem = document.createElement("li");
            listItem.textContent = selectedOption;

            // Append the list item to the list
            selectedList.appendChild(listItem);
        }
    }


</script>
<style>


.radioGP  {
  display: flex;
  flex-wrap: wrap;
  margin-top: 0.5rem;
}

.radioGP input[type="radio"] {
  clip: rect(0 0 0 0);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

.radioGP input[type="radio"]:checked + span {
  box-shadow: 0 0 0 0.0625em #0043ed;
  background-color: #dee7ff;
  z-index: 1;
  color: #0043ed;
}

.radioGP label span {
  display: block;
  cursor: pointer;
  background-color: #fff;
  padding: 0.375em .75em;
  position: relative;
  margin-left: .0625em;
  box-shadow: 0 0 0 0.0625em #b5bfd9;
  letter-spacing: .05em;
  color: #3e4963;
  text-align: center;
  transition: background-color .5s ease;
}

.radioGP label:first-child span {
  border-radius: .375em 0 0 .375em;
}

.radioGP label:last-child span {
  border-radius: 0 .375em .375em 0;
}</style>
</html>
