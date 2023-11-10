@extends('layouts.app')

@section('content')
<script src="{{asset('js/ScriptLogin.js')}}"></script>
<div class="container">
    <section class="vh-100" >
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 0;">
                <div class="card-body p-5 text-center">

                  <h3 class="mb-5 ">Se connecter</h3>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4" >
                       <i class="fa fa-user" aria-hidden="true"> <input id="email" placeholder="Email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
</i>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="sr-only form-label" for="typeEmailX-2">Email</label>
                    </div>

                    <div class="form-group mb-4" >
                        <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                        <input id="password" placeholder="Mot de passe"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <label class="sr-only form-label" for="typePasswordX-2">Password</label>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check mb-4">
                    <a href="#"class="forgetPassword" >Mot de passe oublié ?</a>
                    </div>



                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        {{ __('Se connecter') }}
                    </button>
                    
                  </form>
                  <div class="divLine mb-4 mt-4">
        <div class="line" ></div>
        <div class="text">OU</div>
        <div class="line" ></div>
    </div>
                    <a href="{{url('auth/google')}}" class="btn btn-lg btn-block btn-light btn-google" ><i class="fab fa-google me-2"></i>Se connecter avec google</a>

                    <button class="btn btn-lg btn-block btn-primary mb-2" 
                        type="submit"><i class="fa-brands fa-facebook me-2"></i>Se connecter avec facebook</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    {{-- <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@endsection
