<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}
if (isset($_SESSION["superadmin"])) {
    header("Location: superadmin.php");
    exit;
}
// select logged-in users details
$res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['admin']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html>

<head>
    <title>Add Workout</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- <script src="https://cdn.tiny.cloud/1/zmvdg0nz5rrmxbcvtzfsgb1nmc7iuq8uotrbbxfxt5iu5yol/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            placeholder: "Beschreibung des Workouts"

        });
    </script> -->

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

    <div>
        <h1 class="text-success">Neues Workout erstellen</h1>
    </div>

    <form action="actions/a_create.php" method="POST">
        <div class="container font-weight-bold">

            <div class="form-group">
                <label for="wodName">Name: </label>
                <input type="text" class="form-control mb-3" name="wodName" placeholder="Name Workout" />

                <label for="equipment">Equipment: </label>
                <input type="text" class="form-control mb-3" name="equipment" placeholder="Equipment.. zum Bsp: bodyweight, Dumbbell, Springschnur.." />

                <label for="trainedParts">Muskelgruppen: </label>
                <input type="text" class="form-control mb-3" name="trainedParts" placeholder="Trained parts.. zum bsp: Bauchmuskel, Rücken, Oberschenkel.." />

                <label for="durationInMinutes">Dauer in Min: </label>
                <input type="text" class="form-control mb-3" name="durationInMinutes" placeholder="Dauer des Workouts in Min" />

                <label for="difficulty">Level: </label> <br>
                <select name="difficulty" id="level" class="mb-3">
                    <option> ---- Schwierigkeitsgrad ----- </option>
                    <option value="1" name='difficulty' class='form-control'> easy</option>
                    <option value="2" name='difficulty' class='form-control'> intermediate</option>
                    <option value="3" name='difficulty' class='form-control'> hard</option>
                    <option value="4" name='difficulty' class='form-control'> crossfit</option>
                </select>

                <br>

                <label for="points">Punkte: </label>
                <input type="text" class="form-control mb-3" name="points" placeholder="Punkte... zwischen 0 und 30" />

                <label for="link">Link: </label>
                <input type="text" class="form-control mb-3" name="link" placeholder="eventuell: Link Youtube etc." />


                <label for="description" class="mt-3"> Beschreibung Workout</label>
                <textarea class="form-control" id="mytextarea" rows="10" name="description" placeholder="Description"></textarea>

                <!-- <input type="hidden" name="userId" value="<?php echo $data['wodId'] ?>" /> -->

                <input class="form-control btn btn-outline-success mt-3 mb-3" type="submit" name="submit" value="Add Workout" />

                <a href="admin.php" class="btn btn-block btn-outline-warning">Back</a>

            </div>


        </div>















    </form>
    </div>

    <?php
    // }

    // Close connection
    mysqli_close($conn);
    ?>
    </div>




</body>

</html>