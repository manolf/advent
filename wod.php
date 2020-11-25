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

//get todays date:
//$today = date('m/d/Y h:i:s a', time());
$today = date('d', time());

//faked: 
$today = 6;
echo "heute: " . $today;


?>