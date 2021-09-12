<?php
require '../../../includes/conn.php';
session_start();

$dean_id = $_SESSION['dean_id'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $updateImg = mysqli_query($db, "UPDATE tbl_deans SET img = '$image' WHERE dean_id = '$dean_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        header("location: ../edit.dean.php?dean_id=" . $dean_id);
    } else {
        $_SESSION['emptyImg'] = true;
        header("location: ../edit.dean.php?dean_id=" . $dean_id);
    }
}

if (isset($_POST['save'])) {

    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);;


    $updateInfo = mysqli_query($db, " UPDATE tbl_deans SET dean_lastname='$lname',dean_firstname='$fname', dean_middlename='$mname', email='$email', username='$username' WHERE dean_id = '$dean_id' ") or die(mysqli_error($db));
    $_SESSION['successUpdate'] = true;
    header("location: ../edit.dean.php?dean_id=" . $dean_id);
}

if (isset($_POST['savePass'])) {

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

    $checkPass = mysqli_query($db, "SELECT * FROM tbl_deans WHERE dean_id = '$dean_id'");
    while ($row = mysqli_fetch_array($checkPass)) {
        $checkHashPass = password_verify($oldpassword, $row['password']);
        if ($checkHashPass == false) {
            $_SESSION['oldNotMatch'] = true;
            header("location: ../edit.dean.php?dean_id=" . $dean_id);
        } elseif ($checkHashPass == true) {

            $password = mysqli_real_escape_string($db, $_POST['password']);
            $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                $updatePass = mysqli_query($db, " UPDATE tbl_deans SET password='$hashedPwd' WHERE dean_id = '$dean_id'") or die(mysqli_error($db));
                $_SESSION['successPass'] = true;
                header("location: ../edit.dean.php?dean_id=" . $dean_id);
            } else {
                $_SESSION['newNotMatch'] = true;
                header("location: ../edit.dean.php?dean_id=" . $dean_id);
            }
        }
    }
}