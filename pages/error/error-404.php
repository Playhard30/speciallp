<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';

?>
<title>
    Add Department | SFAC - Las Piñas
</title>
</head>


<body class="g-sidenav-show  bg-gray-100">
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <nav>
            <div class="container-fluid px-3">
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->
                <div class="container-fluid py-4">
                    <div class="row mb-5">
                        <div class="col-lg-12 col-12 mx-auto">
                            <div class="card card-body mt-4 shadow-sm bg-gray-100">
                                <div class="container my-5">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto">
                                            <h1 class="display-1 text-bolder text-danger">Error 404
                                            </h1>
                                            <h2>Page not found</h2>
                                            <p class="lead">We suggest you to go to the Dashboard while we solve
                                                this issue.
                                            </p>
                                            <a href="../dashboard/index.php" class="btn bg-gradient-dark mt-4">Go to
                                                Dashboard</a>
                                        </div>
                                        <div class="col-lg-6 my-auto position-relative">
                                            <img class="w-100 position-relative"
                                                src="../../assets/img/illustrations/error-404.png" alt="404-error">
                                        </div>
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