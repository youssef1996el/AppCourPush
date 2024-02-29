
@extends('Dashboard.templateAdmin')
@section('navsidebar')


<link rel="stylesheet" href="{{asset('css/StyleEleve.css')}}">
<script src="{{asset('js/ScriptEleve.js')}}"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="card bg-light p-3 " id="bookCard">
        <div class="d-flex flex-column flex-md-row align-items-center">
            <svg style="margin: auto 20px; width:100px;" class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium css-1y2jtx7" focusable="false" aria-hidden="true" viewBox="0 0 56 56" width="56" height="56" fill="none">
                <g clip-path="url(#clip0_1649_12757)">
                    <path d="M3.71566 15.7936L3.7156 45.3574C3.71559 51.2353 8.48054 56.0002 14.3584 56.0002L41.6415 56.0002C47.5194 56.0002 52.2843 51.2353 52.2844 45.3574L52.2844 15.7936H3.71566Z" fill="url(#paint0_linear_1649_12757)"></path>
                    <path d="M3.71558 15.4532C3.71558 10.9415 7.37304 7.28406 11.8848 7.28406H44.1036C48.6153 7.28406 52.2728 10.9415 52.2728 15.4532V20.9588H3.71558V15.4532Z" fill="url(#paint1_linear_1649_12757)"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M38.1532 0.230225C39.7562 0.230225 41.0558 1.52976 41.0558 3.13281V10.873C41.0558 12.4761 39.7562 13.7756 38.1532 13.7756C36.5501 13.7756 35.2506 12.4761 35.2506 10.873V3.13281C35.2506 1.52976 36.5501 0.230225 38.1532 0.230225Z" fill="#1A2B7B"></path>
                    <path d="M17.8352 0.230225C19.4383 0.230225 20.7378 1.52976 20.7378 3.13281V10.873C20.7378 12.4761 19.4383 13.7756 17.8352 13.7756C16.2321 13.7756 14.9326 12.4761 14.9326 10.873V3.13281C14.9326 1.52976 16.2321 0.230225 17.8352 0.230225Z" fill="#1A2B7B"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.2127 28.6037C21.2127 27.0446 19.9487 25.7806 18.3896 25.7806H13.1649C11.6057 25.7806 10.3418 27.0446 10.3418 28.6037V33.8284C10.3418 35.3876 11.6057 36.6515 13.1649 36.6515H18.3896C19.9487 36.6515 21.2127 35.3876 21.2127 33.8284V28.6037ZM33.8202 28.6038C33.8202 27.0446 32.5562 25.7807 30.9971 25.7807H25.7724C24.2133 25.7807 22.9493 27.0446 22.9493 28.6038V33.8284C22.9493 35.3876 24.2133 36.6515 25.7724 36.6515H30.9971C32.5562 36.6515 33.8202 35.3876 33.8202 33.8284V28.6038ZM10.3418 41.2113C10.3418 39.6522 11.6058 38.3882 13.1649 38.3882H18.3896C19.9487 38.3882 21.2127 39.6522 21.2127 41.2113V46.436C21.2127 47.9952 19.9487 49.2591 18.3896 49.2591H13.1649C11.6058 49.2591 10.3418 47.9952 10.3418 46.436V41.2113ZM33.8202 41.2113C33.8202 39.6522 32.5562 38.3882 30.9971 38.3882H25.7724C24.2133 38.3882 22.9493 39.6522 22.9493 41.2113V46.436C22.9493 47.9952 24.2133 49.2591 25.7724 49.2591H30.9971C32.5562 49.2591 33.8202 47.9952 33.8202 46.436V41.2113ZM46.454 41.2113C46.454 39.6522 45.1901 38.3882 43.6309 38.3882H38.4063C36.8471 38.3882 35.5832 39.6522 35.5832 41.2113V46.436C35.5832 47.9952 36.8471 49.2591 38.4063 49.2591H43.6309C45.1901 49.2591 46.454 47.9952 46.454 46.436V41.2113ZM35.5832 28.6038C35.5832 27.0446 36.8471 25.7807 38.4063 25.7807H43.6309C45.1901 25.7807 46.454 27.0446 46.454 28.6038V33.8284C46.454 35.3876 45.1901 36.6515 43.6309 36.6515H38.4063C36.8471 36.6515 35.5832 35.3876 35.5832 33.8284V28.6038Z" fill="white"></path>
                </g>
                <defs>
                    <linearGradient id="paint0_linear_1649_12757" x1="3.71558" y1="56.0002" x2="41.2335" y2="7.2831" gradientUnits="userSpaceOnUse">
                        <stop offset="0.0401478" stop-color="#D0D8FF"></stop>
                        <stop offset="0.941805" stop-color="#FFD6F5"></stop>
                    </linearGradient>
                    <linearGradient id="paint1_linear_1649_12757" x1="26.5" y1="7" x2="23" y2="21" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#7B79E7"></stop>
                        <stop offset="1" stop-color="#BD61E1"></stop>
                    </linearGradient>
                    <clipPath id="clip0_1649_12757">
                        <rect width="56" height="56" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
            <div class="card-body">
                <p class="card-text text-secondary fs-4 text-black">Réservez votre premier cours</p>
                <p class="card-text text-secondary" style="font-size: 14px">Consultez la liste des professeurs et sélectionnez une classe qui correspond à vos besoins pour commencer.
                        Vous avez également la possibilité de rechercher parmi les enseignants disponibles aux horaires qui vous conviennent.</p>
            </div>
        </div>
    </div>

   <div id="bookClass" class="card bg-light " style="display: none; margin-top:22px;">
        <div class="searchSpace mt-3">
            <div class="row p-3">
                <div class="col-sm-12 col-md-4 col-xl-4 p-2">
                    <div class="card" style="min-height: 101%">
                        <div class="card-body">
                            <label for="">Cours :</label>
                            <select class="form-select select-course" id="multiple-select-field" data-placeholder="selected cours" multiple>
                                @foreach ($cours as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-md-8 col-xl-8 p-2">
                    <div class="card p-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-1 col-xl-1" style="display: flex;justify-content: end;margin-top: -20px;align-items: baseline;">
                                    <button type="button"  class="btn  BtnIntialiser"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                </div>
                                <div class="col-sm-12 col-md-4 col-xl-4 mb-3">
                                    <label for="">Date:</label>
                                    <input type="date" class="form-control DateSearch " value="@php echo date('Y-m-d') @endphp">
                                </div>
                                <div class="col-sm-12 col-md-3 col-xl-3 mb-3 ">
                                    <label for="">l'heure :</label>
                                    <div class="dropdown dropdownTime " >
                                        <button class="btn dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" value=" __:__">
                                            __:__
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="dynamicWidthDropdown" style="background:transparent;width: 39%;border:none">
                                            <li>
                                                <div class="ContentTime" style="background:white">
                                                    <div class="container-time">
                                                        <h4 style="text-align: center;margin: 16px;">Sélectionner l'heure</h4>
                                                        <div class="line">
                                                            <span class="text">Matin</span>
                                                        </div>
                                                        <div class="container-hours">
                                                            @php
                                                                $firstNumber = '0';
                                                                $second = ':00';
                                                            @endphp
                                                            @for ($i = 0; $i <= 11; $i++)
                                                                @if ($i % 4 == 0)
                                                            <div class="btn-row">
                                                                @endif
                                                                <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}">{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}</button>
                                                                @if (($i + 1) % 4 == 0 || $i == 11)
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
                                                                @if ($i % 4 == 0)
                                                                <div class="btn-row">
                                                                    @endif
                                                                    <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}">{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}</button>
                                                                    @if (($i + 1) % 4 == 0 || $i == 23)
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
                                <div class="col-sm-12 col-md-4 col-xl-4 mb-3 ">
                                    <label for="" class="TitleGroupePrive" style="display: block ruby;">Groupe/Particulier: </label>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                                        <input type="radio" class="btn-check typeCours" value="groupe" name="btnradio" id="group" autocomplete="off" >
                                        <label class="btn btn-outline-primary" for="group" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
                                            <i class="fas fa-users " ></i>
                                        </label>

                                        <input type="radio" class="btn-check typeCours" value="prive" name="btnradio" id="private" autocomplete="off">
                                        <label class="btn btn-outline-primary " for="private" style="width:45px ;border-top-right-radius: 10px;border-bottom-right-radius: 10px; "><i class="fas fa-user "></i></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="NoCoursToday"></div>
                    <h4 class="text-uppercase mt-2 ">Cette date pourrait également vous intéresser</h4>
                    <h5 class="text-secondary mt-4 DateSelected"></h5> --}}
                    {{-- <div class="DataProfesseur">
                        <table class="table table-stripped mb-0 bg-white table-hover border " id="TableProfesseurIsActive">
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
                    </div> --}}
                    <div class="pagination-container"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="card  mt-2" style="display: none; padding: 22px 22px 22px 22px !important;" id="CardShowDataProfesseur">
        <div class="NoCoursToday"></div>
        <h4 class="text-uppercase mt-2 TitleHasCours">Cette date pourrait également vous intéresser</h4>
        <h5 class="text-secondary mt-4 DateSelected"></h5>
        <div class="DataProfesseur ">
            <div class="table-responsive">
                <table class="table mb-0 bg-white table-hover border " id="TableProfesseurIsActive">
                    <thead class="bg-light">
                        <tr class="sr-only">
                            <th scope="col">Time</th>
                            <th scope="col">Name of the teacher</th>
                            <th scope="col">Course</th>
                            <th scope="col">Group/Particular</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- <div id="bookClass" class="card bg-light mt-4">
    <div class="searchSpace mt-3">
        <div class="row p-3">
            <div class="col-md-4 p-2">
                <div class="card">
                    <div class="card-body">
                        <label for="">Cours :</label>
                        <select class="form-select select-course" id="multiple-select-field" data-placeholder="selected cours" multiple>
                            @foreach ($cours as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-8 p-2">
                <div class="card p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Date:</label>
                                <input type="date" class="form-control DateSearch " value="@php echo date('Y-m-d') @endphp">
                            </div>
                            <div class="col-md-3">
                                <label for="">l'heure :</label>
                                <div class="dropdown dropdownTime">
                                    <button class="btn dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" value=" __:__">
                                        __:__
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="dynamicWidthDropdown">
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
                                                                @if ($i % 4 == 0)
                                                            <div class="btn-row">
                                                                @endif
                                                                <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}">{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}</button>
                                                                @if (($i + 1) % 4 == 0 || $i == 11)
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
                                                                @if ($i % 4 == 0)
                                                                <div class="btn-row">
                                                                    @endif
                                                                    <button type="button" class="btn w-25 border border-primary py-2 mt-2 btnTime" style="margin: 5px 5px 5px 5px;" value="{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}">{{$i >= 10 ? $i.$second : $firstNumber.$i.$second}}</button>
                                                                    @if (($i + 1) % 4 == 0 || $i == 23)
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
                            <div class="col-md-3">
                                <label for="" class="TitleGroupePrive">Groupe ou Privé: </label>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                                <input type="radio" class="btn-check typeCours" value="groupe" name="btnradio" id="group" autocomplete="off" >
                                        <label class="btn btn-outline-primary" for="group" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">
                                            <i class="fas fa-users "></i>
                                        </label>

                                        <input type="radio" class="btn-check typeCours" value="prive" name="btnradio" id="private" autocomplete="off">
                                        <label class="btn btn-outline-primary " for="private" style="width:45px ;border-top-right-radius: 10px;border-bottom-right-radius: 10px; "><i class="fas fa-user "></i></label>

                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end align-items-baseline">
                                <button type="button" class="btn BtnIntialiser"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-container mt-3"></div>
            </div>
        </div>
    </div>
</div>

<div class="card p-2 mt-2" id="CardShowDataProfesseur" style="display: none;">
    <div class="NoCoursToday"></div>
    <h4 class="text-uppercase mt-2 ">Cette date pourrait également vous intéresser</h4>
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
</div> -->

<style>
    @media only screen and (max-width: 500px) {
        .dropdown-toggle{
            /* width:32%; */
        }

}
@media only screen and (max-width: 800px) {
        .dropdown-toggle{
            width:51%;
        }
        .table-responsive {
        overflow-x: auto;
    }



}

</style>
</div>

<script>
    var url = "{{ url('GetpProfesseur') }}";
</script>


@endsection
