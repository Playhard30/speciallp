<?php
include '../../../includes/conn.php';
session_start();

$id = $_GET['id'];

$q = $db->query("DELETE FROM tbl_schoolyears WHERE sy_id = '$id'") or die($db->error);
$_SESSION['successDel'] = true;
header("location: ../pendingStud.php");