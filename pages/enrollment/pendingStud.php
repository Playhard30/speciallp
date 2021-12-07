<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
?>
<title>
    Pending Students | SFAC - Las Piñas
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
                    <h6 class="font-weight-bolder mb-0">View Pending Enrollees</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->
                <div class="container-fluid py-4">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card shadow shadow-xl">
                                <!-- Card header -->
                                <div class="card-header m-1 my-0">
                                    <h5 class="mb-0 ">List of Pending Enrollees</h5>
                                    <p class="text-sm mb-0">for Academic Year
                                        <?php echo $_SESSION['AC'] . ', ' . $_SESSION['S']; ?></p>
                                </div>
                                <hr class="horizontal dark mt-0">
                                <div class="table-responsive px-4 my-4">
                                    <table class=" table table-hover responsive nowrap m-0" id="datatable-basic"
                                        style="width: 100%;">
                                        <thead class="thead-light">
                                            <tr>
                                                <th></th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Picture</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Student No.</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Fullname</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Course</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Year Level</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Type</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Date Applied</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Remarks</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Officially Drop</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
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
                                            WHERE remark IN ('Pending') OR remark IN ('Checked') OR remark IN ('Canceled') AND C.department_id = '$_SESSION[ADepartment_id]' AND ay_id IN ('$_SESSION[AC]') AND sem_id IN ('$_SESSION[S]')
                                            ORDER BY sy_id") or die($db->error);
                                            while ($row = $pendStud->fetch_array()) {
                                                $id = $row['sy_id'];

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
                                                        <button
                                                            class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"
                                                            <?php if ($row['remark'] == "Pending") {
                                                                                                                                                                                                    echo 'style="color: #ce7e00; border-color:#ce7e00"><i class="fas fa-spinner"
                                                                                                                                                                                                    aria-hidden="true"></i>';
                                                                                                                                                                                                } elseif ($row['remark'] == 'Checked') {
                                                                                                                                                                                                    echo 'style="color: #8fce00; border-color:#8fce00"><i
                                                                class="fas fa-check" aria-hidden="true"></i>';
                                                                                                                                                                                                } elseif ($row['remark'] == 'Canceled') {
                                                                                                                                                                                                    echo 'style="color: #c90076; border-color:#c90076"><i class="fas fa-times" aria-hidden="true"></i>';
                                                                                                                                                                                                } ?> </button>
                                                            <span><?php echo $row['remark']; ?></span>
                                                    </div>

                                                </td>
                                                <td class="text-sm font-weight-normal">
                                                    <?php echo $row['off_drop']; ?>
                                                </td>
                                                <td class="text-sm font-weight-normal">

                                                    <div class="d-flex align-items-center">

                                                        <a href="userData/ctrl.edit.pendingStud.php?id=<?php echo $id . '&remark=' . $row['remark'];  ?>"
                                                            class="mx-2" data-bs-toggle="tooltip"
                                                            <?php if ($row['remark'] == 'Pending' || $row['remark'] == 'Canceled') {
                                                                                                                                                                                                        echo 'data-bs-original-title="Check"><i class="fas fa-check" style="color:#8fce00"></i>';
                                                                                                                                                                                                    } elseif ($row['remark'] == 'Checked') echo 'data-bs-original-title="Uncheck"><i class="fas fa-times" style="color:#ce7e00"></i>'; ?>
                                                            </a>

                                                            <a href="javascript:;" class="mx-2" data-bs-toggle="tooltip"
                                                                data-bs-original-title="Preview product">
                                                                <i class="fas fa-eye text-secondary"></i>
                                                            </a>
                                                            <a href="javascript:;" class="mx-2" data-bs-toggle="tooltip"
                                                                data-bs-original-title="Edit">
                                                                <i class="fas fa-user-edit text-secondary"></i>
                                                            </a>
                                                            <span data-bs-toggle="tooltip"
                                                                data-bs-original-title="Delete">
                                                                <a class="mx-2" data-bs-toggle="modal"
                                                                    data-bs-target="#modal-delete<?php echo $id; ?>">
                                                                    <i class="fas fa-trash text-secondary"></i>
                                                                </a>
                                                            </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- END ROWS -->
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="modal-delete<?php echo $id; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title text-danger" id="modal-title-delete">
                                                                <i class="fas fa-exclamation-triangle">
                                                                </i>
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
                                                                    Delete Enrollee!</h4>
                                                                <p>Are you sure you want to delete
                                                                    <br>
                                                                    <i><b><?php echo $row['fullname']; ?></b></i>
                                                                    from <br>
                                                                    <i><b><?php echo $row['course_abv']; ?></b></i>?
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="userData/ctrl.del.pendingStud.php?id=<?php echo $id; ?>"
                                                                class="btn btn-white text-white bg-danger">Delete</a>
                                                            <button type="button"
                                                                class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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