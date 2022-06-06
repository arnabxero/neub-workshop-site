<?php

include('../include/connection.php');

session_start();

if (isset($_GET['type']) && isset($_GET['id'])) {
    $table_name = "";
    $id = $_GET['id'];
    $type = "reg";

    if ($_GET['type'] == "registration") {
        $table_name = "event";
        $type = "reg";
    } else if ($_GET['type'] == "schedule") {
        $table_name = "schedule";
        $type = "sche";
    } else if ($_GET['type'] == "notice") {
        $table_name = "notice";
        $type = "notice";
    } else if ($_GET['type'] == "contest") {
        $table_name = "contest";
        $type = "contest";
    } else {
        header('Location: ../index.php');
    }

    $sql = "DELETE FROM $table_name WHERE id = $id";

    $res = mysqli_query($con, $sql);

    header('Location: ../admin_dashboard.php?type=' . $type);
} else {
    header('Location: ../index.php');
}
