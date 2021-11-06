<?php
require '../../../includes/conn.php';
session_start();
$stud_id = $_SESSION['stud_id'];

if (isset($_POST['submit'])) {

    $course_id = $db->real_escape_string($_POST['course']);
    $year_id = $db->real_escape_string($_POST['level']);
    $status = $db->real_escape_string($_POST['status']);
    $ay_id = $_SESSION['AYear'];
    $sem_id = $_SESSION['ASem'];
    $date_enrolled = date("Y-m-d");
    $remark = $db->real_escape_string("Pending");

    if (!empty($_POST['course']) && !empty($_POST['level']) && !empty($_POST['status'])) {
        $q = $db->query("INSERT INTO tbl_schoolyears (ay_id, year_id, sem_id, course_id, stud_id, date_enrolled, status, remark) VALUES ('$ay_id', '$year_id', '$sem_id', '$course_id', '$stud_id', '$date_enrolled', '$status', '$remark')") or die($db->error);
        $_SESSION['enroll_success'] = true;
        header("location: ../enrollmentInfo.php");
    } else {
        $_SESSION['fill-select'] = true;
        header("location: ../enrollNow.php");
    }
}