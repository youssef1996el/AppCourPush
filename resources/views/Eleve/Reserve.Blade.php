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
        <div class="panel card rounded-2 mt-4 mb-5">
            <h3>Commencez votre parcours linguistique gratuitement</h3>
            <p>Toutes les formules comprennent un essai gratuit de 7 jours avant que votre abonnement payant ne commence.<br> Assistez gratuitement à un cours particulier ou jusqu'à trois cours en groupe.</p>
        </div>
        <h2 class="mt-3">Choisir un cours</h2>
        <h3 class="mt-3 text-muted">Langue arabe</h3>

        <div class="row mt-5">
            <div class="col-sm-12 col-md-2 col-xl-2 "></div>

                <div class="col-sm-12 col-md-4 col-xl-4 ">

                    <div class="card-prix">
                        <div class="header">
                            <span class="title">Cours particulier</span>
                            <span class="price">17 €/h</span>
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
                                    <span>4 élèves maximum</span>
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
                <div class="col-sm-12 col-md-4 col-xl-4 ">

                    <div class="card-prix">
                        <div class="header">
                            <span class="title">Cours en groupe</span>
                            <span class="price">34 €/h</span>
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
                                    <span>Coût abordable</span>                                
                                </li>
                                <li class="list">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Diversité des points de vue</span>                                
                                </li>
                            </ul>
                            <button type="button" class="action" onclick="window.location='{{ url('/Account/store/checkout') }}'">Commencer</button>
                        
                    </div>
                </div>
                <div class="col-sm-12 col-md-2 col-xl-2 "></div>

            </div>

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
   
    .card-prix {
  margin-left:18px;
  flex-wrap: wrap;
  align-items: stretch;
  margin-bottom: 2rem;
  width: 290px;
  display: flex;
  flex-direction: column;
  border-radius: 0.25rem;
  background-color: rgba(17, 24, 39, 1);
  padding: 1.5rem;
}

.header {
  display: flex;
  flex-direction: column;
}

.title {
  font-size: 1.5rem;
  line-height: 2rem;
  font-weight: 700;
  color: #fff
}

.price {
  font-size: 3.75rem;
  line-height: 1;
  font-weight: 700;
  color: #fff
}

.desc {
  margin-top: 0.75rem;
  margin-bottom: 0.75rem;
  line-height: 1.625;
  color: rgba(156, 163, 175, 1);
}

.lists {
    margin-bottom: 1.5rem;
  flex: 1 1 0%;
  color: rgba(156, 163, 175, 1);
  margin-left: -35px;
  margin-top: 1rem;

}

.lists .list {
  margin-bottom: 0.5rem;
  display: flex;
  margin-left: 0.5rem
}

.lists .list svg {
  height: 1.5rem;
  width: 1.5rem;
  flex-shrink: 0;
  margin-right: 0.5rem;
  color: rgb(52, 95, 226);
}

.action {
  border: none;
  outline: none;
  display: inline-block;
  border-radius: 0.25rem;
  background-color: rgb(52, 95, 226);
  padding-left: 1.25rem;
  padding-right: 1.25rem;
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  text-align: center;
  font-weight: 600;
  letter-spacing: 0.05em;
  color: white;
}
</style>

@endsection
