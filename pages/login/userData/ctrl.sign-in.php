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



    if ($numrow > 0) {
        while ($row = mysqli_fetch_array($super_admin)) {
            $hashedPwdCheck = password_verify($password, $row['password']);
            if ($hashedPwdCheck == false) {
                header("location: ../sign-in.php?sessionP");
                exit();
            } elseif ($hashedPwdCheck == true) {
                $_SESSION['role'] = "Super Administrator";
                $_SESSION['userid'] = $row['sa_id'];
                $_SESSION['name'] = $row['name'];
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
                $_SESSION['name'] = $row['dean_lastname'] . ", " . $row['dean_firstname'];
            }
            header("location: ../../dashboard/index.php");
        }
    } else {
        header("location: ../sign-in.php?sessionUP");
        exit();
    }
}