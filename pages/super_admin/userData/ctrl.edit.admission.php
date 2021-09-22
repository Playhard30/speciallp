<?php
require '../../../includes/conn.php';
session_start();

$admission_id = $_SESSION['admission_id'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $updateImg = mysqli_query($db, "UPDATE tbl_admissions SET img = '$image' WHERE admission_id = '$admission_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        header("location: ../edit.admission.php?admission_id=" . $admission_id);
    } else {
        $_SESSION['emptyImg'] = true;
        header("location: ../edit.admission.php?admission_id=" . $admission_id);
    }
}

if (isset($_POST['save'])) {

    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);;


    $updateInfo = mysqli_query($db, " UPDATE tbl_admissions SET admission_lastname='$lname',admission_firstname='$fname', admission_middlename='$mname', email='$email', username='$username' WHERE admission_id = '$admission_id' ") or die(mysqli_error($db));
    $_SESSION['successUpdate'] = true;
    header("location: ../edit.admission.php?admission_id=" . $admission_id);
}

if (isset($_POST['savePass'])) {

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

    $checkPass = mysqli_query($db, "SELECT * FROM tbl_admissions WHERE admission_id = '$admission_id'");
    while ($row = mysqli_fetch_array($checkPass)) {
        $checkHashPass = password_verify($oldpassword, $row['password']);
        if ($checkHashPass == false) {
            $_SESSION['oldNotMatch'] = true;
            header("location: ../edit.admission.php?admission_id=" . $admission_id);
        } elseif ($checkHashPass == true) {

            $password = mysqli_real_escape_string($db, $_POST['password']);
            $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                $updatePass = mysqli_query($db, " UPDATE tbl_admissions SET password='$hashedPwd' WHERE admission_id = '$admission_id'") or die(mysqli_error($db));
                $_SESSION['successPass'] = true;
                header("location: ../edit.admission.php?admission_id=" . $admission_id);
            } else {
                $_SESSION['newNotMatch'] = true;
                header("location: ../edit.admission.php?admission_id=" . $admission_id);
            }
        }
    }
}