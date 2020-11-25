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
// select logged-in users details
$res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['admin']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($_GET['wodId']) {
    $wodId = $_GET['wodId'];

    $sql = "SELECT * FROM wod 
   WHERE wodId = $wodId";

    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();

?>

    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <title>Edit </title>
        <link rel="stylesheet" href="style1.css">
        <!-- <script src="https://cdn.tiny.cloud/1/zmvdg0nz5rrmxbcvtzfsgb1nmc7iuq8uotrbbxfxt5iu5yol/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea',
                placeholder: "Hier können Sie ihren Beitrag erstellen und formatieren.."

            });
        </script> -->

    </head>

    <body>

        <nav class="navbar sticky-top navbar-dark bg-dark">
            <div>
                <p class="text-white"> <?php echo $userRow['userName']; ?> </p>
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

        <div class="mx-auto">
            <h1 class="mx-auto text-success">Update Workout</h1>
        </div>


        <form action="actions/a_update.php" class="ml-10" method="post">
            <div class=" container font-weight-bold">

                <div class="form-group">
                    <label for="wodName">Name: </label>
                    <input type="text" class="form-control mb-3" name="wodName" value="<?php echo $data['wodName'] ?>" />

                    <label for="equipment">Equipment: </label>
                    <input type="text" class="form-control mb-3" name="equipment" value="<?php echo $data['equipment'] ?>" />

                    <label for="trainedParts">Muskelgruppen: </label>
                    <input type="text" class="form-control mb-3" name="trainedParts" placehold rows="2" er="title" value="<?php echo $data['trainedParts'] ?>" />

                    <label for="durationInMinutes">Dauer in Min: </label>
                    <input type="text" class="form-control mb-3" name="durationInMinutes" value="<?php echo $data['durationInMinutes'] ?>" />

                    <label for="difficulty">Level: </label> <br>
                    <select name="difficulty" id="level" class="mb-3">
                        <option> <?php echo $data['difficulty'] ?> </option>
                        <option value="1" name='difficulty' class='form-control'> easy</option>
                        <option value="2" name='difficulty' class='form-control'> intermediate</option>
                        <option value="3" name='difficulty' class='form-control'> hard</option>
                        <option value="4" name='difficulty' class='form-control'> crossfit</option>
                        <option value="5" name='difficulty' class='form-control'> hanni</option>
                    </select>

                    <br>
                    <!-- <label for="difficulty">Level: </label>
                    <input type="text" class="form-control mb-3" name="difficulty" value="<?php echo $data['difficulty'] ?>" /> -->

                    <label for="points">Punkte: </label>
                    <input type="text" class="form-control mb-3" name="points" value="<?php echo $data['points'] ?>" />

                    <label for="link">Link: </label>
                    <input type="text" class="form-control mb-3" name="link" value="<?php echo $data['link'] ?>" />

                    <label for="description" class="mt-3"> Beschreibung Workout</label>
                    <textarea class="form-control" id="mytextarea" rows="10" name="description"> <?php echo $data['description'] ?> </textarea>

                    <input type="hidden" name="wodId" value="<?php echo $data['wodId'] ?>" />

                    <input class="form-control btn btn-outline-success mt-3 mb-3" type="submit" name="submit" value="Save changes" />

                    <a href="index.php" class="btn btn-block btn-outline-warning">Back</a>

                </div>



            </div>
        </form>



        <!-- </fieldset> -->

    </body>

    </html>

<?php
}
?>