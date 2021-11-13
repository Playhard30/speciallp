<?php
session_start();
include '../../includes/head.php';
include '../../includes/session.php';
$_SESSION['eay_id'] = $_GET['id'];
?>
<title>
    Edit Effective Academic Year | SFAC - Las Piñas
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
                    <h6 class="font-weight-bolder mb-0">Edit Effective Academic Year</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->

                <div class="container-fluid py-4">
                    <div class="row mb-8">
                        <div class=" col-lg-4 col-12 mx-auto">
                            <div class="card card-body mt-4 shadow-sm">
                                <h5 class="font-weight-bolder mb-0">Edit Effective Academic Year</h5>
                                <p class="text-sm mb-0">Effective Academic Year Details!</p>
                                <hr class="horizontal dark my-3">
                                <form method="POST" enctype="multipart/form-data"
                                    action="acadData/ctrl.effectiveAY.php">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10 text-center">
                                            <label>Effective Academic Year</label>
                                            <?php $query = $db->query("SELECT * FROM tbl_effective_acadyear WHERE eay_id = '$_SESSION[eay_id]'") or die($db->error);
                                            while ($row = $query->fetch_array()) { ?>
                                            <input class="form-control text-center" data-format="0000-0000" type="text"
                                                placeholder="0000-0000" name="EAY" value="<?php echo $row['eay']; ?>"
                                                required>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn bg-gradient-primary text-white m-0 ms-2" type="submit"
                                            title="Add" name="Usubmit">Save</button>
                                    </div>
                                </form>
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