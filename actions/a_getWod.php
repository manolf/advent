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

    $equipment = $_POST['equipment'];
    $durationInMinutes = $_POST['durationInMinutes'];
    $difficulty = $_POST['difficulty'];
    $userId = $_SESSION['user'];

    $res2 = mysqli_query($conn, "SELECT * from wod
    where wod.difficulty = $difficulty
    and wod.equipment like '%equipment'
    and wod.durationInMinutes <= $durationInMinutes
    and not exists(select *
                  from calendar c
                  where c.wodId = wod.wodId
                  and c.userId = $userId);";


    $userRow = mysqli_fetch_array($res2, MYSQLI_ASSOC);


    if ($conn->query($sql) === TRUE) {
        echo "<div class='text-dark pt-2 pb-2'>";
        echo "<p><center><b>Workout kommt...</b></center></p>";
        echo "<p><center><b><New Record Successfully Created</b></center></p>";
        header("refresh:2; url=wod.php");

        echo "</div>";
    } else {
        echo "Error " . $sql . ' ' . $conn->connect_error;
    }
}
''
// $sql2 = "UPDATE address SET street = '$street', zipcode = '$zipcode', city = '$city' WHERE addressID= $addressID";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style1.css">
    <title>Update Workout</title>
</head>

<body>