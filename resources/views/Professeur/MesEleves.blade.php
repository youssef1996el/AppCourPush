@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleProfesseurDash.css')}}">
<div class="container mt-4">
    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Liste des élèves</h4>
            <div class="row ">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="SliderTable">
                    <table class="table-primary   align-middle mb-0 bg-white w-100" id="tableListEleve" style="margin-top: 20px;width: 84%;">
                        <thead class="">
                        <tr>
                            <th>Nom complet</th>
                            <th>Email</th>
                            <th>Pays</th>
                            <th>Status</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($MesEleves as $item)
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
                                        <p class="text-muted mb-0 text-center">{{$item->email}}</p>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1 text-center">{{$item->pays}}</p>
                                    </td>
                                    <td>
                                        <span class="text-center">Active</span>
                                    </td>
                                    {{-- <td class="d-flex align-items-end">
                                        <button type="button" class="btn btn-link showEleve" data-mdb-ripple-color="dark" data-value={{$item->id}}>
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-link " data-mdb-ripple-color="dark" data-value="{{$item->id}}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="text-center">
                <img  class="" src="{{asset('image/nostudent.png') }}" alt="cours" style="width:200px">
                <h5 class="mt-3">Rien de prévu pour le moment</h5>
                <p class="text-muted">Vous n'avez actuellement aucun élève inscrit à votre cours. N'hésitez pas à promouvoir votre cours et à encourager les étudiants à s'y inscrire.</p>
            </div>
        </div>      </div>
    </div>
    
</div>
<style>
    .SliderTable
    {
        overflow-x: auto
    }
    .SliderTable::-webkit-scrollbar
    {
        width: 10px;
    }
    .SliderTable::-webkit-scrollbar-thumb
    {
        background-color: #094a68;
        border-radius: 10px;
        border: 3px solid #fff;
    }
    .SliderTable::-webkit-scrollbar-track
    {
        background-color: #99c2e9;
        border-radius: 10px;
    }
</style>
@endsection
