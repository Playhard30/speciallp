<?php

require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $stud_no     = mysqli_real_escape_string($db, $_POST['stud_no']);
    $curri       = mysqli_real_escape_string($db, $_POST['curri']);
    $username    = mysqli_real_escape_string($db, $_POST['username']);
    $password    = mysqli_real_escape_string($db, $_POST['password']);
    $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

    $q   = mysqli_query($db, "SELECT * FROM tbl_students WHERE stud_no = '$stud_no'");
    $q2   = mysqli_query($db, "SELECT * FROM tbl_students WHERE username = '$username'");
    $count = mysqli_num_rows($q);
    $count2 = mysqli_num_rows($q2);

    if ($count < 1) {
        if ($count2 < 1) {
            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);
                $insertStudent         = mysqli_query($db, "INSERT INTO tbl_students (stud_no, curri, username, password, created_at) VALUES ('$stud_no', '$curri', '$username', '$hashedPwd', CURRENT_TIMESTAMP)") or die(mysqli_error($db));
                $_SESSION['studAdded'] = true;
                header("location: ../add.student.php");
            } else {
                $_SESSION['notMatch'] = true;
                header("location: ../add.student.php");
            }
        } else {
            $_SESSION['usernameExist'] = true;
            header("location: ../add.student.php");
        }
    } else {
        $_SESSION['studExist'] = true;
        header("location: ../add.student.php");
    }
}