@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/StyleReserver.css')}}">

    <div class="container mt-5">
        <div class="pervious" style="margin-top:5rem;">
            <a href="{{ url()->previous() }}">
                <i class="fa fa-arrow-left" aria-hidden="true">
                    <span>Retour</span>
                </i>
            </a>
        </div>
        <div class="panel card rounded-2 mt-4 mb-5">
            <h3>Prêt à poursuivre votre parcours linguistique dès aujourd'hui ?</h3>
            <h5>Nos formules flexibles comprennent :</h5>
            <ul>
                <li>Les cours en mini-groupes, avec un maximum de 4 élèves, sont proposés à un tarif avantageux de 17 €/h.
                <li>Bénéficiez d'une attention personnalisée avec nos cours particuliers, disponibles à 34 €/h.
            </ul>
            </p>
            <p class="text-p">Continuez à progresser à votre rythme avec la formule qui répond à vos besoins linguistiques.</p>
        </div>
        <h3 class="mt-3 ">La Langue Arabe  </h3>


        <div class="row mt-5">

            @if ($TypeCours === 'groupe')
                <div class="col-sm-12 col-md-4 col-xl-4 m-auto">
                    <div class="card-prix">
                        <div class="header">
                            <span class="title">Cours en groupe</span>
                            <span class="PriceGroupe"></span>
                        </div>
                            <p class="desc">Apprentissage en groupe pour favoriser l'interaction sociale. Idéal pour ceux qui apprécient la dynamique de groupe.</p>
                            <ul class="lists">
                                <li class="list">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Interaction sociale</span>
                                </li>
                                <li class="list">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>4 élèves maximum</span>
                                </li>
                                <li class="list">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Diversité des points de vue</span>
                                </li>
                            </ul>
                            <button type="button" class="action" >Commencer</button>

                    </div>
                </div>
            @else
                <div class="col-sm-12 col-md-4 col-xl-4 m-auto">

                    <div class="card-prix">
                        <div class="header">
                            <span class="title">Cours particulier</span>
                            <span class="PricePrive"></span>
                        </div>
                        <p class="desc">Cours personnalisé avec une attention individuelle. Idéal pour ceux qui préfèrent un apprentissage sur mesure.</p>
                        <ul class="lists">
                            <li class="list">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Enseignement adapté</span>
                            </li>
                            <li class="list">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Coût abordable</span>
                            </li>
                            <li class="list">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span>Flexibilité d'horaire</span>
                            </li>
                        </ul>
                        <button type="button" class="action" onclick="window.location='{{ url('/Account/store/checkout') }}'">Commencer</button>
                    </div>
                </div>

            @endif


            </div>


    </div>

<script>
    $(document).ready(function () {
        var Time = @json($Time);
        var NameProfesseur = @json($NameProfesseur);
        var cours = @json($Cours);
        var typeCours = @json($TypeCours);
        var randomNumber = Math.floor(Math.random() * (999999 - 100000 + 1)) + 100000;

        $('.action').on('click',function()
        {
            var Montant = 0;
            if(typeCours === 'groupe')
            {
                Montant = $('.PriceGroupe').text();
            }
            else
            {
                Montant = $('.PricePrive').text();
            }

            var checkout = "/Acount/store/checkout/"+ encodeURIComponent(Time) + "/" + encodeURIComponent(NameProfesseur) + "/"  + encodeURIComponent(cours) + "/"  + encodeURIComponent(typeCours) + "/"  + encodeURIComponent(randomNumber) + "/" + encodeURIComponent(Montant);
            window.location.href = checkout;
        });
        function GetPrice()
        {
            $.ajax({
                type: "get",
                url: "{{url('GetPriceGroupeOrPrive')}}",
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        var priceText = response.Prive[0]['prix'];
                        var priceInteger = parseInt(priceText, 10);

                        $('.PricePrive').text(priceInteger + " €").css('color', '#fff');
                        var groupePriceText = response.Groupe[0]['prix'];
                        var groupePriceInteger = parseInt(groupePriceText, 10);

                        $('.PriceGroupe').text(groupePriceInteger + " €").css('color', '#fff');
                    }
                }
            });
        }
        GetPrice();

    });
</script>
@endsection
