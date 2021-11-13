<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<?php
include '../../includes/head.php';
require '../../includes/conn.php';
session_start();
?>

<title>
        Online Inquiry | Saint Francis of Assisi College - Las Piñas
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../login/sign-in.php">
                Sain Francis of Assisi College | Las Pinas Campus
            </a>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                <ul class="navbar-nav d-lg-block d-none">
                    <li class="nav-item">
                        <a href="../login/sign-in.php" class="btn btn-sm  bg-gradient-primary  btn-round mb-0 me-1" onclick="smoothToPricing('pricing-soft-ui')">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../../assets/img/sfaclaspi.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Online Registration</h1>
                        <p class="text-lead text-white">Please fill out the form.</p>
                    </div>
                </div>
                <div class="container-fluid py-4">
                    <div class="col-lg-11 mt-lg-0 mt-4 mx-auto">
                        <form method="POST" enctype="multipart/form-data" action="inquiryData/ctrl.add.inquiry.php" class="card mt-4" id="basic-info">
                            <div class="card-header text-center">
                                <h5>Personal Data</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Course</label>
                                        <select class="form-control" required name="courses" id="courses">
                                            <option disabled selected>Select Course</option>
                                            <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_courses");
                                            while ($row = mysqli_fetch_array($getCourse)) {
                                            ?>
                                                <option value="<?php echo $row['course_id']; ?>">
                                                <?php echo $row['course'];
                                            } ?>
                                                </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Year</label>
                                        <select class="form-control" required name="years" id="year_lvl">
                                            <option disabled selected>Select Year</option>
                                            <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                            while ($row = mysqli_fetch_array($getYear)) {
                                            ?>
                                                <option value="<?php echo $row['year_id']; ?>">
                                                <?php echo $row['year_level'];
                                            } ?>
                                                </option>
                                        </select>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Last Name</label>
                                        <div class="input-group">
                                            <input id="lastName" name="lastname" class="form-control" type="text" placeholder="Lastname" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">First Name</label>
                                        <div class="input-group">
                                            <input id="firstName" name="firstname" class="form-control" type="text" placeholder="Firstname" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Middlename</label>
                                        <div class="input-group">
                                            <input id="middlename" name="middlename" class="form-control" type="text">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-sm-12">
                                        <label class="form-label mt-4">Address</label>
                                        <div class="input-group">
                                            <input id="address" name="address" class="form-control" type="address" placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot #, Barangay, City/Municipality, Province" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">Gender</label>
                                        <select class="form-control" required name="gender" id="gender">
                                            <option disabled selected>Select Gender</option>
                                            <?php $getgender = mysqli_query($db, "SELECT * FROM tbl_genders");
                                            while ($row = mysqli_fetch_array($getgender)) {
                                            ?>
                                                <option value="<?php echo $row['gender_id']; ?>">
                                                <?php echo $row['gender'];
                                            } ?>
                                                </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="form-label mt-4">Age</label>
                                        <div class="input-group">
                                            <input id="age" name="age" class="form-control" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label mt-4">Date of Birth</label>
                                        <div class="input-group">
                                            <input id="birthdate" name="birthdate" class="form-control" type="date" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Place of Birth</label>
                                        <div class="input-group">
                                            <input id="birthplace" name="birthplace" class="form-control" type="text" placeholder="City/Municipality, Province" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Religion</label>
                                        <div class="input-group">
                                            <input id="religion" name="religion" class="form-control" type="text" placeholder="Religion" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Citizenship</label>
                                        <div class="input-group">
                                            <input id="citizenship" name="citizenship" class="form-control" type="text" placeholder="Citizenship" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Civil Status</label>
                                        <div class="input-group">
                                            <input id="civilstatus" name="civilstatus" class="form-control" type="text" placeholder="civilstatus">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Contact Number</label>
                                        <div class="input-group">
                                            <input id="contact" name="contact" class="form-control" type="text" placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label class="form-label mt-4">Email Address</label>
                                        <div class="input-group">
                                            <input id="email" name="email" class="form-control" type="text" placeholder="example@gmail.com" required>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <hr class=" collapse-horizontal mb-0">

                            <div class="card-header text-center">
                                <h5>Family Background</h5>
                            </div>

                                            <div class="card-body pt-0">

                                                <h5 class="font-weight-bold">Father</h5>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Last Name</label>
                                                        <div class="input-group">
                                                            <input id="flastname" name="flastname" class="form-control" type="text" placeholder="Lastname">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">First Name</label>
                                                        <div class="input-group">
                                                            <input id="ffirstname" name="ffirstname" class="form-control" type="text" placeholder="Firstname">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Middle Name</label>
                                                        <div class="input-group">
                                                            <input id="fmiddlename" name="fmiddlename" class="form-control" type="text" placeholder="Middlename">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pt-2">
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Age</label>
                                                        <div class="input-group">
                                                            <input id="fage" name="fage" class="form-control" type="text" placeholder="Age">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <label class="form-label mt-4">Occupation</label>
                                                        <div class="input-group">
                                                            <input id="foccupation" name="foccupation" class="form-control" type="text" placeholder="Father Occupation">
                                                        </div>
                                                    </div>

                                                </div>


                                                <h5 class="mt-4 font-weight-bold">Mother</h5>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Last Name</label>
                                                        <div class="input-group">
                                                            <input id="mlastname" name="mlastname" class="form-control" type="text" placeholder="Lastname">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">First Name</label>
                                                        <div class="input-group">
                                                            <input id="mfirstname" name="mfirstname" class="form-control" type="text" placeholder="Firstname">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Middle Name</label>
                                                        <div class="input-group">
                                                            <input id="mmiddlename" name="mmiddlename" class="form-control" type="text" placeholder="Middlename">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Age</label>
                                                        <div class="input-group">
                                                            <input id="mage" name="mage" class="form-control" type="text" placeholder="Age">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <label class="form-label mt-4">Occupation</label>
                                                        <div class="input-group">
                                                            <input id="moccupation" name="moccupation" class="form-control" type="text" placeholder="Mother Occupation">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <label class="form-label mt-4">Monthly Family Income</label>
                                                        <div class="input-group">
                                                            <input id="familyincome" name="familyincome" class="form-control" placeholder="Income" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="form-label mt-4">No. of Siblings</label>
                                                        <div class="input-group">
                                                            <input id="nosiblings" name="nosiblings" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>


                                                <hr class="collapse-horizontal">

                                                <h5 class="mt-4">Guardian</h5>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Last Name</label>
                                                        <div class="input-group">
                                                            <input id="glastname" name="glastname" class="form-control" type="text" placeholder="Lastname">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">First Name</label>
                                                        <div class="input-group">
                                                            <input id="gfirstname" name="gfirstname" class="form-control" type="text" placeholder="Firstname">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Middle Name</label>
                                                        <div class="input-group">
                                                            <input id="gmiddlename" name="gmiddlename" class="form-control" type="text" placeholder="Middlename">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">Relationship</label>
                                                        <div class="input-group">
                                                            <input id="relationship" name="relationship" class="form-control" placeholder="Relationship" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <label class="form-label mt-4">Address</label>
                                                        <div class="input-group">
                                                            <input id="gaddress" name="gaddress" class="form-control" type="text" placeholder="House/Unit/Flr #, Bldg Name, Blk or Lot #, Barangay, City/Municipality, Province">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="collapse-horizontal mb-0">
                                            <div class="card-header text-center">
                                                <h5>Educational Background</h5>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <label class="form-label mt-4">Elementary Graduated From</label>
                                                        <div class="input-group">
                                                            <input id="elem" name="elem" class="form-control" type="text" placeholder="Name of School">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">School Year</label>
                                                        <div class="input-group">
                                                            <input id="elemSY" name="elemSY" class="form-control" type="text" placeholder="0000-0000">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label class="form-label mt-4">Address of School</label>
                                                        <div class="input-group">
                                                            <input id="elemAddress" name="elemAddress" class="form-control" type="text" placeholder="Address of School">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <label class="form-label mt-4">High School Graduated From</label>
                                                        <div class="input-group">
                                                            <input id="hs" name="hs" class="form-control" type="text" placeholder="Name of School">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="form-label mt-4">School Year</label>
                                                        <div class="input-group">
                                                            <input id="hsSY" name="hsSY" class="form-control" type="text" placeholder="0000-0000">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row pt-2">
                                                    <div class="col-sm-12">
                                                        <label class="form-label mt-4">Address of School</label>
                                                        <div class="input-group">
                                                            <input id="hsAddress" name="hsAddress" class="form-control" type="text" placeholder="Address of School">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="form-label mt-4">Last School Attended</label>
                                                        <div class="input-group">
                                                            <input id="lastschool" name="lastschool" class="form-control" type="text" placeholder="Last School Attended">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="form-label mt-4">Course & Year</label>
                                                        <div class="input-group">
                                                            <input id="course-year" name="course-year" class="form-control" type="text" placeholder="Course & Year">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="form-label mt-4">School Year</label>
                                                        <div class="input-group">
                                                            <input id="lastSY" name="lastSY" class="form-control" type="text" placeholder="0000-0000">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label class="form-label mt-4">Address of School</label>
                                                        <div class="input-group">
                                                            <input id="lastAddress" name="lastAddress" class="form-control" type="text" placeholder="Address of School">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body pt-0">

                                                <div class="form-check form-check-info text-left">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        I agree that the data collected from this online inquiry shall be subjected to the school's <a href="dataPrivacy/SFAC-Data-Privacy.pdf" class="text-dark font-weight-bolder">Data Privacy Policy.</a>
                                                    </label>
                                                </div>
                                                

                                                <div class="col-12 button-row d-flex mt-4">
                                                    <button type="submit" name="submit" class="btn bg-gradient-primary ms-auto">Register</button>
                                                </div>
                                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <?php include '../../includes/footer.php'; ?>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>