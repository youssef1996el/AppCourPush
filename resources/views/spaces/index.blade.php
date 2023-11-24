@extends('layouts.app')

@section('content')

<script src="{{asset('js/niceCountryInput.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/StyleSpace.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/niceCountryInput.css')}}">

<div class="container mt-3">
    <section class="vh-100" >
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card " style="border-radius: 0; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                <div class="card-body p-3 text-center">
                    @if($errors->any())
                        <div class="alert alert-danger" id="error-alert" >
                            <ul style="list-style:none; text-align: left;">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <h3 class="mb-2" >Complétez votre inscription </h3>
                    <p>Pour compléter votre compte,  nous avons besoin de savoir si vous êtes un professeur ou bien un élève . </p>
                   
                    <ul class="nav nav-pills nav-justified mb-3 " id="ex1" role="tablist"  >
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                            aria-controls="pills-login" aria-selected="true">élève</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                            aria-controls="pills-register" aria-selected="false">professeur</a>
                        </li>
                    </ul>
                </div>
                     <!-- Pills content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        @if($errors->any())
                            <div class="alert alert-danger" id="error-alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('LoginWithGoogle') }}" id="formEleve">
                            @csrf
                            <div class="form-group mb-4 input-control" >
                                <input id="email" placeholder="Email" type="email" class="form-control " name="email" value="{{$Email}}"  autofocus autocomplete="off" readonly="readonly">

                                <label class="sr-only form-label" for="typeEmailX-2">Email</label>
                            </div>
                            <!-- Nom input -->
                            <div class="form-group mb-4 input-control" >
                                <input type="text" id="nomEleve"  placeholder="Nom complet" class="form-control" value="{{$name}}"  name="nom" readonly="readonly"/>

                                <label class="form-label sr-only" for="loginName">Nom complet</label>
                            </div>
                            <!-- pays input -->
                            <div class="form-group mb-4 input-control">
                                <label class="form-label" for="loginName" style="margin-left: 30px;">Pays</label>
                                <div class="niceCountryInputSelector "  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                    data-i18nnofilter="No selection" data-i18nfilter="Filter"{{--  data-onchangecallback="onChangeCallback" --}} class="form-control"  >
                                    <input type="text" name="pays" id="pays" hidden>
                                </div>
                                <div class="error"></div>

                            </div>
                            <input type="text" value="eleve" name="role_name" hidden>
                            <input type="text" value="{{$idUser}}" name="idUser" hidden>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary  mb-5 mt-3 " style="float: right; margin-right: 16px;"  ><i class="fas fa-arrow-circle-right    "></i></button>
                        </form>
                    </div>
                    <div class="tab-pane" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        @if($errors->any())
                            <div class="alert alert-danger" id="error-alert">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('LoginWithGoogle') }}" id="formProfesseur">
                            @csrf

                            <div class="form-group mb-4 input-control" >
                                <input id="email" placeholder="Email" type="email" class="form-control " name="email" value="{{$Email}}"  autofocus autocomplete="off" readonly="readonly">
                            </div>                            <!-- Nom input -->
                            <div class="form-group mb-4 input-control">
                                <input type="text" id="nomProfesseur" placeholder="Nom complet" class="form-control @error('nom') is-invalid @enderror" value="{{$name}}" name="nom" readonly="readonly"/>
                                <label class="form-label sr-only" for="registerName">Nom complet</label>
                            </div>
                            <input type="text" name="role_name" value="professeur" hidden>
                            <input type="text" value="{{$idUser}}" name="idUser" hidden>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary  mb-5 mt-3 " style="float: right; margin-right: 16px;"  ><i class="fas fa-arrow-circle-right    "></i></button>
                        </form>
                    </div>
                </div>


        </div>
    </div>
</div>


                  </form>





                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</div>
<script>
     /*  function onChangeCallback(ctr){
            console.log("The country was changed: " + ctr);
            document.getElementById('pays').value = ctr;
        } */

        $(document).ready(function () {
            $('#formEleve').on('submit',function()
            {


                var pays = $('#pays').val();

                if(pays === '')
                {

                    $(this).find('.error').css('color','red').text('pays est requis');

                    return false;
                }
                else
                {

                    $(this).submit();
                    return true;
                }
            })
            $(".niceCountryInputSelector").each(function(i,e){
                new NiceCountryInput(e).init();
            });
        });

        $(document).on('click','.niceCountryInputSelector',function(e)
            {
                var name = $(this).find('.niceCountryInputMenuCountryFlag').next('span').text();
                var countryMatches = name.match(/([^\s]+) \(([^)]+)\)/g);
                var countryName = '';
                if (countryMatches) {

                    countryMatches.some(function (match) {
                        var parts = match.split(" ");
                        countryName = parts[0];
                        var arabicName = parts.slice(1).join(" ");

                        return true;
                    });
                    if(countryName !=="Afghanistan")
                    {
                        countryName = countryName.replace(/Afghanistan$/, '');
                    }


                }
                $(this).find('#pays').val(countryName);
            });
</script>
<style>
    .error{
    margin-left: 20px;
    margin-top: 6px;
    }
    
</style>

@endsection
