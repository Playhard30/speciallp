<?php
require '../../../includes/conn.php';
session_start();

$admission_id = $_SESSION['admission_id'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        $updateImg = mysqli_query($db, "UPDATE tbl_admissions SET img = '$image', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE admission_id = '$admission_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.admission.php?admission_id=" . $admission_id);
        } else {
            header("location: ../edit.admission.php");
        }
    } else {
        $_SESSION['emptyImg'] = true;
        if ($_SESSION['role'] == "Super Administrator") {
            header("location: ../edit.admission.php?admission_id=" . $admission_id);
        } else {
            header("location: ../edit.admission.php");
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

    $updateInfo = mysqli_query($db, " UPDATE tbl_admissions SET admission_lastname='$lname',admission_firstname='$fname', admission_middlename='$mname', email='$email', username='$username', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE admission_id = '$admission_id'") or die(mysqli_error($db));
    $_SESSION['successUpdate'] = true;
    if ($_SESSION['role'] == "Super Administrator") {
        header("location: ../edit.admission.php?admission_id=" . $admission_id);
    } else {
        header("location: ../edit.admission.php");
    }
}

if (isset($_POST['savePass'])) {

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

    $checkPass = mysqli_query($db, "SELECT * FROM tbl_admissions WHERE admission_id = '$admission_id'");
    while ($row = mysqli_fetch_array($checkPass)) {
        $checkHashPass = password_verify($oldpassword, $row['password']);
        if ($checkHashPass == false) {
            $_SESSION['oldNotMatch'] = true;
            if ($_SESSION['role'] == "Super Administrator") {
                header("location: ../edit.admission.php?admission_id=" . $admission_id);
            } else {
                header("location: ../edit.admission.php");
            }
        } elseif ($checkHashPass == true) {

            $password = mysqli_real_escape_string($db, $_POST['password']);
            $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
            $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                $updatePass = mysqli_query($db, " UPDATE tbl_admissions SET password='$hashedPwd', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE admission_id = '$admission_id'") or die(mysqli_error($db));
                $_SESSION['successPass'] = true;
                if ($_SESSION['role'] == "Super Administrator") {
                    header("location: ../edit.admission.php?admission_id=" . $admission_id);
                } else {
                    header("location: ../edit.admission.php");
                }
            } else {
                $_SESSION['newNotMatch'] = true;
                if ($_SESSION['role'] == "Super Administrator") {
                    header("location: ../edit.admission.php?admission_id=" . $admission_id);
                } else {
                    header("location: ../edit.admission.php");
                }
            }
        }
    }
}

