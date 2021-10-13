<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-white shadow-xl shadow"
    id="sidenav-main" data-color="danger">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <div class="border-0 d-flex align-items-center px-0 mt-3">
            <?php if ($_SESSION['role'] == "Super Administrator") {
                $getUserName = mysqli_query($db, "SELECT * FROM tbl_super_admins WHERE sa_id = '$sa_id'");
                while ($row = mysqli_fetch_array($getUserName)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="border-radius-lg mx-3 shadow zoom" alt="main_logo" style="height: 40px; width: 40px;">
            <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row['name'] . '</h6>
                <p class="mb-0 text-xs">' . $_SESSION['role'];
                }
            } else if ($_SESSION['role'] == "Dean") {
                $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_deans.dean_lastname, ', ', tbl_deans.dean_firstname) AS fullname FROM tbl_deans WHERE dean_id = '$dean_id'");
                while ($row = mysqli_fetch_array($getUserName)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="border-radius-lg mx-3 shadow zoom" alt="main_logo" style="height: 40px; width: 40px;">
            <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row['fullname'] . '</h6>
                <p class="mb-0 text-xs">' . $_SESSION['role'];
                }
            } else if ($_SESSION['role'] == "Admission") {
                $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_admissions.admission_lastname, ', ', tbl_admissions.admission_firstname) AS fullname FROM tbl_admissions WHERE admission_id = '$admission_id'");
                while ($row = mysqli_fetch_array($getUserName)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="border-radius-lg mx-3 shadow zoom" alt="main_logo" style="height: 40px; width: 40px;">
            <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row['fullname'] . '</h6>
                <p class="mb-0 text-xs">' . $_SESSION['role'];
                }
            } else if ($_SESSION['role'] == "Accounting") {
                $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_accounting.account_lastname, ', ', tbl_accounting.account_firstname) AS fullname FROM tbl_accounting WHERE account_id = '$account_id'");
                while ($row = mysqli_fetch_array($getUserName)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="border-radius-lg mx-3 shadow zoom" alt="main_logo" style="height: 40px; width: 40px;">
            <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row['fullname'] . '</h6>
                <p class="mb-0 text-xs">' . $_SESSION['role'];
                }
            } else if ($_SESSION['role'] == "Registrar") {
                $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_admins.admin_lastname, ', ', tbl_admins.admin_firstname) AS fullname FROM tbl_admins WHERE admin_id = '$admin_id'");
                while ($row = mysqli_fetch_array($getUserName)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="border-radius-lg mx-3 shadow zoom" alt="main_logo" style="height: 40px; width: 40px;">
            <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row['fullname'] . '</h6>
                <p class="mb-0 text-xs">' . $_SESSION['role'];
                }
            } else if ($_SESSION['role'] == "Adviser") {
                $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_faculties.faculty_lastname, ', ', tbl_faculties.faculty_firstname) AS fullname FROM tbl_faculties WHERE faculty_id = '$faculty_id'");
                while ($row = mysqli_fetch_array($getUserName)) {
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" class="border-radius-lg mx-3 shadow zoom" alt="main_logo" style="height: 40px; width: 40px;">
            <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">' . $row['fullname'] . '</h6>
                <p class="mb-0 text-xs">' . $_SESSION['role'];
                }
            }
            ?></p>
        </div>

    </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto max-height-vh-90" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <?php
            if ($_SESSION['role'] == "Super Administrator") {
                echo '<li class="nav-item">
                <a class="nav-link  active" href="../dashboard/index.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Accounts List</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../registrar/list.registrar.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="far fa-list-alt text-dark" style="height: 12px; width: 12px;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Registrars List</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../dean/list.dean.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="far fa-list-alt text-dark" style="height: 12px; width: 12px;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Deans List</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../admission/list.admission.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="far fa-list-alt text-dark" style="height: 12px; width: 12px;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admission List</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../accounting/list.accounting.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="far fa-list-alt text-dark" style="height: 12px; width: 12px;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Accounting List</span>
                </a>
            </li>

        <li class="nav-item">
        <a class="nav-link  " href="../adviser/list.adviser.php">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="far fa-list-alt text-dark" style="height: 12px; width: 12px;"></i>
            </div>
            <span class="nav-link-text ms-1">Adviser List</span>
        </a>
    </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Add Accounts</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../registrar/add.registrar.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add Registrar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../dean/add.dean.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add Dean</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link  " href="../admission/add.admission.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add Admission</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../accounting/add.accounting.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add Accounting</span>
                </a>
            </li>
            
        <li class="nav-item">
        <a class="nav-link  " href="../adviser/add.adviser.php">
            <div
                class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-user-plus text-dark"></i>
            </div>
            <span class="nav-link-text ms-1">Add Adviser</span>
        </a>
    </li>
            ';
            } else if ($_SESSION['role'] == "Dean") {
                echo '<li class="nav-item">
                <a class="nav-link  active" href="../dashboard/index.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Forms</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../forms/data/enroll_stats.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-alt text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Breakdown</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Lists</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../adviser/list.adviser.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-list-alt text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Advisers</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Add</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../adviser/add.adviser.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Adviser</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="#">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Department</span>
                </a>
            </li>
            ';
            } else if ($_SESSION['role'] == "Admission") {
                echo '<li class="nav-item">
                <a class="nav-link  active" href="../dashboard/index.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Forms</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../forms/enroll_stats.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-alt text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Breakdown</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Lists</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../adviser/list.adviser.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-list-alt text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Advisers</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Add</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../adviser/add.adviser.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Adviser</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="#">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Department</span>
                </a>
            </li>
            ';
            } else if ($_SESSION['role'] == "Accounting") {
                echo '<li class="nav-item">
                <a class="nav-link  active" href="../dashboard/index.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Add Menu</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../adviser/add.adviser.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Adviser</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="#">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Department</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Forms</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../forms/enroll_stats.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-alt text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Enrollment Breakdown</span>
                </a>
            </li>
            ';
            } else if ($_SESSION['role'] == "Registrar") {
                echo '
            <li class="nav-item">
                <a class="nav-link  active" href="../dashboard/index.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#listFranciscans" class="nav-link" aria-controls="listFranciscans"
                    role="button" aria-expanded="false">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-list-alt text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">List Franciscans</span>
                </a>

                <div class="collapse" id="listFranciscans">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item">
                            <a class="nav-link" href="../adviser/list.adviser.php">
                                <span class="sidenav-mini-icon"> </span>
                                <span class="sidenav-normal text-dark ">Adviser List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#maintenance" class="nav-link" aria-controls="maintenance"
                    role="button" aria-expanded="false">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tools text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Maintenance</span>
                </a>

                <div class="collapse" id="maintenance">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
                                <span class="sidenav-mini-icon"> </span>
                                <span class="sidenav-normal text-dark">Add</span>
                            </a>
                            <div class="collapse" id="profileExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="../registrar/add.department.php">
                                            <span class="sidenav-mini-icon text-xs"> </span>
                                            <span class="sidenav-normal text-black-50"> Add Department </span>
                                        </a>
                                    </li>

                                    <li class="nav-item mt-2">
                                        <h6 class="ps-4 ms-4 text-xs font-weight-bolder opacity-6">Subjects</h6>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="../subject/add.subject.php">
                                            <span class="sidenav-mini-icon text-xs"> </span>
                                            <span class="sidenav-normal text-black-50"> Add New Subject </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="../subject/add.subject.old.php">
                                            <span class="sidenav-mini-icon text-xs"> </span>
                                            <span class="sidenav-normal text-black-50"> Add Old Subject </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms" class="nav-link" aria-controls="forms" role="button"
                    aria-expanded="false">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-pdf text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Forms</span>
                </a>

                <div class="collapse" id="forms">
                    <ul class="nav ms-4 ps-3">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" aria-expanded="false" href="#blankForms">
                                <span class="sidenav-mini-icon"> </span>
                                <span class="sidenav-normal text-dark">Blank Forms</span>
                            </a>
                            <div class="collapse" id="blankForms">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link" href="../forms/blank/dars.php">
                                            <span class="sidenav-mini-icon text-xs"></span>
                                            <span class="sidenav-normal text-black-50">Registration Forms</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" aria-expanded="false" href="#formsData">
                                <span class="sidenav-mini-icon"> </span>
                                <span class="sidenav-normal text-dark">Forms w/ Data</span>
                            </a>
                            <div class="collapse" id="formsData">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <span class="sidenav-mini-icon text-xs"> </span>
                                            <span class="sidenav-normal text-black-50"></span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>
            
            
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#curriculum" class="nav-link" aria-controls="curriculum" role="button"
                    aria-expanded="false">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book-reader text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Curriculum</span>
                </a>

                <div class="collapse" id="curriculum">
                    <ul class="nav ms-4 ps-3">
                    
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" aria-expanded="false" href="#curr2020">
                                <span class="sidenav-mini-icon"> </span>
                                <span class="sidenav-normal text-dark">2020 Curriculum</span>
                            </a>
                            <div class="collapse" id="curr2020">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link" href="../curriculum/curr2020/stem_curr.php">
                                            <span class="sidenav-mini-icon text-xs"> </span>
                                            <span class="sidenav-normal text-black-50">STEM</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
            </li>';
            } else if ($_SESSION['role'] == "Adviser") {
                echo '<li class="nav-item">
                <a class="nav-link  active" href="../dashboard/index.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link  " href="../subject/add.subject.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add New Subject</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  " href="../subject/add.subject.old.php">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-plus text-dark"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add Old Subject</span>
                </a>
            </li>




            ';
            }
            ?>


        </ul>
    </div>
    <div class="sidenav-footer mx-3">
        <hr class="horizontal dark">
        <?php if ($_SESSION['role'] == "Super Administrator") {
            echo '<a class="btn bg-gradient-light mt-2 mb-3 border-radius-md mx-4" href="#" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Sidebar Settings" data-container="body" data-animation="true"><i class="fa fa-cog"></i></a>
        <a class="btn bg-gradient-light mt-2 mb-3  border-radius-md mx-3" href="../super_admin/edit.SA.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Personal Info" data-container="body" data-animation="true"><i
                class="fas fa-user-edit"></i></a>';
        } elseif ($_SESSION['role'] == "Dean") {
            echo '<a class="btn bg-gradient-light mt-2 mb-3 border-radius-md mx-4" href="../dean/send.report.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Send Report" data-container="body" data-animation="true"><i class="fas fa-paper-plane"></i></a>
            <a class="btn bg-gradient-light mt-2 mb-3  border-radius-md mx-3" href="../dean/edit.dean.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Personal Info" data-container="body" data-animation="true"><i
                class="fas fa-user-edit"></i></a>';
        } elseif ($_SESSION['role'] == "Admission") {
            echo '<a class="btn bg-gradient-light mt-2 mb-3 border-radius-md mx-4" href="../admission/send.report.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Send Report" data-container="body" data-animation="true"><i class="fas fa-paper-plane"></i></a>
            <a class="btn bg-gradient-light mt-2 mb-3  border-radius-md mx-3" href="../admission/edit.admission.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Personal Info" data-container="body" data-animation="true"><i
                class="fas fa-user-edit"></i></a>';
        } elseif ($_SESSION['role'] == "Registrar") {
            echo '<a class="btn bg-gradient-light mt-2 mb-3 border-radius-md mx-4" href="../dean/send.report.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Send Report" data-container="body" data-animation="true"><i class="fas fa-paper-plane"></i></a>
            <a class="btn bg-gradient-light mt-2 mb-3  border-radius-md mx-3" href="../registrar/edit.registrar.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Personal Info" data-container="body" data-animation="true"><i
                class="fas fa-user-edit"></i></a>';
        } elseif ($_SESSION['role'] == "Adviser") {
            echo '<a class="btn bg-gradient-light mt-2 mb-3 border-radius-md mx-4" href="../dean/send.report.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Send Report" data-container="body" data-animation="true"><i class="fas fa-paper-plane"></i></a>
            <a class="btn bg-gradient-light mt-2 mb-3  border-radius-md mx-3" href="../adviser/edit.adviser.php" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Personal Info" data-container="body" data-animation="true"><i
                class="fas fa-user-edit"></i></a>';
        } ?>
    </div>
</aside>