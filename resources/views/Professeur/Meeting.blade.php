@extends('Professeur.Sidebar')
@section('navsidebarProf')
<link rel="stylesheet" href="{{asset('css/StyleProfesseurDash.css')}}">
<div class="container mt-4">
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-xl-12">
          <h2 style="padding-left: 12px;font-family: times;">Liste des Réunion </h2>
          <table class="table-primary table-bordered  align-middle mb-0 bg-white w-100" id="tableListEleve" style="margin-top: 20px;width: 84%;">
            <thead class="">
              <tr>
                <th>Nom complet</th>
                <th>Cours</th>
                <th>Type cours</th>
                <th>Days</th>
                <th>Debut</th>
                <th>Fin</th>
                <th>Time zone</th>
                <th>Meeting</th>
                {{-- <th>Actions</th> --}}
              </tr>
            </thead>
            <tbody>
                @foreach ($ElevesMeeting as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                {{-- <img src="{{$item->image}}" class="rounded-circle" id="imgEleve" alt="" /> --}}
                                <div class="ms-3">
                                <p class="text-muted fw-bold mb-1">{{$item->nom_eleve}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-muted mb-0 text-center">{{$item->title}}</p>
                        </td>
                        <td>
                            <p class="text-muted mb-0 text-center">
                                @if($item->typecours === "groupe")
                                    Cours en groupe
                                @else
                                    Cours particulier <br> Un enseignant sera attribué
                                @endif
                            </p>
                        </td>
                        <td>
                            <p class="text-muted mb-0 text-center">{{$item->days}}</p>
                        </td>
                        <td>
                            <p class="text-muted mb-1 text-center">{{$item->times}}</p>
                        </td>
                        <td>
                            <span class="text-muted mb-1 text-center" style="text-align: center">{{$item->fin}}</span>
                        </td>
                        <td>
                            <span class="text-muted mb-1 text-center" style="text-align: center">{{$item->timezone}}</span>
                        </td>
                        <td>
                            <input type="checkbox" {{$item->hasCours == false ? 'disabled' : ''}}>
                            {{-- <a href="#" class="text-primary" title="Create link meeting with student: {{ $item->nom_eleve }}">Create link meeting</a> --}}
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
</div>
@endsection
