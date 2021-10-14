<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['submit'])) {

    $subj_code = mysqli_real_escape_string($db, $_POST['subj_code']);
    $subj_desc = mysqli_real_escape_string($db, $_POST['subj_desc']);
    $unit_lec = mysqli_real_escape_string($db, $_POST['unit_lec']);
    $unit_lab = mysqli_real_escape_string($db, $_POST['unit_lab']);
    $unit_total = mysqli_real_escape_string($db, $_POST['unit_total']);
    $prereq = mysqli_real_escape_string($db, $_POST['prereq']);
    $course = mysqli_real_escape_string($db, $_POST['course']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $sem = mysqli_real_escape_string($db, $_POST['semester']);

    $checkSubj = mysqli_query($db, "SELECT * , tbl_courses.course_id FROM tbl_subjects_new LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id WHERE subj_code = '$subj_code' AND subj_desc = '$subj_desc' AND tbl_subjects_new.course_id = '$course'") or die(mysqli_error($db));
    $resultCheck = mysqli_num_rows($checkSubj);

    if ($resultCheck == 0) {
        $checkSubj = mysqli_query($db, "INSERT INTO tbl_subjects_new (subj_code,subj_desc, unit_lec, unit_lab, unit_total, prereq, course_id, year_id, sem_id) VALUES ('$subj_code','$subj_desc', '$unit_lec','$unit_lab', '$unit_total', '$prereq', '$course', '$year', '$sem')") or die(mysqli_error($db));
        $_SESSION['subjAdded'] = true;
        header('location: ../add.subject.php');
    } else {
        $_SESSION['subjExisting'] = true;
        header('location: ../add.subject.php');
    }
}
