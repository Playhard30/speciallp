<!-- Head -->
<?php
session_start();
include '../../includes/session.php';
include '../../includes/head.php';
$_SESSION['stud_id'] = $stud_id;

$q = $db->query("SELECT * FROM tbl_schoolyears SY WHERE stud_id = '$stud_id' AND ay_id = '$_SESSION[AYear]' AND sem_id = '$_SESSION[ASem]'") or die($db->error);
$count = $q->num_rows;

if ($count == 0) {
    header('location: enrollNow.php');
}
?>
<title>
    Enrollment Information | SFAC - Las Piñas
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
                    <h6 class="font-weight-bolder mb-0">Enrollment Information</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->
                <div class="container-fluid py-4">
                    <div class="row mb-6">
                        <div class="col-lg-11 col-12 mx-auto">
                            <div class="page-header min-height-300 border-radius-xl mt-4"
                                style="background-image: url('../../assets/img/curved-images/sfac.png'); background-position-y: 90%;">
                                <span class="mask bg-gradient-danger opacity-4"></span>
                            </div>
                            <div class="card card-body blur shadow-blur mx-4 mt-n5 overflow-hidden">
                                <div class="row gx-4 justify-content-evenly">
                                    <?php $getSY = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname FROM tbl_schoolyears SY
                                    LEFT JOIN tbl_acadyears AY ON AY.ay_id = SY.ay_id
                                    LEFT JOIN tbl_year_levels YL ON YL.year_id = SY.year_id
                                    LEFT JOIN tbl_semesters SEM ON SEM.sem_id = SY.sem_id
                                    LEFT JOIN tbl_students S ON S.stud_id = SY.stud_id
                                    LEFT JOIN tbl_courses C ON C.course_id = SY.course_id
                                    WHERE SY.stud_id = '$stud_id' AND SY.ay_id = '$_SESSION[AYear]' AND SY.sem_id = '$_SESSION[ASem]'") or die($db->error);
                                    while ($row = $getSY->fetch_array()) {
                                        $course_id = $row['course_id'];
                                    ?>

                                    <!-- Profile -->
                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <?php echo $row['stud_no']; ?>
                                            </h6>
                                            <p class="mb-0 font-weight-bold text-xs text-center">
                                                Student No.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <?php echo $row['fullname']; ?>
                                            </h6>
                                            <p class="mb-0 font-weight-bold text-xs text-center">
                                                Fullname
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <?php echo $row['course_abv']; ?>
                                            </h6>
                                            <p class="mb-0 font-weight-bold text-xs text-center">
                                                Course
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <?php echo $row['year_level']; ?>
                                            </h6>
                                            <p class="mb-0 font-weight-bold text-xs text-center">
                                                Year Level
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <?php echo $row['academic_year']; ?>
                                            </h6>
                                            <p class="mb-0 font-weight-bold text-xs text-center">
                                                A.Y.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <?php echo $row['semester']; ?>
                                            </h6>
                                            <p class="mb-0 font-weight-bold text-xs text-center">
                                                Semester
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <?php echo $row['status']; ?>
                                            </h6>
                                            <p class="mb-0 font-weight-bold text-xs text-center">
                                                Type
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-auto my-2">
                                        <div class="h-100">
                                            <?php if ($row['remark'] == "Pending") {
                                                    echo '<p class="badge badge-warning badge-sm mb-2">';
                                                } elseif ($row['remark'] == "Canceled") {
                                                    echo '<p class="badge badge-danger badge-sm mb-2">';
                                                } else {
                                                    echo '<p class="badge badge-success badge-sm mb-2">';
                                                } ?>
                                            <?php echo $row['remark']; ?>
                                            </p>
                                            <p class="mb-0 font-weight-bold text-xs text-center ">
                                                Status
                                            </p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- End Profile -->

                            <!-- Subjects List -->
                            <div class="card shadow shadow-xl mt-4">
                                <form action="userData/ctrl.add.del.subject.php" method="POST">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <div class="d-lg-flex">
                                            <div>
                                                <h5 class="mb-0">List of your Enrolled Subject(s)</h5>
                                                <p class="text-sm mb-0">
                                                    Verify carefully your subject/s to be Enrolled
                                                </p>
                                            </div>
                                            <div class="ms-auto my-auto mt-lg-0 mt-4 ">
                                                <div class="ms-auto my-auto">
                                                    <button type="button" class="btn bg-gradient-dark btn-sm mb-0"
                                                        data-bs-toggle="modal" data-bs-target="#addSub"><i
                                                            class="fas fa-plus text-sm"> </i>
                                                        Add Subjects
                                                    </button>
                                                    <div class="modal fade" id="addSub" tabindex="-1"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog mt-lg-5"
                                                            style="max-width:850px !important;">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="longModal">
                                                                        Subjects List</h5>
                                                                    <i class="fas fa-book-open ms-3"></i>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="table-responsive px-3 my-3">
                                                                        <table
                                                                            class="table table-flush table-hover m-0 responsive nowrap"
                                                                            style="width: 100%;" id="datatable-modal">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Course Code</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Course Description</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Program</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Year Level</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Semester</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Unit(s)</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Prerequisites</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Day</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Time</th>
                                                                                    <th
                                                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                                                        Room</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $i = -1;
                                                                                $query1 = $db->query("SELECT * FROM tbl_schedules S
                                                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = S.subj_id
                                                                            LEFT JOIN tbl_courses C ON C.course_id = SN.course_id
                                                                            LEFT JOIN tbl_year_levels YL ON YL.year_id = SN.year_id
                                                                            LEFT JOIN tbl_semesters SEM ON SEM.sem_id = SN.sem_id
                                                                            WHERE S.subj_id NOT IN (SELECT ES.subj_id FROM tbl_enrolled_subjects ES WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$_SESSION[AC]' AND ES.semester = '$_SESSION[S]') AND C.course_id = '$course_id' AND acad_year = '$_SESSION[AC]' AND S.semester = '$_SESSION[S]'
                                                                            ORDER BY YL.year_id, SEM.sem_id") or die($db->error);
                                                                                while ($row2 = $query1->fetch_array()) {
                                                                                    $i++; ?>
                                                                                <tr>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <input type="text" hidden
                                                                                            name="class[]"
                                                                                            value="<?php echo $row2['class_id']; ?>">
                                                                                        <div class="form-check">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                name="index[]"
                                                                                                type="checkbox"
                                                                                                value="<?php echo $i; ?>"
                                                                                                id="flexCheckDefault1">
                                                                                            <?php echo $row2['subj_code']; ?>
                                                                                        </div>
                                                                                        <input type="text" hidden
                                                                                            name="subjects[]"
                                                                                            value="<?php echo $row2['subj_id']; ?>">
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['subj_desc']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['course_abv']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['year_level']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['semester']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['unit_total']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['prereq']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['day']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['time']; ?>
                                                                                    </td>
                                                                                    <td
                                                                                        class="text-sm font-weight-normal">
                                                                                        <?php echo $row2['room']; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn bg-gradient-secondary btn-sm"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="addSub"
                                                                        class="btn bg-gradient-dark btn-sm">Add</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button
                                                        class="btn bg-gradient-danger btn-sm export mb-0 mt-sm-0 mt-0"
                                                        data-type="csv" type="submit" name="delete"><i
                                                            class="fas fa-trash text-sm">
                                                        </i> Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="horizontal dark m-0">
                                    <div class="table-responsive px-4 my-4">
                                        <table class="table table-flush table-hover m-0 responsive nowrap"
                                            style="width: 100%;" id="datatable-info">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                        Course Code</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                        Course Description</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                        Unit(s)</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                        Day</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                        Time</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                        Room</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query01 = $db->query("SELECT * FROM tbl_enrolled_subjects ES
                                            LEFT JOIN tbl_schedules S ON S.class_id = ES.class_id
                                            LEFT JOIN tbl_students STUD ON STUD.stud_id = ES.stud_id
                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = ES.subj_id
                                            WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$_SESSION[AC]' AND ES.semester = '$_SESSION[S]'") or die($db->error);
                                                while ($row = $query01->fetch_array()) { ?>
                                                <tr>
                                                    <td class="text-sm font-weight-normal">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="check[]"
                                                                type="checkbox"
                                                                value="<?php echo $row['enrolled_subj_id']; ?>"
                                                                id="flexCheckDefault2">
                                                            <?php echo $row['subj_code']; ?>
                                                        </div>

                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        <?php echo $row['subj_desc']; ?>
                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        <?php echo $row['unit_total']; ?>
                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        <?php echo $row['day']; ?>
                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        <?php echo $row['time']; ?>
                                                    </td>
                                                    <td class="text-sm font-weight-normal">
                                                        <?php echo $row['room']; ?>
                                                    </td>
                                                </tr>
                                                <!-- Modal Delete -->
                                                <!-- <div class="modal fade" id="modal-notification"
                                                    tabindex="-1" role="dialog" aria-labelledby="modal-notification"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title text-danger"
                                                                    id="modal-title-notification"><i
                                                                        class="fas fa-exclamation-triangle"> </i>
                                                                    Warning
                                                                </h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="py-3 text-center">
                                                                    <i class="fas fa-trash-alt text-9xl"></i>
                                                                    <h4 class="text-gradient text-danger mt-4">
                                                                        Delete Account!</h4>
                                                                    <p>Are you sure you want to delete
                                                                        <br>
                                                                        <i><b>Name</b></i>?
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="#"
                                                                    class="btn btn-white text-white bg-danger">Delete</a>
                                                                <button type="button"
                                                                    class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <?php $query02 = $db->query("SELECT SUM(unit_total) AS TU FROM tbl_enrolled_subjects ES
                                            LEFT JOIN tbl_subjects_new SN ON SN.subj_id = ES.subj_id
                                            WHERE ES.stud_id = '$stud_id' AND ES.acad_year = '$_SESSION[AC]' AND ES.semester = '$_SESSION[S]'") or die($db->error);
                                                while ($row = $query02->fetch_array()) { ?>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                        Total Units
                                                    </th>
                                                    <th></th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9 p-2">
                                                        <?php echo $row['TU']; ?>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <?php } ?>
                                            </tfoot>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <!-- End Subjects List -->

                        </div>
                    </div>
                    <!-- footer -->
                    <?php include '../../includes/footer.php'; ?>
                    <!-- End footer -->
                </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>