<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/gsdk-bootstrap-wizard.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />


</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
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
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label  >Date de naissance </label>
                                                <input name="datenaissance" type="date" class="form-control" >
                                            </div>
                                        
                                            <div class="form-group">
                                                <label >Telephone </label>
                                                <input placeholder="Entrer votre numero de telephone "name="phone" id="phone" type="text"  class="form-control" placeholder="Telephone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <h4 class="info-text"> Remplir votre parcours professionnelle </h4>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
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
                                                            <span class="SpanAddFormation">
                                                                <i class="fa-solid fa-plus"></i>
                                                                Ajouter 
                                                            </span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingTwo">
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
                                                                </div>
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Lycée / Université </label>
                                                                    <input type="text" class="form-control" name="entreprise[]"/>
                                                                </div>
                                                                <div class=" form-group col-sm-4 col-md-4 col-xl-4">
                                                                    <label>Pays</label>
                                                                    <div class="niceCountryInputSelector selectPaysExperience @error('pays') is-invalid @enderror"  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                                                        data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallbackpaysExperience" >
                                                                        <input type="text"  name="paysExperience[]" class="paysExperience " hidden>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group  col-sm-6 col-md-6 col-xl-6">
                                                                    <label>Du</label>
                                                                    <input type="date" class="form-control" name="du[]"/>
                                                                </div>
                                                                <div class="form-group col-sm-6 col-md-6 col-xl-6">
                                                                    <label>Au</label>
                                                                    <input type="date" class="form-control" name="au[]"/>
                                                                </div>
                                                            </div>
                                                            <hr style="width: 80%">
                                                            <span class="SpanAddExperience">
                                                                <i class="fa-solid fa-plus"></i>
                                                                Ajouter
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            Vos méthodes, vos expériences en cours de soutien et en pédagogie .   </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label for="">Plus votre description sera détaillée, plus vous aurez de chances d'avoir des élèves.
                                                                    Vous pouvez rajouter les résultats et/ou les retours de vos élèves.
                                                                    Cette présentation sera affichée sur votre profil.</label>
                                                                <textarea class="form-control" name="" id="" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingfour">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                                                            Certification   </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                            <label for="">Attestation de travail </label>
                                                                <input type="file" id="attestation" name="attestation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script>



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
                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                        <span class="SpanAddFormation">
                                                            <i class="fa-solid fa-plus"></i>
                                                            Ajoute formation
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-xl-6 text-right">
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
                                                        <label>Poste</label>
                                                        <input type="text" class="form-control" name="poste[]"/>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Entreprise</label>
                                                        <input type="text" class="form-control" name="entreprise[]"/>
                                                    </div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4">
                                                        <label>Pays</label>
                                                        <div class="niceCountryInputSelector selectPaysExperience @error('pays') is-invalid @enderror"  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                                            data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallbackpaysExperience" >
                                                            <input type="text"  class="paysExperience" name="paysExperience[]" hidden>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                        <label>Du</label>
                                                        <input type="date" class="form-control" name="du[]"/>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                        <label>Au</label>
                                                        <input type="date" class="form-control" name="au[]"/>
                                                    </div>
                                                </div>
                                                <hr style="width: 80%">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-xl-6">
                                                        <span class="SpanAddExperience">
                                                            <i class="fa-solid fa-plus"></i>
                                                            Ajoute Experience
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-xl-6 text-right">
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
                $(this).find('.paysFormation').val(paysFormation);
            });

            $(document).on('mouseleave','.selectPaysExperience',function(e)
            {
                console.log(paysExperince);
                $(this).find('.paysExperience').val(paysExperince);
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
                    var textToAppend = $(this).text();
                    var $divHours = $('.divHours');
                    if ($('.divHours').find('div:contains(' + textToAppend + ')').length === 0)
                    {
                        var divToAppend = $('<div style="display: flex; align-items: center; padding: 20px;">' +
                                                '<table style="width: 100%;">' +
                                                    '<tr >' +
                                                        '<th colspan="5" style="font-size: 26px;text-align: center;" class="nameDays">'+
                                                            '<input type="text" value='+textToAppend+' name="days[]" style="border:none;text-align: center;"/>'+
                                                        '</th>' +
                                                    '</tr>' +
                                                    '<tr>' +
                                                        '<th><label for="start-time1" >Heure de début</label></th>' +
                                                        '<th><input type="time" id="start-time1" class="heuredebut" name="heuredebut[]"></th>' +
                                                        '<th><label for="start-time2" >Heure de fin</label></th>' +
                                                        '<th><input type="time" id="start-time2" class="heurefin" name="heurefin[]"></th>' +
                                                        '<th><i class="fa-solid fa-xmark" style="border: 1px solid gray; cursor: pointer; font-size: 30px; color: red; "></i></th>' +
                                                    '</tr>' +
                                                '</table>' +
                                            '</div>'+
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

</html>
