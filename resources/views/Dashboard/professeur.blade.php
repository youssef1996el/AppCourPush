@extends('Dashboard.index')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfesseurDash.css')}}">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<div class="container mt-4">
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-xl-12">
          <h2 style="padding-left: 12px;font-family: times;">Liste des professeurs </h2>
          <table class="table-primary  align-middle mb-0 bg-white" id="tableListProfesseur" style="margin-top: 20px;width: 84%;margin-left: 26px;">
            <thead class="" >
              <tr>
                <th>Nom</th>
                <th>Titre</th>
                <th>Status</th>
                <th>Position</th>
                <th>Verification</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($listProfesseur as $item)
                    <tr>
                        <td>
                            <div class="d-felx align-items-center">
                                <img src="{{asset($item->image)}}" class="rounded-circle" style="width:45px;height: 45px;" alt="">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{$item->name}}</p>
                                    <p class="text-muted mb-0">{{$item->email}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">Consultant</p>
                            <p class="text-muted mb-0">Finance</p>
                        </td>
                        <td>
                            <span class="">Active</span>
                        </td>
                        <td>
                            <span class="">Junior</span>
                        </td>
                        <td>non verifie</td>
                        <td>
                            <button type="button" class="btn btn-link" data-mdb-ripple-color="dark">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-link " data-mdb-ripple-color="dark" >
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

<script src="{{asset('js/ScriptDahsboardProfesseur.js')}}"></script>

@endsection()
