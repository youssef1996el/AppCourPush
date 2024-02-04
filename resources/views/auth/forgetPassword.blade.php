@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/forgetPass.css')}}">

<main class="login-form mt-5">
  <div class="container">
      <div class="row justify-content-center">
           <div class="col-md-8">
                <div class="card text-center mt-4" style="width: 450px; margin:auto">
                    <div class="card-header h5 text-white bg-primary">Réinitialisez votre mot de passe</div>
                        <div class="card-body px-5">
                            @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                             @endif
                             
                            <form action="{{ route('forget.password.post') }}" method="POST">
                            @csrf
                                <p class="card-text py-2">
                                Entrez votre adresse e-mail que vous avez utilisée dans votre profil.<br>
                                Nous vous enverrons un e-mail avec votre nom d'utilisateur et un lien pour réinitialiser votre mot de passe.         </p>
                                <div class="form-group input-control">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <input type="email" id="email_address" class="form-control my-3" placeholder="Entrer votre adresse email"  name="email" required autofocus />
                                    <label class="form-label sr-only" for="email_address" > Email</label>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                  Continuer
                                </button>
                            </form>
                            <div class="d-flex justify-content-between mt-4">
                                <a class="" href="{{ route('login') }}">Login</a>
                                <a class="" href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>       
                             
             <!--  <div class="card">
                  <div class="card-header">Réinitialisez votre mot de passe</div>
                  <div class="card-body">

                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </form>

                  </div>
              </div> -->
             
       
        
 


</main>
@endsection
