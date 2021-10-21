<?php
require '../../../includes/conn.php';
session_start();
$faculty_id = $_SESSION['faculty_id'];

if (isset($_POST['saveImg'])) {

    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

        $updateImg = mysqli_query($db, "UPDATE tbl_faculties_staff SET img = '$image', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE faculty_id = '$faculty_id'") or die(mysqli_error($db));
        $_SESSION['successImg'] = true;
        header("location: ../edit.faculty.php?faculty_id=" . $faculty_id);
    } else {
        $_SESSION['emptyImg'] = true;
        header("location: ../edit.faculty.php?faculty_id=" . $faculty_id);
    }
}

if (isset($_POST['save'])) {

    $faculty_no = mysqli_real_escape_string($db, $_POST['faculty_no']);
    $position = mysqli_real_escape_string($db, $_POST['position']);
    $status = mysqli_real_escape_string($db, $_POST['status']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $mname = mysqli_real_escape_string($db, $_POST['mname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);;
    $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

    $updateInfo = mysqli_query($db, " UPDATE tbl_faculties_staff SET faculty_lastname='$lname',faculty_firstname='$fname', faculty_middlename='$mname', faculty_no = '$faculty_no', position = '$position', role = '$role', status = '$status', email='$email', username='$username', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE faculty_id = '$faculty_id'") or die(mysqli_error($db));
    $_SESSION['successUpdate'] = true;
    header("location: ../edit.faculty.php?faculty_id=" . $faculty_id);
}

if (isset($_POST['savePass'])) {

    $oldpassword = mysqli_real_escape_string($db, $_POST['oldPass']);

    $checkPass = mysqli_query($db, "SELECT * FROM tbl_faculties_staff WHERE faculty_id = '$faculty_id'");
    while ($row = mysqli_fetch_array($checkPass)) {
        $checkHashPass = password_verify($oldpassword, $row['password']);
        if ($checkHashPass == false) {
            $_SESSION['oldNotMatch'] = true;
            header("location: ../edit.faculty.php?faculty_id=" . $faculty_id);
        } elseif ($checkHashPass == true) {

            $password = mysqli_real_escape_string($db, $_POST['password']);
            $confirmPass = mysqli_real_escape_string($db, $_POST['confirmPass']);
            $updated_by = $_SESSION['name'] . " <br> (" . $_SESSION['role'] . ")";

            if ($password == $confirmPass) {
                $hashedPwd = password_hash($confirmPass, PASSWORD_DEFAULT);

                $updatePass = mysqli_query($db, "UPDATE tbl_faculties_staff SET password='$hashedPwd', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE faculty_id = '$faculty_id'") or die(mysqli_error($db));
                $_SESSION['successPass'] = true;
                header("location: ../edit.faculty.php?faculty_id=" . $faculty_id);
            } else {
                $_SESSION['newNotMatch'] = true;
                header("location: ../edit.faculty.php?faculty_id=" . $faculty_id);
            }
        }
    }
}