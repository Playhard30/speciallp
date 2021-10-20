<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';

if ('Registrar' == $_SESSION['role']) {

 $stud_id = $_GET['stud_id'];
}
$_SESSION['stud_id'] = $stud_id;

?>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <img src="../../assets/img/logos/logo.png" class="navbar-brand-img h-100" alt="main_logo"
                                style="width: 40px; height: 40px;">
                        </li>
                        <li class=" text-sm text-dark mt-2 ms-2" aria-current="page">SFAC Las Piñas</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Edit Student Information</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->


                <div class="container-fluid py-4">
                    <div class="col-lg-11 mt-lg-0 mt-4 mx-auto">
                        <!-- Card Profile -->
                        <div class="card card-body" id="profile">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-sm-auto col-4">
                                    <div class="avatar avatar-xl position-relative">
                                        <?php
$getStudData = mysqli_query($db, "SELECT *, CONCAT(stud.firstname, ' ', stud.middlename, ' ', stud.lastname) AS fullname
                                        FROM tbl_students AS stud
                                        WHERE stud_id = '$stud_id'");
while ($row = mysqli_fetch_array($getStudData)) {
 if (!empty($row['img'])) {
  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="bruce"
                                                class="border-radius-lg shadow-sm" style="height: 80px; width: 80px;">';
 } else {
  echo '<img src="../../assets/img/illustrations/user_prof.jpg" alt="bruce"
                                            class="border-radius-lg shadow-sm">';
 }

 ?>

                                    </div>
                                </div>
                                <div class="col-sm-auto col-8 my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1 font-weight-bolder">
                                            <?php echo $row['fullname']; ?>
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            Student
                                        </p>
                                    </div>
                                </div>
                                <form method="POST" enctype="multipart/form-data"
                                    action="userData/ctrl.edit.student.php"
                                    class="col-sm-auto ms-lg-auto mt-sm-0 ms-sm-0 mt-3 justify-content-sm-center">

                                    <button class="btn btn-outline-primary me-2 mb-0"><input type="file"
                                            name="image"></button>
                                    <button type="submit" name="saveImg"
                                        class="btn bg-gradient-primary mb-0">Save</button>

                                </form>
                            </div>
                        </div>
                        <!-- Card Basic Info -->
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.student.php"
                            class="card mt-4" id="basic-info">
                            <div class="card-header text-center">
                                <h5>Personal Data</h5>
                            </div>


                            <div class="card-body pt-0">
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Student Number</label>
                                        <div class="input-group">
                                            <?php if ("Registrar" == $_SESSION['role']) {
  echo ' <input name="stud_no" type="text" class="form-control" value="' . $row['stud_no'] . '">';
 } else {
  echo ' <input name="stud_no" type="text" readonly class="form-control" value="' . $row['stud_no'] . '">';
 } ?>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Department</label>
                                        <select class="form-control" required name="courses" id="courses">
                                            <?php $getCourses = mysqli_query($db, "SELECT * FROM tbl_courses WHERE course_id IN ('$row[course_id]')");
 while ($row2 = mysqli_fetch_array($getCourses)) {
  ?>
                                            <option selected value="<?php echo $row2['course_id']; ?>">
                                                <?php echo $row2['course'];
 } ?>
                                            </option>

                                            <?php $getCourses = mysqli_query($db, "SELECT * FROM tbl_courses WHERE course_id NOT IN ('$row[course_id]')");
 while ($row1 = mysqli_fetch_array($getCourses)) {
  ?>
                                            <option value="<?php echo $row1['course_id']; ?>">
                                                <?php echo $row1['course'];
 } ?></option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Gender</label>
                                        <select class="form-control" required name="gender" id="gender">
                                            <?php $getGenders = mysqli_query($db, "SELECT * FROM tbl_genders WHERE gender_id IN ('$row[gender_id]')");
 while ($row2 = mysqli_fetch_array($getGenders)) {
  ?>
                                            <option selected value="<?php echo $row2['gender_id']; ?>">
                                                <?php echo $row2['gender'];
 } ?>
                                            </option>

                                            <?php $getGenders = mysqli_query($db, "SELECT * FROM tbl_genders WHERE gender_id NOT IN ('$row[gender_id]')");
 while ($row1 = mysqli_fetch_array($getGenders)) {
  ?>
                                            <option value="<?php echo $row1['gender_id']; ?>">
                                                <?php echo $row1['gender'];
 } ?></option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label">Last Name</label>
                                        <div class="input-group">
                                            <input id="lastName" name="lastname" class="form-control" type="text"
                                                placeholder="Lastname" value="<?php echo $row['lastname'];
 ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label">First Name</label>
                                        <div class="input-group">
                                            <input id="firstName" name="firstname" class="form-control" type="text"
                                                placeholder="Firstname" value="<?php echo $row['firstname'];
 ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label">Middlename</label>
                                        <div class="input-group">
                                            <input id="middlename" name="middlename" class="form-control" type="text"
                                                placeholder="Middlename" value="<?php echo $row['middlename']; ?>">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label mt-4">Address</label>
                                        <div class="input-group">
                                            <input id="address" name="address" class="form-control" type="address" value="<?php echo $row['address']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Date of Birth</label>
                                        <div class="input-group">
                                            <input id="birthdate" name="birthdate" class="form-control" type="text" value="<?php echo $row['birthdate']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Place of Birth</label>
                                        <div class="input-group">
                                            <input id="birthplace" name="birthplace" class="form-control" type="text" value="<?php echo $row['birthplace']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="age" name="age" class="form-control" type="text" value="<?php echo $row['age']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Religion</label>
                                        <div class="input-group">
                                            <input id="religion" name="religion" class="form-control" type="text" value="<?php echo $row['religion']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Citizenship</label>
                                        <div class="input-group">
                                            <input id="citizenship" name="citizenship" class="form-control" type="text" value="<?php echo $row['citizenship']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Civil Status</label>
                                        <div class="input-group">
                                            <input id="civilstatus" name="civilstatus" class="form-control" type="text" value="<?php echo $row['civilstatus']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Contact Number</label>
                                        <div class="input-group">
                                            <input id="contact" name="contact" class="form-control" type="text" value="<?php echo $row['contact']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Email Address</label>
                                        <div class="input-group">
                                            <input id="email" name="email" class="form-control" type="text" value="<?php echo $row['email']; ?>">
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="card-header text-center">
                                <h5>Family Background</h5>
                            </div>

                                <div class="card-body pt-0">

                                     <h5>Father</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="flastname" name="flastname" class="form-control" type="text" value="<?php echo $row['flastname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="ffirstname" name="ffirstname" class="form-control" type="text" value="<?php echo $row['ffirstname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="fmiddlename" name="fmiddlename" class="form-control" type="text" value="<?php echo $row['fmiddlename']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="fage" name="fage" class="form-control" type="text" value="<?php echo $row['fage']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Occupation</label>
                                        <div class="input-group">
                                            <input id="foccupation" name="foccupation" class="form-control" type="text" value="<?php echo $row['foccupation']; ?>">
                                        </div>
                                    </div>

                                </div>


                                <h5 class="mt-4">Mother</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="mlastname" name="mlastname" class="form-control" type="text" value="<?php echo $row['mlastname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="mfirstname" name="mfirstname" class="form-control" type="text" value="<?php echo $row['mfirstname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="mmiddlename" name="mmiddlename" class="form-control" type="text" value="<?php echo $row['mmiddlename']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="mage" name="mage" class="form-control" type="text" value="<?php echo $row['mage']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Occupation</label>
                                        <div class="input-group">
                                            <input id="moccupation" name="moccupation" class="form-control" type="text" value="<?php echo $row['moccupation']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Monthly Family Income</label>
                                        <div class="input-group">
                                            <input id="familyincome" name="familyincome" class="form-control" type="text" value="<?php echo $row['familyincome']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">No. of Siblings</label>
                                        <div class="input-group">
                                            <input id="nosiblings" name="nosiblings" class="form-control" type="text" value="<?php echo $row['nosiblings']; ?>">
                                        </div>
                                    </div>

                                </div>

                                <h5 class="mt-4">Guardian</h5>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="glastname" name="glastname" class="form-control" type="text" value="<?php echo $row['glastname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="gfirstname" name="gfirstname" class="form-control" type="text" value="<?php echo $row['gfirstname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middle Name</label>
                                        <div class="input-group">
                                            <input id="gmiddlename" name="gmiddlename" class="form-control" type="text" value="<?php echo $row['gmiddlename']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Relationship</label>
                                        <div class="input-group">
                                            <input id="relationship" name="relationship" class="form-control" type="text" value="<?php echo $row['relationship']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Address</label>
                                        <div class="input-group">
                                            <input id="gaddress" name="gaddress" class="form-control" type="text" value="<?php echo $row['gaddress']; ?>">
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="card-header text-center">
                                <h5>Educational Background</h5>
                            </div>

                                <div class="card-body pt-0">

                                <div class="row">
                                    <div class="row pt-2">
                                        <div class="col-sm-8">
                                            <label class="form-label mt-4">Elementary Graduated From</label>
                                            <div class="input-group">
                                                <input id="elem" name="elem" class="form-control" type="text" value="<?php echo $row['elem']; ?>">
                                            </div>
                                        </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="elemSY" name="elemSY" class="form-control" type="text" value="<?php echo $row['elemSY']; ?>">
                                        </div>
                                    </div>

                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-sm-12">
                                         <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="elemAddress" name="elemAddress" class="form-control" type="text" value="<?php echo $row['elemAddress']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="row pt-2">
                                        <div class="col-sm-8">
                                            <label class="form-label mt-4">High School Graduated From</label>
                                            <div class="input-group">
                                                <input id="hs" name="hs" class="form-control" type="text" value="<?php echo $row['hs']; ?>">
                                            </div>
                                        </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="hsSY" name="hsSY" class="form-control" type="text" value="<?php echo $row['hsSY']; ?>">
                                        </div>
                                    </div>

                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-sm-12">
                                         <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="hsAddress" name="hsAddress" class="form-control" type="text" value="<?php echo $row['hsAddress']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="row pt-2">
                                        <div class="col-sm-6">
                                            <label class="form-label mt-4">Last School Attended</label>
                                            <div class="input-group">
                                                <input id="lastschool" name="lastschool" class="form-control" type="text" value="<?php echo $row['lastschool']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="form-label mt-4">Course & Year</label>
                                            <div class="input-group">
                                                <input id="course-year" name="course-year" class="form-control" type="text" value="<?php echo $row['course_year']; ?>">
                                            </div>
                                        </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">School Year</label>
                                        <div class="input-group">
                                            <input id="lastSY" name="lastSY" class="form-control" type="text" value="<?php echo $row['lastSY']; ?>">
                                        </div>
                                    </div>

                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-sm-12">
                                         <label class="form-label mt-4">Address of School</label>
                                        <div class="input-group">
                                            <input id="lastAddress" name="lastAddress" class="form-control" type="text" value="<?php echo $row['lastAddress']; ?>">
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="card-header text-center">
                                <h5>Account Details</h5>
                            </div>


                                <div class="row">
                                    <div class="row pt-2">
                                        <div class="col-sm-6">
                                            <label class="form-label mt-4">Username</label>
                                            <div class="input-group">
                                                <input id="username" name="username" class="form-control" type="text" value="<?php echo $row['username']; ?>">
                                            </div>
                                        </div>
                                    <div class="col-sm-6">
                                        <label class="form-label mt-4">Password</label>
                                        <div class="input-group">
                                            <input id="password" name="password" class="form-control" type="password">
                                        </div>
                                    </div>

                                </div>

                                </div>
                                    <div class="col-12 button-row d-flex mt-4">
                                    <button type="submit" name="submit"
                                        class="btn bg-gradient-primary ms-auto">Update</button>
                                    </div>
                                </div>


                            </div>
                            <?php } ?>
                        </form>
                     </div>
                        <?php include '../../includes/footer.php'; ?>
                        <!-- End footer -->
                    </div>

    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html> class class="card-header text"