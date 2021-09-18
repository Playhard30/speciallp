<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['signin'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $super_admin = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE username = '$username'");
    $numrow = mysqli_num_rows($super_admin);

    $dean = mysqli_query($db, "SELECT * FROM tbl_deans WHERE username = '$username'");
    $numrow1 = mysqli_num_rows($dean);

    $admission = mysqli_query($db, "SELECT * FROM tbl_admissions WHERE username = '$username'");
    $numrow2 = mysqli_num_rows($admission);



    if ($numrow > 0) {
        while ($row = mysqli_fetch_array($super_admin)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                header("location: ../sign-in.php?sessionP");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Super Administrator";
                $_SESSION['userid'] = $row['sa_id'];
            }
            header("location: ../../dashboard/index.php");
        }
    } elseif ($numrow1 > 0) {
        while ($row = mysqli_fetch_array($dean)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                header("location: ../sign-in.php?sessionP");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Dean";
                $_SESSION['userid'] = $row['dean_id'];
            }
            header("location: ../../dashboard/index.php");
        }
    } 
    elseif ($numrow2 > 0) {
        while ($row = mysqli_fetch_array($admission)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                header("location: ../sign-in.php?sessionP");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Admission";
                $_SESSION['userid'] = $row['admission_id'];
            }
            header("location: ../../dashboard/dashboard.php");
        }
    }  else {
        header("location: ../sign-in.php?sessionUP");
        exit();
    }
} ?>