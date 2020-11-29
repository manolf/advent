<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

    <nav class="navbar navbar navbar-expand-sm navbar-dark" style="background-color: rgb(102, 102, 51)">

        <button class="navbar-toggler navbar-toggler-left btn-lg" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" container-nav collapse navbar-collapse" id="navbarTogglerDemo02">
            <div>
                <p class="navbar-left text-white"> <?php echo $userRow['userName']; ?>'s calendar</p>
            </div>

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="about.php">about the workouts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="team.php">team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="contact.php">contact</a>
                </li>


            </ul>
            <!-- <div class="mr-3 text-white">
                
            </div> -->
            <div class="navbar-right">

                <div class="image">
                    <!-- <?php echo $userRow['userName']; ?> -->
                    <img class="icon" src="img/icon/<?php echo $userRow['foto']; ?>" />
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="logout.php?logout">logout</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link " href="signup.php">signup</a>
                    </li> -->

                </ul>

            </div>

        </div>

    </nav>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- <nav class="navbar sticky-top navbar-dark bg-dark">

        <div>
            <p class="text-white"> <?php echo $userRow['userName']; ?>'s adventcalendar</p>
        </div>

        <div class="mx-auto">
            <a class="btn btn-outline-danger" href="home.php" role="button">Home</a>
            <a class="btn btn-outline-success" href="logout.php?logout" role="button">Logout</a>
        </div>

        <div class="mr-3 text-white">
            <?php echo $userRow['userEmail']; ?>
        </div>
        <div class="image">
            <img class="icon" src="img/icon/<?php echo $userRow['foto']; ?>" />
        </div>

    </nav> -->

</body>

</html>