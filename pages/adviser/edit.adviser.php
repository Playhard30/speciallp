<?php
session_start();
require '../../includes/conn.php';
include '../../includes/head.php';
include '../../includes/session.php';
if ($_SESSION['role'] == "Super Administrator") {
    $faculty_id = $_GET['faculty_id'];
}
$_SESSION['faculty_id'] = $faculty_id;

?>
<title>
    Edit Account | SFAC - Las Piñas
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
                    <h6 class="font-weight-bolder mb-0">Edit Account</h6>
                </nav>
                <?php include '../../includes/navbar.php'; ?>
                <!-- End Navbar -->


                <div class="container-fluid py-4">
                    <div class="col-lg-11 mt-lg-0 mt-4 mx-auto">
                        <!-- Card Profile -->
                        <div class="card card-body" id="profile">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-sm-auto col-4">
                                    <div class="avatar avatar-xl position-relative">
                                        <?php
                                        $getUserData = mysqli_query($db, "SELECT *, CONCAT(tbl_faculties.faculty_firstname, ' ', tbl_faculties.faculty_middlename, ' ', tbl_faculties.faculty_lastname) AS fullname FROM tbl_faculties WHERE faculty_id = '$faculty_id'");
                                        while ($row = mysqli_fetch_array($getUserData)) {
                                            if (!empty($row['img'])) {
                                                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="bruce"
                                                class="border-radius-lg shadow-sm" style="height: 80px; width: 80px;">';
                                            } else {
                                                echo '<img src="../../assets/img/illustrations/user_prof.jpg" alt="bruce"
                                            class="border-radius-lg shadow-sm">';
                                            }


                                        ?>

                                    </div>
                                </div>
                                <div class="col-sm-auto col-8 my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1 font-weight-bolder">
                                            <?php echo $row['fullname'];  ?>
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            faculty
                                        </p>
                                    </div>
                                </div>
                                <form method="POST" enctype="multipart/form-data"
                                    action="userData/ctrl.edit.adviser.php"
                                    class="col-sm-auto ms-lg-auto mt-sm-0 ms-sm-0 mt-3 justify-content-sm-center">

                                    <button class="btn btn-outline-primary me-2 mb-0"><input type="file"
                                            name="image"></button>
                                    <button type="submit" name="saveImg"
                                        class="btn bg-gradient-primary mb-0">Save</button>

                                </form>
                            </div>
                        </div>
                        <!-- Card Basic Info -->
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.adviser.php"
                            class="card mt-4" id="basic-info">
                            <div class="card-header">
                                <h5>Basic Info</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label">Last Name</label>
                                        <div class="input-group">
                                            <input id="lastName" name="lname" class="form-control" type="text"
                                                placeholder="Lastname"
                                                value="<?php echo $row['faculty_lastname'];
                                                                                                                                                ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label">First Name</label>
                                        <div class="input-group">
                                            <input id="firstName" name="fname" class="form-control" type="text"
                                                placeholder="Firstname"
                                                value="<?php echo $row['faculty_firstname'];
                                                                                                                                                ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label">Middlename</label>
                                        <div class="input-group">
                                            <input id="middlename" name="mname" class="form-control" type="text"
                                                placeholder="Middlename"
                                                value="<?php echo $row['faculty_middlename']; ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label mt-4">Email</label>
                                        <div class="input-group">
                                            <input id="email" name="email" class="form-control" type="email"
                                                placeholder="example@email.com"
                                                value="<?php echo $row['email'];
                                                                                                                                                    ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label mt-4">Faculty Number</label>
                                        <div class="input-group">
                                            <input id="text" name="faculty_no" class="form-control" type="text"
                                                placeholder="Enter a faculty number"
                                                value="<?php echo $row['faculty_no']; ?>" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label mt-4">Department</label>
                                        <select class="form-control" name="department" id="department">
                                            <?php $getDepartment = mysqli_query($db, "SELECT * FROM tbl_departments");
                                            while ($row1 = mysqli_fetch_array($getDepartment)) {
                                                echo '<option selected value="' . $row1['department_id'] . '">
                                                ' . $row1['department_name'] . '
                                            </option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label mt-4">Role</label>
                                        <div class="input-group">
                                            <input id="text" name="role" class="form-control" type="text"
                                                placeholder="Enter role" value="<?php echo $row['role']; ?>" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Position</label>
                                        <div class="input-group">
                                            <input id="text" name="position" class="form-control" type="text"
                                                placeholder="Enter position" value="<?php echo $row['position']; ?>"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Employment Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <?php $getStatus = mysqli_query($db, "SELECT * FROM tbl_faculties WHERE faculty_id = '$faculty_id'");
                                            while ($row2 = mysqli_fetch_array($getStatus)) {
                                                if ($row2['status'] == "Full-time") {
                                                    echo '<option selected value="' . $row2['status'] . '">' . $row2['status'] . '</option>
                                            <option value="Part-time">Part-time</option>';
                                                } else {
                                                    echo '<option selected value="' . $row2['status'] . '">' . $row2['status'] . ' </option>
                                                    <option value="Part-time">Full-time</option>';
                                                }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                        <label class="form-label mt-4">Username</label>
                                        <div class="input-group">
                                            <input id="text" name="username" class="form-control" type="text"
                                                placeholder="Enter username" value="<?php echo $row['username']; ?>"
                                                required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 button-row d-flex mt-4">
                                    <button type="submit" name="save"
                                        class="btn bg-gradient-primary ms-auto">Save</button>
                                </div>
                            </div>
                            <?php } ?>
                        </form>


                        <!-- Card Change Password -->
                        <form class="card mt-4 mb-5" id="password" method="POST"
                            action="userData/ctrl.edit.adviser.php">
                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <div class="card-body pt-0">
                                <?php if ($_SESSION['role'] == "Adviser") {
                                    echo '<label class="form-label">Current password</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="oldPass"
                                        placeholder="Current password" required>
                                </div>';
                                } ?>

                                <label class="form-label">New password</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password"
                                        placeholder="New password" required>
                                </div>
                                <label class="form-label">Confirm new password</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="confirmPass"
                                        placeholder="Confirm password" required>
                                </div>

                                <div class="col-12 button-row d-flex mt-4">
                                    <button type="submit" name="savePass"
                                        class="btn bg-gradient-primary ms-auto">Update</button>
                                </div>
                            </div>
                        </form>

                        <?php include '../../includes/footer.php'; ?>
                        <!-- End footer -->
                    </div>
                </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>