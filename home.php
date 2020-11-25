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

//COUNTDOWN

$endTime = mktime(00, 00, 0, 12, 01, 2020); //Stunde, Minute, Sekunde, Monat, Tag, Jahr;

//Aktuellezeit des microtimestamps nach PHP5, für PHP4 muss eine andere Form genutzt werden.
$timeNow = microtime(true);

//Berechnet differenz von der Endzeit vom jetzigen Zeitpunkt aus.
$diffTime = $endTime - $timeNow;

//Zerlegt $diffTime am Dezimalpunkt, rundet vorher auf 2 Stellen nach dem Dezimalpunkt und gibt diese zurück.
$milli = explode(".", round($diffTime, 2));
$millisec = round($milli[1]);

//Berechnung für Tage, Stunden, Minuten
$day = floor($diffTime / (24 * 3600));
$diffTime = $diffTime % (24 * 3600);
$houre = floor($diffTime / (60 * 60));
$diffTime = $diffTime % (60 * 60);
$min = floor($diffTime / 60);
$sec = $diffTime % 60;

//Ausgabe von $day (Tage), $houre (Stunden), $sec (Sekunden), $millisec (Millisekunden)
// echo $day . " Tage ";
// echo $houre . " Stunden ";
// echo $min . " Minuten ";
// echo $sec . " Sec ";
// echo $millisec . " Millisec";

//get todays date:
//$today = date('m/d/Y h:i:s a', time());
// $today = date('d', time());

//faked: 
$today = 6;
// echo "heute: " . $today;


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

<body>

   <div class="jumbotron jumbotron-fluid bg-dark text-white">
      <div class="container">
         <h1 class="display-4 text-light">the magic of advent..</h1>
         <p class="mx-auto text-success">wir warten noch..</p>
         <!-- <h3 class="font-weight-bold p-3">COUNTDOWN</h3> -->
         <p class="mx-auto border p-2 mt-2"> <?php echo $day . " d ";
                                             echo $houre . " h ";
                                             echo $min . " min ";
                                             echo $sec . " sec ";
                                             ?>

            <a href="home.php"> <i class="fa fa-retweet fa-2x" style="color:white;"></i> </i> </a>
            <!-- <i class="fa fa-car"></i>

            <i class="fa fa-bicycle"></i> -->

         </p>
      </div>

   </div>





   <!-- Landing page -->

   <div class="container">

      <?php

      //Full Join
      $sql = "SELECT * FROM calendar
                LEFT JOIN wod ON calendar.wodId = wod.wodId
                where calendar.userId = " . $_SESSION['user'] . "   UNION
                SELECT * FROM calendar
                RIGHT JOIN wod ON calendar.wodId = wod.wodId
                where calendar.userId = " . $_SESSION['user'];


      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result); // if uname/pass is correct it returns must be 1 row
      if ($count != 0) {

         // fetch the next row (as long as there are any) into $row
         while ($row = mysqli_fetch_assoc($result)) {
            $day = $row['dayId'];
            $wodName = $row['wodName'];
            $points = $row['points'];
            $displayId = $day . "alpha";

            echo "<div class='window secondary' id='$day'>";
            // echo "<div class='window secondary' id='$day'><span class='text-success d-flex justify-content-end align-items-baseline mt-1 mr-1'><i id='close' class='fa fa-remove style='color:darkred;'></i></span>";
            echo "<span class='text-success number'>$day </span>";
            echo "<p class='text-secondary'>$wodName</p>";
            echo "<p class='text-secondary'>$points</p>  ";
            echo "<div id='$displayId' style='display:none'>";

            echo "<form action='' method='POST'>";
            echo "<h4 class='text-success'>Choose your kind of wod: </i></h4>";
            // echo "<hr>";
            echo "<p>LEVEL: ";
            echo "<select name='difficulty' id='level'>";
            echo " <option> ---- Schwierigkeitsgrad ----- </option>";
            echo "<option value='1' name='difficulty' class='form-control'> easy</option>";
            echo "<option value='2' name='difficulty' class='form-control'> intermediate</option>";
            echo "<option value='3' name='difficulty' class='form-control'> hard</option>";
            echo "<option value='4' name='difficulty' class='form-control'> crossfit</option>";
            echo "<option value='5' name='difficulty' class='form-control'> hanni</option>";
            echo "</select></p>";
            echo "<hr>";
            echo "<p>DURATION:<input type='text' name='durationInMinutes' placeholder='max Dauer in min' /></p>";
            echo "<hr>";
            echo "<p>EQUIPMENT:<input type='text' name='equipment' placeholder='bodyweight,  etc..' /> </p>";
            echo "<hr>";

            echo "<input class='btn btn-outline-success m-2' type='submit' name='getWorkout' value='Get your Workout!'/>";
            echo "<a href='home.php' class='btn btn-outline-warning'> Zurück</a>";
            echo "</form>";
            // echo "<button type='submit' class='btn btn-outline-success d-flex justify-content-stretch '>";
            // echo "<center>Get your Wod!</center>";
            // echo "</button>";
            echo "</div>";
            echo "</div>";


            //GET WOD START -->Besser eigene page... 
            // if (isset($_POST["getWorkout"])) {


            //    echo 'jaja, ein Elfe arbeitet bereits daran..';

            //    $userId = $_SESSION['user'];
            //    $sql3 = "SELECT * from wod
            //    where wod.difficulty = 2
            //    and wod.equipment like '%bodyweight'
            //    and wod.durationInMinutes <= 10
            //    and not exists(select *
            //                  from calendar c
            //                  where c.wodId = wod.wodId
            //            and c.userId = 3)";



            //    if ($conn->query($sql3) === TRUE) {
            //       echo "<div class='text-dark pt-2 pb-2'>";
            //       echo "<p><center><b>Workout kommt...</b></center></p>";
            //       echo "<p><center><b><New Record Successfully Created</b></center></p>";
            //       header("refresh:2; url=home.php");

            //       echo "</div>";
            //    } else {
            //       echo "Error " . $sql . ' ' . $conn->connect_error;
            //    }
            // }


            //GET WOD END


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


   <div class="container my-5 z-depth-1 rounded">
      <!--Section: Content-->
      <section class="dark-grey-text">

         <div class="row pr-lg-5">
            <div class="col-md-7 mb-4">

               <div class="view">
                  <img src='./img/boxjump.png' alt="boxjump" style="width: 472px; height: 482px" class="img-fluid mt-4 rounded">
               </div>

            </div>
            <div class="col-md-5 d-flex align-items-center mb-4">
               <div>



                  <h3 class="font-weight-bold mb-4"> Auf in die Startlöcher...</i> </h3>

                  <br>

                  <p>... nochmals: Die Elfen lassen dir die Wahl! Du hast die Möglichkeit zwischen verschiedenen Levels zu wählen. <br></p>Bringt dich bereits die Vorstellung, von der Couch aufzustehen, ins Schwitzen, empfehlen wir Level <strong>easy</strong>, als durchschnittlich fitter Mensch solltest du <strong>intermediate</strong> anstreben, für <strong>hard</strong> klatschen wir dir auf den Rücken. <br>Besonders Wahnsinnige - also Leute, die es außergewöhnlich außergewöhnlich schätzen (insbesondere Crossfit-Wahnsinnige) werden mit der Kategorie <strong>crossfit</strong> glücklich.<br>
                  Die Kategorie <strong>Hanni</strong> ist dem Wichtelvorbild und der BEST TEAMPARTNERIN Hanni gewidmet. <br> <strong>Achtung:</strong> gerade diese Workouts sind auch nicht für Sportmuffel gedacht..</p>

                  <!-- <button type="button" class="btn btn-light btn-rounded mx-0 mb-2">zu den Türchen...</button> -->

               </div>
            </div>
         </div>

      </section>
      <!--Section: Content-->
   </div>






   <script>
      var today = (new Date()).getDate();
      console.log(today);
      var today = 6;

      //datumsabhängige Steuerung für die Kästchen

      $(document).ready(function() {
         console.log(today);
         for (let i = 1; i <= 24; i++) {
            let mydiv = document.getElementById(i);
            //kästchen not Ready: nur hover und nicht clickable
            if (i > today) {
               mydiv.classList.add("notReady");
               //console.log(mydiv.classList);
               // mydiv.classList.remove("clickable");
            }
            if (i <= today) {
               mydiv.classList.add("clickable");
               //console.log(mydiv.classList);
            }
         }
      })

      //Funktion für die clickable Kästchen
      $('.window').on('click', function() {
         console.log("hello");
         //  $(this).toggleClass('clicked');
         console.log($(this));
         $(this).addClass('clicked');


         // console.log("hello" + $(this).find(".test"));
         // console.log($(this).next());
         // console.log($(this).children()[0]);
         // console.log($(this).children()[1].id);
         // console.log($(this).children()[2].id);
         // console.log($(this).children()[3].id);
         // console.log($(this).children()[4].id);

         show($(this).children()[3].id);

      });

      function show(id) {
         if (document.getElementById) {
            var mydiv = document.getElementById(id);
            // mydiv.style.display = (mydiv.style.display == 'none' ? 'block' : 'none');
            mydiv.style.display = 'block';
         }
      }
   </script>
</body>

</html>