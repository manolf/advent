<?php require_once 'actions/db_connect.php';
include('navbar.php');
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Advent, Advent..</title>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <!-- bootstrap version -->
    <!-- <nav class="navbar sticky-top navbar-dark bg-dark">

        <div class="mx-auto">
            <a class="btn btn-outline-success" href="index.php" role="button">Home</a>
            <a class="btn btn-outline-success" href="login.php" role="button">Login</a>
            <a class="btn btn-outline-success" href="register.php" role="button">Signup</a>

        </div>

    </nav> -->

    <div class="jumbotron jumbotron-fluid bg-dark text-white">
        <div class="container">
            <h1 class="display-4 text-success">Workout Adventkalender</h1>
            <p class="lead">der sportliche Weg zum Christbaum</p>
        </div>
    </div>


    <div class="container my-5 z-depth-1 rounded">
        <!--Section: Content-->
        <section class="dark-grey-text">

            <div class="row pr-lg-5">
                <div class="col-md-7 mb-4">

                    <div class="view">
                        <img src='./img/boxjump.png' alt="boxjump" style="width: 472px; height: 482px" class="img-fluid mt-4 rounded" alt="smaple image">
                    </div>

                </div>
                <div class="col-md-5 d-flex align-items-center mb-4">
                    <div>

                        <h3 class="font-weight-bold mb-4"> HURRA...</h3>

                        <p>... bald ist soweit! Bald ist endlich Dezember und es wird ein sportlich besinnlicher Monat!
                            <br><strong> Was solltest du noch wissen?</strong> Die Elfen lassen dir die Wahl! Du hast die Möglichkeit zwischen verschiedenen Levels zu wählen. <br></p>Bringt dich bereits die Vorstellung, von der Couch aufzustehen, ins Schwitzen, empfehlen wir Level <strong>easy</strong>, als durchschnittlich fitter Mensch solltest du <strong>intermediate</strong>, für <strong>hard</strong> klatschen wir dir auf den Rücken. <br>Besonders Wahnsinnige - also Leute, die es außergewöhnlich außergewöhnlich schätzen (insbesondere Crossfit-Wahnsinnige) werden mit der Kategorie <strong>crossfit</strong> glücklich.<br>
                        Die Kategorie <strong>Hanni</strong> ist dem Wichtelvorbild und der BEST TEAMPARTNERIN Hanni gewidmet. <br> <strong>Achtung:</strong> gerade diese Workouts sind auch nicht für Sportmuffel gedacht..</p>
                        <form action='' method='post'>
                            <input class='btn btn-outline-light m-2' type='submit' name='openDoors' value='zu den Türchen..' />
                        </form>

                        <?php
                        if (isset($_POST["openDoors"])) {

                            echo "<p class='text-dark'> hab Geduld, Mensch! noch ist die Zeit nicht gekommen!</p>";
                            echo "<p class='text-dark'> du kannst dich aber bereits registrieren: <a href='register.php' class='text-light'> bring me on!</a></p>";
                        }

                        ?>
                    </div>


                </div>

            </div>

        </section>
        <!--Section: Content-->

    </div>




    <!-- <div class="container row col-lg-4 col-md-6 col-xs-12 mx-auto"> -->
    <!-- <div class="container row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 mx-auto"> -->
    <!-- <div class="container row row-cols-md-2 row-cols-sm-2 row-cols-lg-3 row-col-xs-1 mx-auto"> -->
    <!--   <div class="container row row-cols-md-2 row-cols-lg-3 row-cols-xs-1 mx-auto"> -->
    <div class="container">

        <div class="window" id="1" style="background: white"><img src="./img/icon/1.png" style="width: 150px; height: 150px" alt="">
        </div>
        <div class="window" id="2"> <img src="./img/icon/2.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="3"> <img src="./img/icon/3.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="4"> <img src="./img/icon/4.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="5"> <img src="./img/icon/5.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="6"> <img src="./img/icon/6.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="7"> <img src="./img/icon/7.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="8"> <img src="./img/icon/8.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="9"> <img src="./img/icon/9.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="10"> <img src="./img/icon/10.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="11"> <img src="./img/icon/11.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="12"> <img src="./img/icon/12.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="13"> <img src="./img/icon/13.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="14"> <img src="./img/icon/14.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="15"> <img src="./img/icon/15.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="16"> <img src="./img/icon/16.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="17"> <img src="./img/icon/17.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="18"> <img src="./img/icon/18.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="19"> <img src="./img/icon/19.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="20"> <img src="./img/icon/20.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="21"> <img src="./img/icon/21.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="22"> <img src="./img/icon/22.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="23"> <img src="./img/icon/23.png" style="width: 150px; height: 150px" alt=""> </div>
        <div class="window" id="24"> <img src="./img/icon/24.png" style="width: 150px; height: 150px" alt=""> </div>



    </div>

</body>

</html>