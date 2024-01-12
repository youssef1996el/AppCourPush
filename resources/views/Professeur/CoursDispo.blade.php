@extends('Professeur.Sidebar')
@section('navsidebarProf')
 <div class="container">
    <div class="card shadow"  style=" width: 800px;margin: auto;padding: 20px 24px; background: #ffffff4a;">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Liste des cours</h4>
            <p class="card-text">
                <div class="" class="d-flex">
                    <input type="text" id="input-tag">
                    <button type="button" id="AddCours" >Ajouter</button>
                </div>
                <div class="card mt-2">
                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                  <div class="card-body ">
                    <p class="card-text">Body</p>
                  </div>
                </div>
            </p>
        </div>
    </div>
    <div class="card shadow mt-2"  style=" width: 800px;margin: auto;padding: 20px 24px; background: #ffffff4a;">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Disponibilite</h4>
            <p class="card-text">
                <div class="card text-left">
                  <img class="card-img-top" alt="">
                    <div class="card-body">
                    <h4 class="card-title"></h4>
                    <p class="card-text">
                        <div class="row align-items-baseline space">
                            <label class="col-12 col-sm-5 col-lg-4 col-xl-3 touch-input nowrap">
                                <input id="checkbox" type="checkbox">
                                <label for="checkbox">Lundi</label>
                                <span class="checkmark"></span>
                            </label>       
                            <div class="col-auto">

                                <!-- Space 1 -->

                                <div class="space">
                                    <div class="row">

                                        <div class="col-md-3 ">
                                             <label for="" style="white-space: nowrap">Choisir un cours</label>
                                            
                                        </div>

                                        <div class="col-md-3 ">
                                        <label for="">Groupe / Privé</label>
                                            <div class="radio-inputs">
                                                <label>
                                                    <input class="radio-input" value="groupe" type="checkbox" name="typeCours[]">
                                                        <span class="radio-tile">
                                                            <span class="radio-icon">
                                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                                    <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                </label>
                                                <label>
                                                    <input checked class="radio-input" value="prive" type="checkbox" name="typeCours[]">
                                                        <span class="radio-tile">
                                                            <span class="radio-icon">
                                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                                                </svg>
                                                            </span>

                                                        </span>
                                                </label>
                                            </div>                    
                                        </div>
                                        <div class="col-md-2 ">
                                            <label for=""> début</label>
                                            <input type="time" name="heuredebut[]" class="form-control heuredebut">
                                        </div>
                                        <div class="col-md-2 ">
                                            <label for=""> fin</label>
                                            <input type="time" name="heurefin[]" class="form-control heurefin">
                                        </div>
                                        <div class="col-md-2">
                                            <svg height="30" width="30" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; cursor: pointer;margin-left: 12px;" class="RemoveFormDisponiblite">
                                                <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                                <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Space 2 -->  

                                <div class="space">
                                    <div class="row">

                                        <div class="col-md-3 ">
                                             <label for="" class="sr-only" style="white-space: nowrap">Choisir un cours</label>
                                             
                                        </div>

                                        <div class="col-md-3 ">
                                        <label for="" class="sr-only">Groupe / Privé</label>
                                            <div class="radio-inputs">
                                                <label>
                                                    <input class="radio-input" value="groupe" type="checkbox" name="typeCours[]">
                                                        <span class="radio-tile">
                                                            <span class="radio-icon">
                                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                                    <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                </label>
                                                <label>
                                                    <input checked class="radio-input" value="prive" type="checkbox" name="typeCours[]">
                                                        <span class="radio-tile">
                                                            <span class="radio-icon">
                                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                                                </svg>
                                                            </span>

                                                        </span>
                                                </label>
                                            </div>                    
                                        </div>
                                        <div class="col-md-2 ">
                                            <label for="" class="sr-only"> début</label>
                                            <input type="time" name="heuredebut[]" class="form-control heuredebut">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="sr-only"> fin</label>
                                            <input type="time" name="heurefin[]" class="form-control heurefin">
                                        </div>
                                        <div class="col-md-2">
                                            <svg height="30" width="30" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; cursor: pointer;margin-left: 12px;" class="RemoveFormDisponiblite">
                                                <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                                <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Space 3 -->

                                <div class="space">
                                    <div class="row">

                                        <div class="col-md-3 ">
                                             <label class="sr-only" for="" style="white-space: nowrap">Choisir un cours</label>
                                        </div>

                                        <div class="col-md-3 ">
                                        <label for="" class="sr-only">Groupe / Privé</label>
                                            <div class="radio-inputs">
                                                <label>
                                                    <input class="radio-input" value="groupe" type="checkbox" name="typeCours[]">
                                                        <span class="radio-tile">
                                                            <span class="radio-icon">
                                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                                    <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                </label>
                                                <label>
                                                    <input checked class="radio-input" value="prive" type="checkbox" name="typeCours[]">
                                                        <span class="radio-tile">
                                                            <span class="radio-icon">
                                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                                                </svg>
                                                            </span>

                                                        </span>
                                                </label>
                                            </div>                    
                                        </div>
                                        <div class="col-md-2 ">
                                            <label for="" class="sr-only"> début</label>
                                            <input type="time" name="heuredebut[]" class="form-control heuredebut">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="sr-only"> fin</label>
                                            <input type="time" name="heurefin[]" class="form-control heurefin">
                                        </div>
                                        <div class="col-md-2">
                                            <svg height="30" width="30" xmlns="http://www.w3.org/2000/svg" style="margin-top: 5px; cursor: pointer;margin-left: 12px;" class="RemoveFormDisponiblite">
                                                <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                                <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                    </p>
                  </div>
                </div>
            </p>
        </div>
    </div>
<style>
    /******************************** CSS GRoupe Prive*/
.radio-inputs {
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 176px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.radio-inputs > * {
  margin: 2px;
}

.radio-input:checked + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  color: #2260ff;
}

.radio-input:checked + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
  background-color: #2260ff;
  border-color: #2260ff;
}

.radio-input:checked + .radio-tile .radio-icon svg {
  fill: #2260ff;
}

.radio-input:checked + .radio-tile .radio-label {
  color: #2260ff;
}

.radio-input:focus + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}

.radio-input:focus + .radio-tile:before {
  transform: scale(1);
  opacity: 1;
}

.radio-tile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 51px;
  min-height: 39px;
  border-radius: 0.5rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0.15s ease;
  cursor: pointer;
  position: relative;
}

.radio-tile:before {
  content: "";
  position: absolute;
  display: block;
  width: 0.75rem;
  height: 0.75rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  border-radius: 50%;
  top: 0.25rem;
  left: 0.1rem;
  opacity: 0;
  transform: scale(0);
  transition: 0.25s ease;
}

.radio-tile:hover {
  border-color: #2260ff;
}

.radio-tile:hover:before {
  transform: scale(1);
  opacity: 1;
}

.radio-icon svg {
  width: 2rem;
  height: 2rem;
  fill: #494949;
}

.radio-label {
  color: #707070;
  transition: 0.375s ease;
  text-align: center;
  font-size: 13px;
}

.radio-input {
  clip: rect(0 0 0 0);
  -webkit-clip-path: inset(100%);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}

</style>
</div>
@endsection
