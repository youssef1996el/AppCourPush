@extends('layouts.app')

@section('content')

    <script src="{{asset('js/niceCountryInput.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/niceCountryInput.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/StyleRegister.css')}}">

    <script src="{{asset('js/ScriptRegister.js')}}"></script>
<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="form-eleve col-md-8 mt-3">

            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3 " id="ex1" role="tablist" style="" >
                <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">élève</a>
                </li>
                <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                    aria-controls="pills-register" aria-selected="false">professeur</a>
                </li>
            </ul>
            <!-- Pills navs -->

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
                    <form method="POST" action="{{ route('register') }}" id="formEleve">
                        @csrf

                        <!-- Nom input -->
                        <div class="form-group mb-4 input-control">
                            <input type="text" id="nomEleve"  placeholder="Nom" class="form-control @error('nom') is-invalid @enderror"  name="nom"/>
                            <div class="error ErrorValidation"></div>


                            <label class="form-label sr-only" for="loginName">Nom</label>
                        </div>
                        <!-- Prenom input -->
                        <div class="form-group mb-4 input-control">
                            <input type="text" id="prenomEleve" placeholder="Prénom" class="form-control @error('prenom') is-invalid @enderror" name="prenom"/>
                            <div class="error ErrorValidation"></div>
                            <label class="form-label sr-only" for="loginName">Prénom</label>
                        </div>
                        <!-- Email input -->
                        <div class="form-group mb-4 input-control">
                            <input type="email" id="emailEleve" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email"/>
                            <div class="error ErrorValidation"></div>

                            <label class="form-label sr-only" for="loginName">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-4 input-control">
                            <input type="password" name="password" placeholder="Mot de passe" id="passwordEleve" class="form-control @error('password') is-invalid @enderror" />
                            <i class="fa-solid fa-eye show-password" id="eye" ></i>
                         
                            <div class="error ErrorValidation"></div>
                            


                            <label class="form-label sr-only" for="loginPassword">Mot de passe</label>
                        </div>
                        <!-- Confirme Password input -->
                        <div class="form-group mb-4 input-control">
                            <input  id="confirmPasswordEleve" type="password" placeholder="Confirmer votre mot de passe" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            <i class="fa-solid fa-eye show-password" id="eye" ></i>
                            <div class="error ErrorValidation"></div>
                            <div class="checkPassword" style="display: none"></div>
                            <label for="password-confirm" class="sr-only form-label">{{ __('Confirm Password') }}</label>
                        </div>
                        <!-- pays input -->
                        <div class="form-group mb-4 input-control">
                            <label class="form-label" for="loginName" style="margin-left: 14px;">Pays</label>
                            <div class="niceCountryInputSelector @error('pays') is-invalid @enderror"  data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback" class="form-control"  >
                            </div>
                            <div class="error ErrorValidation"></div>

                            <input type="text" name="pays" id="pays" hidden>

                        </div>
                        <input type="text" value="eleve" name="role_name" hidden>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary mb-5 mt-3" style="margin-left: 30px; width: 86%;">Créer un compte</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p style="color: gray;">Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter </a></p>
                        </div>
                        <div class="container divLine" >
                            <div class="line" ></div>
                            <div class="text" >OU</div>
                            <div class="line" ></div>
                        </div>

                        <div class="text-center mb-3 ">
                            <p  style="color: gray;" class="mb-3">Liez un compte pour continuer </p>
                            <a href="{{url('auth/google')}}" type="submit" class="btn btn-lg  btn-light btn-google" ><i class="fab fa-google me-2"></i></a>

                            <a class="btn btn-lg  btn-primary mb-2 btn-facebook" href="" type="submit">
                            <i class="fa-brands fa-facebook me-2"></i></a>
                        </div>

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
                    <form method="POST" action="{{ route('register') }}" id="formProfesseur">
                        @csrf


                        <!-- Nom input -->
                        <div class="form-group mb-4 input-control">
                            <input type="text" id="nomProfesseur" placeholder="Nom" class="form-control @error('nom') is-invalid @enderror" name="nom"/>
                            <div class="error ErrorValidation"></div>

                            <label class="form-label sr-only" for="registerName">Nom</label>
                        </div>
                        <!-- Prenom input -->
                        <div class="form-group mb-4 input-control">
                            <input type="text" id="prenomProfesseur" placeholder ="Prénom" class="form-control @error('prenom') is-invalid @enderror" name="prenom"/>
                            <div class="error ErrorValidation"></div>

                            <label class="form-label sr-only" for="registerName">Prénom</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-group mb-4 input-control">
                            <input type="email" id="emailProfesseur"  placeholder ="Email"  class="form-control @error('email') is-invalid @enderror" name="email" />
                            <div class="error ErrorValidation"></div>

                            <label class="form-label sr-only" for="registerEmail">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-group mb-4 input-control">
                            <input type="password" id="passwordProfesseur"  placeholder ="Mot de passe "  class="form-control @error('password') is-invalid @enderror" name="password" />
                            <i class="fa-solid fa-eye show-password" id="eye" ></i>

                            <div class="error ErrorValidation"></div>

                            <label class="form-label sr-only" for="registerPassword">Password</label>
                        </div>

                        <!-- Confirme Password input -->
                        <div class="form-group mb-4">
                            <input id="confirmpasswordProfesseur" type="password"  placeholder ="Confirmer votre mot de passe"  class="form-control confirmpasswordProfesseur" name="password_confirmation"  autocomplete="new-password">
                            <i class="fa-solid fa-eye show-password" id="eye" ></i>

                            <div class="error ErrorValidation" style="color: red ;font-size:14px"></div>
                            <div class="checkPassword" style="display: none"></div>
                            <label for="password-confirm" class="form-label sr-only">{{ __('Confirm Password') }}</label>
                           
                        </div>



                        <input type="text" name="role_name" value="professeur" hidden>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary  mb-5 mt-3 " style="margin-left: 30px; width: 86%;" >Créer un compte</button>
                        <div class="text-center">
                            <p style="color: gray;" >Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter </a></p>
                        </div>
                        <div class="container divLine" >
                            <div class="line" ></div>
                            <div class="text" >OU</div>
                            <div class="line"  ></div>
                        </div>

                        <div class="text-center mb-3 ">
                            <p  style="color: gray;" class="mb-2">Liez un compte pour continuer </p>
                            <a href="{{url('auth/google')}}" type="submit" class="btn btn-lg  btn-light btn-google" ><i class="fab fa-google me-2"></i></a>

                            <a class="btn btn-lg  btn-primary mb-2 btn-facebook" href="" type="submit">
                            <i class="fa-brands fa-facebook me-2"></i></a>
                        </div>

                        <!--div class="text-center mb-3">
                            <p>Sign in with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                            </button>
                        </div>

                        <p class="text-center">or:</p-->
                    </form>
                </div>
            </div>
            <!-- Pills content -->

                <!--div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div-->
        </div>
    </div>
</div>
<script>
  function onChangeCallback(ctr){
            console.log("The country was changed: " + ctr);
            document.getElementById('pays').value = ctr;
        }

        $(document).ready(function () {
            $(".niceCountryInputSelector").each(function(i,e){
                new NiceCountryInput(e).init();
            });


        });
  </script>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();



  </script>

@endsection
