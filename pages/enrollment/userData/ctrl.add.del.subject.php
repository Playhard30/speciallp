<?php
require '../../../includes/conn.php';
session_start();


if (isset($_POST['delete'])) {
    if (!empty($_POST['check'])) {
        $check = $_POST['check'];
        foreach ($check as $id) {
            $query = $db->query("DELETE FROM tbl_enrolled_subjects WHERE enrolled_subj_id = '$id'") or die($db->error);
            $_SESSION['delSubjects'] = true;
            header("location: ../enrollmentInfo.php");
        }
    } else {
        $_SESSION['FDSub'] = true;
        header("location: ../enrollmentInfo.php");
    }
}

if (isset($_POST['addSub'])) {

    if (!empty($_POST['index'])) {
        $index = $_POST['index'];
        $class_id = $_POST['class'];
        $subjects_id = $_POST['subjects'];
        foreach ($index as $i) {
            $query1 = $db->query("INSERT INTO tbl_enrolled_subjects (class_id, stud_id, subj_id, acad_year, semester) VALUES ('$class_id[$i]', '$_SESSION[stud_id]', '$subjects_id[$i]', '$_SESSION[AC]', '$_SESSION[S]')");
        }
        $_SESSION['SASub'] = true;
        header("location: ../enrollmentInfo.php");
    } else {
        $_SESSION['FASub'] = true;
        header("location: ../enrollmentInfo.php");
    }
}