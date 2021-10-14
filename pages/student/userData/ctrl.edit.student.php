<?php

include '../../../includes/conn.php';
session_start();
$stud_id = $_SESSION['stud_id'];

if (isset($_POST['submit'])) {

 // $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $stud_no      = mysqli_real_escape_string($db, $_POST['stud_no']);
 $course       = mysqli_real_escape_string($db, $_POST['course']);
 $gender       = mysqli_real_escape_string($db, $_POST['gender']);
 $lastname     = mysqli_real_escape_string($db, $_POST['lastname']);
 $firstname    = mysqli_real_escape_string($db, $_POST['firstname']);
 $middlename   = mysqli_real_escape_string($db, $_POST['middlename']);
 $address      = mysqli_real_escape_string($db, $_POST['address']);
 $birthdate    = mysqli_real_escape_string($db, $_POST['birthdate']);
 $birthplace   = mysqli_real_escape_string($db, $_POST['birthplace']);
 $age          = mysqli_real_escape_string($db, $_POST['age']);
 $religion     = mysqli_real_escape_string($db, $_POST['religion']);
 $citizenship  = mysqli_real_escape_string($db, $_POST['citizenship']);
 $civilstatus  = mysqli_real_escape_string($db, $_POST['civilstatus']);
 $contact      = mysqli_real_escape_string($db, $_POST['contact']);
 $email        = mysqli_real_escape_string($db, $_POST['email']);
 $flastname    = mysqli_real_escape_string($db, $_POST['flastname']);
 $ffirstname   = mysqli_real_escape_string($db, $_POST['ffirstname']);
 $fmiddlename  = mysqli_real_escape_string($db, $_POST['fmiddlename']);
 $fage         = mysqli_real_escape_string($db, $_POST['fage']);
 $foccupation  = mysqli_real_escape_string($db, $_POST['foccupation']);
 $mlastname    = mysqli_real_escape_string($db, $_POST['mlastname']);
 $mfirstname   = mysqli_real_escape_string($db, $_POST['mfirstname']);
 $mmiddlename  = mysqli_real_escape_string($db, $_POST['mmiddlename']);
 $mage         = mysqli_real_escape_string($db, $_POST['mage']);
 $moccupation  = mysqli_real_escape_string($db, $_POST['moccupation']);
 $familyincome = mysqli_real_escape_string($db, $_POST['familyincome']);
 $nosiblings   = mysqli_real_escape_string($db, $_POST['nosiblings']);
 $glastname    = mysqli_real_escape_string($db, $_POST['glastname']);
 $gfirstname   = mysqli_real_escape_string($db, $_POST['gfirstname']);
 $gmiddlename  = mysqli_real_escape_string($db, $_POST['gmiddlename']);
 $relationship = mysqli_real_escape_string($db, $_POST['relationship']);
 $gaddress     = mysqli_real_escape_string($db, $_POST['gaddress']);
 $elem         = mysqli_real_escape_string($db, $_POST['elem']);
 $elemSY       = mysqli_real_escape_string($db, $_POST['elemSY']);
 $elemAddress  = mysqli_real_escape_string($db, $_POST['elemAddress']);
 $hs           = mysqli_real_escape_string($db, $_POST['hs']);
 $hsSY         = mysqli_real_escape_string($db, $_POST['hsSY']);
 $hsAddress    = mysqli_real_escape_string($db, $_POST['hsAddress']);
 $lastschool   = mysqli_real_escape_string($db, $_POST['lastschool']);
 $course_year  = mysqli_real_escape_string($db, $_POST['course-year']);
 $lastSY       = mysqli_real_escape_string($db, $_POST['lastSY']);
 $lastAddress  = mysqli_real_escape_string($db, $_POST['lastAddress']);
 $username     = mysqli_real_escape_string($db, $_POST['username']);
 $password     = mysqli_real_escape_string($db, $_POST['password']);
 $hashedPwd    = password_hash($password, PASSWORD_DEFAULT);

// $query = mysqli_query($db,"INSERT INTO tbl_students (img,stud_no, course_id, gender, lastname, firstname, middlename, birthdate, birthplace, age, religion, citizenship, civilstatus, contact, email, flastname, ffirstname,fmiddlename, fage, foccupation, mlastname, mfirstname, mmiddlename, mage, moccupation, familyincome, nosiblings, glastname, gfirstname, gmiddlename, relationship, gaddress, elem, elemSY, elemAddress, hs, hsSY, hsAddress, lastschool, course_year, lastSY, lastAddress, username, password) values ('$image','$studno', '$course','$gender', '$lastname', '$firstname', '$middlename','$birthdate','$birthplace','$age','$religion','$citizenship','$civilstatus', '$contact', '$email', '$flastname', '$ffirstname', '$fmiddlename', '$fage','$foccupation', '$mlastname', '$mfirstname','$mmiddlename','$mage', '$moccupation', '$familyincome', '$nosiblings', '$glastname', '$gfirstname', '$gmiddlename', '$relationship', '$gaddress', '$elem', '$elemSY', '$elemAddress', '$hs', '$hsSY', '$hsAddress', '$lastschool', '$course_year', '$lastSY', '$lastAddress', '$username', '$hashedPwd')");
 if ('Registrar' == $_SESSION['role']) {
  $query = mysqli_query($db, "UPDATE tbl_students SET stud_no = '$stud_no', course_id = '$course', gender_id = '$gender', lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', address = '$address', birthdate = '$birthdate', birthplace = '$birthplace', age = '$age', religion = '$religion', citizenship = '$citizenship', civilstatus = '$civilstatus', contact = '$contact', email = '$email', flastname = '$flastname', ffirstname = '$ffirstname',fmiddlename = '$fmiddlename', fage = '$fage', foccupation = '$foccupation', mlastname = '$mlastname', mfirstname = '$mfirstname', mmiddlename = '$mmiddlename', mage ='$mage', moccupation = '$moccupation', familyincome = '$familyincome', nosiblings = '$nosiblings', glastname = '$glastname', gfirstname = '$gfirstname', gmiddlename = '$gmiddlename', relationship = '$relationship', gaddress = '$gaddress', elem = '$elem', elemSY = '$elemSY', elemAddress = '$elemAddress', hs = '$hs', hsSY = '$hsSY', hsAddress = '$hsAddress', lastschool = '$lastschool', course_year = '$course_year', lastSY = '$lastSY', lastAddress = '$lastAddress', username = '$username', password = '$hashedPwd' WHERE stud_id = '$stud_id' ") or die(mysqli_error($db));
  header("location: ../edit.student.php?stud_id=" . $stud_id);
 } else {
  $query = mysqli_query($db, "UPDATE tbl_students SET course_id = '$course', gender_id = '$gender', lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', address = '$address', birthdate = '$birthdate', birthplace = '$birthplace', age = '$age', religion = '$religion', citizenship = '$citizenship', civilstatus = '$civilstatus', contact = '$contact', email = '$email', flastname = '$flastname', ffirstname = '$ffirstname',fmiddlename = '$fmiddlename', fage = '$fage', foccupation = '$foccupation', mlastname = '$mlastname', mfirstname = '$mfirstname', mmiddlename = '$mmiddlename', mage ='$mage', moccupation = '$moccupation', familyincome = '$familyincome', nosiblings = '$nosiblings', glastname = '$glastname', gfirstname = '$gfirstname', gmiddlename = '$gmiddlename', relationship = '$relationship', gaddress = '$gaddress', elem = '$elem', elemSY = '$elemSY', elemAddress = '$elemAddress', hs = '$hs', hsSY = '$hsSY', hsAddress = '$hsAddress', lastschool = '$lastschool', course_year = '$course_year', lastSY = '$lastSY', lastAddress = '$lastAddress', username = '$username', password = '$hashedPwd' WHERE stud_id = '$stud_id' ") or die(mysqli_error($db));
 }
}
// if ($_SESSION['userid'] != $_GET['stud_id']) {
//   header("location: ../404/404.php");
// }

if (isset($_POST['update'])) {
 $stud_id = $_GET['stud_id'];
 $image   = addslashes(file_get_contents($_FILES['image']['tmp_name']));

 $query1 = mysqli_query($db, "UPDATE tbl_students SET img = '$image' WHERE stud_id = '$stud_id' ") or die(mysqli_error($db));
}
