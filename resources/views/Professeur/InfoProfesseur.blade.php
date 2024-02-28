@extends('Dashboard.templateAdmin')
@section('navsidebar')
<link rel="stylesheet" href="{{asset('css/StyleInfoProf.css')}}">

<div class="container">
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card shadow" style=" margin: auto; background: #ffffff4a;" >
        <form action="{{url('UpdateInfoProfesseur')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h3 class="mb-5 mt-3 text-center" >LES INFORMATIONS PERSONNELLES </h3>
                <div class="row" style="padding: 12px;">
                    <div class="picture-container mb-5">
                        <div class="picture">

                            <img src="{{ $DataProfesseur->image == '' ? asset('image/default-avatar.png') : $DataProfesseur->image}}" class="picture-src" id="wizardPicturePreview" title=""/>
                            <input type="file" id="wizard-picture" name="image">

                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6 ">
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Nom complet</label>
                            <input type="text" class="form-control" placeholder="nom" value="{{$DataProfesseur->name}}" name="name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">télephone</label>
                            <input type="text" class="form-control" placeholder="Prénom" value="{{$DataProfesseur->telephone}}" name="telephone">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Titre</label>
                            <input type="text" class="form-control" placeholder="nom" value="{{$DataProfesseur->title}}" name="title">
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6 ">
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Email</label>
                            <input type="email" class="form-control" placeholder="nom" value="{{$DataProfesseur->email}}" name="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Date naissance</label>
                            <input type="date" class="form-control" placeholder="Prénom" value="{{$DataProfesseur->datenaissance}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="mb-1">Méthode</label>
                            <textarea name="description" id="" class="form-control"  rows="3">{{$DataProfesseur->description}}</textarea>
                        <div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
            <button type="submit" class="btn btn-success  BtnUpdateDataProfesseur" style="display:flex; margin:auto">Valider</button>
            </div>
        </form>
    </div>
</div>

 

<script>
$(document).ready(function ()
{

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
    </script>
@endsection
