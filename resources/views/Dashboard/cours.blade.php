@extends('Dashboard.index')
@section('navsidebar')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{asset('css/StyleDashBoardCours.css')}}">

<script src="{{asset('js/ScriptDashBoardCours.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<div class="container mt-4">

    <div class="row ">
        <div class="col-sm-12 col-md-12 col-xl-12">
        <h2 class="mb-3" style="padding-left: 12px;font-family: times;">Liste des cours </h2>
        <button class="btn" id="BtnAddRowCours">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
        </svg>
        <span>Ajouter un cours</span>
       </button>  
       
       <div class="input-wrapper">
        <input class="input-box" type="text" placeholder="Rechercher sur un cours ..">
        <span class="underline"></span>
      </div>
       <table class="table align-middle mb-0 bg-white" style="margin-top: 20px;width: 60%;margin-left: 100px; ">
        <thead class="bg-light " style="border-bottom-color:white">
          <tr>
            <th>Nom du cours</th>
            <th style="width: 30%; text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody>
            <tr>

                <td>
                  <p class="fw-normal mb-1">Consultant</p>
                </td>
                <td style="text-align:center">
                  <button
                          type="button"
                          class="btn btn-link btn-rounded btn-sm fw-bold"
                          data-mdb-ripple-color="dark"
                          >
                    Editer
                  </button>
                  <button
                          type="button"
                          class="btn btn-link btn-rounded btn-sm fw-bold"
                          data-mdb-ripple-color="dark"
                          >
                    Supprimer
                  </button>
                </td>
            </tr>
        
        </tbody>
</table>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalEditCours" aria-labelledby="settingsModalTitle" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-dialog-ModalEditCours">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h5 class="modal-title text-uppercase" id="exampleModalLabel">Modifier cour
                    <span id="TitleCourShow" class="text-uppercase" style="color: #57b9e9;"></span>
                </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <label for="">Nom du cour :</label>
                        <input type="text" class="form-control TitleEdit">
                        <div class="error"></div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button class="btn btn-success BtnUpDateCours">UpDate</button>
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
                <div class="float-end">
                    <button class="btn btn-success" id="BtnAddCourTwo">Ajouter cour</button>
                </div>
                <div class="sectiontablecours mt-5 card p-2 shadow" style=" overflow: auto;max-height: 310px;">
                    <table class="table"  id="TableCours">
                        <tbody>
                        </tbody>

                    </table>
                    <button class="Send mt-2 w-25" >
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                </svg>
                            </div>
                        </div>
                        <span>Send</span>
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
