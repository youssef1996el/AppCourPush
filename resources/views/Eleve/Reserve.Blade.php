@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <div class="container mt-5">
        <div class="pervious" style="margin-top:5rem;">
            <a href="{{ url()->previous() }}">
                <i class="fa fa-arrow-left" aria-hidden="true">
                    <span>Retour</span>
                </i>
            </a>
        </div>
        <div class="panel card rounded-2">
            <h3>Commencez votre parcours linguistique gratuitement</h3>
            <p>Toutes les formules comprennent un essai gratuit de 7 jours avant que votre abonnement payant ne commence.<br> Assistez gratuitement à un cours particulier ou jusqu'à trois cours en groupe.</p>
        </div>
        <h2 class="mt-3">Choisir un cours</h2>

        <h3></h3>
    </div>
    <style>
        .panel
        {
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.25rem;
            letter-spacing: -0.1px;
            font-family: "Open Sans";
            border-radius: 8px;
            padding: 24px;
            background-repeat: no-repeat;
            background-origin: border-box;
            overflow: hidden;
            position: relative;
            color: rgb(255, 255, 255);
            background-position: right center;
            background: url('{{ asset("image/background-image.png") }}'), linear-gradient(260.96deg, rgb(21, 59, 255) -80.13%, rgb(153, 0, 204) 100%);
        }
    </style>
@endsection
