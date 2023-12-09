@extends('Dashboard.index')
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
                <th>Status</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($listeleve as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{$item->image}}" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
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
                            <button type="button" class="btn btn-link" data-mdb-ripple-color="dark" >
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-link " data-mdb-ripple-color="dark">
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
<script src="{{asset('js/ScriptDashboardEleve.js')}}"></script>
@endsection()
