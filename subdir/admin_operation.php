<?php

include('../include/connection.php');

session_start();

function add_event()
{
    include('../include/connection.php');

    $name = $_POST['name'];
    $details = $_POST['details'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $link = $_POST['link'];

    $sql = "INSERT INTO `event` (`type`, `about`, `start_date`, `end_date`, `link`) VALUES ('$name', '$details', '$start_date', '$end_date', '$link')";
    $res = mysqli_query($con, $sql);

    header('Location: ../admin_dashboard.php?type=reg');
}

function add_schedule()
{
    include('../include/connection.php');

    $name = $_POST['name'];
    $details = $_POST['details'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $room = $_POST['room'];

    $sql = "INSERT INTO `schedule` (`name`, `details`, `date`, `time`, `room`) VALUES ('$name', '$details', '$date', '$time', '$room')";
    $res = mysqli_query($con, $sql);

    header('Location: ../admin_dashboard.php?type=sche');
}

function add_notice()
{
    include('../include/connection.php');

    $name = $_POST['name'];
    $details = $_POST['details'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO `notice` (`name`, `details`, `date`, `time`) VALUES ('$name', '$details', '$date', '$time')";
    $res = mysqli_query($con, $sql);

    header('Location: ../admin_dashboard.php?type=notice');
}

function add_contest()
{
    include('../include/connection.php');

    $name = $_POST['name'];
    $details = $_POST['details'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $duration = $_POST['duration'];
    $password = $_POST['password'];
    $link = $_POST['link'];

    $sql = "INSERT INTO `contest` (`name`, `details`, `start_date`, `end_date`, `duration`, `password`, `link`) VALUES ('$name', '$details', '$start_date', '$end_date', '$duration', '$password', '$link')";
    $res = mysqli_query($con, $sql);

    header('Location: ../admin_dashboard.php?type=contest');
}

if (isset($_POST['submit'])) {
    $operation = $_POST['operation'];

    if ($operation == "event_reg") {
        add_event();
    } else if ($operation == "add_schedule") {
        add_schedule();
    } else if ($operation == "add_notice") {
        add_notice();
    } else if ($operation == "add_contest") {
        add_contest();
    } else {
        header('Location: ../admin_dashboard.php?type=reg');
    }
}
