<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meeting Invitation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #c0cddb;
                color: #111010;
                text-decoration: none;
                border-radius: 5px;
            }
            .button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Cher {{$name_eleve}}</h3>
            <p>You're invited to join our meeting. Click the button below to join:</p>
            <p>
                J'espère que ce message vous trouvera bien.
                Je vous écris pour vous informer d'une prochaine session de classe virtuelle que j'ai programmée pour
                à {{$Debut}}. Cette session est une partie cruciale de notre programme en cours et couvrira {{$Cours}}.
               {{--  <a class="button" href="{{ url("$meetingLink")}}" target="_blank">Join to Meet</a> --}}
            </p>
            <p>
                Pour rejoindre la session, veuillez utiliser le lien suivant :<a href="{{ url("$meetingLink")}}" target="_blank"></a>
            </p>
            <p>
                Veuillez vous assurer que vous êtes connecté quelques minutes avant l'heure prévue pour éviter toute difficulté technique.
                Si vous rencontrez des problèmes pour accéder à la session, n'hésitez pas à me contacter par e-mail à {{$EmailProf}} .
            </p>
            <p>
                J’attends avec impatience votre participation active et vos précieuses contributions au cours de la session.
            </p>
            <p>Cordialement,</p>
        </div>
    </body>
</html>
