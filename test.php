<!DOCTYPE html>
<html>

<head>
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>


<body>


    <h1 class="text-success text-center mt-2 pb-3">Oh nein...was ist los?</h1>
    <div class="container-error ">

        <div class="error-text mx-auto">

            <div class="pt-2">
                <img src="https://cdn.pixabay.com/photo/2019/02/04/08/38/pixel-cells-3974187_960_720.png" style="width:320px; height:240px" alt="error">

                <p class="pt-4">..es sieht so aus, als gäbe es kein Wod in der von dir gewünschten Selektion.
            </div>
            <div class="pt-2">
                <h4 class="text-success">Bitte probier folgendes:</h4>
                <br>
                <ul>
                    <li>Ändere die Kategorie: trau dich! </li>
                    <li>Darfs ein bisserl mehr/weniger sein? Ändere die Workout-Minuten! </li>
                    <li>Probier neues Equipment aus! Zum Beispiel: <br>du hast doch bestimmt eine Wand zuhause? Gib ihr eine Chance!</li>
                </ul>
                </p>


                <form action='day.php' method='post'>



                    <input type="hidden" name="dayId" value="<?php echo $dayId ?>" />
                    <!-- <p><?php echo $dayId ?></p> -->
                    <a href='day.php?dayId=<?php echo $dayId ?>' class='btn btn-outline-success btn-lg '> Ok, ich versuchs nochmal! </a> </span>

                </form>
            </div>
        </div>
    </div>

    <div class="container-error">
        <section class="error rounded pr-5 pl-5">

            <h1 class="text-center mb-4 mt-4 text-success">Oh nein...</h1>
            <h3>An dieser Stelle möchten wir gerne darauf hinweisen, dass wir <strong class="text-danger">keinerlei Haftung </strong>für etwaige Schäden und Verletzungen übernehmen, welche durch Mitmachen der Workouts - insbesondere durch eine mögliche Nachahmung von posierenden Elfen und Rentieren - entstehen könnten!
                <br>
                <br> Bitte <strong class="text-danger"> vor </strong> den Workouts für genügend Raum sorgen (eventuelle störende Möbel aus dem Weg räumen), Kleinkinder und Tiere in Sicherheit bringen und ungeeignete Trainingsplätze (wie zum Beispiel Kreuzungen und Bahnübergänge, etc) meiden!
                <br>
            </h3>

        </section>
    </div>





    <div class="container-warning">
        <section class="warning rounded pr-5 pl-5">

            <h1 class="text-center mb-4 mt-4">Warnhinweis!</h1>
            <h3>An dieser Stelle möchten wir gerne darauf hinweisen, dass wir <strong class="text-danger">keinerlei Haftung </strong>für etwaige Schäden und Verletzungen übernehmen, welche durch Mitmachen der Workouts - insbesondere durch eine mögliche Nachahmung von posierenden Elfen und Rentieren - entstehen könnten!
                <br>
                <br> Bitte <strong class="text-danger"> vor </strong> den Workouts für genügend Raum sorgen (eventuelle störende Möbel aus dem Weg räumen), Kleinkinder und Tiere in Sicherheit bringen und ungeeignete Trainingsplätze (wie zum Beispiel Kreuzungen und Bahnübergänge, etc) meiden!
                <br>
            </h3>

        </section>
    </div>

</body>

</html>