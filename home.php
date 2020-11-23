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
include('navbarUser.php');
?>


<!DOCTYPE html>
<html>

<head>
   <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
   <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

   <div class="jumbotron jumbotron-fluid bg-dark text-white">
      <div class="container">
         <h1 class="display-4 text-success">the magic of advent..</h1>
         <p class="lead">Your new mini wod is awaiting you..</p>
      </div>
   </div>

   <h3 class="text-white"> Liebe/r <?php echo $userRow['userName']; ?>!</h3>

   <h4> Wir Weihnachtselfen lassen Dir eine Wahlmöglichkeit! Wie hättest du denn dein WOD gerne?</h4>
   <!-- <div class="container autos row row-cols-1 row-cols-md-2 row-cols-lg-3 mx-auto"> -->
   <!--   <div class="container row row-cols-md-2 row-cols-sm-2 row-cols-lg-3 row-col-xs-1 mx-auto"> -->
   <!-- <div class="container row row-cols-1 row-cols-md-2 row-cols-lg-3 mx-auto">-->


   <!-- <img src="./img/boxjump.png" alt="boxjump"> -->

   <!-- <img src="./img/boxjump.png" alt="boxjump" style="width: 380px; height: 390px"> -->

   <img src="./img/boxjump.png" alt="boxjump" style="width: 946px; height: 932px">

   <div style="width: 150px; height: 150px; background-color: white; border: 2pt solid green; border-radius:5pt" class="mx-auto">

      <span class="text-light">$day $wodName $points</span>
      <div class="mx-auto invisible">
         <h3 class="text-success">Choose your kind of wod:</h3>
         <hr>
         <p>LEVEL:</p>
         <hr>
         <p>DURATION:</p>
         <hr>
         <p>EQUIPMENT:</p>
         <hr>
         <button type="submit" class="btn btn-outline-success mx-auto">
            <center>Get your Wod!</center>
         </button>

      </div>
   </div>





   <div class="container">

      <?php

      //Full Join
      $sql = "SELECT * FROM calendar
                LEFT JOIN wod ON calendar.wodId = wod.wodId
                where calendar.userId = " . $_SESSION['user'] . "   UNION
                SELECT * FROM calendar
                RIGHT JOIN wod ON calendar.wodId = wod.wodId
                where calendar.userId = " . $_SESSION['user'];




      //nicer version
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result); // if uname/pass is correct it returns must be 1 row
      if ($count != 0) {

         // fetch the next row (as long as there are any) into $row
         while ($row = mysqli_fetch_assoc($result)) {
            $day = $row['dayId'];
            $wodName = $row['wodName'];
            $points = $row['points'];

            if ($day == 1) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 2) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 3) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 4) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 5) {
               echo "<div class='window' id='$day'>";
               echo "<span class='text-light'>$day $wodName $points TEST </span>";
               echo "<div class='test'>";
               echo "<h3 class='text-success'>Choose your kind of wod:</h3>";
               echo "<hr>";
               echo "<p>LEVEL:</p>";
               echo "<hr>";
               echo "<p>DURATION:</p>";
               echo "<hr>";
               echo "<p>EQUIPMENT:</p>";
               echo "<hr>";
               echo "<button type='submit' class='btn btn-outline-success mx-auto'>";
               echo "<center>Get your Wod!</center>";
               echo "</button>";
               echo "</div>";
               echo "</div>";
            }
            if ($day == 6) {
               echo "<div class='window' id='$day'> $day $wodName $points</div>";
            }
            if ($day == 7) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 8) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 9) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 10) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 11) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 12) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 13) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 14) {
               echo "<div class='window' id='$day'> $day $wodName $points</div>";
            }
            if ($day == 15) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 16) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 17) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 18) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 19) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 20) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 21) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 22) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 23) {
               echo "<div class='window' id='$day'> $day $wodName $points </div>";
            }
            if ($day == 24) {
               echo "<div class='window' id='$day'> $day $wodName $points</div>";
            }
         }
      } else {

         echo "<div class='advent-container d-flex justify-content-center align-items-center mt-2 ml-4 mr-4 rounded'>";
         echo "<section >";
         echo "<h2><center> Hallo lieber Mensch! </center></h2>";
         echo "<h3> Deine Mission beginnt jetzt! </h3>";
         echo "<form action='' method='post'>";
         echo "<input class='btn btn-outline-light m-2' type='submit' name='createCalendar' value='Adventkalendar erstellen'/>";
         echo "</form>";

         echo " </section>";
         echo "</div>";


         if (isset($_POST["createCalendar"])) {

            // Dein PHP-Code hier, z. B.:
            echo 'jaja, ein Elfe arbeitet bereits daran..';

            $userId = $_SESSION['user'];
            $sql2 = "INSERT INTO `calendar` (`calendarId`, `userId`, `wodId`, `dayId`) VALUES (NULL, '$userId', NULL, '1'),
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



            if ($conn->query($sql2) === TRUE) {
               echo "<div class='text-dark pt-2 pb-2'>";
               echo "<p><center><b>Adventkalender wurde erfolgreich angelegt</b></center></p>";
               echo "<p><center><b><New Record Successfully Created</b></center></p>";
               header("refresh:2; url=home.php");

               echo "</div>";
            } else {
               echo "Error " . $sql . ' ' . $conn->connect_error;
            }
         }
      }

      // Free result set
      mysqli_free_result($result);
      // Close connection
      mysqli_close($conn);
      ?>

   </div>



   <script>
      $('.window').on('click', function() {
         $(this).toggleClass('clicked');
      });
   </script>
</body>

</html>