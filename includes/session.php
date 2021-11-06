<?php
if (!empty($_SESSION['role'])) {
    if ($_SESSION['role'] == "Super Administrator") {
        $sa_id = $_SESSION['userid'];
        if ($sa_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Dean") {
        $dean_id = $_SESSION['userid'];
        if ($dean_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Admission") {
        $admission_id = $_SESSION['userid'];
        if ($admission_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Accounting") {
        $account_id = $_SESSION['userid'];
        if ($account_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Registrar") {
        $admin_id = $_SESSION['userid'];
        if ($admin_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ($_SESSION['role'] == "Adviser") {
        $faculty_id = $_SESSION['userid'];
        if ($faculty_id == false) {
            header("location: ../login/sign-in.php");
            exit();
        }
    } elseif ("Student" == $_SESSION['role']) {
        $stud_id = $_SESSION['userid'];
        if (false == $stud_id) {
            header("location: ../login/sign-in.php");
            exit();
        }
    }
} else {
    header("location: ../login/sign-in.php");
    exit();
}