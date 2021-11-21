<?php
require '../fpdf/fpdf.php';

class PDF extends FPDF
{

// Page header

}

$pdf = new PDF('P', 'mm', 'Legal');
//left top right
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

// Logo(x axis, y axis, height, width)
$pdf->Image('../../assets/img/logos/logo.png', 50, 5, 15, 15);
// text color
$pdf->SetTextColor(255, 0, 0);
// font(font type,style,font size)
$pdf->SetFont('Arial', 'B', 18);
// Dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 5, 'Saint Francis of Assisi College', 0, 0, 'C');
// Line break
$pdf->Ln(5);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$test = utf8_decode("Piñas");
$pdf->Cell(90, 3, 'Admiral Village, Talon, Las ' . $test . ' City', 0, 0, 'C');
// Line break
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(103, 4, 'FOUR-YEAR CURRICULUM', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(100, 4, 'FOR', 0, 0, 'C');
// Line break
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 4, 'BACHELOR OF SCIENCE IN NURSING', 0, 1, 'C');

// Line break

$pdf->SetFont('Arial', '', 10, 'C');
// dummy cell
$pdf->Cell(50);
// //cell(width,height,text,border,end line,[align])
$pdf->Cell(110, 4, '(Effective Academic Year 2020-2021)', 0, 1, 'C');
// Line break
$pdf->Ln(4);

//dummy cells
$pdf->Cell(20, 5, '', 0, 1);
$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(20, 5, 'CODE', 0, 0);
$pdf->Cell(90, 5, 'Description', 0, 0, 'C');
$pdf->Cell(38, 5, 'UNITS', 0, 0, 'C');
$pdf->Cell(60, 5, 'Pre-Requisites', 0, 1);

$pdf->Ln(2);
$pdf->Cell(132, 3, '', 0, 0);
$pdf->Cell(11, 1, 'Lec', 0, 0, 'C');
$pdf->Cell(11, 1, 'Lab', 0, 0, 'C');
$pdf->Cell(11, 1, 'Total', 0, 1, 'C');

$pdf->Cell(45, 5, 'First Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Science, Technology and Society', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Readings in Philippine History', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'FILI', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'KOMFIL (Kontekstwalisadong Komunikasyon sa Filipino)', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CHCL', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Orientation', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '(1)', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MC', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Biochemistry', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '5', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MC', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Anatomy and Physiology', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '5', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'Theoretical Foundation of Nursing', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '101', 0, 0);
$pdf->Cell(90, 4, 'Physical Activity Towards Health and Fitness I', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NSTP', 0, 0);
$pdf->Cell(15, 4, '1', 0, 0);
$pdf->Cell(90, 4, 'National Service Training Program 1', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(9, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '(3)', 'B', 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '24', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'First Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'FILI', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'FILDIS (Filipino sa Iba\'t Ibang Disciplina)', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'FILI 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'WLIT', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(90, 4, 'World Literature', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CHCL', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Franciscan Core Values and Culture', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '(1)', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'MC', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Microbiology and Parasitology', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, 'MC 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '101L', 0, 0);
$pdf->Cell(90, 4, 'Health Assessment', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '101RLE', 0, 0);
$pdf->Cell(90, 4, 'Health Assessment', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Health Education', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '103L', 0, 0);
$pdf->Cell(90, 4, 'Fundamentals of Nursing Practice', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MC 101', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '103RLE', 0, 0);
$pdf->Cell(90, 4, 'Fundamentals of Nursing Practice', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '102', 0, 0);
$pdf->Cell(90, 4, 'Physical Activity Towards Health and Fitness II', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 1);
$pdf->Cell(10, 4, 'PE 101', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NSTP', 0, 0);
$pdf->Cell(15, 4, '2', 0, 0);
$pdf->Cell(90, 4, 'National Service and Training Program 2', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(9, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '(3)', 'B', 0);
$pdf->Cell(8, 4, '', 0, 0);
$pdf->Cell(10, 4, 'NSTP 1', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '25', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Second Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '104L', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing I (Individual and Family as Clients)', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '104RLE', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing I (Individual and Family as Clients)', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'Nutrition and Diet Therapy', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MC 101; MC 102; MC 103', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Pharmacology', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'MC 101; MC 102; MC 103', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '107L', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother, Child, and Adolescent (Well Client)', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '4', 0, 1);
$pdf->Cell(10, 4, 'NCM 101; NCM 102', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '107RLE', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother, Child, and Adolescent (Well Client)', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '5', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, 'Understanding the Self', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, 'Mathematics in the Modern World', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '103', 0, 0);
$pdf->Cell(90, 4, '(PATH-Fit) Physical Activity Towards Health and Fitness III', 0, 0);
$pdf->Cell(10, 4, '2', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, 'PE 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '27', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Second Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '109', 0, 0);
$pdf->Cell(90, 4, 'Health Ethics', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '110L', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother and Child at-risk or with Problems', 0, 0);
$pdf->Cell(10, 4, '6', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '6', 0, 0);
$pdf->Cell(10, 4, 'NCM 104; NCM 107', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '110RLE', 0, 0);
$pdf->Cell(90, 4, 'Care of Mother and Child at-risk or with Problems', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '6', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '111', 0, 0);
$pdf->Cell(90, 4, 'Nursing Informatics', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '105', 0, 0);
$pdf->Cell(90, 4, 'The Contemporary World', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '106', 0, 0);
$pdf->Cell(90, 4, 'Purposive Communication', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'PE', 0, 0);
$pdf->Cell(15, 4, '104', 0, 0);
$pdf->Cell(90, 4, '(PATH-Fit) Physical Activity Towards Health and Fitness IV', 0, 0);
$pdf->Cell(10, 4, '2', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '2', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, 'PE 101', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '26', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Third Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '112', 0, 0);
$pdf->Cell(90, 4, 'Nursing Research 1', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, 'CCGE 104; NCM 110', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '113L', 0, 0);
$pdf->SetFont('Arial', '', '6.9');
$pdf->Cell(90, 4, 'Care of Clients with Problems in Oxygenation, Fluid and Electrolytes, Infectious, ', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', '', 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '6.9');
$pdf->Cell(90, 4, 'Inflammatory and Immunologic Response, Cellular Aberrations, Acute and Chronic', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '8', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '8', 0, 0);
$pdf->Cell(10, 4, 'NCM 109', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '113RLE', 0, 0);
$pdf->SetFont('Arial', '', '7');
$pdf->Cell(90, 4, 'Care of Clients with Problems in Oxygenation, Fluid and Electrolytes, Infectious, ', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', '', 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '6.9');
$pdf->Cell(90, 4, 'Inflammatory and Immunologic Response, Cellular Aberrations, Acute and Chronic', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '6', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '114L', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing 2', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, 'NCM 104', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '114RLE', 0, 0);
$pdf->Cell(90, 4, 'Community Health Nursing 2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '1', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '115', 0, 0);
$pdf->Cell(90, 4, 'Care of Older Person', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CCGE', 0, 0);
$pdf->Cell(15, 4, '107', 0, 0);
$pdf->Cell(90, 4, 'Art Appreciation', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '3', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '26', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Ln(30);
$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'Third Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '116', 0, 0);
$pdf->Cell(97, 4, 'Nursing Research 2', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '2', 0, 0);
$pdf->Cell(10, 4, 'NCM 111', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '117L', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(97, 4, 'Care of Clients with Problems in Nutrition, Gastro-intestinal, Metabolism ', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', '', 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(97, 4, 'and Endocrine, Perception and Coordination', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '5', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '5', 0, 0);
$pdf->Cell(10, 4, 'NCM 112', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '117RLE', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(97, 4, 'Care of Clients with Problems in Nutrition, Gastro-intestinal, Metabolism ', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', '', 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(97, 4, 'and Endocrine, Perception and Coordination', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '118L', 0, 0);
$pdf->Cell(97, 4, 'Care of Clients with Maladaptive Patterns of Behavior', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, 'NCM 112', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '118RLE', 0, 0);
$pdf->Cell(97, 4, 'Care of Clients with Maladaptive Patterns of Behavior', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'CGEN', 0, 0);
$pdf->Cell(15, 4, '108', 0, 0);
$pdf->Cell(97, 4, 'Ethics', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '3', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

// LAST LINE PER SEM
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'RIZAL', 0, 0);
$pdf->Cell(15, 4, '100', 0, 0);
$pdf->Cell(97, 4, 'Life, Works and Writings of Rizal', 0, 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '26', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(2);

$pdf->Cell(45, 5, 'Fourth Year, First Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '119L', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(97, 4, 'Care of Clients with Life Threatening  Conditions, Acutely Ill/ Multi-Organ', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', '', 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->Cell(15, 4, '', 0, 0);
$pdf->SetFont('Arial', '', '8');
$pdf->Cell(97, 4, 'Problems, High Acuity and Emergency Situation (Acute and Chronic)', 0, 0);
$pdf->SetFont('Arial', '', '9');
$pdf->Cell(10, 4, '5', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '5', 0, 0);
$pdf->Cell(10, 4, 'NCM 112', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '120L', 0, 0);
$pdf->Cell(90, 4, 'Nursing Leadership and Management', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, '0', 0, 0);
$pdf->Cell(10, 4, '4', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '120RLE', 0, 0);
$pdf->Cell(90, 4, 'Nursing Leadership and Management', 0, 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(10, 4, '3', 'B', 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '16', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->Cell(200, 1, '', 'B', 0, 1);
$pdf->Ln(1);

$pdf->Cell(45, 5, 'Fourth Year, Second Semester', 0, 1);
$pdf->SetFont('Arial', '', '9');
// SUBJECTS
$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '121L', 0, 0);
$pdf->Cell(90, 4, 'Disaster Nursing', 0, 0);
$pdf->Cell(10, 4, '2', '', 0);
$pdf->Cell(10, 4, '0', '', 0);
$pdf->Cell(3, 4, '2', '', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '121RLE', 0, 0);
$pdf->Cell(90, 4, 'Disaster Nursing', 0, 0);
$pdf->Cell(10, 4, '0', '', 0);
$pdf->Cell(10, 4, '0', '', 0);
$pdf->Cell(3, 4, '1', '', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(5, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 'B', 0);
$pdf->Cell(15, 4, 'NCM', 0, 0);
$pdf->Cell(15, 4, '122', 0, 0);
$pdf->Cell(90, 4, 'Intensive Nursing Practicum (Hospital and Community Settings)', 0, 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(10, 4, '0', 'B', 0);
$pdf->Cell(3, 4, '8', 'B', 0);
$pdf->Cell(7, 4, '', 0, 0);
$pdf->Cell(10, 4, '', 0, 1);

$pdf->Cell(20, 5, '', 0, 0);

$pdf->SetFont('Arial', '', '10');
$pdf->Cell(102, 5, '', 0, 0);
$pdf->Cell(32, 6, 'TOTAL', 0, 0);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(10, 6, '11', 0, 1);
$pdf->Cell(180, 1, '', 0, 1);

$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(200, 1, '', 'B', 0, 1);

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', '10');
$pdf->Cell(70, 5, '', 0, 0);
$pdf->Cell(84, 6, 'TOTAL NUMBER OF UNITS', 0, 0);
$pdf->Cell(32, 6, '181', 0, 1);

$pdf->Output();