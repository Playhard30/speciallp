<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Add Course | SFAC - Las Piñas
</title>
</head>

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
                    <h6 class="font-weight-bolder mb-0">Add Course</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h3>Enter details for the course you want to add</h3>
                                <h5 class="text-secondary font-weight-normal">Please fill out the fields</h5>
                            </div>
                            <div class="multisteps-form mb-5">
                                <!--progress bar-->
                                <div class="row">
                                    <div class="col-12 col-lg-8 mx-auto my-5">
                                        <div class="multisteps-form__progress">

                                        </div>
                                    </div>
                                </div>
                                <!--form panels-->
                                <div class="row">
                                    <div class="col-12 col-lg-8 m-auto">
                                        <form class="multisteps-form__form mb-8" method="POST"
                                            enctype="multipart/form-data" action="userData/ctrl.add.course.php">
                                            <!--single form panel-->
                                            <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active"
                                                data-animation="FadeIn">
                                                <h5 class="font-weight-bolder mb-0">Add Course</h5>
                                                <p class="mb-0 text-sm">Course Details</p>
                                                <div class="multisteps-form__content">

                                                    <div class="row mt-3 justify-content-center">
                                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                            <label>Course Name</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Course Name" name="course" />
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <label>Course Abbrev.</label>
                                                            <input class="multisteps-form__input form-control"
                                                                type="text" placeholder="Course Abbrevation"
                                                                name="course_abv" />
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3 justify-content-center">
                                                        <div class="col-12 col-sm-6 mt-3 mt-sm-0 text-center">
                                                            <label>Department</label>
                                                            <select class="form-control" name="department"
                                                                id="department">
                                                                <option value="" disabled selected>Select Department
                                                                </option>
                                                                <?php $getDept = mysqli_query($db, "SELECT * FROM tbl_departments");
                                                                while ($row = mysqli_fetch_array($getDept)) {
                                                                ?>
                                                                <option value="<?php echo $row['department_id']; ?>">
                                                                    <?php echo $row['department_name'];
                                                                } ?></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="button-row d-flex mt-7">
                                                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit"
                                                            title="Add Course" name="submit">Add
                                                            Course</button>
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