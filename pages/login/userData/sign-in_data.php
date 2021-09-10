<?php
require_once '../../../includes/conn.php';
session_start();

if (isset($_POST['signin'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $super_admin = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE username = '$username' ");
    $numrow1 = mysqli_num_rows($super_admin);

    if ($numrow1 > 0) {
        while ($row = mysqli_fetch_array($super_admin)) {
            $hashedPwdCheck1 = password_verify($password, $row['password']);
            if ($hashedPwdCheck1 == false) {
                echo "<script>alert('Your password is invalid!'); window.location='signin.php'</script>";
                exit();
            } elseif ($hashedPwdCheck1 == true) {
                $_SESSION['role'] = "Super Administrator";
                $_SESSION['userid'] = $row['sa_id'];
            }
            header("location: ../../dashboard/dashboard.php");
        }
    }
}