        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav  justify-content-end">

                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li class="mb-0">
                            <div class="card dropdown-item border-radius-md">
                                <div class="card-body p-3 py-1">
                                    <div class="d-flex">
                                        <div class="avatar avatar-lg">
                                            <?php
                                            if ($_SESSION['role'] == "Super Administrator") {
                                                $getUserImage = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE
                                            sa_id = $sa_id");
                                                while ($row = mysqli_fetch_array($getUserImage)) {
                                                    echo '<img class="avatar rounded-circle" alt="Image placeholder"
                                                src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '"
                                                style="height: 50px; width:50px;">
                                        </div>
                                        <div class="ms-2 my-auto">
                                            <h6 class="mb-0">' . $row['username'] . '</h6>
                                            <p class="text-xs mb-0">Username</p>
                                        </div>
                                    </div>
                                    <br>
                                    <p class="mb-0 text-sm">';
                                                    if (!empty($row['email'])) {
                                                        echo $row['email'];
                                                    } else {
                                                        echo 'Please insert your Email.';
                                                    }
                                                }
                                            } else if ($_SESSION['role'] == "Dean") {
                                                $getUserImage = mysqli_query($db, "SELECT * FROM tbl_deans WHERE dean_id =
                                        '$dean_id'");
                                                while ($row = mysqli_fetch_array($getUserImage)) {
                                                    echo '<img class="avatar rounded-circle" alt="Image placeholder"
                                            src="data:image/jpeg;base64, ' . base64_encode($row['img']) . '"
                                            style="height: 50px; width:50px;">
                                </div>
                                <div class="ms-2 my-auto">
                                    <h6 class="mb-0">' . $row['username'] . '</h6>
                                    <p class="text-xs mb-0">Username</p>
                                </div>
                            </div>
                            <br>
                            <p class="mb-0 text-sm">';
                                                    if (!empty($row['email'])) {
                                                        echo $row['email'];
                                                    } else {
                                                        echo 'Please insert your Email.';
                                                    }
                                                }
                                            } ?>



                                            </p>
                                            <hr class="horizontal dark">
                                            <div class="d-flex justify-content-center">
                                                <a href="../login/userData/ctrl.logout.php"
                                                    class="btn btn-sm bg-secondary text-white mb-0">
                                                    Sign out
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                        </li>


                    </ul>
                </li>
            </ul>
        </div>
        </div>
        </nav>
        <!-- End Navbar -->