<?php
require('../fpdf/fpdf.php');
include '../../includes/conn.php';




class PDF extends FPDF
{

    // Page header

    function Header()
    {
        // Logo(x axis, y axis, height, width)
        $this->Image('../../assets/img/logos/logo.png', 23, 6, 18, 18);
        // // font(font type,style,font size)
        $this->SetFont('Times', 'B', 30);
        $this->SetTextColor(255, 0, 0);
        // Dummy cell

        // //cell(width,height,text,border,end line,[align])
        $this->Cell(35);
        $this->Cell(140, 5, 'Saint Francis of Assisi College', 0, 0);
        // Line break
        $this->Ln(9);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('Arial', '', 9);
        // dummy cell

        // //cell(width,height,text,border,end line,[align])
        $this->Ln(2);
        $test = utf8_decode("PIÑAS");
        $test2 = utf8_decode("BIÑAN");
        $test3 = utf8_decode("DASMARIÑAS");
        $this->Cell(0, 5, 'LAS ' . $test . ' *  TAGUIG  *  ALABANG  *  BACOOR  * ' . $test3 . ' * ' . $test2 . ' *  STA. ROSA', 0, 1, 'C');
        $test1 = utf8_decode("BAÑOS");
        $this->Cell(0, 5, 'SAINT ANTHONY SCHOOL - LOS ' . $test1 .  '  *  SAINT ANTHONY SCHOOL - LAS ' . $test, 0, 1, 'C');
        // Line break
        $this->Ln(8);
        $this->SetFont('Arial', 'B', 16);
        // //cell(width,height,text,border,end line,[align])
        $this->SetTextColor(255, 0, 0);
        $this->Cell(190, 5, 'C O L L E G E', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor(0, 0, 0);
        $this->Ln(1);
        $this->Cell(190, 5, 'BREAKDOWN OF ENROLLMENT UPDATES', 0, 1, 'C');
        $this->Ln(1);
        $this->Cell(95, 5, 'SEMESTER: ', 0, 0, 'R');
        $this->SetTextColor(255, 0, 0);
        $this->Cell(95, 5, $_SESSION['active_sem'], 0, 1, 'L');
        $this->Ln(1);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(190, 5, 'SCHOOLYEAR: ' . $_SESSION['active_acad'], 0, 1, 'C');
        // Line break
        $this->Ln(6);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(25, 5, 'CAMPUS:', 0, 0);
        $this->SetFont('Arial', 'U', 12);
        $this->SetTextColor(255, 0, 0);
        $this->Cell(115, 5, 'BACOOR', 0, 0);
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(17, 5, 'AS OF:', 0, 0);
        $this->SetFont('Arial', 'U', 12);
        $this->SetTextColor(255, 0, 0);
        $this->Cell(33, 5, date('d-M-y'), 0, 1);

        $this->Cell(25, 5, '', 0, 1);
        $this->SetFont('Arial', '', 9);
        $this->SetTextColor(91, 91, 229);
        $this->Cell(50, 5, 'Enrollment Target', 0, 0, 'R');
        $this->Cell(45, 5, 'Enrollment Out-put', 0, 0, 'R');
        $this->Cell(45, 5, 'Variance (+/-)', 0, 0, 'R');
        $this->Cell(50, 5, 'Percentage (Target vs Output)', 0, 1, 'R');

        include '../../includes/db.php';
        $result = mysqli_query($db, "SELECT * FROM tbl_schoolyears WHERE remark='Approved' AND (status = 'New' || status='New-Trans') AND ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' ");
        $num_rows = mysqli_num_rows($result);
        $result1 = mysqli_query($db, "SELECT * FROM tbl_schoolyears WHERE remark='Approved' AND (status = 'Old') AND ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' ");
        $num_rows1 = mysqli_num_rows($result1);
        $qwerty = mysqli_query($db, "SELECT * FROM tbl_enrollment_target where semester = '$_SESSION[active_sem]' AND acad_year = '$_SESSION[active_acad]'");
        while ($row = mysqli_fetch_array($qwerty)) {

            $var_new = $num_rows - $row['new'];
            $perc_new = $num_rows / $row['new'] * 100;
            $var_old = $num_rows1 - $row['old'];
            $perc_old = $num_rows1 / $row['old'] * 100;

            $this->SetTextColor(0, 0, 0);
            $this->Cell(35, 5, 'New', 0, 0, 'R');
            $this->Cell(15, 5, $row['new'], 'B', 0, 'C');
            $this->Cell(30, 5, 'New', 0, 0, 'R');
            $this->Cell(15, 5, $num_rows, 'B', 0, 'C');
            $this->Cell(30, 5, 'New', 0, 0, 'R');
            $this->Cell(15, 5, $var_new, 'B', 0, 'C');
            $this->Cell(20, 5, '', 0, 0, 'R');
            $this->Cell(20, 5, $perc_new, 'B', 1, 'C');

            $this->Cell(35, 5, 'Old', 0, 0, 'R');
            $this->Cell(15, 5, $row['old'], 'B', 0, 'C');
            $this->Cell(30, 5, 'Old', 0, 0, 'R');
            $this->Cell(15, 5, $num_rows1, 'B', 0, 'C');
            $this->Cell(30, 5, 'Old', 0, 0, 'R');
            $this->Cell(15, 5, $var_old, 'B', 0, 'C');
            $this->Cell(20, 5, '', 0, 0, 'R');
            $this->Cell(20, 5, $perc_old, 'B', 1, 'C');

            $total_target = $row['new'] + $row['old'];
            $total_output = $num_rows + $num_rows1;
            $total_var = $var_new + $var_old;
            $total_perc = $total_output / $total_target * 100;



            $this->SetFont('Arial', 'B', 9);
            $this->Cell(35, 5, 'Total', 0, 0, 'R');
            $this->Cell(15, 5, $total_target, 'B', 0, 'C');
            $this->Cell(30, 5, 'Total', 0, 0, 'R');
            $this->Cell(15, 5, $total_output, 'B', 0, 'C');
            $this->Cell(30, 5, 'Total', 0, 0, 'R');
            $this->Cell(15, 5, $total_var, 'B', 0, 'C');
            $this->Cell(20, 5, '', 0, 0, 'R');
            $this->Cell(20, 5, round($total_perc, 2), 'B', 1, 'C');
        }
    }


    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-25);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(255, 0, 0);
        // Page number
        $this->Cell(0, 5, '', 0, 1, 'C');
        $this->SetFont('Arial', '', 8);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 5, '', 0, 0, 'R');
    }
}

$pdf = new PDF('P', 'mm', 'Legal');
//left top right
$pdf->SetMargins(5, 10, 10);
$pdf->AddPage();


$pdf->SetFont('Arial', '', '10');
$pdf->Rect(5, 5, 200, 275);
$pdf->Cell(25, 3, '', 0, 1);
$pdf->SetFont('Arial', 'B', '10');
$pdf->SetFillColor(210, 207, 207);
$pdf->Cell(35, 20, "PARTICULARS", 1, 0, "C", true);
$pdf->SetXY(40, 101);
$qwerty1 = mysqli_query($db, "SELECT * FROM tbl_enrollment_target where semester = '$_SESSION[active_sem]' AND acad_year = '$_SESSION[active_acad]'");
while ($row1 = mysqli_fetch_array($qwerty1)) {
    $pdf->MultiCell(45, 5, 'S.Y. ' . $row1['compared'] . "\nFinal Enrollment Data", 1, "C", true, 0);

    $pdf->SetXY(40, 111);
    $pdf->MultiCell(20, 5, "NEW", 1, "C", false, 0);
    $pdf->SetXY(40, 116);

    $pdf->SetFont('Arial', 'B', '8');
    $pdf->SetFillColor(255, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->MultiCell(10, 5, "Fresh", 1, "C", true, 0);
    $pdf->SetXY(50, 116);
    $pdf->MultiCell(10, 5, "Trans", 1, "C", true, 0);

    $pdf->SetFont('Arial', 'B', '10');
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(60, 111);
    $pdf->MultiCell(10, 10, "Old", 1, "C", false, 0);


    $pdf->SetXY(70, 111);
    $pdf->SetFillColor(210, 207, 207);
    $pdf->MultiCell(15, 10, "Total", 1, "C", true, 0);


    $pdf->SetXY(85, 101);
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(45, 10, 'S.Y. ' . $row1['compared'], 1, 0, 'C', true);
    $pdf->Cell(45, 10, 'S.Y. ' . $_SESSION['active_acad'], 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'VARIANCE', 1, 0, 'C', true);
}
$pdf->SetXY(85, 111);
$pdf->MultiCell(20, 5, "NEW", 1, "C", false, 0);
$pdf->SetXY(85, 116);

$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(10, 5, "Fresh", 1, "C", true, 0);
$pdf->SetXY(95, 116);
$pdf->MultiCell(10, 5, "Trans", 1, "C", true, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(105, 111);
$pdf->MultiCell(10, 10, "Old", 1, "C", false, 0);


$pdf->SetXY(115, 111);
$pdf->SetFillColor(210, 207, 207);
$pdf->MultiCell(15, 10, "Total", 1, "C", true, 0);

$pdf->SetXY(130, 111);
$pdf->MultiCell(20, 5, "NEW", 1, "C", false, 0);
$pdf->SetXY(130, 116);

$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(10, 5, "Fresh", 1, "C", true, 0);
$pdf->SetXY(140, 116);
$pdf->MultiCell(10, 5, "Trans", 1, "C", true, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(150, 111);
$pdf->MultiCell(10, 10, "Old", 1, "C", false, 0);


$pdf->SetXY(160, 111);
$pdf->SetFillColor(210, 207, 207);
$pdf->MultiCell(15, 10, "Total", 1, "C", true, 0);


$pdf->SetXY(175, 111);
$pdf->SetFillColor(153, 255, 255);
$pdf->MultiCell(20, 5, "NEW", 1, "C", true, 0);

$pdf->SetXY(175, 116);
$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(10, 5, "Fresh", 1, "C", true, 0);
$pdf->SetXY(185, 116);
$pdf->MultiCell(10, 5, "Trans", 1, "C", true, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(195, 111);
$pdf->SetFillColor(153, 255, 255);
$pdf->MultiCell(10, 10, "Old", 1, "C", true, 0);



$pdf->SetFont('Arial', '', '10');
$pdf->Cell(35, 5, "BSBA", 'L,R,T', 0);
$pdf->SetFillColor(255, 255, 51);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->SetFillColor(210, 207, 207);
$pdf->Cell(15, 5, "", 'L,R,T', 0, 'C', true);
$pdf->SetFillColor(255, 255, 51);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->SetFillColor(210, 207, 207);
$pdf->Cell(15, 5, "", 'L,R,T', 0, 'C', true);
$pdf->SetFillColor(255, 255, 51);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
$pdf->SetFillColor(210, 207, 207);
$pdf->Cell(15, 5, "", 'L,R,T', 1, 'C', true);

$sq = mysqli_query($db, "SELECT * FROM tbl_enrollment_target");
while ($r = mysqli_fetch_array($sq)) {
    $curr_mm_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '3' AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $curr_mm_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '3' AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $curr_mm_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '3' AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $curr_fm_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '25' OR tbl_schoolyears.course_id = '14') AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $curr_fm_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '25' OR tbl_schoolyears.course_id = '14') AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $curr_fm_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '25' OR tbl_schoolyears.course_id = '14') AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $mm_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '3' AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $mm_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '3' AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $mm_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '3' AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $fm_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '25' OR tbl_schoolyears.course_id = '14') AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $fm_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '25' OR tbl_schoolyears.course_id = '14') AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $fm_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '25' OR tbl_schoolyears.course_id = '14') AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $m_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '14' AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $m_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '14' AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $m_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '14' AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $curr_m_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '14' AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $curr_m_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '14' AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $curr_m_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '14' AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));

    $pdf->Cell(35, 5, "   * Financial Mgmt", 'L,R', 0);
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $fm_new['total'], 'L,R,B', 0, 'C', true); //FINAL PREV SY BSBA FM-FRESH
    $pdf->Cell(10, 5, $fm_new_trans['total'], 'L,R,B', 0, 'C', true); //TRANS
    $pdf->Cell(10, 5, $fm_old['total'], 'L,R,B', 0, 'C', true); //OLD
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $fm_new['total'] + $fm_old['total'] + $fm_new_trans['total'], 'L,R,B', 0, 'C', true); //TOTAL
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $fm_new['total'], 'L,R,B', 0, 'C', true); //PREV SY BSBA FM FRESH
    $pdf->Cell(10, 5, $fm_new_trans['total'], 'L,R,B', 0, 'C', true); //TRANS
    $pdf->Cell(10, 5, $fm_old['total'], 'L,R,B', 0, 'C', true); //OLD
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $fm_new['total'] + $fm_old['total'] + $fm_new_trans['total'], 'L,R,B', 0, 'C', true); //TOTAL
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $curr_fm_new['total'], 'L,R,B', 0, 'C', true); //CURRENT SY BSBA FM FRESH
    $pdf->Cell(10, 5, $curr_fm_new_trans['total'], 'L,R,B', 0, 'C', true); //TRANS
    $pdf->Cell(10, 5, $curr_fm_old['total'], 'L,R,B', 0, 'C', true); //OLD
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $curr_fm_new['total'] + $curr_fm_old['total'] + $curr_fm_new_trans['total'], 'L,R,B', 1, 'C', true); //TOTAL

    $pdf->Cell(35, 5, "   * Marketing Mgmt", 'L,R', 0); //MARTKETING
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $mm_new['total'], 'L,R,B', 0, 'C', true); //FINAL PREV SY BSBA mm-FRESH
    $pdf->Cell(10, 5, $mm_new_trans['total'], 'L,R,B', 0, 'C', true); //TRANS
    $pdf->Cell(10, 5, $mm_old['total'], 'L,R,B', 0, 'C', true); //OLD
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $mm_new['total'] + $mm_old['total'] + $mm_new_trans['total'], 'L,R,B', 0, 'C', true); //TOTAL
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $mm_new['total'], 'L,R,B', 0, 'C', true); //PREV SY BSBA mm FRESH
    $pdf->Cell(10, 5, $mm_new_trans['total'], 'L,R,B', 0, 'C', true); //TRANS
    $pdf->Cell(10, 5, $mm_old['total'], 'L,R,B', 0, 'C', true); //OLD
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $mm_new['total'] + $mm_old['total'] + $mm_new_trans['total'], 'L,R,B', 0, 'C', true); //TOTAL
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $curr_mm_new['total'], 'L,R,B', 0, 'C', true); //CURRENT SY BSBA mm FRESH
    $pdf->Cell(10, 5, $curr_mm_new_trans['total'], 'L,R,B', 0, 'C', true); //TRANS
    $pdf->Cell(10, 5, $curr_mm_old['total'], 'L,R,B', 0, 'C', true); //OLD
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $curr_mm_new['total'] + $curr_mm_old['total'] + $curr_mm_new_trans['total'], 'L,R,B', 1, 'C', true); //TOTAL

    // $pdf->Cell(35,5,"   * Management",'L,R',0);//MARTKETING
    // $pdf->SetFillColor(255,255,51);
    // $pdf->Cell(10,5,$m_new['total'],'L,R,B',0,'C',true);//FINAL PREV SY BSBA m-FRESH
    // $pdf->Cell(10,5,$m_new_trans['total'],'L,R,B',0,'C',true);//TRANS
    // $pdf->Cell(10,5,$m_old['total'],'L,R,B',0,'C',true);//OLD
    // $pdf->SetFillColor(210,207,207);
    // $pdf->Cell(15,5,$m_new['total']+$m_old['total']+$m_new_trans['total'],'L,R,B',0, 'C',true);//TOTAL
    // $pdf->SetFillColor(255,255,51);
    // $pdf->Cell(10,5,$m_new['total'],'L,R,B',0,'C',true);//PREV SY BSBA m FRESH
    // $pdf->Cell(10,5,$m_new_trans['total'],'L,R,B',0,'C',true);//TRANS
    // $pdf->Cell(10,5,$m_old['total'],'L,R,B',0,'C',true);//OLD
    // $pdf->SetFillColor(210,207,207);
    // $pdf->Cell(15,5,$m_new['total']+$m_old['total']+$m_new_trans['total'],'L,R,B',0, 'C',true);//TOTAL
    // $pdf->SetFillColor(255,255,51);
    // $pdf->Cell(10,5,$curr_m_new['total'],'L,R,B',0,'C',true);//CURRENT SY BSBA m FRESH
    // $pdf->Cell(10,5,$curr_m_new_trans['total'],'L,R,B',0,'C',true);//TRANS
    // $pdf->Cell(10,5,$curr_m_old['total'],'L,R,B',0,'C',true);//OLD
    // $pdf->SetFillColor(210,207,207);
    // $pdf->Cell(15,5,$curr_m_new['total']+$curr_m_old['total']+$curr_m_new_trans['total'],'L,R,B',1, 'C',true);//TOTAL
    $bsba_fresh = $fm_new['total'] + $mm_new['total'];
    $bsba_trans = $fm_new_trans['total'] + $mm_new_trans['total'];
    $bsba_old = $fm_old['total'] + $mm_old['total'];
    $bsba_total = $bsba_old + $bsba_fresh + $bsba_trans;

    $curr_bsba_fresh = $curr_fm_new['total'] + $curr_mm_new['total'];
    $curr_bsba_trans = $curr_fm_new_trans['total'] + $curr_mm_new_trans['total'];
    $curr_bsba_old = $curr_fm_old['total'] + $curr_mm_old['total'];
    $curr_bsba_total = $curr_bsba_old + $curr_bsba_fresh + $curr_bsba_trans;

    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(35, 5, "Sub-total", 'L,R,B', 0, 'R');
    $pdf->Cell(10, 5, $bsba_fresh, 1, 0, 'C', true); //FINAL PREV SUB TOTAL BSBA FRESH
    $pdf->Cell(10, 5, $bsba_trans, 1, 0, 'C', true); //SUBTOTAL TRANS
    $pdf->Cell(10, 5, $bsba_old, 1, 0, 'C', true); //SUBTOTAL OLD
    $pdf->Cell(15, 5, $bsba_total, 1, 0, 'C', true); //SUBTOTAL TOTAL
    $pdf->Cell(10, 5, $bsba_fresh, 1, 0, 'C', true); //FINAL PREV SUB TOTAL BSBA FRESH
    $pdf->Cell(10, 5, $bsba_trans, 1, 0, 'C', true); //SUBTOTAL TRANS
    $pdf->Cell(10, 5, $bsba_old, 1, 0, 'C', true); //SUBTOTAL OLD
    $pdf->Cell(15, 5, $bsba_total, 1, 0, 'C', true); //SUBTOTAL TOTAL
    $pdf->Cell(10, 5, $curr_bsba_fresh, 1, 0, 'C', true); //CURRENT SUBTOTAL FRESH
    $pdf->Cell(10, 5, $curr_bsba_trans, 1, 0, 'C', true); //TRANS
    $pdf->Cell(10, 5, $curr_bsba_old, 1, 0, 'C', true); //OLD
    $pdf->Cell(15, 5, $curr_bsba_total, 1, 1, 'C', true); //TOTAL

    //Variance BSBA
    $pdf->SetXY(175, 121);
    $pdf->Cell(10, 20, $curr_bsba_fresh - $bsba_fresh, 1, 0, 'C'); //FRESH
    $pdf->Cell(10, 20, $curr_bsba_trans - $bsba_trans, 1, 0, 'C'); //TRANS
    $pdf->Cell(10, 20, $curr_bsba_old - $bsba_old, 1, 1, 'C'); //OLD


    $cs_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $cs_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $cs_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $curr_cs_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $curr_cs_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $curr_cs_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND tbl_schoolyears.course_id = '1' AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));

    $cs_total = $cs_new['total'] + $cs_new_trans['total'] + $cs_old['total'];
    $curr_cs_fresh = $curr_cs_new['total'];
    $curr_cs_trans = $curr_cs_new_trans['total'];
    $curr_cs_old = $curr_cs_old['total'];
    $curr_cs_total = $curr_cs_old + $curr_cs_trans + $curr_cs_fresh;

    $pdf->Cell(35, 5, "BSCS", 'L,R,T', 0); //BSCS
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $cs_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $cs_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $cs_old['total'], 1, 0, 'C', true); //old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $cs_total, 1, 0, 'C', true); //total
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $cs_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $cs_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $cs_old['total'], 1, 0, 'C', true); //old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $cs_total, 1, 0, 'C', true); //total
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $curr_cs_fresh, 1, 0, 'C', true); //current fresh
    $pdf->Cell(10, 5, $curr_cs_trans, 1, 0, 'C', true); //current trans
    $pdf->Cell(10, 5, $curr_cs_old, 1, 0, 'C', true); //current old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $curr_cs_total, 1, 1, 'C', true); //current total

    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(35, 5, "Sub-total", 'L,R,B', 0, 'R');
    $pdf->Cell(10, 5, $cs_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $cs_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $cs_old['total'], 1, 0, 'C', true); //old
    $pdf->Cell(15, 5, $cs_new['total'] + $cs_new_trans['total'] + $cs_old['total'], 1, 0, 'C', true); //total
    $pdf->Cell(10, 5, $cs_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $cs_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $cs_old['total'], 1, 0, 'C', true); //old
    $pdf->Cell(15, 5, $cs_new['total'] + $cs_new_trans['total'] + $cs_old['total'], 1, 0, 'C', true); //total
    $pdf->Cell(10, 5, $curr_cs_fresh, 1, 0, 'C', true); //current fresh
    $pdf->Cell(10, 5, $curr_cs_trans, 1, 0, 'C', true); //current trans
    $pdf->Cell(10, 5, $curr_cs_old, 1, 0, 'C', true); //current old
    $pdf->Cell(15, 5, $curr_cs_total, 1, 1, 'C', true); //current total



    //Variance BSCS
    $pdf->SetXY(175, 141);
    $pdf->Cell(10, 10, $curr_cs_fresh - $cs_new['total'], 1, 0, 'C');
    $pdf->Cell(10, 10, $curr_cs_trans - $cs_new_trans['total'], 1, 0, 'C');
    $pdf->Cell(10, 10, $curr_cs_old - $cs_old['total'], 1, 1, 'C');


    $curr_elem_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '17' OR tbl_schoolyears.course_id = '13' OR tbl_schoolyears.course_id = '19')  AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $curr_elem_fresh = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '17' OR tbl_schoolyears.course_id = '13' OR tbl_schoolyears.course_id = '19')  AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $curr_elem_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '17' OR tbl_schoolyears.course_id = '13' OR tbl_schoolyears.course_id = '19')  AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $elem_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '17' OR tbl_schoolyears.course_id = '13' OR tbl_schoolyears.course_id = '19')  AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $elem_fresh = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '17' OR tbl_schoolyears.course_id = '13' OR tbl_schoolyears.course_id = '19')  AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $elem_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '17' OR tbl_schoolyears.course_id = '13' OR tbl_schoolyears.course_id = '19')  AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));


    $pdf->Cell(35, 5, "EDUCATION", 'L,R,T', 0);
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->Cell(10, 5, "", 'L,R,T', 0, 'C', true);
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, "", 'L,R,T', 1, 'C', true);

    $elem_total = $elem_fresh['total'] + $elem_trans['total'] + $elem_old['total'];
    $curr_elem_total = $curr_elem_fresh['total'] + $curr_elem_trans['total'] + $curr_elem_old['total'];

    $pdf->Cell(35, 5, "   * Elementary", 'L,R', 0);
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $elem_fresh['total'], 'L,R,B', 0, 'C', true); //elem fresh
    $pdf->Cell(10, 5, $elem_trans['total'], 'L,R,B', 0, 'C', true); //elem trans
    $pdf->Cell(10, 5, $elem_old['total'], 'L,R,B', 0, 'C', true); //elem old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $elem_total, 'L,R,B', 0, 'C', true); //elem total
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $elem_fresh['total'], 'L,R,B', 0, 'C', true); //elem fresh
    $pdf->Cell(10, 5, $elem_trans['total'], 'L,R,B', 0, 'C', true); //elem trans
    $pdf->Cell(10, 5, $elem_old['total'], 'L,R,B', 0, 'C', true); //elem old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $elem_total, 'L,R,B', 0, 'C', true); //elem total
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $curr_elem_fresh['total'], 'L,R,B', 0, 'C', true); //current elem fresh
    $pdf->Cell(10, 5, $curr_elem_trans['total'], 'L,R,B', 0, 'C', true); //current elem trans
    $pdf->Cell(10, 5, $curr_elem_old['total'], 'L,R,B', 0, 'C', true); //current elem old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $curr_elem_total, 'L,R,B', 1, 'C', true); //current elem total


    $curr_sec_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '10' OR tbl_schoolyears.course_id = '11' OR tbl_schoolyears.course_id = '12' OR tbl_schoolyears.course_id = '18' OR tbl_schoolyears.course_id = '24')  AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $curr_sec_fresh = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '10' OR tbl_schoolyears.course_id = '11' OR tbl_schoolyears.course_id = '12' OR tbl_schoolyears.course_id = '18' OR tbl_schoolyears.course_id = '24')  AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $curr_sec_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '10' OR tbl_schoolyears.course_id = '11' OR tbl_schoolyears.course_id = '12' OR tbl_schoolyears.course_id = '18' OR tbl_schoolyears.course_id = '24')  AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $sec_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '10' OR tbl_schoolyears.course_id = '11' OR tbl_schoolyears.course_id = '12' OR tbl_schoolyears.course_id = '18' OR tbl_schoolyears.course_id = '24')  AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $sec_fresh = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '10' OR tbl_schoolyears.course_id = '11' OR tbl_schoolyears.course_id = '12' OR tbl_schoolyears.course_id = '18' OR tbl_schoolyears.course_id = '24')  AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $sec_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '10' OR tbl_schoolyears.course_id = '11' OR tbl_schoolyears.course_id = '12' OR tbl_schoolyears.course_id = '18' OR tbl_schoolyears.course_id = '24')  AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));

    $sec_total = $sec_fresh['total'] + $sec_trans['total'] + $sec_old['total'];
    $curr_sec_total = $curr_sec_fresh['total'] + $curr_sec_trans['total'] + $curr_sec_old['total'];

    $pdf->Cell(35, 5, "   * Secondary", 'L,R', 0);
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $sec_fresh['total'], 'L,R,B', 0, 'C', true); //sec fresh
    $pdf->Cell(10, 5, $sec_trans['total'], 'L,R,B', 0, 'C', true); //sec trans
    $pdf->Cell(10, 5, $sec_old['total'], 'L,R,B', 0, 'C', true); //sec old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $sec_total, 'L,R,B', 0, 'C', true); //sec total
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $sec_fresh['total'], 'L,R,B', 0, 'C', true); //sec fresh
    $pdf->Cell(10, 5, $sec_trans['total'], 'L,R,B', 0, 'C', true); //sec trans
    $pdf->Cell(10, 5, $sec_old['total'], 'L,R,B', 0, 'C', true); //sec old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $sec_total, 'L,R,B', 0, 'C', true); //sec total
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $curr_sec_fresh['total'], 'L,R,B', 0, 'C', true); //current sec fresh
    $pdf->Cell(10, 5, $curr_sec_trans['total'], 'L,R,B', 0, 'C', true); //current sec trans
    $pdf->Cell(10, 5, $curr_sec_old['total'], 'L,R,B', 0, 'C', true); //current sec old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $curr_sec_total, 'L,R,B', 1, 'C', true); //current sec total

    $educ_fresh = $elem_fresh['total'] + $sec_fresh['total'];
    $educ_trans = $elem_trans['total'] + $sec_trans['total'];
    $educ_old = $elem_old['total'] + $sec_old['total'];
    $educ_total = $elem_total + $sec_total;
    $curr_educ_fresh = $curr_elem_fresh['total'] + $curr_sec_fresh['total'];
    $curr_educ_trans = $curr_elem_trans['total'] + $curr_sec_trans['total'];
    $curr_educ_old = $curr_elem_old['total'] + $curr_sec_old['total'];
    $curr_educ_total = $curr_elem_total + $curr_sec_total;

    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(35, 5, "Sub-total", 'L,R,B', 0, 'R');
    $pdf->Cell(10, 5, $educ_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $educ_trans, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $educ_old, 1, 0, 'C', true);
    $pdf->Cell(15, 5, $educ_total, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $educ_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $educ_trans, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $educ_old, 1, 0, 'C', true);
    $pdf->Cell(15, 5, $educ_total, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $curr_educ_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $curr_educ_trans, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $curr_educ_old, 1, 0, 'C', true);
    $pdf->Cell(15, 5, $curr_educ_total, 1, 1, 'C', true);

    $var_educ_fresh = $curr_educ_fresh - $educ_fresh;
    $var_educ_trans = $curr_educ_trans - $educ_trans;
    $var_educ_old = $curr_educ_old - $educ_old;

    //Variance Educ
    $pdf->SetXY(175, 151);
    $pdf->Cell(10, 20, $var_educ_fresh, 1, 0, 'C');
    $pdf->Cell(10, 20, $var_educ_trans, 1, 0, 'C');
    $pdf->Cell(10, 20, $var_educ_old, 1, 1, 'C');


    $hm_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '2' OR tbl_schoolyears.course_id = '15') AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $hm_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '2' OR tbl_schoolyears.course_id = '15') AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $hm_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$r[compared]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '2' OR tbl_schoolyears.course_id = '15') AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));
    $curr_hm_new = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '2' OR tbl_schoolyears.course_id = '15') AND remark = 'Approved' AND status='New'")) or die(mysqli_error($db));
    $curr_hm_new_trans = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '2' OR tbl_schoolyears.course_id = '15') AND remark = 'Approved' AND status='New-Trans'")) or die(mysqli_error($db));
    $curr_hm_old = mysqli_fetch_array(mysqli_query($db, "SELECT COUNT(*) as total FROM `tbl_schoolyears` LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                  LEFT JOIN tbl_genders ON tbl_genders.gender_id = tbl_students.gender_id
                                  LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                                  LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_schoolyears.year_id WHERE ay_id = '$_SESSION[active_acad]' AND sem_id = '$_SESSION[active_sem]' AND (tbl_schoolyears.course_id = '2' OR tbl_schoolyears.course_id = '15') AND remark = 'Approved' AND status='Old'")) or die(mysqli_error($db));

    $pdf->Cell(35, 5, "HM", 'L,R,T', 0); //hospitality management
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $hm_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $hm_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $hm_old['total'], 1, 0, 'C', true); //old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $hm_new['total'] + $hm_new_trans['total'] + $hm_old['total'], 1, 0, 'C', true); //total
    $pdf->Cell(10, 5, $hm_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $hm_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $hm_old['total'], 1, 0, 'C', true); //old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $hm_new['total'] + $hm_new_trans['total'] + $hm_old['total'], 1, 0, 'C', true); //total
    $pdf->SetFillColor(255, 255, 51);
    $pdf->Cell(10, 5, $curr_hm_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $curr_hm_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $curr_hm_old['total'], 1, 0, 'C', true); //old
    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(15, 5, $curr_hm_new['total'] + $curr_hm_new_trans['total'] + $curr_hm_old['total'], 1, 1, 'C', true); //total

    $hm_total = $hm_new['total'] + $hm_new_trans['total'] + $hm_old['total'];
    $curr_hm_fresh = $curr_hm_new['total'];
    $curr_hm_trans = $curr_hm_new_trans['total'];
    $curr_hm_old = $curr_hm_old['total'];
    $curr_hm_total = $curr_hm_old + $curr_hm_trans + $curr_hm_fresh;

    $pdf->SetFillColor(210, 207, 207);
    $pdf->Cell(35, 5, "Sub-total", 'L,R,B', 0, 'R');
    $pdf->Cell(10, 5, $hm_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $hm_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $hm_old['total'], 1, 0, 'C', true); //old
    $pdf->Cell(15, 5, $hm_total, 1, 0, 'C', true); //total
    $pdf->Cell(10, 5, $hm_new['total'], 1, 0, 'C', true); //fresh
    $pdf->Cell(10, 5, $hm_new_trans['total'], 1, 0, 'C', true); //trans
    $pdf->Cell(10, 5, $hm_old['total'], 1, 0, 'C', true); //old
    $pdf->Cell(15, 5, $hm_total, 1, 0, 'C', true); //total
    $pdf->Cell(10, 5, $curr_hm_fresh, 1, 0, 'C', true); //current fresh
    $pdf->Cell(10, 5, $curr_hm_trans, 1, 0, 'C', true); //current trans
    $pdf->Cell(10, 5, $curr_hm_old, 1, 0, 'C', true); //current old
    $pdf->Cell(15, 5, $curr_hm_total, 1, 1, 'C', true); //current total

    //Variance BSCS
    $pdf->SetXY(175, 171);
    $pdf->Cell(10, 10, $curr_hm_fresh - $hm_new['total'], 1, 0, 'C');
    $pdf->Cell(10, 10, $curr_hm_trans - $hm_new_trans['total'], 1, 0, 'C');
    $pdf->Cell(10, 10, $curr_hm_old - $hm_old['total'], 1, 1, 'C');

    //TOTAL
    $total_fresh = $bsba_fresh['total'] + $cs_new['total'] + $educ_fresh['total'] + $hm_new['total'];
    $total_trans = $bsba_trans['total'] + $cs_new_trans['total'] + $educ_trans['total'] + $hm_new_trans['total'];
    $total_old = $bsba_old['total'] + $cs_old['total'] + $educ_old['total'] + $hm_old['total'];
    $total_total = $total_old + $total_fresh + $total_trans;

    $curr_total_fresh = $curr_bsba_fresh + $curr_cs_fresh + $curr_educ_fresh + $curr_hm_fresh;
    $curr_total_trans = $curr_bsba_trans + $curr_cs_trans + $curr_educ_trans + $curr_hm_trans;
    $curr_total_old = $curr_bsba_old + $curr_cs_old + $curr_educ_old + $curr_hm_old;

    $grand_fresh = $total_fresh + $total_trans;
    $curr_grand_fresh = $curr_total_fresh + $curr_total_trans;

    $pdf->SetFont('Arial', 'B', '10');
    $pdf->Cell(35, 5, "TOTAL", 1, 0, 'R');
    $pdf->Cell(10, 5, $total_fresh, 1, 0, 'C');
    $pdf->Cell(10, 5, $total_trans, 1, 0, 'C');
    $pdf->Cell(10, 5, $total_old, 1, 0, 'C');
    $pdf->SetFillColor(255, 255, 0);
    $pdf->Cell(15, 10, $grand_fresh + $total_fresh, 'L, R', 0, 'C', true);
    $pdf->Cell(10, 5, $total_fresh, 1, 0, 'C');
    $pdf->Cell(10, 5, $total_trans, 1, 0, 'C');
    $pdf->Cell(10, 5, $total_old, 1, 0, 'C');
    $pdf->SetFillColor(255, 255, 0);
    $pdf->Cell(15, 10, $grand_fresh + $total_old, 'L, R', 0, 'C', true);
    $pdf->Cell(10, 5, $curr_total_fresh, 1, 0, 'C');
    $pdf->Cell(10, 5, $curr_total_trans, 1, 0, 'C');
    $pdf->Cell(10, 5, $curr_total_old, 1, 0, 'C');
    $pdf->Cell(15, 10, $curr_grand_fresh + $curr_total_old, 'L,R', 0, 'C', true);
    $pdf->SetFillColor(153, 255, 255);
    //TOTAL VARIANCE

    $pdf->Cell(10, 5, $curr_total_fresh - $total_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $curr_total_trans - $total_trans, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $curr_total_old - $total_old, 1, 1, 'C', true);


    //GRAND TOTAL
    $pdf->Cell(35, 5, " GRAND TOTAL", 1, 0, 'R');
    $pdf->SetFillColor(160, 160, 160);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(20, 5, $grand_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $total_old, 1, 0, 'C', true);
    $pdf->Cell(15, 5, '', 'L, R, B', 0, 'C');
    $pdf->SetFillColor(160, 160, 160);
    $pdf->Cell(20, 5, $grand_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $total_old, 1, 0, 'C', true);
    $pdf->Cell(15, 5, '', 'L,R,B', 0, 'C');
    $pdf->SetFillColor(160, 160, 160);
    $pdf->Cell(20, 5, $curr_grand_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $curr_total_old, 1, 0, 'C', true);
    $pdf->Cell(15, 5, '', 'L,R,B', 0, 'C');
    $pdf->SetFillColor(153, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(20, 5, $curr_grand_fresh - $grand_fresh, 1, 0, 'C', true);
    $pdf->Cell(10, 5, $curr_total_old - $total_old, 1, 1, 'C', true);
    $pdf->Cell(200, 1, '', 1, 1, 'C');
    $pdf->ln(10);

    $pdf->SetFont('Arial', '', '10');
    $pdf->Cell(37, 5, "Prepared and submitted by :", 0, 1);

    $asd = mysqli_query($db, "SELECT * FROM tbl_admissions where admission_id = '2' ");
    while ($admission = mysqli_fetch_array($asd)) {
        # code...

        $pdf->ln(10);
        $pdf->SetFont('Arial', 'BU', '11');
        $pdf->Cell(37, 5, $admission['admission_firstname'] . ' ' . $admission['admission_middlename'] . ' ' . $admission['admission_lastname'], 0, 1);
        $pdf->SetFont('Arial', '', '10');
        $pdf->Cell(37, 5, "Admission Head - College", 0, 1);
    }
    $pdf->ln(10);
    $pdf->Cell(37, 5, "Noted by :", 0, 1);

    $pdf->ln(5);

    $pdf->SetFont('Arial', 'BU', '11');
    $pdf->Cell(37, 5, "Dr. Santos T. Castillo, Jr.", 0, 1);
    $pdf->SetFont('Arial', '', '10');
    $pdf->Cell(37, 5, "Campus Directopr, College Dean", 0, 1);
}
$pdf->Output();