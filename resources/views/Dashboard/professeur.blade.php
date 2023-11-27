@extends('Dashboard.index')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfesseurDash.css')}}">

<div class="container mt-4">
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-xl-12">
          <h2 style="padding-left: 12px;font-family: times;">Liste des professeurs </h2>
          <table class="table-primary  align-middle mb-0 bg-white" style="margin-top: 20px;width: 84%;margin-left: 26px;">
            <thead class="">
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
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <img
                        src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                        class="rounded-circle"
                        alt=""
                        style="width: 45px; height: 45px"
                        />
                    <div class="ms-3">
                      <p class="fw-bold mb-1">Alex Ray</p>
                      <p class="text-muted mb-0">alex.ray@gmail.com</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-1">Consultant</p>
                  <p class="text-muted mb-0">Finance</p>
                </td>
                <td>
                  <span class=""
                        >Active</span
                    >
                </td>
                <td>
                  <span class=""
                        >Junior</span
                    >
                </td>

                <td>non verifie</td>
                <td>
                  <button
                          type="button"
                          class="btn btn-link"
                          data-mdb-ripple-color="dark"
                          >
                          <i class="fa-solid fa-eye"></i>
                  </button>
                  
                  <button
                          type="button"
                          class="btn btn-link "
                          data-mdb-ripple-color="dark"
                          >
                          <i class="fa-solid fa-trash"></i>

                  </button>
                </td>
              </tr>
            
            </tbody>
          </table>
        </div>
    </div>
</div>



@endsection()