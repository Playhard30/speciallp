<?php
include "../../../includes/conn.php";
session_start();
if (isset($_POST['submit'])) {

    $dep = mysqli_real_escape_string($db, $_POST['department']);

    $q = mysqli_query($db, "INSERT INTO tbl_departments (department_name) VALUES ('$dep')");
    $_SESSION['successAdd'] = true;
    header("location: ../add.department.php");
}