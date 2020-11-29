<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fahkwang:wght@200&display=swap" rel="stylesheet">

</head>

<body>

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
