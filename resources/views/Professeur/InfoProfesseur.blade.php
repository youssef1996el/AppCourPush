@extends('Professeur.Sidebar')
@section('navsidebarProf')
    <p class="text-upperace text-danger fs-1">saybi index deyal navigation</p>
    <div class="container">
        <div class="card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <label for="">Nom</label>
                        <input type="text" class="form-control" placeholder="nom" value="{{$DataProfesseur->nom}}">

                        <label for="">Email</label>
                        <input type="email" class="form-control" placeholder="nom" value="{{$DataProfesseur->email}}">

                        <label for="">Pays</label>
                        <input type="text" class="form-control" placeholder="nom" value="{{$DataProfesseur->pays}}">

                        <label for="">Titre</label>
                        <input type="text" class="form-control" placeholder="nom" value="{{$DataProfesseur->title}}">

                        <label for="">img</label>
                        <img src="{{$DataProfesseur->image}}" class="w-25" alt="">
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <label for="">Prénom</label>
                        <input type="text" class="form-control" placeholder="Prénom" value="{{$DataProfesseur->prenom}}">

                        <label for="">télephone</label>
                        <input type="text" class="form-control" placeholder="Prénom" value="{{$DataProfesseur->telephone}}">

                        <label for="">Date naissance</label>
                        <input type="date" class="form-control" placeholder="Prénom" value="{{$DataProfesseur->datenaissance}}">

                        <label for="">Méthode</label>
                        <textarea name="" id="" class="form-control"  rows="3">{{$DataProfesseur->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
