<?php
require '../../../includes/conn.php';
session_start();

$dean_id = $_SESSION['dean_id'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        $updateImg = mysqli_query($db, "UPDATE tbl_deans SET img = '$image', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE dean_id = '$dean_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.dean.php?dean_id=" . $dean_id);
        } else {
            header("location: ../edit.dean.php");
        }
    } else {
        $_SESSION['emptyImg'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.dean.php?dean_id=" . $dean_id);
        } else {
            header("location: ../edit.dean.php");
        }
    }
}

if (isset($_POST['save'])) {

    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);;
    $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

    $updateInfo = mysqli_query($db, " UPDATE tbl_deans SET dean_lastname='$lname',dean_firstname='$fname', dean_middlename='$mname', email='$email', username='$username', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE dean_id = '$dean_id'") or die(mysqli_error($db));
    $_SESSION['successUpdate'] = true;
    if ($_SESSION['role'] == "Super Administrator") {
        header("location: ../edit.dean.php?dean_id=" . $dean_id);
    } else {
        header("location: ../edit.dean.php");
    }
}

if (isset($_POST['savePass'])) {

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

    $checkPass = mysqli_query($db, "SELECT * FROM tbl_deans WHERE dean_id = '$dean_id'");
    while ($row = mysqli_fetch_array($checkPass)) {
        $checkHashPass = password_verify($oldpassword, $row['password']);
        if ($checkHashPass == false) {
            $_SESSION['oldNotMatch'] = true;
            if ($_SESSION['role'] == "Super Administrator") {
                header("location: ../edit.dean.php?dean_id=" . $dean_id);
            } else {
                header("location: ../edit.dean.php");
            }
        } elseif ($checkHashPass == true) {

            $password = mysqli_real_escape_string($db, $_POST['password']);
            $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
            $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                $updatePass = mysqli_query($db, " UPDATE tbl_deans SET password='$hashedPwd', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE dean_id = '$dean_id'") or die(mysqli_error($db));
                $_SESSION['successPass'] = true;
                if ($_SESSION['role'] == "Super Administrator") {
                    header("location: ../edit.dean.php?dean_id=" . $dean_id);
                } else {
                    header("location: ../edit.dean.php");
                }
            } else {
                $_SESSION['newNotMatch'] = true;
                if ($_SESSION['role'] == "Super Administrator") {
                    header("location: ../edit.dean.php?dean_id=" . $dean_id);
                } else {
                    header("location: ../edit.dean.php");
                }
            }
        }
    }
}