<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
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
                    <h6 class="font-weight-bolder mb-0">Add New Subject</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h3>Enter details for the subject you want to add</h3>
                                <h5 class="text-secondary font-weight-normal">Please fill out the fields</h5>
                            </div>
                            <div class="multisteps-form mb-5">
                                <!--progress bar-->
                                <div class="row">
                                    <div class="col-12 col-lg-8 mx-auto my-5">
                                        <div class="multisteps-form__progress">
                                            <button class="multisteps-form__progress-btn js-active" type="button"
                                                title="User Info">
                                                <span>Subject Info</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--form panels-->
                                <div class="row">
                                    <div class="col-12 col-lg-8 m-auto">
                                        <form class="multisteps-form__form mb-8" method="POST"
                                            enctype="multipart/form-data" action="userData/ctrl.add.subject.php">
                                            <!--single form panel-->
                                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                                data-animation="FadeIn">
                                                <h5 class="font-weight-bolder mb-0">Add Subject</h5>
                                                <p class="mb-0 text-sm">Subject Details</p>
                                                <div class="multisteps-form__content">

                                                    <div class="row mt-3 justify-content-center">
                                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                            <label>Subject Code</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Subject Code"
                                                                name="subj_code" />
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <label>Subject Description</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Subject Description"
                                                                name="subj_desc" />
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3 justify-content-center">
                                                        <div class="col-12 col-sm-3 mt-3 mt-sm-0">
                                                            <label>Lecture Units</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Enter no. of units" name="unit_lec" />
                                                        </div>
                                                        <div class="col-12 col-sm-3">
                                                            <label>Laboratory Units</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Enter no. of units" name="unit_lab" />
                                                        </div>
                                                        <div class="col-12 col-sm-3">
                                                            <label>Total Units</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Enter no. of units" name="unit_total" />
                                                        </div>
                                                        <div class="col-12 col-sm-3">
                                                            <label>Pre Requisite</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Enter pre requisite" name="prereq" />
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3 justify-content-center">
                                                        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                                                            <label>Course</label>
                                                            <select class="form-control" name="course"
                                                                id="course">
                                                                <option value="" disabled selected>Select Course
                                                                </option>
                                                                <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_courses");
                                                                while ($row = mysqli_fetch_array($getCourse)) {
                                                                ?>
                                                                <option value="<?php echo $row['course_id']; ?>">
                                                                    <?php echo $row['course'];
                                                                } ?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <label>Year Level</label>
                                                            <select class="form-control" name="year"
                                                                id="year">
                                                                <option value="" disabled selected>Select Year Level
                                                                </option>
                                                                <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                                                while ($row = mysqli_fetch_array($getYear)) {
                                                                ?>
                                                                <option value="<?php echo $row['year_id']; ?>">
                                                                    <?php echo $row['year_level'];
                                                                } ?></option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12 col-sm-4">
                                                            <label>Semester</label>
                                                            <select class="form-control" name="semester"
                                                                id="semester">
                                                                <option value="" disabled selected>Select Semester
                                                                </option>
                                                                <?php $getSem = mysqli_query($db, "SELECT * FROM tbl_semesters");
                                                                while ($row = mysqli_fetch_array($getSem)) {
                                                                ?>
                                                                <option value="<?php echo $row['sem_id']; ?>">
                                                                    <?php echo $row['semester'];
                                                                } ?></option>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>

                                                        
                                               
                                                    <div class="button-row d-flex mt-7">
                                                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit_new"
                                                            title="Send" name="submit">Add
                                                            Subject</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--single form panel-->
                                            <!--single form panel-->
                                            <!-- <div class="card multisteps-form__panel p-3 border-radius-xl bg-white"
                                                data-animation="FadeIn">
                                                <h5 class="font-weight-bolder">Socials</h5>
                                                <div class="multisteps-form__content">
                                                    <div class="row mt-3">
                                                        <div class="col-12">
                                                            <label>Twitter Handle</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="@soft" />
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <label>Facebook Account</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="https://..." />
                                                        </div>
                                                        <div class="col-12 mt-3">
                                                            <label>Instagram Account</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="https://..." />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="button-row d-flex mt-4 col-12">
                                                            <button class="btn bg-gradient-light mb-0 js-btn-prev"
                                                                type="button" title="Prev">Prev</button>
                                                            <button
                                                                class="btn bg-gradient-dark ms-auto mb-0 js-btn-next"
                                                                type="button" title="Next">Next</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!--single form panel-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include '../../includes/footer.php'; ?>
                    <!-- End footer -->
                </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>