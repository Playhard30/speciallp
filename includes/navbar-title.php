<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <?php $getSchool_info1 = $db->query("SELECT * FROM tbl_school_info") or die($db->error);
                while ($row = $getSchool_info1->fetch_array()) {
                    echo '  <li class="breadcrumb-item text-sm">
                    <img src="data:image/jpeg;base64,' . base64_encode($row['school_logo']) . '" class="navbar-brand-img h-100" alt="main_logo"
                        style="width: 40px; height: 40px;">
                </li>
                <li class=" text-sm text-dark mt-2 ms-2" aria-current="page">' . $row['school_name'] . ' ' . $row['school_address'] . '</li>
            </ol>';
                } ?>