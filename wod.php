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
//echo "heute: " . $today;


//to do check day and date! 




if ($_POST['dayId']) {
   $dayId = $_POST['dayId'];

   "dayId = " . $dayId;

   $difficulty = $_POST['difficulty'];
   $durationInMinutes = $_POST['durationInMinutes'];
   $equipment = $_POST['equipment2'];
   $userId = $_SESSION['user'];


   echo $sql = "SELECT * FROM wod 
   inner join users on users.userId= wod.userId
   WHERE difficulty = $difficulty 
   and equipment like '%$equipment' 
   and durationInMinutes $durationInMinutes 
   and not exists (select *
                  from calendar c
               where c.wodId = wod.wodId
                     and c.userId = $userId)
                   ORDER BY wod.wodId ASC LIMIT 1
   ";



   $sql2 = "select * 
   from day
   where day.dayId = '$dayId'";

   $result = $conn->query($sql);
   $result2 = $conn->query($sql2);
   $data = $result->fetch_assoc();
   $data2 = $result2->fetch_assoc();

   $count = mysqli_num_rows($result);
   if ($count == 0) {
      // echo "oh nein...";
      // echo "es sieht so aus, als gäbe es kein Wod in der gewünschten Kategorie für dich!";
      header("Location: nowod.php?dayId=" . $dayId);
   }


   $conn->close();
}

?>

<!DOCTYPE html>
<html>

<head>
   <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
</head>

<body style="background: white">

   <div class="wrapper">

      <div class="left container container-day my-5 z-depth-1 rounded bg-white">
         <!--Section: Content-->
         <section class="dark-grey-text">
            <div class="row pr-lg-5">
               <div class="col-md-7 mb-4">
                  <div class="view">
                     <img src='<?php echo $data2['elfPic'] ?>' alt="elfPic" class="img-fluid mt-4 rounded">
                  </div>
               </div>
               <div class="col-md-5 d-flex align-items-center mb-4">
                  <div>
                     <h4 class="font-weight-bold mb-4"> Tag <?php echo $data2['dayId'] ?></h4>
                     <h6><?php echo $data2['text'] ?></h6>
                  </div>
               </div>
            </div>
         </section>
         <!--Section: Content-->
      </div>


      <div class=" right container my-5 py-5 z-depth-1">
         <!--Section: Content-->
         <!-- <section class="px-md-5 mx-md-5 dark-grey-text text-center text-lg-right"> -->
         <section>
            <!--Grid row-->
            <!-- <div class="row"> -->

            <!-- <div class="col-lg-7 mb-4 mb-lg-0"> -->
            <!-- <img src="./img/icon/pig.jpg" class="img-fluid mb-5" alt=""> -->

            <div>
               <h2 class="font-weight-bold pb-3 " id="workout"> Hier ist dein Wod! </h2>

               <div class="form-group">

                  <h3 class="text-success"><?php echo $data['wodName'] ?></h3>

                  <h5 class=''>
                     <?php echo $data['description'] ?>
                     <hr>

                     <?php
                     if ($data['link'] != '') {
                        echo ('Zusätzliche Infos bzw das Wod findest du <a target="_blank" href=' . $data['link'] . ' >hier. </a>');
                     } else {
                        echo " ";
                     }
                     ?>
                  </h5>

                  <h5>Mit diesem Workout tust du folgenden Teilen deines Körpers etwas Gutes:<br><br> <strong> <?php echo $data['trainedParts'] ?> </strong> <br><br>Super, nur weiter so!</h5>

                  <form action='insertWod.php' method='post'>
                     <!-- <h5>Hurra, ich habe es geschafft!
                  </h5> -->
                     <input class='btn btn-outline-danger m-2' type='submit' name='insertWod' value='Workout absolviert' />

                     <input type="hidden" name="wodId" value="<?php echo $data['wodId'] ?>" />
                     <input type="hidden" name="dayId" value="<?php echo $data2['dayId'] ?>" />
                     <!-- <p><?php echo $data2['dayId'] ?></p> -->
                  </form>
                  <hr>
                  <p>

                     Dieses Workout wurde für dich von <a href="<?php echo $data['insta'] ?>" target="_blank"><?php echo $data['userName'] ?></a> bereitgestellt. :-) Du kannst dich gerne bei ihr/ihm dafür bedanken (oder beschweren)..

                  </p>


                  </form>
                  <!-- </div> -->
                  <!--Grid column-->
                  <!--Grid column-->
                  <!-- <div class="col-lg-5 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                <img src=<?php echo $data['icon'] ?> style="width: 300px; height: 300px" alt="">
            </div> -->
                  <!--Grid column-->
                  <!-- </div> -->
                  <!--Grid row-->
         </section>
         <!--Section: Content-->


      </div>

   </div>










   <script>
      var x = document.getElementById('workout');
      x.setAttribute("tabindex", 1);
      x.focus()
   </script>

</body>

</html>