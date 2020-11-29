<?php require_once 'actions/db_connect.php';
include('navbar.php');
include('jumbotron.php');
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fahkwang:wght@200&display=swap" rel="stylesheet">
</head>

<body>

    <div class=" container my-5 z-depth-1 rounded border">
        <!--Section: Content-->
        <section class="dark-grey-text">

            <div class="row pr-lg-5">
                <div class="col-md-7 mb-4">

                    <div class="view">
                        <img src='./img/gruener_elf.png' alt="boxjump" style="width: 533px; height: 740px" class="img-fluid rounded">
                    </div>

                </div>
                <div class="col-md-5 d-flex align-items-center mb-4">
                    <div>

                        <h3 class="font-weight-bold mb-4"> Hereinspaziert...</i> </h3>

                        <br>

                        <p>... hier bist du genau richtig! <br></p>Für diesen außergewöhnlichen Advent bieten wir dir etwas gaaanz Besonderes an: einen auf dich und deine sportlichen Bedürfnisse individuell zugeschnittenen Adventskalender! <br>
                        Jeden Tag - bis Weihnachten - öffnet sich ein Türchen - mit einem Workout <strong>ganz speziell für dich!</strong></p>

                        <br>
                        Und weißt du, was das beste daran ist? Du bist nicht alleine: du darfst den Elf Hanno bei seinem Weg zum sportlich-starken Helfer Santas begleiten! <br>Schau: er freut sich schon auf dich und schlägt bereits Räder:

                        Lass ihn nicht länger warten und registriere dich gleich!

                        <a href="register.php" type="button" class="btn btn-outline-success mt-4">Super, bring me on!</a>



                        <!-- <button type="button" class="btn btn-light btn-rounded mx-0 mb-2">zu den Türchen...</button> -->

                    </div>
                </div>
            </div>

        </section>
        <!--Section: Content-->
    </div>


    <div class="container-warning">
        <section>

            <div>
                <img id="licht" src="./img/lichterkette.png" alt="radschlagender Hanno">
            </div>

        </section>
    </div>


    <?php
    include('footer.php');
    ?>

    <!-- <div class="container row col-lg-4 col-md-6 col-xs-12 mx-auto"> -->
    <!-- <div class="container row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 mx-auto"> -->
    <!-- <div class="container row row-cols-md-2 row-cols-sm-2 row-cols-lg-3 row-col-xs-1 mx-auto"> -->
    <!--   <div class="container row row-cols-md-2 row-cols-lg-3 row-cols-xs-1 mx-auto"> -->
    <!-- <div class="container">

        <div class="window" id="1" style="background: white"><img src="./img/icon/1.png" style="width: 150px; height: 150px" alt="">
        </div>
        <div class="window" id="2"> <img src="./img/icon/2.png" style="width: 150px; height: 150px; background: rgb(240, 236, 187);" alt=""> </div>
        <div class="window" id="3"> <img src="./img/icon/3.png" style="width: 150px; height: 150px; background: rgb(192, 192, 192);" alt=""> </div>
        <div class="window" id="4"> <img src="./img/icon/4.png" style="width: 150px; height: 150px; background: red;"> </div>
        <div class="window" id="5"> <img src="./img/icon/5.png" style="width: 150px; height: 150px; background: #cdfcd2 " alt=""> </div>
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



    </div> -->

</body>

</html>