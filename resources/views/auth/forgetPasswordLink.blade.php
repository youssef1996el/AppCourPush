@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/StyleLinkPass.css')}}">

<main class="login-form mt-5">
<div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card mt-5" style=" margin:auto">
                  <div class="card-header  h5 text-white bg-primary text-center">Réinitialiser le mot de passe</div>
                  <div class="card-body">

                      <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">

                          <div class="form-group row mb-5">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right ">Email</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mb-5">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" placeholder="Entrer votre nouveau mot de passe" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row mb-5">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmer le mot de passe</label>
                              <div class="col-md-6">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confimer votre  mot de passe" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary w-100">
                                  Valider
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
