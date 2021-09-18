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
                    <h6 class="font-weight-bolder mb-0">View Admission List</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h5 class="mb-0">Admission List</h5>
                                    <!-- <p class="text-sm mb-0">
                                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                                    </p> -->
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush table-hover" id="datatable-basic">
                                        <thead class="thead-light">
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Image</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Lastname</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Firstname</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Middlename</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Email</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Username</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                                    Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $listAdmission = mysqli_query($db, "SELECT *, CONCAT(tbl_admissions.admission_lastname, ', ', tbl_admissions.admission_firstname, ' ', tbl_admissions.admission_middlename) AS fullname FROM tbl_admissions");
                                            while ($row = mysqli_fetch_array($listAdmission)) {
                                                $id = $row['admission_id'];
                                            ?>

                                            <tr>
                                                <td><?php if (empty($row['img'])) {
                                                            echo '<img class="border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="../../assets/img/illustrations/user_prof.jpg"/>';
                                                        } else {
                                                            echo ' <img class=" border-radius-lg shadow-sm zoom" style="height:80px; width:80px;" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" "/>';
                                                        } ?>
                                                </td>
                                                <td class="text-sm font-weight-normal">
                                                    <?php echo $row['admission_lastname']; ?></td>
                                                <td class="text-sm font-weight-normal">
                                                    <?php echo $row['admission_firstname']; ?></td>
                                                <td class="text-sm font-weight-normal">
                                                    <?php echo $row['admission_middlename']; ?></td>
                                                <td class="text-sm font-weight-normal"><?php echo $row['email']; ?></td>
                                                <td class="text-sm font-weight-normal"><?php echo $row['username']; ?>
                                                </td>
                                                <td class="text-sm font-weight-normal">
                                                    <a class="btn bg-gradient-primary text-xs"
                                                        href="edit.admission.php?admission_id=<?php echo $id; ?>"><i
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
                                                                            <?php echo $row['fullname']; ?>?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="userData/ctrl.del.admission.php?admission_id=<?php echo $id; ?>"
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
                                            <?php } ?>
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