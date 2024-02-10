@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfesseurDash.css')}}">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<div class="container mt-4">
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-xl-12">
          <h2 style="padding-left: 12px;font-family: times;">Liste des élèves </h2>
          <table class="table-primary  align-middle mb-0 bg-white w-100" id="tableListEleve" style="margin-top: 20px;width: 84%;">
            <thead class="">
              <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Pays</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($listeleve as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{$item->image}}" class="rounded-circle" id="imgEleve" alt="" />
                                <div class="ms-3">
                                <p class="fw-bold mb-1">{{$item->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-muted mb-0">{{$item->email}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Maroc</p>
                        </td>
                        <td>
                            <span class="">Active</span>
                        </td>
                        <td class="d-flex align-items-end">
                            <button type="button" class="btn btn-link showEleve" data-mdb-ripple-color="dark" data-value={{$item->id}}>
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-link " data-mdb-ripple-color="dark" data-value="{{$item->id}}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>


{{-- Modal View Eleve --}}
<div class="modal fade" id="ModalView" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Dossier d'eleve</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">

               <div class="col-sm-12 col-md-3 col-m-3">
                    <div class="card bg-light cardProfileEleve shadow-sm">
                       <img class="img" id="imageEleve" alt="Image">

                       <form>
                            
                            <div class="form-group">
                                <label for="name">Nom complet </label>
                                <input type="text" id="name" class="nomCompletEleve" name="nameEleve" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email </label>
                                <input type="email" id="email" class="emailEleve" name="emailEleve" readonly>
                            </div>
                            <div class="form-group">
                                <label for="pays">Pays </label>
                                <input type="text" id="pays"  class="paysEleve" name="paysEleve" readonly>
                            </div>

                        </form>
                            
                  </div>

               </div>
            
            </div>
        </div>
        </div>
    </div>
</div>
<style>
    /* .cardProfileEleve form {
      text-align: center;
      margin-top: 50px; 
    }

    .cardProfileEleve  img {
      display: block;
      margin: 0 auto;
      width: 100px;
      height: auto;
      margin-bottom: 10px; 
    }

    .cardProfileEleve label {
      display: inline-block;
      margin-bottom: 5px;
    }

    .cardProfileEleve input {
      display: inline-block;
      margin-bottom: 10px;
    }*/
    .cardProfileEleve  form {
        padding: 20px;
    }

    .cardProfileEleve  .form-group {
      margin-bottom: 15px;
    }

    .cardProfileEleve label {
      display: block;
      margin-bottom: 5px;
    }

    .cardProfileEleve input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
    }
    .cardProfileEleve  img {
    width: 120px;
  height: 120px;
  text-align: center;
  margin: auto;
    margin-bottom: auto;
  display: flex;
  border-radius: 50%;
  margin-bottom: 20px;}
  </style>

<script src="{{asset('js/ScriptDashboardEleve.js')}}"></script>
@endsection()
