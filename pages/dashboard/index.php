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
<!-- Head -->
<?php
session_start();
include '../../includes/session.php';
// End Session 
include '../../includes/head.php';
?>
<title>
    Dashboard | SFAC - Las Piñas
</title>
</head>
<!-- End Head -->


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <img src="../../assets/img/logos/logo.png" class="navbar-brand-img h-100" alt="main_logo"
                                style="width: 40px; height: 40px;">
                        </li>
                        <li class=" text-sm text-dark mt-2 ms-2" aria-current="page">SFAC Las Piñas</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <!-- Start Container -->
                <?php if ("Registrar" == $_SESSION['role'] || "Admission" == $_SESSION['role']) { ?>
                <div class="container-fluid py-4 mb-11">
                    <!-- first row -->
                    <div class="row">
                        <!-- Enrolled students -->
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url('../../assets/img/curved-images/curved5.jpg')">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-white font-weight-bold mb-2">
                                                Enrolled Students
                                            </h6>

                                            <?php
                                                $ESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) FROM tbl_schoolyears SY WHERE remark IN ('Approved') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                                $actualCount = mysqli_fetch_array($ESCount);
                                                ?>
                                            <h3 class="text-white text-center mb-0 mt-n2" id="state1"
                                                countTo="<?php echo $actualCount[0]; ?>">
                                            </h3>
                                            <p class="text-sm mb-0 text-white">Students</p>


                                        </div>
                                    </div>
                                    <hr class="horizontal dark m-0">
                                    <div class="text-center">
                                        <a href="#" class="position-relative w-100 text-center py-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Enrolled Students -->

                        <!-- New Student -->
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url('../../assets/img/curved-images/curved5.jpg')">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-white font-weight-bold mb-2">
                                                New Students
                                            </h6>

                                            <?php
                                                $NESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) FROM tbl_schoolyears SY WHERE remark IN ('Approved') AND status IN ('New') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                                $actualCount = mysqli_fetch_array($NESCount);
                                                ?>
                                            <h3 class="text-white text-center mb-0 mt-n2" id="state2"
                                                countTo="<?php echo $actualCount[0]; ?>">
                                            </h3>
                                            <p class="text-sm mb-0 text-white">Students</p>


                                        </div>
                                    </div>
                                    <hr class="horizontal dark m-0">
                                    <div class="text-center">
                                        <a href="#" class="position-relative w-100 text-center py-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End New Students -->

                        <!-- Old students -->
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url('../../assets/img/curved-images/curved5.jpg')">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-white font-weight-bold mb-2">
                                                Old Students
                                            </h6>

                                            <?php
                                                $OESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) AS total FROM tbl_schoolyears SY WHERE remark IN ('Approved') AND status IN ('Old') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                                $actualCount = mysqli_fetch_array($OESCount);
                                                ?>
                                            <h3 class="text-white text-center mb-0 mt-n2" id="state3"
                                                countTo="<?php echo $actualCount[0]; ?>">
                                            </h3>
                                            <p class="text-sm mb-0 text-white">Students</p>


                                        </div>
                                    </div>
                                    <hr class="horizontal dark m-0">
                                    <div class="text-center">
                                        <a href="#" class="position-relative w-100 text-center py-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Old Students -->

                        <!-- Pending Enrollees -->
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url('../../assets/img/curved-images/curved5.jpg')">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-white font-weight-bold mb-2">
                                                Pending Enrollees
                                            </h6>

                                            <?php
                                                $OESCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) AS total FROM tbl_schoolyears SY WHERE remark IN ('Pending', 'Canceled') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                                $actualCount = mysqli_fetch_array($OESCount);
                                                ?>
                                            <h3 class="text-white text-center mb-0 mt-n2" id="state4"
                                                countTo="<?php echo $actualCount[0]; ?>">
                                            </h3>
                                            <p class="text-sm mb-0 text-white">Students</p>


                                        </div>
                                    </div>
                                    <hr class="horizontal dark m-0">
                                    <div class="text-center">
                                        <a href="#" class="position-relative w-100 text-center py-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Pending Enrollees -->

                    <!-- second row -->
                    <div class="row">
                        <!-- Online inquiry -->
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url('../../assets/img/curved-images/curved5.jpg')">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-white font-weight-bold mb-2">
                                                Online Inquiry
                                            </h6>

                                            <?php
                                                $orCount = mysqli_query($db, "SELECT COUNT(or_id) FROM tbl_online_registrations WHERE status IN ('Pending') ") or die($db->error);
                                                $actualCount = mysqli_fetch_array($orCount);
                                                ?>
                                            <h3 class="text-white text-center mb-0 mt-n2" id="state5"
                                                countTo="<?php echo $actualCount[0]; ?>">
                                            </h3>
                                            <p class="text-sm mb-0 text-white">Students</p>


                                        </div>
                                    </div>
                                    <hr class="horizontal dark m-0">
                                    <div class="text-center">
                                        <a href="../inquiry/list.inquiry.php"
                                            class="position-relative w-100 text-center py-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Online inquiry -->
                    </div>
                </div>
                <!-- End Container -->
                <!-- STUDENT -->
                <?php } elseif ($_SESSION['role'] == "Student") {
                ?>
                <div class="container-fluid py-4 mb-12">
                    <!-- first row -->
                    <div class="row">
                        <!--Student Courses | Enrolled students -->
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url('../../assets/img/curved-images/curved14.jpg')">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-white font-weight-bold mb-2">
                                                <?php $course = $db->query("SELECT * FROM tbl_students LEFT JOIN tbl_courses USING(course_id) WHERE stud_id = '$stud_id'") or die($db->error);
                                                    while ($row = $course->fetch_array()) {
                                                        $DCourse_abv = $row['course_abv'];
                                                        if ($row['course_id'] > 0) {
                                                            echo $row['course_abv'] . ' Students';
                                                        } else {
                                                            echo 'Students';
                                                        }
                                                    } ?>
                                            </h6>

                                            <?php
                                                $SCount = mysqli_query($db, "SELECT COUNT(SY.sy_id) FROM tbl_schoolyears SY LEFT JOIN tbl_courses C USING(course_id) WHERE remark IN ('Approved') AND course_abv IN ('$DCourse_abv') AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]'") or die($db->error);
                                                $actualCount = mysqli_fetch_array($SCount);
                                                ?>
                                            <h3 class="text-white text-center mb-0 mt-n2" id="state1"
                                                countTo="<?php echo $actualCount[0]; ?>">
                                            </h3>
                                            <p class="text-sm mb-0 text-white">Students</p>


                                        </div>
                                    </div>
                                    <hr class="horizontal dark m-0">
                                    <div class="text-center">
                                        <a href="#" class="position-relative w-100 text-center py-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Student Courses | Enrolled students -->
                        <!-- Subjects Enrolled -->
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card bg-white shadow move-on-hover">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3"
                                    style="background-image: url('../../assets/img/curved-images/curved14.jpg')">
                                    <span class="mask bg-gradient-dark opacity-6"></span>
                                    <div class="card-body position-relative z-index-2 p-1">
                                        <div class="text-center">
                                            <h6 class="mb-0 text-white font-weight-bold mb-2">
                                                Enrolled Subjects
                                            </h6>

                                            <?php
                                                $ESubCount = mysqli_query($db, "SELECT COUNT(ES.enrolled_subj_id) FROM tbl_enrolled_subjects ES WHERE stud_id IN ('$stud_id') AND acad_year = '$_SESSION[AC]' AND semester = '$_SESSION[S]'") or die($db->error);
                                                $actualCount = mysqli_fetch_array($ESubCount);
                                                ?>
                                            <h3 class="text-white text-center mb-0 mt-n2" id="state2"
                                                countTo="<?php echo $actualCount[0]; ?>">
                                            </h3>
                                            <p class="text-sm mb-0 text-white">Students</p>


                                        </div>
                                    </div>
                                    <hr class="horizontal dark m-0">
                                    <div class="text-center">
                                        <a href="#" class="position-relative w-100 text-center py-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Subjects Enrolled -->

                    </div>
                </div>
                <!-- End Container -->
                <?php } ?>
                <!-- End Container -->

                <!-- footer -->
                <?php include '../../includes/footer.php'; ?>
                <!-- End footer -->
            </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger active" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-dark w-100"
                    href="https://www.creative-tim.com/product/soft-ui-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>