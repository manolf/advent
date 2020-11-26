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
// echo "heute: " . $today;

//to do check day and date! 

if ($_GET['dayId']) {
    $dayId = $_GET['dayId'];

    echo "gotten dayId = " . $dayId;

    $sql = "SELECT * FROM day WHERE dayId = $dayId";

    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();

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

    <body style="background: white">

        <div class="wrapper">

            <div class="left container container-day my-5 z-depth-1 rounded bg-white">
                <!--Section: Content-->
                <section class="dark-grey-text">
                    <div class="row pr-lg-5">
                        <div class="col-md-7 mb-4">
                            <div class="view">
                                <img src='<?php echo $data['elfPic'] ?>' alt="elfPic" class="img-fluid mt-4 rounded">
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-center mb-4">
                            <div>
                                <h3 class="font-weight-bold mb-4"> Tag <?php echo $data['dayId'] ?></h3>
                                <h4><?php echo $data['text'] ?></h4>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->
            </div>


            <div class=" right container my-5 py-5 z-depth-1" style="background: white; border : 1.4pt solid green; border-radius: 5%">
                <!--Section: Content-->
                <section class="px-md-5 mx-md-5 dark-grey-text text-center text-lg-left">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <!-- <img src="./img/icon/pig.jpg" class="img-fluid mb-5" alt=""> -->

                            <form action="wod.php" method='post'>
                                <h3 class="font-weight-bold pb-3">Aber nun... Hol dir dein Workout! </h3>

                                <div class="form-group">
                                    <h5 class="pb-1">LEVEL:</h5>
                                    <select name='difficulty' id='level'>
                                        <option> -- Level --- </option>
                                        <option value='1' name='difficulty' class='form-control' selected> easy</option>
                                        <option value='2' name='difficulty' class='form-control'> intermediate</option>
                                        <option value='3' name='difficulty' class='form-control'> hard</option>
                                        <option value='4' name='difficulty' class='form-control'> crossfit</option>
                                        <option value='5' name='difficulty' class='form-control'> hanni</option>
                                    </select>

                                    <h5 class="pt-3 pb-1">DURATION:</h5>
                                    <!-- <input type='text' name='durationInMinutes' placeholder='max Dauer in min' /></h5> -->
                                    <!-- Default inline 1-->
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="defaultInline1" name="durationInMinutes" value="10">
                                        <label class="custom-control-label" for="defaultInline1">
                                            < 10 min</label> </div> <!-- Default inline 2-->
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="defaultInline2" name="durationInMinutes" value="20" checked>
                                                    <label class="custom-control-label" for="defaultInline2"> 10 - 20 min</label>
                                                </div>

                                                <!-- Default inline 3-->
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" class="custom-control-input" id="defaultInline3" name="durationInMinutes" value="40">
                                                    <label class="custom-control-label" for="defaultInline3"> > 20 min</label>
                                                </div>



                                                <h5 class="pt-3 pb-1">EQUIPMENT:</h5>
                                                <!-- <input type='text' name='equipment' placeholder='bodyweight,  etc..' /> -->


                                                <select class="custom-select mt-2 mb-2" name="equipment2">
                                                    <option selected>-- Bitte wählen --</option>
                                                    <option value="Bodyweight" selected>Bodyweight</option>
                                                    <option value="Springschnur">Springschnur</option>
                                                    <option value="Klimmzugstange">Klimmzugstange</option>
                                                    <option value="Dumbbell">Dumbbell</option>
                                                    <option value="Kettlebell">Kettlebell</option>
                                                </select>

                                                <input type="hidden" name="dayId" value="<?php echo $data['dayId'] ?>" />
                                                <p><?php echo $data['dayId'] ?></p>

                                                <input class="form-control btn btn-outline-success" type="submit" name="submit" value="ich hols mir" />

                                                <a href="home.php" class="btn btn-outline-warning">Zurück</a>
                                    </div>
                            </form>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <!-- <div class="col-lg-5 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                            <img src=<?php echo $data['icon'] ?> style="width: 300px; height: 300px" alt="">
                        </div> -->
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </section>
                <!--Section: Content-->


            </div>

        </div>

    </body>

    </html>

<?php
}
?>