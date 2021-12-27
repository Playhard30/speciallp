<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Enrolled SELA Students | SFAC - Las Piñas
</title>
</head>

<?php

if (isset($_GET['BEED'])) {
    $course_id = $_GET['BEED'];
    $course_name = "Elementary Education";
    $color_card = "#d9534f";
} elseif (isset($_GET['BSED-Filipino'])) {
    $course_id = $_GET['BSED-Filipino'];
    $course_name = "Secondary Education - Filipino";
    $color_card = "#5bc0de";
} elseif (isset($_GET['BSED-Math'])) {
    $course_id = $_GET['BSED-Math'];
    $course_name = "Secondary Education - Math";
    $color_card = "#f0ad4e";
} elseif (isset($_GET['BSED-English'])) {
    $course_id = $_GET['BSED-English'];
    $course_name = "Secondary Education - English";
    $color_card = "#f76ed7";
} elseif (isset($_GET['BSED-SS'])) {
    $course_id = $_GET['BSED-SS'];
    $course_name = "Secondary Education - Social Studies";
    $color_card = "#8392ab";
} elseif (isset($_GET['BSED-Science'])) {
    $course_id = $_GET['BSED-Science'];
    $course_name = "Secondary Education - Science";
    $color_card = "#6d84ab";
} elseif (isset($_GET['BA-Psych'])) {
    $course_id = $_GET['BA-Psych'];
    $course_name = "BA Psychology";
    $color_card = "#5bc0de";
} else {
    $course_id = 20;
    $course_name = "Teacher Certificate Program";
    $color_card = "#28a745";
}

?>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View SELA Enrollees</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12"  >
                    <div class="card shadow shadow-xl" >
                        <!-- Card header -->
                        <div class="card-header m-1 my-0" style="background-image: linear-gradient(<?php echo $color_card;?>, white)"> 
                            <div class="row mb-0">
                                <div class="col">
                                    <h5 class="mb-0 ">List of <?php echo $course_name;?> Enrollees</h5>
                                    <p class="text-sm mb-0">for Academic Year
                                    <?php echo $_SESSION['AC'] . ', ' . $_SESSION['S']; 
                                    ?></p>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                    <form action="SELA.php" method="GET">
                                        <button class="btn btn-icon btn-3 btn-success" value="20" name="TCP">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">TCP</span>
                                        </button>
                                        <button class="btn btn-icon btn-3 btn-danger" value="9" name="BEED">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">Elementary Education</span>
                                        </button>
                                        <button class="btn btn-icon btn-3 btn-info" value="6" name="BSED-Filipino">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">SED - Filipino</span>
                                        </button>
                                        <button class="btn btn-icon btn-3 btn-warning" value="7" name="BSED-Math">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">SED - Math</span>
                                        </button>
                                        <button class="btn btn-icon btn-3 btn-primary" value="8" name="BSED-English">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">SED - English</span>
                                        </button>
                                        <button class="btn btn-icon btn-3 btn-secondary" value="13" name="BSED-SS">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">SED - Social Studies</span>
                                        </button>
                                        <button class="btn btn-icon btn-3 btn-dark" value="12" name="BSED-Science">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">SED - Science</span>
                                        </button>
                                        <button class="btn btn-icon btn-3 btn-info" value="18" name="BA-Psych">
                                            <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                            <span class="btn-inner--text">Psychology</span>
                                        </button>
                                        
                                    </div>
                                    </form>
                                </div>
                            
                            
                                
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <div class="table-responsive px-4 my-4">
                            <table class=" table table-hover responsive nowrap m-0" id="datatable-basic"
                                style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th></th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Picture</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Student No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Fullname</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Year Level</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Date Enrolled</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    // Query Pending Students
                                    $pendStud = $db->query("SELECT *, CONCAT(S.firstname, ' ', S.middlename, ' ', S.lastname) AS fullname
                                            FROM tbl_schoolyears SY
                                            LEFT JOIN tbl_courses C USING(course_id)
                                            LEFT JOIN tbl_students S USING(stud_id)
                                            LEFT JOIN tbl_year_levels YL USING(year_id)
                                            WHERE (remark IN ('Approved') OR remark IN ('Checked')) AND SY.course_id IN ('$course_id') AND ay_id IN ('$_SESSION[AC]') AND sem_id IN ('$_SESSION[S]')
                                            ORDER BY sy_id ") or die($db->error);

                                    while ($row = $pendStud->fetch_array()) {
                                        $id = $row['sy_id'];
                                        $stud_id = $row['stud_id'];

                                    ?>
                                    <!-- ROWS -->
                                    <tr>
                                        <td></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php if (empty($row['img'])) {
                                                    echo '<img class="border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="../../assets/img/illustrations/user_prof.jpg"/>';
                                                } else {
                                                    echo ' <img class=" border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" "/>';
                                                } ?>
                                        </td>

                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['stud_no']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['fullname']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['course_abv']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['year_level']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['status']; ?></td>
                                        <td class="text-sm font-weight-normal">
                                            <?php echo $row['date_enrolled']; ?>
                                        </td>
                                        <td class="text-sm font-weight-normal">

                                            <div class="d-flex align-items-center">
                                                    <a href="../forms/data/dars.php?stud_id=<?php echo $stud_id;  ?>"
                                                        class="mx-2" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Registration Forms">
                                                        <i class="fas fa-file-pdf text-secondary"></i>
                                                    </a>
                                                    <a href="../forms/data/pre-with-data.php?stud_id=<?php echo $stud_id;  ?>"
                                                        class="mx-2" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Pre-Enrollment Form">
                                                        <i class="fas fa-file-pdf text-secondary"></i>
                                                    </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- END ROWS -->
                                    <?php }
                                    ?>
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