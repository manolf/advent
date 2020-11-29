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
include('jumbotron.php');

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
   <title>Welcome <?php echo $userRow['userName']; ?> !</title>
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



   <!-- Landing page -->

   <!-- <div container-let>
      <div class="mx-auto border text-dark">TEST voreingestelltes Datum: 6.12. TEST </div>
      <div class="mx-auto border text-success"> <b>countdown: </b> <?php echo $day . " d ";
                                                                     echo $houre . " h ";
                                                                     echo $min . " min ";
                                                                     echo $sec . " sec ";
                                                                     ?> <a href="home.php"> <i class="fa fa-retweet fa" style="color:green;"></i></a>
      </div> -->

   <div class="container container-cal">

      <?php

      //Full Join + Inner Join 
      $sql = "SELECT * FROM
      (SELECT calendar.dayId, wod.wodName, wod.difficulty FROM calendar
      LEFT JOIN wod ON calendar.wodId = wod.wodId
      where calendar.userId = " . $_SESSION['user'] . " 
      UNION
      SELECT calendar.dayId, wod.wodName, wod.difficulty FROM calendar
      RIGHT JOIN wod ON calendar.wodId = wod.wodId
      where calendar.userId = " . $_SESSION['user'] . " ) a 
      INNER JOIN day d ON d.dayId = a.dayId";

      $userId = $_SESSION['user'];
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result); // if uname/pass is correct it returns must be 1 row
      if ($count != 0) {

         // fetch the next row (as long as there are any) into $row
         while ($row = mysqli_fetch_assoc($result)) {
            $day = $row['dayId'];
            $wodName = $row['wodName'];
            $level = $row['difficulty'];
            $icon = $row['icon'];
            $displayId = $day . "alpha";
            //echo "hello" . $icon;

            if ($level === NULL) {
               $clicked = 'clickable';
            }
      ?>
            <form action="day.php" method='post'>
               <div class="window bild_beschriftung <?php echo $clicked ?>" id="<?php echo $day ?>">
                  <a href="day.php?dayId=<?php echo $day ?>"> <img class="caro <?php echo $clicked ?> " src="<?php echo $icon ?>" style="width: 150px; height: 150px; background-color: green" alt="icon"></a>
                  <span class='text-success erst'> </span>
                  <span class='text-light wod'"><?php echo $wodName ?></p>
               <input type='hidden' name='dayId' value=<?php echo $day ?> />
            </div>
           </form>
<?php
         }
      } else {




         echo "<div class='advent-container d-flex justify-content-center align-items-center mt-2 ml-4 mr-4 rounded'>";
         echo "<section >";
         echo "<h2><center> Hallo lieber Mensch! </center></h2>";
         echo "<h3 class='mt-3 mb-3'><center> Deine Mission beginnt jetzt!</center> </h3>";
         echo "<form action='createCalendar.php' method='post'>";
         echo "<center><input class='btn btn-outline-light m-2' type='submit' name='createCalendar' value='Adventkalendar erstellen'/></center>";
         echo "</form>";

         echo " </section>";
         echo "</div>";
      }

      // Free result set
      mysqli_free_result($result);
      // Close connection
      mysqli_close($conn);
?>

      </div>


      <div class=" container my-5 z-depth-1 rounded">
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

                                 <p>... nochmals: Die Elfen lassen dir die Wahl! Du hast die Möglichkeit zwischen verschiedenen Levels zu wählen. <br></p>Bringt dich bereits die Vorstellung, von der Couch aufzustehen, ins Schwitzen, empfehlen wir Level <strong>easy</strong>, als durchschnittlich fitter Mensch solltest du <strong>intermediate</strong> anstreben, für <strong>hard</strong> klatschen wir dir auf den Rücken. <br> <br>Leute, die es außergewöhnlich - mit einem Hauch von Militarismus und einem Faible für geplante Strukturen, die den starken Überlebenswillen in einem hervorbringen - schätzen, werden mit der Kategorie <strong>crossfit</strong> glücklich. Wenn dir allerdings Abkürzungen wie AMRAP, EMOM, etc nichts sagen, werden dich diese Wods eher verwirren bevor sie dich in die Knie zwingen..<br><br>
                                 Die Kategorie <strong>Hanni</strong> ist dem Wichtelvorbild und der BEST TEAMPARTNERIN Hanni gewidmet. <br> <strong>Achtung:</strong> gerade diese Workouts sind auch nicht für Sportmuffel gedacht..</p>

                                 <!-- <button type="button" class="btn btn-light btn-rounded mx-0 mb-2">zu den Türchen...</button> -->

                              </div>
                           </div>
                        </div>

                     </section>
                     <!--Section: Content-->
               </div>


               <?php
               include('footer.php');
               ?>



               <script>
                  var today = (new Date()).getDate();
                  console.log(today);
                  var today = 6;

                  // document.getElementsByTagName('h1')[0].style.backgroundColor = 'yellow';
                  // document.getElementsByTagName('img')[5].style.backgroundColor = 'red';
                  var kasterl = document.getElementsByTagName('img');

                  for (let i = 1; i < 25; i++) {
                     if (i <= today) {
                        // document.getElementsByTagName('img')[i].style.backgroundColor = 'red';
                        kasterl[i].style.backgroundColor = 'grey';

                     } else {
                        kasterl[i].style.backgroundColor = 'white';
                        kasterl[i].classList.add("notReady");
                     }
                  }

                  // var kasterlWod = document.getElementsByClassName('clickable');
                  // for (let i = 0; i < kasterlWod.length; i++) {
                  //    //console.log(i);
                  //    kasterlWod[i].style.backgroundColor = 'yellow';


                  // }


                  // kasterlWod.classList.style.backgroundColor = 'blue';

                  // document.querySelectorAll('.clicked').forEach(function(img) {
                  //    img.style.backgroundColor = 'yellow';

                  // });


                  // [4].style.backgroundColor = 'yellow';

                  // document.getElementsByClassName('clicked').style.backgroundColor = 'blue';
                  //datumsabhängige Steuerung für die Kästchen

                  // $(document).ready(function() {
                  //    console.log(today);
                  //    for (let i = 1; i <= 24; i++) {
                  //       let mydiv = document.getElementById(i);
                  //       //kästchen not Ready: nur hover und nicht clickable
                  //       if (i > today) {
                  //          mydiv.classList.add("notReady");
                  //          console.log(mydiv.classList);
                  //          // mydiv.classList.addStyle(backgroundColor = 'white');
                  //          mydiv.style.cssText = "background-color : white";
                  //          // mydiv.classList.remove("clickable");
                  //       }
                  //       if (i <= today) {
                  //          mydiv.classList.add("clickable");
                  //          mydiv.style.cssText = "backgroundColor: rgb (192, 192, 192)";
                  //          console.log(mydiv.classList);
                  //       }
                  //    }

                  // })

                  // document.addEventListener("DOMContentLoaded", function() {
                  //    document.querySelector('[name="clicked"]').addEventListener('change', changeStyle);
                  //    // document.querySelector('[name="background"]').addEventListener('change', changeStyle);

                  //    function changeStyle() {
                  //       var output = document.querySelector('clicked');
                  //       output.style.backgroundColor = black;
                  //       output.style.backgroundColor = document.querySelector('[name="background"]').value;
                  //    }
                  // });

                  //Funktion für die clickable Kästchen

                  //deactivated start
                  // $('.window').on('click', function() {
                  //    console.log("hello");
                  //    //  $(this).toggleClass('clicked');
                  //    console.log($(this));
                  //    $(this).addClass('clicked');
                  //deactivated end


                  // console.log($(this).next());
                  // console.log($(this).children()[0]);
                  // console.log($(this).children()[1].id);
                  // console.log($(this).children()[2].id);
                  // console.log($(this).children()[3].id);
                  // console.log($(this).children()[4].id);

                  // show($(this).children()[3].id);

                  // });

                  // function show(id) {
                  //    if (document.getElementById) {
                  //       var mydiv = document.getElementById(id);
                  //       // mydiv.style.display = (mydiv.style.display == 'none' ? 'block' : 'none');
                  //       mydiv.style.display = 'block';
                  //    }
                  // }
               </script>
</body>

</html>