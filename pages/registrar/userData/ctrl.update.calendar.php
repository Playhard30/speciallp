<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $semester = mysqli_real_escape_string($db, $_POST['semester']);
    $academic_year = mysqli_real_escape_string($db, $_POST['academic_year']);

    $updateSem = mysqli_query ($db, "UPDATE tbl_active_sem SET sem_id = '$semester' ") or die (mysqli_error($db));
    $updateAcad = mysqli_query ($db, "UPDATE tbl_active_acads SET ay_id = '$academic_year' ") or die (mysqli_error($db));

    if ($updateSem == true && $updateAcad == true) {
        $_SESSION['successCalendar'] = true;
        header("location: ../set.acad.calendar.php");
    } else {
        $_SESSION['fill'] = true;
        header("location: ../set.acad.calendar.php");
    }

       
    
}