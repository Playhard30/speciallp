<?php
if (!empty($_SESSION['role'])) {
    if ($_SESSION['role'] == "Super Administrator") {
        $sa_id = $_SESSION['userid'];
        if ($sa_id == false) {
            header("location: ../login/sign-in.php");
        }
    }
} else {
    header("location: ../login/sign-in.php");
}