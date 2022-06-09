<?php

include('include/connection.php');
session_start();

if (isset($_SESSION['logid'])) {
} else {
    header(('Location: login.php'));
}

$name = "Not Found";
$details = "Not Found";
$date = "Not Found";
$time = "Not Found";
$level = "Not Found";
$room = "index.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM schedule WHERE id = '$id'";
    $res = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $name = $row['name'];
        $details = $row['details'];
        $date = $row['date'];
        $time = $row['time'];
        $level = $row['level'];
        $room = $row['room'];
    }
} else {
    header('Location: index.php');
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
    <title>NEUB WORKSHOP - View Registration</title>
    <link rel="icon" href="rm.png">


    <style>

    </style>
</head>

<body>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div class="container">

        <div style="background-color: #93ffbe;">

            <div class="row">
                <!--Search Bar Start-->
                <div class="col-sm-12" style="text-align:center;">
                    <a href="index.php">
                        <img src="files/icons/neub.png" height="45px" width="110px" style="float:left; margin-top:5px; margin-bottom:5px; margin-left:20px;">
                    </a>

                    <h3 style="margin-top:10px;">Schedule Details</h3>

                </div>
                <!--Search Bar End-->
            </div>
        </div>


        <!-- Homepage Content pane start -->
        <div class="row" style="background-color:aliceblue; width: 99.9%; margin-left: 0px;">

            <!-- Promotional Content -->
            <div class="col-sm-12" id="home1" style="padding:30px;">
                <strong><?= $name ?></strong>
                <hr>
                <p><span style="color:green;">Date: <?= $date ?>&nbsp&nbsp</span>|&nbsp <span style="color:red;">Time: <?= $time ?></span></p>
                <p><strong>For Level: <?= $level ?></strong></p>
                <p><strong>Room Number: <?= $room ?></strong></p>
                <hr>
                <p style="word-wrap:break-word; text-align:justify;"><?= $details ?></p>
                <hr>
                <br><br><br>
            </div>


            <script>
                let h = (screen.height) - 190;
                let hh = h.toString();
                let pp = "px";

                document.getElementById("home1").style.minHeight = hh.concat(pp);
                document.getElementById("home2").style.height = hh.concat(pp);
                document.getElementById("home3").style.height = hh.concat(pp);
            </script>
        </div>

        <div style="background-color: #93ffbe;">

            <div class="row">
                <!--Home Nevigation Start-->
                <div class="col-sm-12" style="margin-top: 20px; text-align:center;">
                    <p>Developed & Maintained By <br><a target="_blank" href="https://arnabxero.github.io">Iftekhar Ahmed Arnab</a></p>
                    <hr>
                    <p>Copyright © 2022 by <a href="https://www.neub.edu.bd/">North East University Bangladesh</a>. All Rights Reserved.</p>
                </div>
                <!--Home Nevigation End-->
            </div>
        </div>
    </div>

    <script>
        const targetDiv = document.getElementById("upl");
        const btn = document.getElementById("toggle");
        btn.onclick = function() {
            if (targetDiv.style.display !== "none") {
                targetDiv.style.display = "none";
            } else {
                targetDiv.style.display = "block";
            }
        };
    </script>
</body>

</html>