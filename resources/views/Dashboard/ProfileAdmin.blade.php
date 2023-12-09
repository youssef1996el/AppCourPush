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
{{-- <style>

@media (min-width: 768px)
{
    .col-sm-offset-1
    {
        margin-left: 8.33333333%;
    }
}


@media (min-width: 768px)
{
    .col-sm-4
    {
        width: 33.33333333%;
    }
}
@media (min-width: 768px)
{
    .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left;
    }
}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.wizard-card .picture-container {
    position: relative;
    cursor: pointer;
    text-align: center;
}
.wizard-card .picture {
    width: 106px;
    height: 106px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 5px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.wizard-card .picture-src {
    width: 100%;
}
img {
    vertical-align: middle;
}
img {
    border: 0;
}
.wizard-card .picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}
h6, .h6 {
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
}
</style> --}}
@endsection
