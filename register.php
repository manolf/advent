<?php
ob_start();
session_start(); // start a new session or continues the previous
if (isset($_SESSION['user']) != "") {
   header("Location: home.php"); // redirects to home.php
}
if (isset($_SESSION['admin']) != "") {
   header("Location: admin.php"); // redirects to home.php
}
if (isset($_SESSION['superadmin']) != "") {
   header("Location: superadmin.php"); // redirects to home.php
}
include_once 'actions/db_connect.php';
$error = false;
if (isset($_POST['btn-signup'])) {

   // sanitize user input to prevent sql injection
   $name = trim($_POST['name']);

   //trim - strips whitespace (or other characters) from the beginning and end of a string
   $name = strip_tags($name);

   // strip_tags — strips HTML and PHP tags from a string

   $name = htmlspecialchars($name);
   // htmlspecialchars converts special characters to HTML entities
   $email = trim($_POST['email']);
   $email = strip_tags($email);
   $email = htmlspecialchars($email);

   $pass = trim($_POST['pass']);
   $pass = strip_tags($pass);
   $pass = htmlspecialchars($pass);

   // basic name validation
   if (empty($name)) {
      $error = true;
      $nameError = "Please enter your full name.";
   } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "Name must have at least 3 characters.";
   } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
   }

   //basic email validation
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = true;
      $emailError = "Please enter valid email address.";
   } else {
      // checks whether the email exists or not
      $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
      $result = mysqli_query($conn, $query);
      $count = mysqli_num_rows($result);
      if ($count != 0) {
         $error = true;
         $emailError = "Provided Email is already in use.";
      }
   }
   // password validation
   if (empty($pass)) {
      $error = true;
      $passError = "Please enter password.";
   } else if (strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have at least 6 characters.";
   }

   // password hashing for security
   $password = hash('sha256', $pass);


   // if there's no error, continue to signup
   if (!$error) {

      $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
      $res = mysqli_query($conn, $query);


      if ($res) {
         $errTyp = "success";
         $errMSG = "Successfully registered, you may login now";
         unset($name);
         unset($email);
         unset($pass);
      } else {
         $errTyp = "danger";
         $errMSG = "Something went wrong, try again later...";
      }
   }
}
?>
<!DOCTYPE html>
<html>

<head>
   <title>Login & Registration System</title>
   <meta http-equiv="Content-Type" charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="style2.css" />
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</head>

<body>

   <div class="container-fluid">


      <nav class="navbar sticky-top navbar-dark bg-dark">

         <div class="mx-auto">
            <a class="btn btn-outline-success" href="index.php" role="button">Home</a>
            <a class="btn btn-outline-success" href="login.php" role="button">Login</a>
            <a class="btn btn-outline-success" href="register.php" role="button">Signup</a>
         </div>
      </nav>




      <div class="parallax_section1 parallax_image">
      </div>
      <!--END PARALLAX-->

      <div class="parallax_section2 help parallax_image">

         <div class="row ">

            <!-- register start -->

            <form class="mx-auto mt-4 formular" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


               <h2 class="text-success">Sign Up.</h2>
               <hr />

               <?php
               if (isset($errMSG)) {

               ?>
                  <div class="alert alert-<?php echo $errTyp ?>">
                     <?php echo  $errMSG; ?>
                  </div>

               <?php
               }
               ?>




               <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />

               <span class="text-danger"> <?php echo  $nameError; ?> </span>



               <input type="email" name="email" class="form-control mt-2 mb-2" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />

               <span class="text-danger"> <?php echo  $emailError; ?> </span>





               <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />

               <span class="text-danger"> <?php echo  $passError; ?> </span>

               <hr />


               <button type="submit" class="btn btn-block btn-success" name="btn-signup">Sign Up</button>
               <hr />

               <a href="login.php">Sign in Here...</a>


            </form>

            <!-- register end -->

         </div>


      </div>
      <!--END PARALLAX -->

      <div class="parallax_section1 parallax_image">
      </div>
      <!--END PARALLAX-->

      <nav class="navbar navbar-light bg-dark">

         <div class="mx-auto">
            <h2 class="text-success">(c)manu & orsi 2020 </h2>

         </div>
      </nav>

   </div>


   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>
<?php ob_end_flush(); ?>