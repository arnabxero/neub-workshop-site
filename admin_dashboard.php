<?php

include('include/connection.php');
session_start();

$adminship_menu = "none";
$username = "guest";
$own_profile_link = "login.php";
$id = -99;

$display = "";


if (isset($_SESSION["logid"])) {
    $display = "display: none;";

    $id = $_SESSION["logid"];

    $sql = "SELECT * FROM user WHERE id = $id";
    $res = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $username = $row['name'];
        $own_profile_link = "profile.php";

        if ($row['username'] == "neubacm" || $row['username'] == "arnabxero") {
        } else {
            header('Location: index.php');
        }
    }
} else {
    header('Location: login.php');
}

$home_type = 'all';
$registration = '';
$schedule = '';
$notice = '';
$contests = '';

if (isset($_GET['type'])) {
    $home_type = $_GET['type'];
}

if ($home_type == 'sche') {
    $schedule = 'active';
} else if ($home_type == 'notice') {
    $notice = 'active';
} else if ($home_type == 'contest') {
    $contests = 'active';
} else {
    $registration = 'active';
}



class backend
{
    function register($id)
    {
        echo '<form action="subdir/admin_operation.php" method="POST">
        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="name" />
            <label class="form-label" for="form2Example1">Name</label>
        </div>

        <div class="form-outline mb-4">
            <textarea type="text" id="form2Example1" class="form-control" name="details"></textarea>
            <label class="form-label" for="form2Example1">Details</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="level" />
            <label class="form-label" for="form2Example1">Level [1 or 2]</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="link" />
            <label class="form-label" for="form2Example1">Link</label>
        </div>

        <div class="form-outline mb-4" style="width: 40%; float:left; text-align:center;">
            <input type="date" id="form2Example1" class="form-control" name="start_date" />
            <label class="form-label" for="form2Example1">Start Date</label>
        </div>

        <div class="form-outline mb-4" style="width: 40%; float:right; text-align:center;">
            <input type="date" id="form2Example1" class="form-control" name="end_date" />
            <label class="form-label" for="form2Example1">End Date</label>
        </div>

        <input type="hidden" value="event_reg" name="operation" />
        <br>
        <br>
        <br>
        <div class="row mb-4" style="text-align:center;">
            <div class="col">
                <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 basic-btn" value="ADD">
            </div>
        </div>
    </form>';


        echo
        '<table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>';

        include('include/connection.php');

        $sql = "SELECT * FROM event";
        $res = mysqli_query($con, $sql);

        $c = 0;

        while ($row = mysqli_fetch_assoc($res)) {

            $name = $row['name'];
            $details = $row['details'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $link = $row['link'];
            $id = $row['id'];

            if (strlen($details) > 25) {
                $details = substr($details, 0, 20);
            }
            if (strlen($name) > 27) {
                $name = substr($name, 0, 27);
            }

            echo
            '<tr>
                <th scope="row">' . $c . '</th>
                <td>' . $name . '</td>
                <td>' . $details . '</td>
                <td>' . $start_date . '</td>
                <td>' . $end_date . '</td>
                <td style="text-align: center;">
                    <a target="_blank" href="view_registration.php?id=' . $id . '">
                        <div class="neutral-btn">
                            View
                        </div>
                    </a>
                    <a target="_blank" href="' . $link . '">
                        <div class="neutral-btn">
                            Register
                        </div>
                    </a>
                    <a href="subdir/admin_delete.php?type=registration&id=' . $row['id'] . '">
                        <div class="neutral-btn">
                            Delete
                        </div>
                    </a>
                </td>
            </tr>';

            $c++;
        }

        if ($c == 0) {
            echo '<h3>No Registrations Yet</h3>';
        }
        echo '
            </tbody>
        </table>';
    }
    function schedule($id)
    {
        echo '<form action="subdir/admin_operation.php" method="POST">
        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="name" />
            <label class="form-label" for="form2Example1">Name</label>
        </div>

        <div class="form-outline mb-4">
            <textarea type="text" id="form2Example1" class="form-control" name="details"></textarea>
            <label class="form-label" for="form2Example1">Details</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="level" />
            <label class="form-label" for="form2Example1">Level [1 or 2]</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="date" />
            <label class="form-label" for="form2Example1">date</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="time" />
            <label class="form-label" for="form2Example1">Time</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="room" />
            <label class="form-label" for="form2Example1">Room No</label>
        </div>

        <input type="hidden" value="add_schedule" name="operation" />
        
        <div class="row mb-4" style="text-align:center;">
            <div class="col">
                <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 basic-btn" value="ADD">
            </div>
        </div>
    </form>';

        echo
        '<table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Room</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>';

        include('include/connection.php');

        $sql = "SELECT * FROM schedule";
        $res = mysqli_query($con, $sql);

        $c = 0;

        while ($row = mysqli_fetch_assoc($res)) {

            $name = $row['name'];
            $details = $row['details'];
            $date = $row['date'];
            $time = $row['time'];
            $room = $row['room'];
            $id = $row['id'];

            if (strlen($details) > 25) {
                $details = substr($details, 0, 20);
            }
            if (strlen($name) > 27) {
                $name = substr($name, 0, 27);
            }

            echo
            '<tr>
                <th scope="row">' . $c . '</th>
                <td>' . $name . '</td>
                <td>' . $details . '</td>
                <td>' . $date . '</td>
                <td>' . $time . '</td>
                <td>' . $room . '</td>
                <td style="text-align: center;">
                    <a target="_blank" href="view_schedule.php?id=' . $id . '">
                        <div class="neutral-btn">
                            View
                        </div>
                    </a>
                    <a href="subdir/admin_delete.php?type=schedule&id=' . $row['id'] . '">
                        <div class="neutral-btn">
                            Delete
                        </div>
                    </a>

                </td>
            </tr>';

            $c++;
        }

        if ($c == 0) {
            echo '<h3>No Registrations Yet</h3>';
        }
        echo '
            </tbody>
        </table>';
    }
    function notice($id)
    {
        echo ' <form action="subdir/admin_operation.php" method="POST">
        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="name" />
            <label class="form-label" for="form2Example1">Name</label>
        </div>

        <div class="form-outline mb-4">
            <textarea type="text" id="form2Example1" class="form-control" name="details"></textarea>
            <label class="form-label" for="form2Example1">Details</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="level" />
            <label class="form-label" for="form2Example1">Level [1 or 2]</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="date" />
            <label class="form-label" for="form2Example1">date</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="time" />
            <label class="form-label" for="form2Example1">Time</label>
        </div>

        <input type="hidden" value="add_notice" name="operation" />

        <div class="row mb-4" style="text-align:center;">
            <div class="col">
                <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 basic-btn" value="ADD">
            </div>
        </div>
    </form>
        ';
        echo
        '<table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Details</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>';

        include('include/connection.php');

        $sql = "SELECT * FROM notice";
        $res = mysqli_query($con, $sql);

        $c = 0;

        while ($row = mysqli_fetch_assoc($res)) {

            $name = $row['name'];
            $details = $row['details'];
            $date = $row['date'];
            $time = $row['time'];
            $id = $row['id'];


            if (strlen($name) > 15) {
                $name = substr($name, 0, 15);
            }

            echo
            '<tr>
                <th scope="row">' . $c . '</th>
                <td>' . $name . '</td>
                <td>' . $details . '</td>
                <td>' . $date . '</td>
                <td>' . $time . '</td>
                <td style="text-align: center;">
                    <a target="_blank" href="view_notice.php?id=' . $id . '">
                        <div class="neutral-btn">
                            View
                        </div>
                    </a>
                    <a href="subdir/admin_delete.php?type=notice&id=' . $row['id'] . '">
                        <div class="neutral-btn">
                            Delete
                        </div>
                    </a>

                </td>
            </tr>';

            $c++;
        }

        if ($c == 0) {
            echo '<h3>No Registrations Yet</h3>';
        }
        echo '
            </tbody>
        </table>';
    }
    function contest($id)
    {
        echo '<form action="subdir/admin_operation.php" method="POST">
        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="name" />
            <label class="form-label" for="form2Example1">Name</label>
        </div>

        <div class="form-outline mb-4">
            <textarea type="text" id="form2Example1" class="form-control" name="details"></textarea>
            <label class="form-label" for="form2Example1">Details</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="level" />
            <label class="form-label" for="form2Example1">Level [1 or 2]</label>
        </div>
        
        <div class="form-outline mb-4" style="width: 40%; float:left; text-align:center;">
            <input type="text" id="form2Example1" class="form-control" name="start_date" />
            <label class="form-label" for="form2Example1">Start Date-Time</label>
        </div>

        <div class="form-outline mb-4" style="width: 40%; float:right; text-align:center;">
            <input type="text" id="form2Example1" class="form-control" name="end_date" />
            <label class="form-label" for="form2Example1">End Date-Time</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="duration" />
            <label class="form-label" for="form2Example1">Duration</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="password" />
            <label class="form-label" for="form2Example1">Password</label>
        </div>

        <div class="form-outline mb-4" style="margin-top: 40px;">
            <input type="text" id="form2Example1" class="form-control" name="link" />
            <label class="form-label" for="form2Example1">Link</label>
        </div>

        <input type="hidden" value="add_contest" name="operation" />
        
        <div class="row mb-4" style="text-align:center;">
            <div class="col">
                <input type="submit" name="submit" class="btn btn-primary btn-block mb-4 basic-btn" value="ADD">
            </div>
        </div>
    </form>';

        echo
        '<table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Details</th>
                <th scope="col">Start Date-Time</th>
                <th scope="col">End Date-Time</th>
                <th scope="col">Duration</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    <tbody>';

        include('include/connection.php');

        $sql = "SELECT * FROM contest";

        $res = mysqli_query($con, $sql);

        $c = 0;

        while ($row = mysqli_fetch_assoc($res)) {

            $name = $row['name'];
            $details = $row['details'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $duration = $row['duration'];
            $password = $row['password'];
            $link = $row['link'];
            $id = $row['id'];

            if (strlen($details) > 5) {
                $details = substr($details, 0, 5);
            }
            if (strlen($name) > 27) {
                $name = substr($name, 0, 27);
            }

            echo
            '<tr>
            <th scope="row">' . $c . '</th>
            <td>' . $name . '</td>
            <td>' . $details . '</td>
            <td style="color:green;">' . $start_date . '</td>
            <td style="color:red;">' . $end_date . '</td>
            <td>' . $duration . '</td>
            <td>' . $password . '</td>
            <td style="text-align: center;">
                <a href="view_contest.php?id=' . $id . '">
                    <div class="neutral-btn">
                        View
                    </div>
                </a>
                <a href="' . $link . '">
                    <div class="neutral-btn">
                        Join
                    </div>
                </a>
                <a href="subdir/admin_delete.php?type=contest&id=' . $row['id'] . '">
                    <div class="neutral-btn">
                        Delete
                    </div>
                </a>
            </td>
        </tr>';

            $c++;
        }

        if ($c == 0) {
            echo '<h3>No Registrations Yet</h3>';
        }
        echo '
        </tbody>
    </table>';
    }
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
    <title>NEUB WORKSHOP - Admin Dashboard</title>
    <link rel="shortcut icon" type="image/x-icon" href="rm.ico" />



    <style>

    </style>
</head>

<body>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <div class="container">

        <div style="background-color: #93ffbe;">

            <div class="row">
                <!--Search Bar Start-->
                <div class="col-sm-3">
                    <a href="index.php">
                        <img src="files/icons/neub.png" height="45px" width="110px" style="float:left; margin-top:5px; margin-bottom:5px; margin-left:20px;">
                    </a>
                    <h3>Admin Dashboard</h3>
                </div>
                <!--Search Bar End-->


                <!--Home Nevigation Start-->
                <div class="col-sm-5">
                    <div class="myTab" style="margin: 2%;">
                        <nav class="nav nav-pills nav-fill">
                            <a title="Register" class="nav-link <?= $registration ?>" href="admin_dashboard.php?type=reg"><i class="fas fa-plus-circle"></i> Registration</a>
                            <a title="Schedules" class="nav-link <?= $schedule ?>" href="admin_dashboard.php?type=sche"><i class="fas fa-calendar-alt"></i> Schedules</a>
                            <a title="Notice" class="nav-link <?= $notice ?>" href="admin_dashboard.php?type=notice"><i class="fas fa-bullhorn"></i> Notices</a>
                            <a title="Contests" class="nav-link <?= $contests ?>" href="admin_dashboard.php?type=contest"><i class="fas fa-laptop-code"></i> Contests</a>
                        </nav>
                    </div>
                </div>
                <!--Home Nevigation End-->


                <!--Profile, User Menu, Message, Logout Start-->
                <div class="col-sm-4 userpane">

                    <div style="margin-top: 3%;">
                        <div class="btn-group" style="float:right; margin-right: 160px;">
                            <a href="<?= $own_profile_link ?>" class="btn btn-secondary btn-sm home-profile-shortcut" type="button" style="background-color: white; color: black;">
                                <?= $username ?>
                            </a>
                            <button style="background-color: white; color: black;" type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="edit_profile.php">Update Profile</a></li>
                                <li><a class="dropdown-item" href="subdir/logout.php">Logout Account</a></li>
                                <li style="display:<?= $adminship_menu ?>;"><a class="dropdown-item" href="admin_dashboard/index.php">Admin Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Profile, User Menu, Message, Logout End-->
            </div>
        </div>


        <!-- Homepage Content pane start -->
        <div class="row" style="background-color:aliceblue; width: 99.9%; margin-left: 0px;">

            <!-- Promotional Content -->
            <div class="col-sm-12" id="home1">





                <?php

                $obj = new backend();

                if ($home_type == "all" || $home_type == "reg") {
                    $obj->register($id);
                } else if ($home_type == "sche") {
                    $obj->schedule($id);
                } else if ($home_type == "notice") {
                    $obj->notice($id);
                } else if ($home_type == "contest") {
                    $obj->contest($id);
                }
                ?>

                <br>
                <br>
                <br>
            </div>


            <script>
                let h = (screen.height) - 190;
                let hh = h.toString();
                let pp = "px";

                document.getElementById("home1").style.minHeight = hh.concat(pp);
                document.getElementById("home2").style.height = hh.concat(pp);
                document.getElementById("home3").style.height = hh.concat(pp);
            </script>

            <!-- For the login reg dialog box -->
            <div class="login-dialog" style="<?= $display ?>">
                <p>You Are Not Logged In</p>
                <hr>
                <a class="home-dg-bt" href="login.php">Log In</a>
                <a class="home-dg-bt" href="register.php">Sign Up</a>
            </div>
        </div>

        <div style="background-color: #93ffbe;">

            <div class="row">
                <!--Search Bar Start-->
                <div class="col-sm-2">

                </div>
                <!--Search Bar End-->


                <!--Home Nevigation Start-->
                <div class="col-sm-8" style="margin-top: 50px; text-align:center;">
                    <p>Developed & Maintained By <br><a target="_blank" href="https://arnabxero.github.io">Iftekhar Ahmed Arnab</a></p>
                    <hr>
                    <p>Copyright © 2022 by <a href="https://www.neub.edu.bd/">North East University Bangladesh</a>. All Rights Reserved.</p>
                </div>
                <!--Home Nevigation End-->


                <!--Profile, User Menu, Message, Logout Start-->
                <div class="col-sm-2">


                </div>
                <!--Profile, User Menu, Message, Logout End-->
            </div>
        </div>
    </div>
</body>

</html>