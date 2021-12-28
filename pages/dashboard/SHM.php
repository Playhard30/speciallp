<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Enrolled SHM Students | SFAC - Las Piñas
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Enrolled SHM Students</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header m-1 my-0"> 
                            <div class="row mb-0">
                                <div class="col mx-0">
                                    <h5 class="mb-0 ">List of Hospitality Management Enrollees</h5>
                                    <p class="text-sm mb-0">for Academic Year
                                    <?php echo $_SESSION['AC'] . ', ' . $_SESSION['S']; 
                                    ?></p>
                                </div>
                                <div class="col text-end">
                                        <div class="row">
                                            <?php
                                            $HMcourses = mysqli_query($db, "SELECT * FROM tbl_courses WHERE department_id = 6");
                                            while ($displayHMcourses = mysqli_fetch_array($HMcourses)) {

                                                $countTotal = mysqli_query($db, "SELECT COUNT(sy_id) FROM tbl_schoolyears WHERE remark = 'Approved' AND course_id = '$displayHMcourses[course_id]' AND sem_id = '$_SESSION[S]' AND ay_id = '$_SESSION[AC]' ") or die($db->error);
                                                $actualCountTotal = mysqli_fetch_array($countTotal);

                                                $countNew = mysqli_query($db, "SELECT COUNT(sy_id) FROM tbl_schoolyears WHERE remark = 'Approved' AND status = 'New' AND course_id = '$displayHMcourses[course_id]' AND sem_id = '$_SESSION[S]' AND ay_id = '$_SESSION[AC]' ") or die($db->error);
                                                $actualCountNew = mysqli_fetch_array($countNew);

                                                $countOld = mysqli_query($db, "SELECT COUNT(sy_id) FROM tbl_schoolyears WHERE remark = 'Approved' AND status = 'Old' AND course_id = '$displayHMcourses[course_id]' AND sem_id = '$_SESSION[S]' AND ay_id = '$_SESSION[AC]' ") or die($db->error);
                                                $actualCountOld = mysqli_fetch_array($countOld);

                                                echo'
                                                <div class="col">
                                                    <button class="btn btn-icon btn-3 btn-dark" value="'.$displayHMcourses['course_id'].'" name="'.$displayHMcourses['course_abv'].'">
                                                        <span class="btn-inner--icon"><i class="fas fa-laptop"></i></span>
                                                        <span class="btn-inner--text">'.$displayHMcourses['course_abv'].'</span>
                                                        <p class="text-sm mb-0">
                                                            <b>New:</b> '.$actualCountNew[0].'
                                                            <b>Old:</b> '.$actualCountOld[0].'
                                                            <b>Total:</b> '.$actualCountTotal[0].'
                                                        </p>
                                                    </button>
                                                    
                                                </div>
                                                ';
                                            }
 
                                            ?>
                                        </div>
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
                                            WHERE remark IN ('Approved')  AND C.department_id IN ('6') AND ay_id IN ('$_SESSION[AC]') AND sem_id IN ('$_SESSION[S]')
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

                                            <div class="dropdown">
                                                <a href="#" class="btn bg-gradient-dark dropdown-toggle "
                                                    data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                                                    <i class="text-xs fas fa-file-pdf"></i>&nbsp; Forms
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2"
                                                    style="min-width: unset;">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="../forms/data/pre-with-data.php?stud_id=<?php echo $stud_id;  ?>">
                                                            Pre-Enrollment
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="../forms/data/dars.php?stud_id=<?php echo $stud_id; ?>">
                                                            Registration
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>s
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