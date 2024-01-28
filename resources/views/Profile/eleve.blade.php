
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/StyleEleve.css')}}">
<script src="{{asset('js/ScriptEleve.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<div class="container ContainerEleve">

    <div class="WelcomeEleve">
        <h1>Bienvenue , {{Auth::user()->name}}</h1>
    </div>
    <div class="card text-left" id="bookCard">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <i class="fa-solid fa-calendar-days fa-2xl"></i>
                </div>
                <div class="col-10">  <h4 class="card-title">Réservez votre premier cours</h4>
                    <p class="card-text" style="color:gray">Consultez la liste des professeurs et sélectionnez une classe qui correspond à vos besoins pour commencer.
                        Vous avez également la possibilité de rechercher parmi les enseignants disponibles aux horaires qui vous conviennent.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="bookClass" style="display: none">
        <div class="searchSpace mt-5">
            <div class="row p-3">
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <label for="">Cours :</label>
                            <select class="form-select" id="multiple-select-field" data-placeholder="selected cours" multiple>
                                @foreach ($cours as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-xl-8">
                    <div class="card p-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-xl-3">
                                    <label for="">Date:</label>
                                    <input type="date" class="form-control DateSearch" value="@php echo date('Y-m-d') @endphp">
                                </div>
                                <div class="col-sm-12 col-md-3 col-xl-3">
                                    <label for="">l'heure :</label>
                                    <div class="dropdown dropdownTime">
                                        <button class="btn dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" value=" __:__">
                                            __:__
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="dynamicWidthDropdown" style="width: 39%">
                                            <li>
                                                <div class="ContentTime">
                                                    <div class="container">
                                                        <h4>Sélectionner l'heure</h4>
                                                        <div class="line">
                                                            <span class="text">Matin</span>
                                                        </div>
                                                        <div class="container-hours">
                                                            @php
                                                                $firstNumber = '0';
                                                                $second = ':00';
                                                            @endphp
                                                            @for ($i = 0; $i <= 11; $i++)
                                                                @if ($i % 6 == 0)
                                                                    <div class="btn-row">
                                                                @endif
                                                                <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}">{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}</button>
                                                                @if (($i + 1) % 6 == 0 || $i == 11)
                                                                </div>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <div class="line">
                                                            <span class="text">Après-midi/soirée</span>
                                                        </div>
                                                        <div class="container-hours">
                                                            @php
                                                                $firstNumber = '0';
                                                                $second = ':00';
                                                            @endphp
                                                            @for ($i = 12; $i <= 23; $i++)
                                                                @if ($i % 6 == 0)
                                                                    <div class="btn-row">
                                                                @endif
                                                                <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}">{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}</button>
                                                                @if (($i + 1) % 6 == 0 || $i == 23)
                                                                    </div>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-xl-3">
                                    <label for="" style="margin-left: 5px">Groupe ou Privé: </label>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                                        <input type="radio" class="btn-check typeCours" value="groupe" name="btnradio" id="group" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary" for="group"><i class="fas fa-users "></i></label>

                                        <input type="radio" class="btn-check typeCours" value="prive" name="btnradio" id="private" autocomplete="off">
                                        <label class="btn btn-outline-primary " for="private" style="width:45px ; "><i class="fas fa-user "></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-xl-3">
                                    <button type="button"  class="btn btn-primary mt-5 BtnIntialiser">Reinitialiser</button> {{-- douha ila darna lik mt-3 ka3ma katb9a khadma --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="NoCoursToday"></div>
                    <h4 class="text-uppercase mt-2 ">Cette date pourrait également vous intéresser</h4>
                   {{--  <h5 class="text-secondary mt-4">{{ \Carbon\Carbon::now()->locale('fr')->format('l, j M Y') }}</h5> --}}
                   <h5 class="text-secondary mt-4 DateSelected"></h5>
                    <div class="DataProfesseur">
                        <table class="table mb-0 bg-white table-hover border " id="TableProfesseurIsActive">
                            <thead class="bg-light">
                                <tr class="sr-only">
                                    <th>Time</th>
                                    <th>Name of the teacher</th>
                                    <th>Course</th>
                                    <th>Group/Particular</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="pagination-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #TableProfesseurIsActive_filter
    {
        margin-left: -23rem;
        margin-bottom: 5px
    }
</style>
<script>
    var url = "{{ url('GetpProfesseur') }}";
</script>


@endsection
