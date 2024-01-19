@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:65px;">
    <div class="card shadow " style=" width: 700px;
  margin: auto;
  padding: 20px 24px; background: #ffffff5c;" >
        <div class="card-body">
            <h2>Les prix des cours</h2>
            <div class="row mt-5">
                <div class="col-sm-12 col-md-6 col-xl-6 ">

                    <div class="card">
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
                            <button type="button" class="action">Commencer</button>
                    </div>
                   
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6 ">

                    <div class="card">
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
                            <button type="button" class="action">Commencer</button>
                        
                    </div>
                </div>
            </div>
       </div>
    </div>
               
</div>
<style>
    .card {
  margin-left:18px;
  flex-wrap: wrap;
  align-items: stretch;
  margin-bottom: 2rem;
  width: 260px;
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