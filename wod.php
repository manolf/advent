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
// $today = 6;
echo "heute: " . $today;


//to do check day and date! 




if ($_POST['dayId']) {
   $dayId = $_POST['dayId'];
   echo "<br> diff: ";
   echo $difficulty = $_POST['difficulty'];
   echo "<br> min: ";
   echo $durationInMinutes = $_POST['durationInMinutes'];
   echo "<br> equipment: ";
   echo $equipment = $_POST['equipment2'];
   echo "<br>";
   echo " dayId = " . $dayId;

   // $sql = "SELECT * FROM wod
   //  where wod.difficulty = $difficulty
   //  and wod.equipment like '%equipment'
   //  and wod.durationInMinutes <= $durationInMinutes
   //  ";

   // $result = $conn->query($sql);
   // $data = $result->fetch_assoc();
   // $conn->close();



   // $userRow = mysqli_fetch_array($res2, MYSQLI_ASSOC);


   //  if ($conn->query($sql) === TRUE) {
   //      echo "<div class='text-dark pt-2 pb-2'>";
   //      echo "<p><center><b>Workout kommt...</b></center></p>";
   //      echo "<p><center><b><New Record Successfully Created</b></center></p>";
   //      header("refresh:2; url=wod.php");

   //      echo "</div>";
   //  } else {
   //      echo "Error " . $sql . ' ' . $conn->connect_error;
   //  }
}

?>

<!DOCTYPE html>
<html>

<head>
   <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--load all styles -->
   <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
</head>

<body style="background: green">

   <h1>Hier kommt dein Workout!</h1>

</body>

</html>