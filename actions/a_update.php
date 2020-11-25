<?php
ob_start();
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}
// select logged-in users details
$res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['admin']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);


if ($_POST) {
    //table wod
    $wodId = $_POST['wodId'];
    $wodName = $_POST['wodName'];
    $trainedParts = $_POST['trainedParts'];
    $equipment = $_POST['equipment'];
    $description = $_POST['description'];
    $durationInMinutes = $_POST['durationInMinutes'];
    $difficulty = $_POST['difficulty'];
    $points = $_POST['points'];
    $link = $_POST['link'];

    $sql = "UPDATE wod SET wodName = '$wodName', trainedParts = '$trainedParts', equipment = '$equipment', description = '$description', durationInMinutes = '$durationInMinutes', difficulty = '$difficulty', points = '$points', link = '$link' WHERE wodId = $wodId";

    // $sql2 = "UPDATE address SET street = '$street', zipcode = '$zipcode', city = '$city' WHERE addressID= $addressID";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../style1.css">
        <title>Update Workout</title>
    </head>

    <body>

        <nav class="navbar sticky-top navbar-dark bg-dark">
            <div>
                <p class="text-white"> Hi <?php echo $userRow['userName']; ?> !</p>
            </div>

            <div class="mx-auto">
                <a class="btn btn-outline-success" href="admin.php" role="button">Home</a>
                <a class="btn btn-outline-warning" href="create.php" role="button">Add Workout</a>
                <a class="btn btn-outline-success" href="logout.php?logout" role="button">Logout</a>
            </div>

            <div class="mr-3 text-white">
                <?php echo $userRow['userEmail']; ?>
            </div>
            <div class="image">
                <img class="icon" src="../img/icon/<?php echo $userRow['foto']; ?>" />
            </div>
        </nav>

    </body>

    </html>

<?php
    if (mysqli_query($conn, $sql)) {
        // if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        echo "<div class='text-center mt-4'>";
        echo "<b>Successfully updated </b><br> <a href='../admin.php'><button type='button' class='btn-outline-success'>Back to Home</button></a><br>";
        header("refresh:2; url=../admin.php");
        echo "You will be redirected in 2 seconds.";
        echo "</div>";
    } else {
        echo "Error while updating record : " . $conn->error;
    }


    $conn->close();
}

?>