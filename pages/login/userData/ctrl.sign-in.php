<?php
require '../../../includes/conn.php';
session_start();

if (isset($_POST['signin'])) {

 $username = mysqli_real_escape_string($db, $_POST['username']);
 $password = mysqli_real_escape_string($db, $_POST['password']);

 $super_admin = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE username = '$username'");
 $numrow      = mysqli_num_rows($super_admin);

 $dean    = mysqli_query($db, "SELECT * FROM tbl_deans WHERE username = '$username'");
 $numrow1 = mysqli_num_rows($dean);

 $admission = mysqli_query($db, "SELECT * FROM tbl_admissions WHERE username = '$username'");
 $numrow2   = mysqli_num_rows($admission);

 $accounting = mysqli_query($db, "SELECT * FROM tbl_accounting WHERE username = '$username'");
 $numrow3    = mysqli_num_rows($accounting);

 $admin   = mysqli_query($db, "SELECT * FROM tbl_admins WHERE username = '$username'");
 $numrow4 = mysqli_num_rows($admin);

 $student = mysqli_query($db, "SELECT * FROM tbl_students WHERE username = '$username'");
 $numrow5 = mysqli_num_rows($student);

 $president = mysqli_query($db, "SELECT * FROM tbl_presidents WHERE username = '$username'");
 $numrow6 = mysqli_num_rows($president);

 if ($numrow > 0) {
  while ($row = mysqli_fetch_array($super_admin)) {
   $hashedPwdCheck = password_verify($password, $row['password']);
   if (false == $hashedPwdCheck) {
    header("location: ../sign-in.php?sessionP");
    exit();
   } elseif (true == $hashedPwdCheck) {
    $_SESSION['role']   = "Super Administrator";
    $_SESSION['userid'] = $row['sa_id'];
    $_SESSION['name']   = $row['name'];
   }
   header("location: ../../dashboard/index.php");
  }
 } elseif ($numrow1 > 0) {
  while ($row = mysqli_fetch_array($dean)) {
   $hashedPwdCheck = password_verify($password, $row['password']);
   if (false == $hashedPwdCheck) {
    header("location: ../sign-in.php?sessionP");
    exit();
   } elseif (true == $hashedPwdCheck) {
    $_SESSION['role']   = "Dean";
    $_SESSION['userid'] = $row['dean_id'];
    $_SESSION['name']   = $row['dean_lastname'] . ", " . $row['dean_firstname'];
   }
   header("location: ../../dashboard/index.php");
  }
 } elseif ($numrow2 > 0) {
  while ($row = mysqli_fetch_array($admission)) {
   $hashedPwdCheck = password_verify($password, $row['password']);
   if (false == $hashedPwdCheck) {
    header("location: ../sign-in.php?sessionP");
    exit();
   } elseif (true == $hashedPwdCheck) {
    $_SESSION['role']   = "Admission";
    $_SESSION['userid'] = $row['admission_id'];
    $_SESSION['name']   = $row['admission_lastname'] . ", " . $row['admission_firstname'];
   }
   header("location: ../../dashboard/index.php");
  }
 } elseif ($numrow3 > 0) {
  while ($row = mysqli_fetch_array($accounting)) {
   $hashedPwdCheck = password_verify($password, $row['password']);
   if (false == $hashedPwdCheck) {
    header("location: ../sign-in.php?sessionP");
    exit();
   } elseif (true == $hashedPwdCheck) {
    $_SESSION['role']   = "Accounting";
    $_SESSION['userid'] = $row['account_id'];
   }
   header("location: ../../dashboard/index.php");
  }
 } elseif ($numrow4 > 0) {
  while ($row = mysqli_fetch_array($admin)) {
   $hashedPwdCheck = password_verify($password, $row['password']);
   if (false == $hashedPwdCheck) {
    header("location: ../sign-in.php?sessionP");
    exit();
   } elseif (true == $hashedPwdCheck) {
    $_SESSION['role']   = "Registrar";
    $_SESSION['userid'] = $row['admin_id'];
    $_SESSION['name']   = $row['admin_lastname'] . ", " . $row['admin_firstname'];
   }
   header("location: ../../dashboard/index.php");
  }
 } elseif ($numrow5 > 0) {
  while ($row = mysqli_fetch_array($student)) {
   $hashedPwdCheck = password_verify($password, $row['password']);
   if (false == $hashedPwdCheck) {
    header("location: ../sign-in.php?sessionP");
    exit();
   } elseif (true == $hashedPwdCheck) {
    $_SESSION['role']   = "Student";
    $_SESSION['userid'] = $row['stud_id'];
    $_SESSION['name']   = $row['lastname'] . ", " . $row['firstname'];
   }
   header("location: ../../dashboard/index.php");
  }
} elseif ($numrow6 > 0) {
  while ($row = mysqli_fetch_array($president)) {
   $hashedPwdCheck = password_verify($password, $row['password']);
   if (false == $hashedPwdCheck) {
    header("location: ../sign-in.php?sessionP");
    exit();
   } elseif (true == $hashedPwdCheck) {
    $_SESSION['role']   = "President";
    $_SESSION['userid'] = $row['pres_id'];
    $_SESSION['name']   = $row['lastname'] . ", " . $row['firstname'];
   }
   header("location: ../../dashboard/index.php");
  }
 } else {
  header("location: ../sign-in.php?sessionUP");
  exit();
 }
}
