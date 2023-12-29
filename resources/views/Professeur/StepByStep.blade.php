<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

    <div class="containerCss">

        <div class="cardCss">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">
                        <h3><small><b>CRÉEZ </b> VOTRE PROFILE <br></small></h3>
                    </div>

                    <div class="steps-content">
                        <h5><i>Étape </i><span class="step-number">1</span></h5>
                        <p class="step-number-content active">Ces informations nous permettront d'en savoir plus sur vous. </p>
                        <p class="step-number-content d-none">Get to know better by adding your diploma,certificate and education life.</p>
                        <p class="step-number-content d-none">Help companies get to know you better by telling then about your past experiences.</p>
                        <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                        <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                        <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                        <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                        <p class="step-number-content d-none">Add your profile piccture and let companies find youy fast.</p>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">informations personnelles</li>
                        <li>Éducation</li>
                        <li>Expériences professionnelles</li>
                        <li>Vos méthodes</li>
                        <li>Certification</li>
                        <li>Cours</li>
                        <li>Disponibilité</li>
                    </ul>



                </div>
                <div class="right-side">
                    {{-- Step 1 --}}
                    <div class="main active">
                        <div class="text">
                            <h2>Vos informations personnelles</h2>
                            <p>Saisissez vos informations personnelles pour vous rapprocher des étudiants.</p>
                        </div>
                        <div class="picture-container">
                        <div class="ContentImage">
                        
                        
                            <img src="{{asset('image/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" alt="" width="60px" height="60px">
                            <input type="file" id="wizard-picture" name="image" {{-- require --}}> {{-- had require hya li kadiir border f color red validation --}}
                           
                        </div>
                    </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" name="titre" required {{-- require --}} id="user_name">
                                <span>Titre de votre annonce</span>
                            </div>
                            <div class="input-div">
                                <input type="date" {{-- require --}}  required>
                                <span class="textDateNaissance">Date de naissance</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" name="phone" required {{-- require --}}>
                                <span>Numéro de téléphone</span>
                            </div>

                        </div>
                        <div class="buttons">
                            <button class="next_button">Suivant</button>
                        </div>
                    </div>
                    {{-- End Step 1 --}}

                    {{-- Step 2 --}}
                    <div class="main">
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-xl-10">
                                <h2>Éducation</h2>
                                <p>Informez les étudiants et leurs parents de votre vie éducative.</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-xl-2">
                                <button class="btn btn-secondary float-end " id="AddFormation">Ajouter</button>
                            </div>
                        </div>


                        <div class="HeightEducation ">
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" required {{-- require --}}>
                                    <span>Dernier diplôme</span>
                                </div>
                                <div class="input-div">
                                    <input type="text" required>
                                    <span>Spécialité</span>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" required {{-- require --}}>
                                    <span>Année d'obtention</span>
                                </div>
                                <div class="input-div">
                                    <input type="text" required {{-- require --}}>
                                    <span>Lycée / Université</span>
                                </div>

                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name ="country"></select>
                                </div>
                            </div>
                            <hr style="border-style: dashed">

                        </div>


                        <div class="buttons button_space">
                            <button class="back_button">Précédent</button>
                            <button class="next_button">Suivant</button>
                        </div>
                    </div>
                    {{-- End Stpe 2 --}}

                    {{-- Step 3 --}}
                    <div class="main">
                       {{--  <div class="text">
                            <h2>Expériences professionnelles</h2>
                            <p>Can you talk about your past work experience?</p>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-xl-10">
                                <h2>Expériences professionnelles</h2>
                                <p>Pouvez-vous parler de votre expérience professionnelle passée ?</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-xl-2">
                                <button class="btn btn-secondary float-end " id="AddExperience">Ajouter</button>
                            </div>
                        </div>
                        <div class="heightExperience">
                            <div class="input-text">
                                <div class="input-div">
                                    <input type="text" required >
                                    <span>Filière</span>
                                </div>
                                <div class="input-div">
                                    <input type="text" required >
                                    <span>Lycée / Université</span>
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <label>Du</label>
                                    <input type="date" required>
                                    <!-- <span>Du</span> -->
                               </div>
                               <div class="input-div">
                                    <label>Au</label>
                                    <input type="date" required>
                                    <!-- <span>Au</span> -->
                                </div>
                            </div>
                            <div class="input-text">
                                <div class="input-div">
                                    <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name ="country"></select>
                                </div>
                            </div>
                            <hr style="border-style: dashed">
                        </div>



                        <div class="buttons button_space">
                            <button class="back_button">Précédent</button>
                            <button class="next_button">Suivant</button>
                        </div>
                    </div>
                    {{-- End step 3 --}}


                    <div class="main">
                        <div class="text">
                            <h2>Vos méthodes</h2>
                            <p>Vos expériences en cours de soutien et en pédagogie .</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <label for="" class="mb-2">
                                    Plus votre description sera détaillée, plus vous aurez de chances d'avoir des élèves.
                                    Vous pouvez rajouter les résultats et/ou les retours de vos élèves.
                                    Cette présentation sera affichée sur votre profil.
                                </label>
                                <textarea name="" id="" cols="65" rows="5"></textarea>

                            </div>
                        </div>
                        {{-- <div class="user_card">
                            <span></span>
                            <div class="circle">
                                <span><img src="https://i.imgur.com/hnwphgM.jpg"></span>

                            </div>
                            <div class="social">
                                <span><i class="fa fa-share-alt"></i></span>
                                <span><i class="fa fa-heart"></i></span>

                            </div>
                            <div class="user_name">
                                <h3>Peter Hawkins</h3>
                                <div class="detail">
                                    <p><a href="#">Izmar,Turkey</a>Hiring</p>
                                    <p>17 last day . 94Apply</p>
                                </div>
                            </div>
                        </div> --}}
                        <div class="buttons button_space">
                            <button class="back_button">Précédent</button>
                            <button class="next_button">Suivant</button>
                            {{-- <button class="submit_button">Submit</button> --}}
                        </div>
                    </div>
                    <div class="main">
                        <div class="text">
                            <h2>Certification</h2>
                            <p>Veuillez ajouter votre dernier certificat de travail.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <label for="" class="sr-only">Attestation de travail</label>
                                <input type="file" name="attestation">
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Précédent</button>
                            <button class="next_button">Suivant</button>
                        </div>
                    </div>
                    <div class="main">
                        <div class="text">
                            <h2>Cours</h2>
                            <p>Quelles sont les cours dans lesquelles vous pouvez aider des élèves ?</p>
                        </div>
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
                        <div class="buttons button_space mt-3">
                            <button class="back_button">Précédent</button>
                            <button class="next_button">Suivant</button>
                        </div>
                    </div>
                    <div class="main">
                        <div class="text">
                            <h2>Disponibilité</h2>
                            <p>Quelles sont vos disponibilités pour donner des cours ?</p>
                            <h5 style="color:red">NB. Les cours particuliers coûtent 12 euros et les cours collectifs coûtent 10 euros</h5>
                        </div>
                        <div class="row rowDays">
                            <div class="days-list">
                                <div class="day-item d-inline ml-2">Lundi</div>
                                <div class="day-item d-inline ml-2">Mardi</div>
                                <div class="day-item d-inline ml-2">Mercredi</div>
                                <div class="day-item d-inline ml-2">Jeudi</div>
                                <div class="day-item d-inline ml-2">Vendredi</div>
                                <div class="day-item d-inline ml-2">Samedi</div>
                                <div class="day-item d-inline ml-2">Dimanche</div>
                            </div>
                            <br>
                            <div class="divHours">
                                <label type="text" value="Lundi" style="text-align: center;"></label>
                                <div style="display: flex;">
                                    <div class="input-div">
                                        <label for="">Choisir un cours</label>
                                        <select name="" id="" >
                                            <option value="1">Arabe</option>
                                        </select>
                                    </div>
                                    <div class="input-div">
                                        <label for="">Groupe / Privé</label>
                                       
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="btnGroup">
                                            <input type="radio" class="btn-check" name="btnradio" id="group" autocomplete="off" checked="">
                                            <label class="btn btn-outline-primary" for="group" style=""><i class="fa fa-users "></i></label>

                                            <input type="radio" class="btn-check" name="btnradio" id="private" autocomplete="off">
                                            <label class="btn btn-outline-primary " for="private" style="width:45px ; "><i class="fa fa-user "></i></label>
                                        </div>
                                    </div>
                                    <div class="input-div">
                                        <label for="">Heure de début</label>
                                        <input type="time">
                                    </div>
                                    <div class="input-div">
                                        <label for="">Heure de fin</label>
                                        <input type="time">
                                    </div>
                                </div>
                               <!--  <div style="display: flex;gap: 20px">
                                    <div class="input-div">
                                        <label for="">Heure de début</label>
                                        <input type="time">
                                    </div>
                                    <div class="input-div">
                                        <label for="">Heure de fin</label>
                                        <input type="time">
                                    </div>
                                </div> -->
                                
                                <hr style="border-style: dashed">
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Précédent</button>
                            <button class="submit_button">Valider</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type= "text/javascript" src ={{asset('js/countries.js')}} ></script>

    <script language="javascript">

        $(document).ready(function ()
        {
            print_country("countryDropdown");

            $('#AddFormation').on('click',function()
            {

                $('.HeightEducation').append(`<div class="formFormation">
                                                <div class="input-text">
                                                    <div class="input-div">
                                                        <input type="text" required require>
                                                        <span>Dernier diplôme</span>
                                                    </div>
                                                    <div class="input-div">
                                                        <input type="text" required>
                                                        <span>Spécialité</span>
                                                    </div>
                                                </div>
                                                <div class="input-text">
                                                    <div class="input-div">
                                                        <input type="text" required require>
                                                        <span>Année d'obtention</span>
                                                    </div>
                                                    <div class="input-div">
                                                        <input type="text" required require>
                                                        <span>Lycée / Université</span>
                                                    </div>
                                                </div>
                                                <div class="input-text">
                                                    <div class="input-div">
                                                        <select class="countryDropdown" onchange="print_state('state', this.selectedIndex);"></select>
                                                    </div>
                                                </div>
                                                <div class="input-text">
                                                <div class="input-div">
                                                    <button class="btn btn-danger float-end">Supprimer</button>
                                                </div>
                                                <hr style="border-style: dashed">
                                            </div>`);
                                            print_country("countryDropdown");
            });
            $('#AddExperience').on('click', function()
            {
                $('.heightExperience').append(`<div class="formExperience">
                                                       <div class="input-text">
                                                            <div class="input-div">
                                                                <input type="text" required >
                                                                <span>Filière</span>
                                                            </div>
                                                            <div class="input-div">
                                                                <input type="text" required >
                                                                <span>Lycée / Université</span>
                                                            </div>
                                                        </div>
                                                        <div class="input-text">
                                                            <div class="input-div">
                                                                <label>Du</label>
                                                                <input type="date" required>
                                                                <!-- <span>Du</span> -->
                                                        </div>
                                                        <div class="input-div">
                                                                <label>Au</label>
                                                                <input type="date" required>
                                                                <!-- <span>Au</span> -->
                                                            </div>
                                                        </div>
                                                        <div class="input-text">
                                                            <div class="input-div">
                                                                <select  onchange="print_state('state',this.selectedIndex);" class="countryDropdown" {{-- id="country" --}} name ="country"></select>
                                                            </div>
                                                        </div>

                                                    <div class="input-text">
                                                        <div class="input-div">
                                                        <button class="btn btn-danger float-end">Supprimer</button>
                                                        </div>
                                                    </div>
                                                    <hr style="border-style: dashed">
                                                </div>`)
            });

            $(document).on('click', '.formFormation .btn-danger', function() {
                $(this).closest('.formFormation').remove();
            });
            $(document).on('click', '.formExperience .btn-danger', function() {
                $(this).closest('.formExperience').remove();
            });
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

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
        .days-list
        {
            display: contents;
            justify-content: space-around;
            margin: 0px 30px;
        }
        .day-item
        {
            font-size: 18px;
            padding: 5px 10px;
            background-color: #304767;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
            flex-grow: 1;
            max-width: calc(33.333% - 10px);
        }


        .day-item:hover
        {
            background-color: #3b5170;
        }
        .divHours
        {
            border: 2px solid #304767;
            border-radius: 20px;
            height:200px;
            overflow: auto;
            margin: auto;
            padding: 30px 2px;
            margin-bottom: 7px;
            overflow-x: clip;
        }
        @media (max-width: 768px) {
            .days-list {
                flex-direction: column;
            }

            .day-item {
                max-width: 100%;
            }
        }
        /*********** */
        *{
            padding:0;
            margin:0;
            font-family:times;
        }
        .containerCss{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background-color:#eee;
        }
        .containerCss .cardCss{
            height: 540px;
            width: 830px;
            background-color: #fff;
            position: relative;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            font-family: 'Poppins', sans-serif;
            border-radius: 20px;
        }
        .containerCss .cardCss .form{
            width:100%;
            height:100%;

            display:flex;
        }
        .containerCss .cardCss .left-side{
            width:35%;
            background-color:#304767;
            height:100%;
        border-top-left-radius:20px;
        border-bottom-left-radius:20px;
        padding:20px 30px;
        box-sizing:border-box;

        }
/*left-side-start*/
.left-heading{
    color:#fff;

}
.steps-content{
    /* margin-top:30px; */
    color:#fff;
}
.steps-content p{
    font-size:12px;
    margin-top:15px;
}
.progress-bar{
    list-style:none;
    /*color:#fff;*/
    /* margin-top:30px; */
    font-size:13px;
    font-weight:700;
    counter-reset:containerCss 0;
}
.progress-bar li{
       position:relative;
       margin-left:40px;
       margin-top:26px;
       counter-increment:containerCss 1;
      color:#4f6581;
}
.progress-bar li::before{
    content:counter(containerCss);
    line-height:25px;
    text-align:center;
    position:absolute;
    height:25px;
    width:25px;
    border:1px solid #4f6581;
    border-radius:50%;
    left:-40px;
    top:-5px;
    z-index:10;
    background-color:#304767;


}


.progress-bar li::after{
    content: '';
    position: absolute;
    height: 90px;
    width: 2px;
    background-color: #4f6581;
    z-index: 1;
    left: -27px;
    top: -50px;
}


.progress-bar li.active::after{
    background-color: #fff;

}

.progress-bar li:first-child:after{
  display:none;
}

/*.progress-bar li:last-child:after{*/
/*  display:none;  */
/*}*/
.progress-bar li.active::before{
    color:#fff;
      border:1px solid #fff;
}
.progress-bar li.active{
    color:#fff;
}
.d-none{
   display:none;
}


/*left-side-end*/
.containerCss .cardCss .right-side{
    width:65%;
    background-color:#fff;
    height:100%;
  border-radius:20px;
}
/*right-side-start*/
.main{
    display:none;
}
.active{
    display:block;
}
.main{
    padding:35px;
}
.main small{
    display:flex;
    justify-content:center;
    align-items:center;
    margin-top:2px;
    height:30px;
    width:30px;
    background-color:#ccc;
    border-radius:50%;
    color:yellow;
    font-size:19px;
}
.text{
    margin-top:10px;
}
.congrats{
    text-align:center;
}
.text p{
    margin-top:5px;
    font-size:13px;
    font-weight:700;
    color:#cbced4;
}
.input-text{
    margin:30px 0;
     display:flex;
    gap:20px;
}

.input-text .input-div{
    width:100%;
    position:relative;

}

/**************** */
textarea
{
    width:100%;

    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
input[type="date"]{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
input[type="time"]{
    width:46%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
    margin-right: 5rem;
}
.ContentImage
{
    display: flex;
    justify-content: center;
    align-items: center
}
.HeightEducation
{
    margin: -4px 0 8px 0;
    padding: 4px;
    max-height: 20rem;
    overflow-y: auto;

}
.heightExperience
{
    margin: -18px 0 8px 0;
    padding: 4px;
    max-height: 20rem;
    overflow-y: auto;
}
/********** */
.heightExperience::-webkit-scrollbar {
    width: 15px;
}
.HeightEducation::-webkit-scrollbar {
    width: 15px;
}
.divHours::-webkit-scrollbar {
    width: 15px;
}
/******** */

.heightExperience::-webkit-scrollbar-thumb {
    background-color: #304767;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
.HeightEducation::-webkit-scrollbar-thumb {
    background-color: #304767;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
.divHours::-webkit-scrollbar-thumb {
    background-color: #304767;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
/************ */
.HeightEducation::-webkit-scrollbar-track {
    background-color: #eee;
}
.heightExperience::-webkit-scrollbar-track {
    background-color: #eee;
}
.divHours::-webkit-scrollbar-track {
    background-color: #eee;
}
.tags-input
{

    display: inline-block;
    position: relative;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 5px;
    box-shadow: 2px 2px 5px #00000033;
    width: 100%;
    margin-top: -14px;
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

.tags-input li
{
    display: inline-block;
    background-color: #f2f2f2;
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
#input-tag{
  width: 78%;
  height: 40px;
  border: none;
  outline: 0;
  border-radius: 5px;
  border: 1px solid #cbced4;
  gap: 20px;
  box-sizing: border-box;
 
}

.tags-input input[type="text"]:focus
{
    outline: none;
}

.tags-input .delete-button
{
    background-color: transparent;
    border: none;
    color: #999;
    cursor: pointer;
    margin-left: 5px;
}
#AddCours
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
/**************** */

input[type="text"]{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
select{
    width:100%;
    height:40px;
    border:none;
    outline:0;
    border-radius:5px;
    border:1px solid #cbced4;
    gap:20px;
    box-sizing:border-box;
    padding:0px 10px;
}
.input-text .input-div span{
    position:absolute;
    top:10px;
    left:10px;
    font-size:14px;
    transition:all 0.5s;
}
.input-div input:focus ~ span,.input-div input:valid ~ span  {
    top:-15px;
    left:6px;
    font-size:10px;
    font-weight:600;
}

.input-div span{
    top:-15px;
    left:6px;
    font-size:10px;
}
.buttons button{
    height:40px;
    width:100px;
    border:none;
    border-radius:5px;
    background-color:#0075ff;
    font-size:12px;
    color:#fff;
    cursor:pointer;
}
.button_space{
    display:flex;
    gap:20px;

}
.button_space button:nth-child(1){
    background-color:#fff;
    color:#000;
    border:1px solid#000;
}
.user_card{
    margin-top:20px;
    margin-bottom:40px;
    height:200px;
    width:100%;
    border:1px solid #c7d3d9;
    border-radius:10px;
    display:flex;
    overflow:hidden;
    position:relative;
    box-sizing:border-box;
}
.user_card span{
    height:80px;
    width:100%;
    background-color:#dfeeff;
}
.circle{
    position:absolute;
    top:40px;
    left:60px;
}
.circle span{
    height:70px;
    width:70px;
    background-color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    border:2px solid #fff;
    border-radius:50%;
}
.circle span img{
    width:100%;
    height:100%;
    border-radius:50%;
    object-fit:cover;
}
.social{
    display:flex;
    position:absolute;
    top:100px;
    right:10px;
}
.social span{
    height:30px;
    width:30px;
    border-radius:7px;
    background-color:#fff;
    border:1px solid #cbd6dc;
    display:flex;
    justify-content:center;
    align-items:center;
    margin-left:10px;
    color:#cbd6dc;

}
.social span i{
        cursor:pointer;
}
.heart{
    color:red !important;
}
.share{
        color:red !important;
}
.user_name{
    position:absolute;
    top:110px;
    margin:10px;
    padding:0 30px;
    display:flex;
    flex-direction:column;
    width:100%;

}
.user_name h3{
    color:#4c5b68;
}
.detail{
    /*margin-top:10px;*/
   display:flex;
   justify-content:space-between;
   margin-right:50px;
}
.detail p{
    font-size:12px;
    font-weight:700;

}
.detail p a{
    text-decoration:none;
    color:blue;
}






.checkmark__circle {
  stroke-dasharray: 166;
  stroke-dashoffset: 166;
  stroke-width: 2;
  stroke-miterlimit: 10;
  stroke: #7ac142;
  fill: none;
  animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
}

.checkmark {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: block;
  stroke-width: 2;
  stroke: #fff;
  stroke-miterlimit: 10;
  margin: 10% auto;
  box-shadow: inset 0px 0px 0px #7ac142;
  animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
}

.checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
}

@keyframes stroke {
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes scale {
  0%, 100% {
    transform: none;
  }
  50% {
    transform: scale3d(1.1, 1.1, 1);
  }
}
@keyframes fill {
  100% {
    box-shadow: inset 0px 0px 0px 30px #7ac142;
  }
}










.warning{
    border:1px solid red !important;
}


/*right-side-end*/
@media (max-width:750px) {
    .containerCss{
        height:scroll;


    }
    .containerCss .cardCss {
        max-width: 350px;
        height:auto !important;
        margin:30px 0;
    }
    .containerCss .cardCss .right-side {
     width:100%;

    }
     .input-text{
         display:block;
     }

     .input-text .input-div{
  margin-top:20px;

}

    .containerCss .cardCss .left-side {

     display: none;
    }
}
    .textDateNaissance
    {
        display: none;
    }
    .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
 .ContentImage {
  width: 100px;
  height: 100px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  border-radius: 50%;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  margin: auto;
}
.ContentImage:hover {
  border-color: #2ca8ff;
}
.ContentImage input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.picture-src {
  width: 100px ;
  height: 100px ;
}
    </style>







    <script>


        var next_click=document.querySelectorAll(".next_button");
        var main_form=document.querySelectorAll(".main");
        var step_list = document.querySelectorAll(".progress-bar li");
        var num = document.querySelector(".step-number");
        let formnumber=0;

        next_click.forEach(function(next_click_form){
            next_click_form.addEventListener('click',function(){
                if(!validateform()){
                    return false
                }
            formnumber++;
            updateform();
            progress_forward();
            contentchange();
            });
        });

        var back_click=document.querySelectorAll(".back_button");
        back_click.forEach(function(back_click_form){
            back_click_form.addEventListener('click',function(){
            formnumber--;
            updateform();
            progress_backward();
            contentchange();
            });
        });

        var username=document.querySelector("#user_name");
        var shownname=document.querySelector(".shown_name");


        var submit_click=document.querySelectorAll(".submit_button");
        submit_click.forEach(function(submit_click_form){
            submit_click_form.addEventListener('click',function(){
            shownname.innerHTML= username.value;
            formnumber++;
            updateform();
            });
        });

        var heart=document.querySelector(".fa-heart");
        heart.addEventListener('click',function(){
        heart.classList.toggle('heart');
        });


        var share=document.querySelector(".fa-share-alt");
        share.addEventListener('click',function(){
        share.classList.toggle('share');
        });



        function updateform(){
            main_form.forEach(function(mainform_number){
                mainform_number.classList.remove('active');
            })
            main_form[formnumber].classList.add('active');
        }

        function progress_forward(){
            // step_list.forEach(list => {

            //     list.classList.remove('active');

            // });


            num.innerHTML = formnumber+1;
            step_list[formnumber].classList.add('active');
        }

        function progress_backward(){
            var form_num = formnumber+1;
            step_list[form_num].classList.remove('active');
            num.innerHTML = form_num;
        }

        var step_num_content=document.querySelectorAll(".step-number-content");

        function contentchange(){
            step_num_content.forEach(function(content){
                content.classList.remove('active');
                content.classList.add('d-none');
            });
            step_num_content[formnumber].classList.add('active');
        }


        function validateform(){
            validate=true;
            var validate_inputs=document.querySelectorAll(".main.active input");
            validate_inputs.forEach(function(vaildate_input){
                vaildate_input.classList.remove('warning');
                if(vaildate_input.hasAttribute('require')){
                    if(vaildate_input.value.length==0){
                        validate=false;
                        vaildate_input.classList.add('warning');
                    }
                }
            });
            return validate;

 

        }
    </script>
</body>
</html>
