<?php
require '../../../includes/conn.php';
session_start();
$stud_id = $_SESSION['stud_id'];

if (isset($_POST['stud_no'])) {

    $getCourse = $db->query("SELECT course_id FROM tbl_students WHERE stud_id = '$stud_id'") or die($db->error);
    while ($row = $getCourse->fetch_array()) {
        if ($row['course_id'] == 0) {
            $CCourse_id = $db->real_escape_string($_POST['course']);
            $query = $db->query("UPDATE tbl_students SET course_id = '$CCourse_id' WHERE stud_id = '$stud_id'") or die($db->error);
        }
    }

    $course_id = $db->real_escape_string($_POST['course']);
    $year_id = $db->real_escape_string($_POST['level']);
    $status = $db->real_escape_string($_POST['status']);
    $ay_id = $_SESSION['AC'];
    $sem_id = $_SESSION['S'];
    $date_enrolled = date("Y-m-d");
    $remark = $db->real_escape_string("Pending");

    if (!empty($_POST['course']) && !empty($_POST['level']) && !empty($_POST['status'])) {
        $q = $db->query("INSERT INTO tbl_schoolyears (ay_id, year_id, sem_id, course_id, stud_id, date_enrolled, status, remark) VALUES ('$ay_id', '$year_id', '$sem_id', '$course_id', '$stud_id', '$date_enrolled', '$status', '$remark')") or die($db->error);

        $q1 = $db->query("SELECT * FROM tbl_schoolyears WHERE stud_id = '$_SESSION[stud_id]' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
        while ($row = $q1->fetch_array()) {
            $q2 = $db->query("INSERT INTO tbl_notifications (sy_id) VALUES ('$row[sy_id]')") or die($db->error);
            $_SESSION['enroll_success'] = true;
        }
    } else {
        $_SESSION['fill-select'] = true;
        header("location: ../enrollNow.php");
    }
}