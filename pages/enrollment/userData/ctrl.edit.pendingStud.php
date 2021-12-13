<?php
include '../../../includes/conn.php';
session_start();

// for empty values
if (!empty($_GET['id'])) {
    // remark condition
    if ($_GET['remark'] == "Pending" || $_GET['remark'] == "Canceled") {
        // get id by URL
        $id = $_GET['id'];
        $check = "Checked";
        // query
        $query = $db->query("UPDATE tbl_schoolyears SET remark = '$check' WHERE sy_id = '$id'") or die($db->error);
        $_SESSION['ACheck'] = true;
        header("location: ../pendingStud.php");
    } elseif ($_GET['remark'] == "Checked") {
        // get id by URL
        $id = $_GET['id'];
        $cancel = "Canceled";
        // query
        $query = $db->query("UPDATE tbl_schoolyears SET remark = '$cancel' WHERE sy_id = '$id'") or die($db->error);
        $_SESSION['ACanceled'] = true;
        header("location: ../pendingStud.php");
    }
}