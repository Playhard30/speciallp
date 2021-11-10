<?php
require '../../../includes/conn.php';
session_start();

$pres_id = $_SESSION['pres_id'];

if (isset($_POST['saveImg'])) {
    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        $updateImg = mysqli_query($db, "UPDATE tbl_presidents SET img = '$image', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE pres_id = '$pres_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.pres.php?pres_id=" . $pres_id);
        } else {
            header("location: ../edit.pres.php");
        }
    } else {
        $_SESSION['emptyImg'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.pres.php?pres_id=" . $pres_id);
        } else {
            header("location: ../edit.pres.php");
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

    $updateInfo = mysqli_query($db, " UPDATE tbl_presidents SET pres_lastname='$lname',pres_firstname='$fname', pres_middlename='$mname', email='$email', username='$username', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE pres_id = '$pres_id'") or die(mysqli_error($db));
    $_SESSION['successUpdate'] = true;
    if ($_SESSION['role'] == "Super Administrator") {
        header("location: ../edit.pres.php?pres_id=" . $pres_id);
    } else {
        header("location: ../edit.pres.php");
    }
}

if (isset($_POST['savePass'])) {

    if ($_SESSION['role'] == "President) {

        $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

        $checkPass = mysqli_query($db, "SELECT * FROM tbl_presidents WHERE pres_id = '$pres_id'");
        while ($row = mysqli_fetch_array($checkPass)) {
            $checkHashPass = password_verify($oldpassword, $row['password']);
            if ($checkHashPass == false) {
                $_SESSION['oldNotMatch'] = true;
                header("location: ../edit.pres.php");
            } elseif ($checkHashPass == true) {

                $password = mysqli_real_escape_string($db, $_POST['password']);
                $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
                $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

                if ($password == $confirmPass) {
                    $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                    $updatePass = mysqli_query($db, " UPDATE tbl_presidents SET password='$hashedPwd', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE pres_id = '$pres_id'") or die(mysqli_error($db));
                    $_SESSION['successPass'] = true;
                    header("location: ../edit.pres.php");
                } else {
                    $_SESSION['newNotMatch'] = true;
                    header("location: ../edit.pres.php");
                }
            }
        }
    } else {
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        if ($password == $confirmPass) {
            $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

            $updatePass = mysqli_query($db, " UPDATE tbl_presidents SET password='$hashedPwd', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE pres_id = '$pres_id'") or die(mysqli_error($db));
            $_SESSION['successPass'] = true;
            header("location: ../edit.pres.php?pres_id=" . $pres_id);
        } else {
            $_SESSION['newNotMatch'] = true;
            header("location: ../edit.pres.php?pres_id=" . $pres_id);
        }
    }
}