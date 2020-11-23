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

   $sql = "SELECT * FROM wod WHERE wodId = $wodId";
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

   <!DOCTYPE html>
   <html>

   <head>
      <title>Delete </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
   </head>

   <body>
      <nav class="navbar sticky-top navbar-dark bg-dark">
         <div>
            <p class="text-white"> Hi <?php echo $userRow['userName']; ?> !</p>
         </div>

         <div class="mx-auto">
            <a class="btn btn-outline-success" href="index.php" role="button">Home</a>
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

      <h3 class="text-center">Do you really want to delete this workout</h3>

      <div class="text-center">
         <form action="actions/a_delete.php" method="post">

            <input type="hidden" name="wodId" value="<?php echo $data['wodId'] ?>" />
            <button type="submit" class="text-center">Yes, delete it!</button>
            <a href="admin.php"><button type="button">No, go back!</button></a>
         </form>
      </div>

   </body>

   </html>

<?php
}
?>