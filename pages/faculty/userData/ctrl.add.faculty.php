<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    if (!empty($_FILES['image']['tmp_name'])) {

        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $faculty_no = mysqli_real_escape_string($db, $_POST['faculty_no']);
        $position = mysqli_real_escape_string($db, $_POST['position']);
        $status = mysqli_real_escape_string($db, $_POST['status']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $lname = mysqli_real_escape_string($db, $_POST['lname']);
        $fname = mysqli_real_escape_string($db, $_POST['fname']);
        $mname = mysqli_real_escape_string($db, $_POST['mname']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

        if (!empty($_POST['faculty_no']) && !empty($_POST['position']) && !empty($_POST['status'])) {

            if (!empty($_POST['username']) && !empty($_POST['password'])) {

                if ($password == $confirmPass) {

                    $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);
                    $insertFaculty = mysqli_query($db, "INSERT INTO tbl_faculties_staff (img, faculty_firstname, faculty_middlename, faculty_lastname, faculty_no, position, role, status, activation_code, email, username, password, created_at) VALUES ('$image', '$fname', '$mname', '$lname', '$faculty_no', '$position', '$status', '', '$email', '$username', '$hashedPwd', CURRENT_TIMESTAMP)") or die(mysqli_error($db));
                    $_SESSION['successAdd'] = true;
                    header("location: ../add.faculty.php");
                } else {
                    $_SESSION['notMatch'] = true;
                    header("location: ../add.faculty.php");
                }
            } else {
                $_SESSION['fill'] = true;
                header("location: ../add.faculty.php");
            }
        } else {
            $_SESSION['fill-Uinfo'] = true;
            header("location: ../add.faculty.php");
        }
    }
}