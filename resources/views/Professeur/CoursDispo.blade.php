@extends('Dashboard.templateAdmin')
@section('navsidebar')
 <div class="container">
    <div class="card shadow"  style="margin: auto; background: #ffffff4a;">
        <div class="card-body">
            <h4 class="card-title">Liste des cours</h4>
            <div class="List-Courses">
                <div class="input-cours">
                    <div class="input-text">
                        <div class="input-div" class="d-flex">
                            <input type="text" id="input-tag">
                            <button type="button" id="AddCours" >Ajouter</button>
                        </div>
                    </div>
                    <div class="errorCours"></div>
                </div>
                <div class="ListeCours" >
                    <div class="tags-input" >
                        <ul id="tags"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mt-5"  style="margin: auto; background: #ffffff4a;">
        <div class="card-body">
            <h4 class="card-title">Disponibilite</h4>
            <p class="card-text">
                <div class="card text-left">
                    <img class="card-img-top" alt="">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <select class="form-control dropdownTimeZone mb-5" name="timezone"></select>
                        <p class="card-text">
                            <form action="" method="post" id="disponibilityForm">
                                @csrf
                                @foreach ($disponibilityByDay as $day => $items)
                                <div class="row mb-3 DataDisponible ">
                                    <div class="col-sm-12 col-md-2 col-xl-2 daysCheck">
                                        <input name="Days[]" type="checkbox" {{ count($items) > 0 ? 'checked'  : '' }} class="DaysIsRemoveDisponible">
                                        <label for="" class="nameDays" >{{ $day }}</label>
                                        <span class="checkmark"></span>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-xl-10">
                                        @if (count($items) > 0)
                                            <div class="space">
                                                @for ($i = 0; $i < max(3, count($items)); $i++)
                                                    <div class="row">
                                                        @if ($i < count($items))
                                                            <div class="col-md-3 labelhide selection ">
                                                            <label for="" style="white-space: nowrap" {{ $i >= 2 ? 'class=labelhidden' : '' }}>Choisir un cours</label>

                                                                <select name="Cours[]" id="" class="form-select">
                                                                    <option value="{{$items[$i]->idcours}}">{{ $items[$i]->title }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 labelhide radio-buttons">
                                                                <label for="">Groupe / Privé</label>
                                                                <div class="radio-inputs">
                                                                    <label>
                                                                        <input  {{ $items[$i]->typecours == 'groupe' ? 'checked' : '' }} class="radio-input" value="groupe" type="checkbox" name="typeCours[]">
                                                                        <span class="radio-tile">
                                                                            <span class="radio-icon">
                                                                                <svg class="svg-icon" viewBox="0 0 20 20" id="{{ $items[$i]->id }}">
                                                                                    <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                    <label>
                                                                        <input  {{ $items[$i]->typecours == 'prive' ? 'checked' : '' }} class="radio-input" value="prive" type="checkbox" name="typeCours[]">
                                                                        <span class="radio-tile">
                                                                            <span class="radio-icon">
                                                                                <svg class="svg-icon" viewBox="0 0 20 20" id="{{ $items[$i]->id }}">
                                                                                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2  labelhide timeHour">
                                                                <label for=""> Début</label>
                                                                <input type="time" name="heuredebut[]" class="form-control heuredebut" value="{{ $items[$i]->debut }}">
                                                            </div>
                                                            <div class="col-md-2 labelhide timeHour">
                                                                <label for=""> Fin</label>
                                                                <input type="time" name="heurefin[]" class="form-control heurefin" value="{{ $items[$i]->fin }}">
                                                            </div>
                                                        @else
                                                            <div class="col-md-3 labelhide colAppEnd selection ">
                                                                <label for="" class="labelhidden" style="white-space: nowrap">Choisir un cours</label>
                                                                <select name="Cours[]" id="" class="form-select dropDownCoursAppEnd"></select>
                                                            </div>
                                                            <div class="col-md-3 labelhide radio-buttons colAppEnd">

                                                                <label for="" class="labelhidden">Groupe / Privé</label>
                                                                <div class="radio-inputs">
                                                                    <label>
                                                                        <input  class="radio-input" value="groupe" type="checkbox" name="typeCours[]">
                                                                        <span class="radio-tile">
                                                                            <span class="radio-icon">
                                                                                <svg class="svg-icon" viewBox="0 0 20 20" >
                                                                                    <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                    <label>
                                                                        <input  class="radio-input" value="prive" type="checkbox" name="typeCours[]">
                                                                        <span class="radio-tile">
                                                                            <span class="radio-icon">
                                                                                <svg class="svg-icon" viewBox="0 0 20 20" >
                                                                                    <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 labelhide timeHour">
                                                                <label for="" class="labelhidden"> Début</label>
                                                                <input type="time" name="heuredebut[]" class="form-control heuredebut" >
                                                            </div>
                                                            <div class="col-md-2 labelhide timeHour">
                                                                <label for="" class="labelhidden"> Fin</label>
                                                                <input type="time" name="heurefin[]" class="form-control heurefin">
                                                            </div>


                                                        @endif
                                                        <div class="col-md-2">
                                                            @if ($i < count($items))
                                                                <svg id="{{$items[$i]->id}}" class="removeDisponible"  height="30" width="30" xmlns="http://www.w3.org/2000/svg"  >
                                                                    <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                                                    <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                                                </svg>
                                                            @else
                                                                <svg class="removeDisponible"  height="30" width="30" xmlns="http://www.w3.org/2000/svg"  >
                                                                    <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                                                    <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                                                </svg>
                                                            @endif
                                                        </div>
                                                      
                                                    </div>
                                                    @if ($i != 2) 
                                                    <hr class="line ">
                                                    @endif

                                                @endfor
                                                
                                            </div>
                                        @else

                                            <div class="row">
                                                <div class="col-md-12 colNonDisponible">
                                                    <label for="" style="padding: 8px; border: 1px solid; border-radius: 20px; background: #c4c3c370;">non disponible</label>
                                                </div>
                                                <div class="col-md-12 ColDataNonDisponible" style="display: none">
                                                    @for ($i = 0; $i < max(3, count($items)); $i++)
                                                    <div class="row">
                                                        <div class="col-md-3 colAppEnd labelhide selection">
                                                            <label for="" class="labelhidden" style="white-space: nowrap">Choisir un cours</label>
                                                            <select name="Cours[]" id="" class="form-select dropDownCoursAppEnd"></select>
                                                        </div>
                                                        <div class="col-md-3 colAppEnd labelhide radio-buttons">
                                                            <label for="" class="labelhidden">Groupe / Privé</label>
                                                            <div class="radio-inputs">
                                                                <label>
                                                                    <input  class="radio-input" value="groupe" type="checkbox" name="typeCours[]">
                                                                    <span class="radio-tile">
                                                                        <span class="radio-icon">
                                                                            <svg class="svg-icon" viewBox="0 0 20 20" >
                                                                                <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    <input  class="radio-input" value="prive" type="checkbox" name="typeCours[]">
                                                                    <span class="radio-tile">
                                                                        <span class="radio-icon">
                                                                            <svg class="svg-icon" viewBox="0 0 20 20" >
                                                                                <path d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 timeHour labelhide">
                                                            <label for="" class="labelhidden "> Début</label>
                                                            <input type="time" name="heuredebut[]" class="form-control heuredebut" >
                                                        </div>
                                                        <div class="col-md-2 timeHour labelhide">
                                                            <label for="" class="labelhidden"> Fin</label>
                                                            <input type="time" name="heurefin[]" class="form-control heurefin">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <svg class="removeDisponible"  height="30" width="30" xmlns="http://www.w3.org/2000/svg"  >
                                                                <circle cx="15" cy="15" r="13.5" stroke="rgb(48,72,500)" stroke-width="2.25" fill="rgb(255, 1, 1)" />
                                                                <text x="50%" y="50%" font-size="15" text-anchor="middle" fill="white" dy=".3em">X</text>
                                                            </svg>

                                                        </div>
                                                        
                                                    </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endif
                                        <hr>
                                    </div>
                                </div>
                                @endforeach
                            </form>
                            

                            <button type="button" id="UpDateDisponible" class="d-flex m-auto" >sauvegarder</button>
                        </p>
                     </div>
                </div>
            </p>
        </div>
    </div>
<style>

    *{
        font-family:times;
    }
    .ListeCours{
        background:white;
    }
    .card-title{
        font-size: 28px;
        text-align: center;
    }

    .input-text{
        margin: 30px 0px 4px 0;
        display:flex;
        gap:20px;
    }
    .input-div{
        display: flex;
    gap: 4px;
    }
    .input-text .input-div{
        width:100%;
        position:relative;

    }
    .input-div input:focus ~ span,.input-div input:valid ~ span  {
        top:-20px;
        left:6px;
        font-size:14px;
        font-weight:600;
    }
    #input-tag{
        width:100%;
        height: 40px;
        border: none;
        outline: 0;
        border-radius: 5px;
        border: 1px solid #cbced4;
        gap: 20px;
        box-sizing: border-box;

    }
    #AddCours, #UpDateDisponible
    {
        background-color: #4e99e9;
        border: none;
        color: #fff;
        cursor: pointer;
        padding: 8px 20px;
        border-radius: 4px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        transition: .9s ease;
    }
    .tags-input
    {

        Position: relative;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 12px 10px;
        box-shadow: 2px 2px 5px #00000033;
        width: 100%;
        margin-top: 9px;
        max-height: 212px;
        overflow-y: auto;
        height: 195px;
    }
    .tags-input ul
    {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .nameDays{
        font-size: 18px;
        font-weight: bold;
    }

    .tags-input li
    {
        display: inline-block;
        background-color: #c1dae8;
        color: #333;
        border-radius: 20px;
        padding: 5px 10px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .tags-input input[type="text"]
    {
        border: none;
        outline: none;
        padding: 5px;
        font-size: 14px;

    }
    .tags-input .delete-button
    {
        background-color: transparent;
        border: none;
        color: #999;
        cursor: pointer;
        margin-left: 5px;
    }
    .heuredebut, .heurefin
    {
        width: 80%;

    }
    .labelhidden{
            display:none;
        }
<<<<<<< HEAD


=======
    
        .line{
            display: none;
        }
>>>>>>> 195edd08cd6b94076e9b32e9bf1f7264c6d3f3a9
    @media only screen and (max-width: 768px) {
        .labelhidden{
            display:block;
        }
        .row > * {
            padding-left: 17px ;
            margin:auto;
        }
        .radio-inputs
        {
            justify-content: flex-start !important;
        }
        .radio-buttons,.selection,.timeHour
        {
            display: flex;
            justify-content: space-between;   
            gap:20px;     
        }
     
        .form-select, .form-control , .radio-inputs{
            margin-bottom:22px;
        }
        .heuredebut, .heurefin{
            width: 66%;
            text-align: center;
        }
        .daysCheck{
            text-align: center;
            margin: 16px auto;
        }

        .removeDisponible{
          
            background: #3174dc;
            width: 70px;
            margin-top: 0px !important;
            height: 36px;
            margin-bottom: 20px;

        }
        circle{
            display: none;
        }
        .line{
            display: block;
        }
     

      /*  .labelhide{
            display: flex ;
            gap: 20px;
        } */
        /*.heuredebut, .heurefin
    {
        width: 20%;

    }*/


}

    /******************************** CSS GRoupe Prive*/
.radio-inputs
{
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 176px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.radio-inputs > *
{
    margin: 2px;
}

.radio-input:checked + .radio-tile
{
    border-color: #2260ff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    color: #2260ff;
}

.radio-input:checked + .radio-tile:before
{
    transform: scale(1);
    opacity: 1;
    background-color: #2260ff;
    border-color: #2260ff;
}

.radio-input:checked + .radio-tile .radio-icon svg
{
    fill: #2260ff;
}

.radio-input:checked + .radio-tile .radio-label
{
    color: #2260ff;
}

.radio-input:focus + .radio-tile
{
    border-color: #2260ff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}

.radio-input:focus + .radio-tile:before
{
    transform: scale(1);
    opacity: 1;
}

.radio-tile
{
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

.radio-tile:before
{
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

.radio-tile:hover
{
    border-color: #2260ff;
}

.radio-tile:hover:before
{
    transform: scale(1);
    opacity: 1;
}

.radio-icon svg
{
    width: 2rem;
    height: 2rem;
    fill: #494949;
}

.radio-label
{
    color: #707070;
    transition: 0.375s ease;
    text-align: center;
    font-size: 13px;
}

.radio-input
{
    clip: rect(0 0 0 0);
    -webkit-clip-path: inset(100%);
    clip-path: inset(100%);
    height: 1px;
    overflow: hidden;
    position: absolute;
    white-space: nowrap;
    width: 1px;
}
.removeDisponible
{
    margin-top: 32px;
    cursor: pointer;
    margin-left: 12px;

}
/*************** youssef button delete dispo */
@media (width: 360px) and (height: 720px) {
    .removeDisponible {
        left: 205px;
         position: relative;
        top: -400px;
        margin-top: 0;
        margin-left: 0;
    }
}

@media (width: 375px) and (height: 667px) {
    .removeDisponible {
        left: 219px;
         position: relative;
        top: -400px;
        margin-top: 0;
        margin-left: 0;
    }
}

@media (width: 390px) and (height: 844px) {
    .removeDisponible {
        left: 233px;
         position: relative;
        top: -400px;
        margin-top: 0;
        margin-left: 0;
    }
}

@media (width: 412px) and (height: 914px),
       (width: 414px) and (height: 896px),
       (width: 412px) and (height: 915px) {
    .removeDisponible {
        left: 256px;
         position: relative;
        top: -400px;
        margin-top: 0;
        margin-left: 0;
    }
}

@media (width: 430px) and (height: 932px) {
    .removeDisponible {
        left: 272px;
         position: relative;
        top: -400px;
        margin-top: 0;
        margin-left: 0;
    }
}
</style>


</div>
<script src="{{asset('js/timezones.full.js')}}" ></script>
<script>
     $('.dropdownTimeZone').timezones({
            lang: 'fr'
        });
    const $tags = $('#tags');
    const $input = $('#input-tag');
    function GetCoursProfInDropDown()
    {
        $.ajax({
            type: "get",
            url: "{{url('getCoursByProf')}}",
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    if(response.data.length > 0)
                    {
                        $('.dropDownCoursAppEnd').empty();

                        $('.dropDownCoursAppEnd').append('<option value="0">Veuillez sélectionner le cours</option>');

                        $.each(response.data, function (index, value)
                        {
                            $('.dropDownCoursAppEnd').append('<option value="' + value.id + '">' + value.title + '</option>');
                        });
                    }
                }
            }
        });
    }
    GetCoursProfInDropDown();
    function GetCoursProfSession()
    {
        const $tags = $('#tags');
        $tags.empty();
        $.ajax({
            type: "get",
            url: "{{url('getCoursByProf')}}",
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    if(response.data.length == 0)
                    {
                        $('.tags-input').css('display','none');
                    }
                    else
                    {
                        $('.tags-input').css('display','block');
                    }
                    $.each(response.data, function (index, value)
                    {
                        const $tag = $('<li></li>');
                        $tag.text(value.title);
                        $tag.append('<button type="button" class="delete-button" value=' + value.id + '>X</button>');
                        $tags.append($tag);
                    });
                }
            }
        });
    }
    GetCoursProfSession();
    // Delete Cours By Prof
    $tags.on('click', '.delete-button', function ()
    {
        $.ajax({
            type: "post",
            url: "{{url('DestroyCoursProf')}}",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data:
            {
                idCours : $(this).attr('value'),
            },
            dataType: "json",
            success: function (response)
            {
                if(response.status == 200)
                {
                    GetCoursProfSession();
                    GetCoursProfInDropDown();
                    $(this).parent().remove();
                }
            }
        });
    });

    // Add Cours By click Entre
    $input.on('keydown', function (event)
    {
        if (event.key === 'Enter')
        {
            $('.errorCours').empty();
            event.preventDefault();
            const $tag = $('<li></li>');
            const tagContent = $input.val().trim();
            if (tagContent !== '')
            {
                $.ajax({
                    type: "post",
                    url: "{{url('StoreCoursProf')}}",
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data:
                    {
                        nameCours : tagContent,
                    },
                    dataType: "json",
                    success: function (response)
                    {

                        if(response.status == 200)
                        {
                            $('.tags-input').css('display','block');
                            $.each(response.data, function (index, value)
                            {
                                $tag.text(value.title);
                                $tag.append('<button type="button" class="delete-button" value='+value.id+'>X</button>');
                                $tags.append($tag);

                            });
                            $input.val('');
                            GetCoursProfInDropDown();
                        }
                        if(response.status == 400)
                        {
                            $('.errorCours').text('cours déja existe');
                            $input.val('');
                        }
                    }
                });

            }
        }
    });

    $('#AddCours').on('click',function(event)
    {
        event.preventDefault();
        const $tag = $('<li></li>');
        const tagContent = $input.val().trim();
        if (tagContent !== '')
        {
            $.ajax({
                type: "post",
                url: "{{url('StoreCoursProf')}}",
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data:
                {
                    nameCours : tagContent,
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        $('.tags-input').css('display','block');
                        $.each(response.data, function (index, value)
                        {
                            $tag.text(value.title);
                            $tag.append('<button type="button" class="delete-button" value='+value.id+'>X</button>');
                            $tags.append($tag);
                        });
                        $input.val('');
                        GetCoursProfInDropDown();
                    }
                    if(response.status == 400)
                    {
                        $('.errorCours').text('cours déja existe');
                        $input.val('');
                    }
                }
            });
        }
    });
    // set value time just hours without minutes
    $(document).on('input', '.heuredebut, .heurefin', function(e) {
        let hour = $(this).val().split(':')[0];
        $(this).val(`${hour}:00`);
    });

    $('.removeDisponible').on("click",function(e)
    {
        var id = $(this).attr('id');

        if (typeof id !== 'undefined') {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) =>
            {
                if (result.isConfirmed)
                {
                    $.ajax({
                        type: "post",
                        url: "{{url('DeleteDisponible')}}",
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        data:
                        {
                            id : id,
                        },
                        dataType: "json",
                        success: function (response)
                        {
                            if(response.status == 200)
                            {
                                /* $('#DataDisponible').load(window.location.href + ' #DataDisponible'); */
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed || result.isDismissed) {
                                        location.reload();
                                    }
                                });

                            }
                        }
                    });

                }
            });
        }
        else
        {
            var row = $(this).closest('.row');
            row.find('select.form-select').val('0');
            row.find('input[type="checkbox"]').prop('checked', false);
            row.find('input[type="time"]').val("");
        }
    });

    $('.DaysIsRemoveDisponible').on('click',function(e)
    {

        var checked = $(this).prop('checked');
        var day = $(this).closest('.DataDisponible').find('.nameDays').text();
        var colNonDisponible = $(this).closest('.DataDisponible').find('.colNonDisponible');
        var colDataNonDisponible = $(this).closest('.DataDisponible').find('.ColDataNonDisponible');
        if (checked)
        {
            colNonDisponible.css('display', 'none');
            colDataNonDisponible.css('display', 'block');
        }
        else
        {

            //remove data in this day
            var day = $(this).next('.nameDays').text();
            $.ajax({
                type: "get",
                url: "{{url('checkDayIsExiste')}}",
                data:
                {
                    jour : day,
                },
                dataType: "json",
                success: function (response)
                {
                    if(response.status == 200)
                    {
                        colNonDisponible.css('display', 'block');
                        colDataNonDisponible.css('display', 'none');
                    }
                    else if(response.status == 220)
                    {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) =>
                        {
                            if (result.isConfirmed)
                            {
                                $.post({
                                    url: "{{url('DeleteDisponibleByDay')}}",
                                    data: { jour: day, _token: $('meta[name="csrf-token"]').attr('content') },
                                    dataType: "json",
                                    success: function(response) {
                                        if (response.status == 200) {
                                            Swal.fire({
                                                title: "Deleted!",
                                                text: "Your file has been deleted.",
                                                icon: "success"
                                            }).then((result) => {
                                                if (result.isConfirmed || result.isDismissed) {
                                                    location.reload();
                                                }
                                            });
                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });
        }
    });

    $(document).on('change','.DataDisponible .radio-input',function()
    {
        var rowContainer = $(this).closest('.row');
        var checkboxes = rowContainer.find('.radio-input');
        checkboxes.not(this).prop('checked', false);
    });

    $('#UpDateDisponible').on('click', function (e) {
        e.preventDefault();

        var atLeastOneDayChecked = false;
        var daysData = {};
        $('#disponibilityForm input[name="Days[]"]:checked').each(function () {
            atLeastOneDayChecked = true;
            var day = $(this).siblings('.nameDays').text();
            var dayData = [];
            $(this).closest('.DataDisponible').find('select[name="Cours[]"]').each(function ()
            {
                var coursValue = $(this).val();
                if (coursValue !== '0') {
                    var typeCoursValue = $(this).closest('.row').find('input[name="typeCours[]"]:checked').val();
                    var heureDebutValue = $(this).closest('.row').find('input[name="heuredebut[]"]').val();
                    var heureFinValue = $(this).closest('.row').find('input[name="heurefin[]"]').val();

                    if (typeCoursValue !== null && heureDebutValue !== null && heureFinValue !== null &&
                        typeCoursValue !== undefined && heureDebutValue !== undefined && heureFinValue !== undefined &&
                        typeCoursValue !== '' && heureDebutValue !== '' && heureFinValue !== '') {

                        dayData.push({
                            cours: coursValue,
                            typeCours: typeCoursValue,
                            heureDebut: heureDebutValue,
                            heureFin: heureFinValue
                        });
                    }
                }
            });
            daysData[day] = dayData;
        });
        if (!atLeastOneDayChecked)
        {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Veuillez sélectionner au moins un jour.",
            });
            return;
        }
        var isEmpty = true;
        for (var day in daysData)
        {
            if (daysData[day].length > 0)
            {
                isEmpty = false;
                break;
            }
        }
        if (isEmpty)
        {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Veuillez remplir les données pour au moins un jour sélectionné.",
            });
            return;
        }


        Swal.fire({
            title: "Voulez-vous enregistrer les modifications ?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Sauvegarder",
            denyButtonText: `Ne sauvegardez pas`,
            cancelButtonText: "Annuler"
        }).then((result) =>
        {

            if (result.isConfirmed)
            {
                $.ajax({
                    type: "POST",
                    url: "{{url('UpDateDisponibleByProf')}}",
                    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                    data:
                    {
                        data : daysData,
                        timezones : $('.dropdownTimeZone').val(),
                    },
                    dataType: "json",
                    success: function (response)
                    {
                        if(response.status == 200)
                        {
                            Swal.fire({
                                title: "Enregistrée!",
                                text: "",
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed || result.isDismissed) {
                                    location.reload();
                                }
                            });
                        }


                    }
                });

            }
            else if (result.isDenied)
            {
                Swal.fire("Les modifications ne sont pas enregistrées", "", "info");
            }
        });


    });




</script>
@endsection
