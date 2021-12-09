<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';

if (isset($_GET['BSCS'])) {
    $course = $_GET['BSCS'];
} elseif (isset($_GET['BSBA-MM'])) {
    $course = $_GET['BSBA-MM'];
} elseif (isset($_GET['BSBA-FM'])) {
    $course = $_GET['BSBA-FM'];
} elseif (isset($_GET['TCP'])) {
    $course = $_GET['TCP'];
} elseif (isset($_GET['BSHM'])) {
    $course = $_GET['BSHM'];
} elseif (isset($_GET['BSED-Social Studies'])) {
    $course = $_GET['BSED-Social Studies'];
} elseif (isset($_GET['BSED-English'])) {
    $course = $_GET['BSED-English'];
} elseif (isset($_GET['BSED-Filipino'])) {
    $course = $_GET['BSED-Filipino'];
} elseif (isset($_GET['BSED-Math'])) {
    $course = $_GET['BSED-Math'];
} elseif (isset($_GET['BSBA-OM'])) {
    $course = $_GET['BSBA-OM'];
} elseif (isset($_GET['BSEE'])) {
    $course = $_GET['BSEE'];
} elseif (isset($_GET['BSECE'])) {
    $course = $_GET['BSECE'];
} elseif (isset($_GET['BSCpE'])) {
    $course = $_GET['BSCpE'];
} elseif (isset($_GET['BSED-Science'])) {
    $course = $_GET['BSED-Science'];
} elseif (isset($_GET['BA-Psychology'])) {
    $course = $_GET['BA-Psychology'];
} elseif (isset($_GET['BSN'])) {
    $course = $_GET['BSN'];
} elseif (isset($_GET['BEED'])) {
    $course = $_GET['BEED'];
}
?>
<title>
    Subject List | SFAC - Las Piñas
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Subject List</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Subject List</h5>
                            <!-- <p class="text-sm mb-0">
                                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                                    </p> -->
                        </div>

                        <div class="card-body text-center">
                            <form action="list.subject.php" method="GET">
                                <button class="btn btn-icon btn-3 btn-info" value="BSCS" name="BSCS">
                                    <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                    <span class="btn-inner--text">BSCS</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSBA-MM" name="BSBA-MM">
                                    <span class="btn-inner--icon"><i class="fas fa-business-time"></i></span>
                                    <span class="btn-inner--text">BSBA-MM</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSBA-FM" name="BSBA-FM">
                                    <span class="btn-inner--icon"><i class="fas fa-business-time"></i></span>
                                    <span class="btn-inner--text">BSBA-FM</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="TCP" name="TCP">
                                    <span class="btn-inner--icon"><i class="fas fa-scroll"></i></span>
                                    <span class="btn-inner--text">TCP</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSHM" name="BSHM">
                                    <span class="btn-inner--icon"><i class="fas fa-utensils"></i></span>
                                    <span class="btn-inner--text">BSHM</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BEED" name="BEED">
                                    <span class="btn-inner--icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="btn-inner--text">BEED</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSED-Science" name="BSED-Science">
                                    <span class="btn-inner--icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="btn-inner--text">BSED-Science</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSED-English" name="BSED-English">
                                    <span class="btn-inner--icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="btn-inner--text">BSED-English</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSED-Filipino" name="BSED-Filipino">
                                    <span class="btn-inner--icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="btn-inner--text">BSED-Filipino</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSED-Math" name="BSED-Math">
                                    <span class="btn-inner--icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="btn-inner--text">BSED-Math</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSED-Social Studies"
                                    name="BSED-Social Studies">
                                    <span class="btn-inner--icon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <span class="btn-inner--text">BSED-Social Studies</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSBA-OM" name="BSBA-OM">
                                    <span class="btn-inner--icon"><i class="fas fa-hard-hat"></i></span>
                                    <span class="btn-inner--text">BSBA-OM</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSCpE" name="BSCpE">
                                    <span class="btn-inner--icon"><i class="fas fa-robot"></i></i></span>
                                    <span class="btn-inner--text">BSCpE</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSN" name="BSN">
                                    <span class="btn-inner--icon"><i class="fas fa-user-nurse"></i></span>
                                    <span class="btn-inner--text">BSN</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BA-Psychology" name="BA-Psychology">
                                    <span class="btn-inner--icon"><i class="fas fa-notes-medical"></i></span>
                                    <span class="btn-inner--text">BA-Psychology</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSEE" name="BSEE">
                                    <span class="btn-inner--icon"><i class="fas fa-bolt"></i></span>
                                    <span class="btn-inner--text">BSEE</span>
                                </button>
                                <button class="btn btn-icon btn-3 btn-info" value="BSECE" name="BSECE">
                                    <span class="btn-inner--icon"><i class="fas fa-plug"></i></span>
                                    <span class="btn-inner--text">BSECE</span>
                                </button>
                            </form>

                        </div>

                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover m-0 responsive nowrap" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Subject Code</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Subject Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Unit</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Pre-Requisites</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Year Level</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Semester</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($course)) {
                                        $listsubject = mysqli_query($db, "SELECT * FROM tbl_subjects_new
                                                LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_subjects_new.course_id
                                                LEFT JOIN tbl_year_levels ON tbl_year_levels.year_id = tbl_subjects_new.year_id
                                                LEFT JOIN tbl_semesters ON tbl_semesters.sem_id = tbl_subjects_new.sem_id
                                                WHERE course_abv IN ('$course') ORDER BY tbl_year_levels.year_level ASC, subj_id");

                                    ?>

                                    <tr>
                                        <?php
                                            while ($row = mysqli_fetch_array($listsubject)) {
                                                $id = $row['subj_id'];
                                            ?>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_code'] ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['subj_desc']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['unit_lec']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['prereq']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['course']; ?></td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['year_level']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal"><?php echo $row['semester']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <a class="btn bg-gradient-primary text-xs"
                                                href="edit.subject.php?subj_id=<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-edit"></i> Edit</a>

                                            <a class="btn btn-block bg-gradient-danger mb-3 text-xs"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modal-notification<?php echo $id; ?>"><i
                                                    class="text-xs fas fa-trash-alt"></i> Delete</a>


                                            <div class="modal fade" id="modal-notification<?php echo $id; ?>"
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
                                                                    <i><b><?php echo $row['subj_desc']; ?></b></i>?
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="userData/ctrl.del.subject.php?subj_id=<?php echo $id; ?>"
                                                                class="btn btn-white text-white bg-danger">Delete</a>
                                                            <button type="button"
                                                                class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                    <?php }
                                        } else {
                                        } ?>
                                </tbody>
                            </table>
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