<?php


//VERSION 1 
//liefert emailError bei SignIn
//Undefined variable: emailError in C:\xampp2\htdocs\codefactory\LMSCF-manuela-thamer-petadoption-CR11\login.php on line 136

// $localhost = "127.0.0.1";
// $username = "root";
// $password = "";
// $dbname = "animals";

// // create connection
// $conn = new  mysqli($localhost, $username, $password, $dbname);

// // check connection
// if($conn->connect_error) {
//     die("connection failed: " . $conn->connect_error);
// } else {
//      echo "Successfully Connected";
// }



//VERSION 2 not working
error_reporting(~E_DEPRECATED & ~E_NOTICE);


define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'xmas');

// define('DBHOST', '173.212.235.205');
// define('DBUSER', 'thamerco_thamercodefactor');
// define('DBPASS', 'FUQGycagZ!Oc');
// define('DBNAME', 'thamerco_xmas');


$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);


if (!$conn) {
    die("Connection failed : " . mysqli_error());
}
