<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    if (!empty($_FILES['image']['tmp_name'])) {

        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $mname = mysqli_real_escape_string($db, $_POST['mname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);
                $insertAdmission = mysqli_query($db, "INSERT INTO tbl_admissions(img, admission_firstname, admission_middlename, admission_lastname, activation_code, email, username, password) VALUES ('$image', '$fname', '$mname', '$lname', '', '$email', '$username', '$hashedPwd')") or die(mysqli_error($db));
                $_SESSION['successAdd'] = true;
                header("location: ../add.admission.php");
            } else {
                $_SESSION['notMatch'] = true;
                header("location: ../add.admission.php");
            }
        } else {
            $_SESSION['fill'] = true;
            header("location: ../add.admission.php");
        }
    }
}