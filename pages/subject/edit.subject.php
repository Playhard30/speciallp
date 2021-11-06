<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

$subj_id = $_GET['subj_id'];
$_SESSION['subj_id'] = $subj_id;
?>
<title>
    Edit Subjects | SFAC - Las Piñas
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
                    <h6 class="font-weight-bolder mb-0">Edit Subject</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row mb-10">
                        <div class="col-lg-9 col-12 mx-auto">
                            <div class="card card-body mt-4 shadow-sm">
                                <h5 class="font-weight-bolder mb-0">Edit Subject</h5>
                                <p class="text-sm mb-0">Subject Details</p>
                                <hr class="horizontal dark my-3">
                                <form method="POST" enctype="multipart/form-data"
                                    action="userData/ctrl.edit.subject.php">
                                    <?php
                                        $editSubject = mysqli_query($db, "SELECT * FROM tbl_subjects_new
                                        LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id
                                        LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_subjects_new.year_id
                                        LEFT JOIN tbl_semesters ON tbl_semesters.sem_id = tbl_subjects_new.sem_id
                                        WHERE subj_id = '$subj_id'");

                                        while ($row1 = mysqli_fetch_array($editSubject)) {

                                                        
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <label>Subject Code</label>
                                            <input class="form-control" type="text" placeholder="Subject Code"
                                                name="subj_code" value="<?php echo $row1['subj_code']; ?>"/>
                                        </div>
                                        <div class="col-sm-7">
                                            <label>Subject Description</label>
                                            <input class="form-control" type="text" placeholder="Subject Description"
                                                name="subj_desc" value="<?php echo $row1['subj_desc']; ?>"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="mt-3">Lecture Units</label>
                                            <input class="form-control" type="text" placeholder="Enter no. of units"
                                                name="unit_lec" value="<?php echo $row1['unit_lec']; ?>"/>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="mt-3">Laboratory Units</label>
                                            <input class="form-control" type="text" placeholder="Enter no. of units"
                                                name="unit_lab" value="<?php echo $row1['unit_lab']; ?>"/>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="mt-3">Total Units</label>
                                            <input class="form-control" type="text" placeholder="Enter no. of units"
                                                name="unit_total" value="<?php echo $row1['unit_total']; ?>"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="mt-3">Pre Requisite</label>
                                            <input class="form-control" type="text" placeholder="Enter pre requisite"
                                                name="prereq" value="<?php echo $row1['prereq']; ?>"/>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="mt-3">Course</label>
                                            <select class="form-control" name="course" id="courses">
                                                <option value="<?php echo $row1['course_id']; ?>" ><?php echo $row1['course']; ?>
                                                                </option>
                                                <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_courses");
                                                while ($row = mysqli_fetch_array($getCourse)) {
                                                ?>
                                                <option value="<?php echo $row['course_id']; ?>">
                                                    <?php echo $row['course'];
                                                } ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="mt-3">Year Level</label>
                                            <select class="form-control" name="year" id="year_lvl">
                                                <option value="<?php echo $row1['year_id']; ?>" ><?php echo $row1['year_level']; ?>
                                                                </option>
                                                <?php $getYear = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                                while ($row = mysqli_fetch_array($getYear)) {
                                                ?>
                                                <option value="<?php echo $row['year_id']; ?>">
                                                    <?php echo $row['year_level'];
                                                } ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="mt-3">Semester</label>
                                            <select class="form-control" name="semester" id="semester">
                                                <option value="<?php echo $row1['sem_id']; ?>" ><?php echo $row1['semester']; ?>
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

                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                            title="Send" name="submit">Edit
                                            Subject</button>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
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