<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- Title Page-->
    <title>Admin Page</title>



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
            <img class="icon" src="img/icon/<?php echo $userRow['foto']; ?>" />
        </div>
    </nav>


    <hr>

    <!-- ADMIN PANEL start  -->
    <div class="mx-auto">
        <div>
            <h1>Admin Panel</h1>
        </div>
    </div>




    <div class="containerAdmin">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>WodName</th>
                    <th>Equipment</th>
                    <th>Trained Parts</th>
                    <th>Beschreibung</th>
                    <th>Link</th>
                    <th>Min</th>
                    <th>Level</th>
                    <th>Pts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM wod";

                //nicer version
                $result = mysqli_query($conn, $sql);
                // fetch the next row (as long as there are any) into $row
                while ($row = mysqli_fetch_assoc($result)) {
                    $wodId = $row['wodId'];
                    $name = $row['wodName'];
                    $equipment = $row['equipment'];
                    $trainedParts = $row['trainedParts'];
                    $points = $row['points'];
                    $description = $row['description'];
                    $durationInMinutes = $row['durationInMinutes'];
                    $difficulty = $row['difficulty'];
                    $link = $row['link'];

                    echo "<tr>";
                    echo "<td class='table-admin'>$name</td>";
                    echo "<td class='table-admin'>$equipment</td>";
                    echo "<td class='table-admin'>$trainedParts</td>";
                    echo "<td class='table-admin'>$description</td>";
                    echo "<td class='table-admin'>$link</td>";
                    echo "<td class='table-admin'>$durationInMinutes</td>";
                    echo "<td class='table-admin'>$difficulty</td> ";
                    echo "<td class='table-admin'>$points</td>";
                    echo "<td><a href='delete.php?wodId=$wodId' class='btn btn-outline-danger btn-sm'>Delete </a> 
                              <a href='update.php?wodId=$wodId' class='btn btn-outline-success btn-sm'>Update </a>
                    </td>";
                    echo "</tr> ";


                ?>



                <?php
                }

                // Free result set
                mysqli_free_result($result);
                // Close connection
                mysqli_close($conn);
                ?>

    </div>


</body>

</html>