
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <title>Kottab</title>
    <link rel="icon" href="{{asset('image/faviconnobg.png')}}" type="image/x-icon">
    <style>
        .container
        {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .content_text
        {
            background: #fee3db;
            padding: 5px;
            border-radius: 5px;
        }

        .content_cards
        {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap to the next line */
            justify-content: space-between; /* Distribute items evenly */
            padding: 10px;
        }

        .Card_calander, .Card_time
        {
            flex: 1; /* Take up equal space */
            margin: 10px; /* Add space between cards */
            background-color: #ffffff;
            border-radius: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        .Card_calander i, .Card_time i
        {
            display: ruby-text;
            font-size: 30px;
        }

        .Card_calander p, .Card_time p
        {
            text-align: center;
        }
        .content_button_meeting
        {
            display: flex;
            justify-content: center;
            justify-items: center;
        }
        .content_button_meeting button
        {
            padding: 15px;
            background-color: #ff6b4c;
            color: #fff;
            border: 0px;
            border-radius: 10px;
            font-size: 18px;
            margin: 5px 0px;
        }

        @media screen and (max-width: 600px)
        {
            .content_cards {
                flex-direction: column; /* Stack cards vertically on small screens */
            }

            .Card_calander,
            .Card_time {
                width: 90%; /* Take full width on small screens */
            }
        }
    </style>
 </head>
 <body>
    <div class="container">
        <h1>Invitation for interview</h1>
        <div class="content_text">
            <h2>Cher {{$name_eleve}}</h2>
            <p>
                J'espère que ce message vous trouvera bien.
                Je vous écris pour vous informer d'une prochaine session de classe virtuelle que j'ai programmée pour
                à {{$Debut}}. Cette session est une partie cruciale de notre programme en cours et couvrira {{$Cours}}.

            </p>
            <p>
                Veuillez vous assurer que vous êtes connecté quelques minutes avant l'heure prévue pour éviter toute difficulté technique.
                Si vous rencontrez des problèmes pour accéder à la session, n'hésitez pas à me contacter par e-mail à {{$EmailProf}} .
            </p>
            <p>
                J’attends avec impatience votre participation active et vos précieuses contributions au cours de la session.
            </p>
            <div class="content_cards">
                <div class="Card_calander">
                    <i class="fa-solid fa-calendar-days"></i>
                    <p >
                        {{$formattedDate}}
                    </p>
                </div>
                <div class="Card_time">
                    <i class="fa-regular fa-clock"></i>
                    <p>
                        Durée approximative du <br> les entretiens durent 2 heures
                    </p>
                </div>
            </div>
            <div class="content_button_meeting">
                <button>
                    <a href="{{ url("$meetingLink")}}" target="_blank">Pour rejoindre la session</a>
                </button>
            </div>
        </div>
    </div>
 </body>
 </html>
