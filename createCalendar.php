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

$userId = $_SESSION['user'];


if ($_POST) {
    //table wod

    $sql = "INSERT INTO `calendar` (`calendarId`, `userId`, `wodId`, `dayId`) VALUES (NULL, '$userId', NULL, '1'),
    (NULL, '$userId', NULL, '2'),
    (NULL, '$userId', NULL, '3'),
    (NULL, '$userId', NULL, '4'),
    (NULL, '$userId', NULL, '5'),
    (NULL, '$userId', NULL, '6'),
    (NULL, '$userId', NULL, '7'),
    (NULL, '$userId', NULL, '8'),
    (NULL, '$userId', NULL, '9'),
    (NULL, '$userId', NULL, '10'),
    (NULL, '$userId', NULL, '11'),
    (NULL, '$userId', NULL, '12'),
    (NULL, '$userId', NULL, '13'),
    (NULL, '$userId', NULL, '14'),
    (NULL, '$userId', NULL, '15'),
    (NULL, '$userId', NULL, '16'),
    (NULL, '$userId', NULL, '17'),
    (NULL, '$userId', NULL, '18'),
    (NULL, '$userId', NULL, '19'),
    (NULL, '$userId', NULL, '20'),
    (NULL, '$userId', NULL, '21'),
    (NULL, '$userId', NULL, '22'),
    (NULL, '$userId', NULL, '23'),
    (NULL, '$userId', NULL, '24')";



    if (mysqli_query($conn, $sql)) {
        echo "<div class='text-dark pt-2 pb-2'>";
        echo "<p><center><b>Kalender erfolgreich angelegt! </b></center></p>";
        echo "<center> <img src='./img/team.png' alt='team' style='width:430; height: 255px' ></center>";
        // echo "<p><center><b><Dein Körper wird es dir danken: mit diesem Wod hast du folgende Teile in Schwung gebracht: </b></center></p>";
        //   echo "<p>" . $body . " </p>";

?>

        <div class="container-warning">
            <section class="warning rounded pr-5 pl-5">

                <h2 class="header-warn mb-4 mt-4">Warnhinweis!</h2>
                <h5 class="text-warn">An dieser Stelle möchten wir darauf hinweisen, dass wir <strong class="text-danger">keinerlei Haftung </strong>für etwaige Schäden und Verletzungen übernehmen, welche durch Mitmachen der Workouts - insbesondere durch eine mögliche Nachahmung von posierenden Elfen und Rentieren - entstehen können!
                    <br>
                    <br> Bitte <strong class="text-danger"> vor </strong> den Workouts für genügend Raum sorgen (eventuelle störende Möbel aus dem Weg räumen), Kleinkinder und Tiere in Sicherheit bringen und ungeeignete Trainingsplätze (wie zum Beispiel Kreuzungen und Bahnübergänge, etc) meiden!
                    <br>
                </h5>


                <a href="home.php" class="btn btn-outline-success mt-3 mb-3 text-center">Verstanden, ich passe auf!</a>
            </section>
        </div>

<?php



        echo "</div>";
    } else {
        echo "Error " . $sql . ' ' . $conn->error;
    }
}


$conn->close();
