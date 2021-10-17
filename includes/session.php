<?php
if (!empty($_SESSION['role'])) {
 if ("Super Administrator" == $_SESSION['role']) {
  $sa_id = $_SESSION['userid'];
  if (false == $sa_id) {
   header("location: ../login/sign-in.php");
   exit();
  }
 } elseif ("Dean" == $_SESSION['role']) {
  $dean_id = $_SESSION['userid'];
  if (false == $dean_id) {
   header("location: ../login/sign-in.php");
   exit();
  }
 } elseif ("Admission" == $_SESSION['role']) {
  $admission_id = $_SESSION['userid'];
  if (false == $admission_id) {
   header("location: ../login/sign-in.php");
   exit();
  }
 } elseif ("Accounting" == $_SESSION['role']) {
  $account_id = $_SESSION['userid'];
  if (false == $account_id) {
   header("location: ../login/sign-in.php");
   exit();
  }
 } elseif ("Registrar" == $_SESSION['role']) {
  $admin_id = $_SESSION['userid'];
  if (false == $admin_id) {
   header("location: ../login/sign-in.php");
   exit();
  }
 } elseif ("Student" == $_SESSION['role']) {
  $stud_id = $_SESSION['userid'];
  if (false == $stud_id) {
   header("location: ../login/sign-in.php");
   exit();
  }
   }
} else {
 header("location: ../login/sign-in.php");
 exit();
}