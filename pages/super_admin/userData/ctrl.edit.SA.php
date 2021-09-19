<?php
require '../../../includes/conn.php';
session_start();

$sa_id = $_SESSION['userid'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $updateImg = mysqli_query($db, "UPDATE tbl_super_admins SET img = '$image' WHERE sa_id = '$sa_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        header("location: ../edit.SA.php");
    } else {
        $_SESSION['emptyImg'] = true;
        header("location: ../edit.SA.php");
    }
}

if (isset($_POST['save'])) {

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);;

    $updateInfo = mysqli_query($db, "UPDATE tbl_super_admins SET name = '$name', email='$email', username='$username' WHERE sa_id = '$sa_id'") or die(mysqli_error($db));
    $_SESSION['successUpdate'] = true;
    header("location: ../edit.SA.php");
}

if (isset($_POST['savePass'])) {

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

    $checkPass = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE sa_id = '$sa_id'");
    while ($row = mysqli_fetch_array($checkPass)) {
        $checkHashPass = password_verify($oldpassword, $row['password']);
        if ($checkHashPass == false) {
            $_SESSION['oldNotMatch'] = true;
            header("location: ../edit.SA.php");
        } elseif ($checkHashPass == true) {

            $password = mysqli_real_escape_string($db, $_POST['password']);
            $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);

            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                $updatePass = mysqli_query($db, " UPDATE tbl_super_admins SET password='$hashedPwd' WHERE sa_id = '$sa_id'") or die(mysqli_error($db));
                $_SESSION['successPass'] = true;
                header("location: ../edit.SA.php");
            } else {
                $_SESSION['newNotMatch'] = true;
                header("location: ../edit.SA.php");
            }
        }
    }
}