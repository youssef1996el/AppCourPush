@extends('Dashboard.index')
@section('navsidebar')
    <div class="row">
        <div class="container">
            <div class="container">
                <h3 class="text-uppercase">profile</h3>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-1">
                <div class="picture-container">
                    <div class="picture">
                        <img src="{{asset('image/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title=""/>
                        <input type="file" id="wizard-picture" name="image">
                    </div>

                    <h6>choisir une photo</h6>
                    <div class="error"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label  >Nom</label>
                    <input name="titre" type="text" class="form-control" placeholder="Ex: Professeur d'arabe" >
                    <div class="error"></div>
                </div>
                <div class="form-group">
                    <label  >Prénom </label>
                    <input name="datenaissance" type="date" class="form-control" id="DateNaissanceProf">
                    <div class="error"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Email:</label>
                    <input type="tel" id="phone" name="phone"  class="form-control" maxlength="13" placeholder="" oninput="formatPhoneNumber(this)" required>

                </div>
                <div class="form-group">
                    <label for="phone">Passowrd:</label>
                    <input type="tel" id="phone" name="phone"  class="form-control" maxlength="13" placeholder="" oninput="formatPhoneNumber(this)" required>
                </div>
                <div class="form-group">
                    <label for="phone">new  PWD:</label>
                    <input type="tel" id="phone" name="phone"  class="form-control" maxlength="13" placeholder="" oninput="formatPhoneNumber(this)" required>

                </div>
                <div class="form-group">
                    <label for="phone">Confirm PWD:</label>
                    <input type="tel" id="phone" name="phone"  class="form-control" maxlength="13" placeholder="" oninput="formatPhoneNumber(this)" required>

                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-12 col-xl-12 ">
                <button class="btn btn-success float-end">Edit</button>
            </div>
        </div>
    </div>
<style>

</style>
@endsection
