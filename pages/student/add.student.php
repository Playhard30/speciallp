        <?php
        session_start();
        include '../../includes/head.php';
        include '../../includes/session.php';
        ?>
        <title>
            Add Student | SFAC - Las Piñas
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
                                    <img src="../../assets/img/logos/logo.png" class="navbar-brand-img h-100"
                                        alt="main_logo" style="width: 40px; height: 40px;">
                                </li>
                                <li class=" text-sm text-dark mt-2 ms-2" aria-current="page">SFAC Las Piñas</li>
                            </ol>
                            <h6 class="font-weight-bolder mb-0">Add Students</h6>
                        </nav>
                        <?php include '../../includes/navbar.php'; ?>
                        <!-- End Navbar -->

                        <div class="container-fluid py-4">
                            <div class="row mb-10">
                                <div class="col-lg-9 col-12 mx-auto">
                                    <div class="card card-body mt-4 shadow-sm">
                                        <h5 class="mb-0">Add Student</h5>
                                        <p class="text-sm mb-0">Student Details</p>
                                        <hr class="horizontal dark my-3">
                                        <form method="POST" action="userData/ctrl.add.student.php">


                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label>Student Code</label>
                                                    <input class="form-control" type="text" placeholder="Student Code"
                                                        required name="stud_no" />
                                                </div>

                                                <div class="col-sm-8">
                                                    <label>Username</label>
                                                    <input class="form-control" type="text" placeholder="Username"
                                                        required name="username" />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="mt-3">Password</label>
                                                    <input class="form-control" type="password" placeholder="Password"
                                                        required name="password" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="mt-3">Confirm Password</label>
                                                    <input class="form-control" type="password"
                                                        placeholder="Confirm Password" name="confirmPass" />
                                                </div>
                                            </div>


                                            <div class="d-flex justify-content-end mt-4">
                                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit"
                                                    title="Send" name="submit">Add
                                                    Student</button>
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