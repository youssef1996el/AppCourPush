@extends('Dashboard.index')
@section('navsidebar')
<div id="overlay">
    <div class="three-body">
        <div class="three-body__dot"></div>
        <div class="three-body__dot"></div>
        <div class="three-body__dot"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{asset('css/StyleCours.css')}}">
<link rel="stylesheet" href="{{asset('css/disponibiliteStyle.css')}}">




<script src="{{asset('js/ScriptDashBoardCours.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<div class="msg" style="margin: auto"></div>
<div class="container mt-2 widthContainer">

    <div class="row ">

        <div class="col-sm-12 col-md-12 col-xl-12">
            <h2 class="mb-3" style="padding-left: 12px;">Liste des cours </h2>
            <button class="btn" id="BtnAddRowCours">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                </svg>
                <span>Ajouter un cours</span>
            </button>

            <table id="TableListCour" class="table-primary align-middle mb-0 bg-white " style="margin-top: 10px;width: 60%;margin-left: 100px; ">
                <thead class=" " style="border-bottom-color:white" >
                    <tr>
                        <th style="text-indent:18px" >Nom du cours</th>
                        <th style="width: 30%; text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="col-sm-12 col-md-12 col-xl-12">
            <h2 class="mb-3" style="padding-left: 12px;">Disponibilite </h2></div>
            <div class="disponibilteCase" style="background-color:pink;">
                
<div style="display: flex; align-items: center; padding: 0px 20px;">
    <table style="width: 100%;">
        <tr>
            <th colspan="6" style="font-size: 26px;text-align: center;" class="nameDays">
                <label style="border:none; text-align: center;" name="days[]" >Your Text Here</label>
            </th>
        </tr>
        <tr>
            <th><label for="day-type">Choisir un cours</label></th>
            <th>Your Select Options Here</th>
            <th class="radioGP">
                <label>
                    <input type="radio" name="radio" id="group" checked="">
                    <span><i class="fas fa-users "></i></span>
                </label>
                <label>
                    <input type="radio" name="radio" id="particulier">
                    <span><i class="fas fa-user "></i></span>
                </label>
            </th>
            <th><label for="start-time1">Heure de début</label></th>
            <th><input type="time" id="start-time1" class="heuredebut" name="heuredebut[]"></th>
            <th><label for="start-time2">Heure de fin</label></th>
            <th><input type="time" id="start-time2" class="heurefin" name="heurefin[]"></th>
            <th><i class="fa-solid fa-xmark" style=" cursor: pointer; font-size: 30px; color: red; "></i></th>
        </tr>
    </table>
</div>
<hr style="width:80%">
            </div>
    </div>
</div>

<div class="modal fade" id="ModalEditCours" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-dialog-ModalEditCours">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h5 class="modal-title text-uppercase" id="exampleModalLabel">Modifier cours
                    <span id="TitleCourShow" class="text-uppercase" style="color: #57b9e9;"></span>
                </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label for="">Nom du cours :</label>
                        <input type="text" class="form-control TitleEdit">
                        <div class="error"></div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button class="btn btn-success BtnUpDateCours">Editer</button>
            </div>
		</div>
	</div>
</div>

{{-- Modal Add cour --}}
<div class="modal fade" id="ModalAddCour" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-dialog-settings ">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h5 class="modal-title" id="exampleModalLabel">Ajouter un cours</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

                <div class="sectiontablecours mt-1 card p-2 shadow" style=" overflow: auto;max-height: 310px;">

                    <div class="form-group">
                        <input name="cours" type="text" class="form-control cour" placeholder="Ajouter un cours" >
                    </div>




                    <div class="float-start">
                        <button type="button" class="item button" id="BtnAddCourTwo">
                            <span class="button__text">Ajouter</span>
                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                        </button>
                        {{-- <button class="btn btn-success" id="BtnAddCourTwo">Ajouter cours</button> --}}
                    </div>
                    <button class="Send mt-2 w-25 " >
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                </svg>
                            </div>
                        </div>
                        <span >Envoyer</span>
                    </button>
                </div>
			</div>
		</div>
	</div>
</div>

<script>
    var storeCoursUrl = "{{ url('StoreCours') }}";
    var ListCours     = "{{ url('GetTableCour') }}";
    var EditCour      = "{{url('EditCour') }}";
</script>
@endsection()
