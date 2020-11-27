<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';


// if session is not set this will redirect to login page

if (isset($_SESSION["admin"])) {
    header("Location: admin.php");
    exit;
}
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
// select logged-in users details
$res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

//NAVBAR
include('navbarUser.php');

if ($_GET['dayId']) {
    $dayId = $_GET['dayId'];
}


$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
    <link rel="stylesheet" href="style.css">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
</head>


<body>
    <h1 class="text-success mx-auto mt-2">Oh nein...</h1>
    <div class="container-error mt-5 mb-3">


        <div class="error-text mx-auto">

            <div>
                <img src="https://cdn.pixabay.com/photo/2019/02/04/08/38/pixel-cells-3974187_960_720.png" style="width:320px; height:240px" alt="error">

                <p>Es sieht so aus, als gäbe es kein Wod in der von dir gewünschten Selektion (mehr).
            </div>
            <div>
                <h4>Bitte probier folgendes:</h4>
                <br>
                <ul>
                    <li>Ändere die Kategorie: trau dich! </li>
                    <li>Darfs ein bisserl mehr/weniger sein? Ändere die Workout-Minuten! </li>
                    <li>Probier neues Equipment aus! Zum Beispiel: <br>du hast doch bestimmt eine Wand zuhause? Gib ihr eine Chance!</li>
                </ul>
                </p>


                <form action='day.php' method='post'>
                    <!-- <h5>Hurra, ich habe es geschafft!
                  </h5> -->


                    <input type="hidden" name="dayId" value="<?php echo $dayId ?>" />
                    <!-- <p><?php echo $dayId ?></p> -->
                    <a href='day.php?dayId=<?php echo $dayId ?>' class='btn btn-outline-success '> Ich versuchs nochmal! </a> </span>

                </form>


            </div>


        </div>

    </div>
</body>

</html>