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


if ($_POST) {
    //table wod

    echo    $userId = $_SESSION['user'];
    echo    $wodId = $_POST['wodId'];
    echo   $body = $_POST['trainedParts'];
    echo   $dayId = $_POST['dayId'];


    // UPDATE calendar SET wodId = '2' WHERE userId = '3' AND dayId = '5'

    echo $sql = "UPDATE calendar SET wodId = '$wodId' WHERE userId = '$userId' AND dayId = '$dayId'";


    if (mysqli_query($conn, $sql)) {
        echo "<div class='text-dark pt-2 pb-2'>";
        echo "<p><center><b>Super, du hast es geschafft! </b></center></p>";
        echo "<p><center><b><Dein Körper wird es dir danken: mit diesem Wod hast du folgende Teile in Schwung gebracht: </b></center></p>";
        //   echo "<p>" . $body . " </p>";
        // header("refresh:3; url=home.php");

        echo "</div>";
    } else {
        echo "Error " . $sql . ' ' . $conn->error;
    }
}


$conn->close();
