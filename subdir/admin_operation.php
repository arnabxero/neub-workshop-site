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
    $level = $_POST['level'];

    $sql = "INSERT INTO `event` (`name`, `details`, `start_date`, `end_date`, `link`, `level`) VALUES ('$name', '$details', '$start_date', '$end_date', '$link', '$level')";
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
    $level = $_POST['level'];

    $sql = "INSERT INTO `schedule` (`name`, `details`, `date`, `time`, `room`, `level`) VALUES ('$name', '$details', '$date', '$time', '$room', '$level')";
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
    $level = $_POST['level'];

    $sql = "INSERT INTO `notice` (`name`, `details`, `date`, `time`, `level`) VALUES ('$name', '$details', '$date', '$time', '$level')";
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
    $level = $_POST['level'];

    $sql = "INSERT INTO `contest` (`name`, `details`, `start_date`, `end_date`, `duration`, `password`, `link`, `level`) VALUES ('$name', '$details', '$start_date', '$end_date', '$duration', '$password', '$link', '$level')";
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
