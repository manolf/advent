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

   echo "dayId = " . $dayId;

   $difficulty = $_POST['difficulty'];
   $durationInMinutes = $_POST['durationInMinutes'];
   $equipment = $_POST['equipment2'];
   $userId = $_SESSION['user'];


   echo $sql = "SELECT * FROM wod 
   inner join users on users.userId= wod.userId
   WHERE difficulty = $difficulty 
   and equipment like '%$equipment' 
   and durationInMinutes < $durationInMinutes 
   and not exists (select *
                  from calendar c
               where c.wodId = wod.wodId
                     and c.userId = $userId)
                   ORDER BY wod.wodId ASC LIMIT 1
   ";

   echo $sql2 = "select * 
   from day
   where day.dayId = '$dayId'";

   $result = $conn->query($sql);
   $result2 = $conn->query($sql2);
   $data = $result->fetch_assoc();
   $data2 = $result2->fetch_assoc();
   $conn->close();
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


   <div class=" container container-day my-5 z-depth-1 rounded bg-white">
      <!--Section: Content-->
      <section class="dark-grey-text">
         <div class="row pr-lg-5">
            <div class="col-md-7 mb-4">
               <div class="view">
                  <img src='<?php echo $data2['icon'] ?>' alt="day" class="img-fluid mt-4 rounded">
               </div>
            </div>
            <div class="col-md-5 d-flex align-items-center mb-4">
               <div>
                  <h3 class="font-weight-bold mb-4"> Tag <?php echo $data2['dayId'] ?></h3>
                  <h4><?php echo $data['wodName'] ?></h4>
               </div>
            </div>
         </div>
      </section>
      <section>
         <h5 class='bg-danger border'>
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

         <form action='insertWod.php' method='post'>
            <!-- <h5>Hurra, ich habe es geschafft!
            </h5> -->
            <input class='btn btn-outline-danger m-2' type='submit' name='insertWod' value='Workout absolviert' />

            <input type="hidden" name="wodId" value="<?php echo $data['wodId'] ?>" />
            <input type="hidden" name="dayId" value="<?php echo $data2['dayId'] ?>" />
            <p><?php echo $data2['dayId'] ?></p>
         </form>

         <!-- <h6>Mit diesem Workout hast du folgenden Teilen deines Körpers etwas Gutes getan: <?php echo $data['trainedParts'] ?> <br> Super, nur weiter so!</h6> -->
         <hr>
         <p>

            Dieses Workout wurde für dich von <a href="<?php echo $data['insta'] ?>" target="_blank"><?php echo $data['userName'] ?></a> bereitgestellt. :-)

         </p>
      </section>
      <!--Section: Content-->
   </div>









</body>

</html>