<!-- alert -->
<?php
if (isset($_SESSION['emptyImg'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="dangerToast"
                            id="autoClickBtn" hidden>
                        </a>';
} elseif (isset($_SESSION['successImg'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successImg"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successUpdate'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successUpdate"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['oldNotMatch'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="oldNotMatch"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['newNotMatch'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="newNotMatch"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['notMatch'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="notMatch"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successPass'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successPass"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successDel'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successDel"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['successAdd'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="successAdd"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['fill'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fill"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['fill-Uinfo'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="fill-Uinfo"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['subjExisting'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="subjExisting"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['subjAdded'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="subjAdded"
    id="autoClickBtn" hidden>
</a>';
} elseif (isset($_SESSION['studAdded'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="studAdded"
       id="autoClickBtn" hidden>
   </a>';
} elseif (isset($_SESSION['studExist'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="studExist"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['courAdded'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="courAdded"
          id="autoClickBtn" hidden>
      </a>';
} elseif (isset($_SESSION['courExist'])) {
 echo '<a class="btn bg-gradient-danger w-100 mb-0 toast-btn" data-target="courExist"
          id="autoClickBtn" hidden>
      </a>';
}
unset($_SESSION['emptyImg']);
unset($_SESSION['successImg']);
unset($_SESSION['successUpdate']);
unset($_SESSION['oldNotMatch']);
unset($_SESSION['newNotMatch']);
unset($_SESSION['successPass']);
unset($_SESSION['successDel']);
unset($_SESSION['successAdd']);
unset($_SESSION['notMatch']);
unset($_SESSION['fill']);
unset($_SESSION['fill-Uinfo']);
unset($_SESSION['subjExisting']);
unset($_SESSION['subjAdded']);
unset($_SESSION['studAdded']);
unset($_SESSION['studExist']);
unset($_SESSION['courAdded']);
unset($_SESSION['courExist']);
?>

<div class="position-fixed top-2 end-1 z-index-3">
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="studExist" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Already exist!</span>
            <small class="text-body"></small <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast"
                aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student number already exist!
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="studAdded" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Student Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Student Successfully Added!.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="fill-Uinfo"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Required Fields!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please complete all required fields in User Info.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="fill" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Required Fields!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please complete all required fields in User Account.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successAdd" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You have successfully added the new user account.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successDel" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Successfully Deleted!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The selected account has been successfully deleted.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successPass" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Password Changed!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Your password has been changed successfully.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Upload Error!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Please select an image and try again.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="oldNotMatch"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Incorrect Password!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The current password you entered is incorrect. Please try again.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="newNotMatch"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">New passwords do not match!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The password confirmation does not match. Please try again.
        </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="notMatch" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Passwords do not match!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The password confirmation does not match. Please try again.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successImg" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Upload Complete!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Image Successfully Uploaded.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successUpdate" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Save Complete!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            Successfully Updated.
        </div>
    </div>

    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="subjExisting"
        aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Subject is Existing!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The subject you're trying to input already exists.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="subjAdded" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Subject Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfull added a subject.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="courAdded" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-check-bold text-success me-2"></i>
            <span class="me-auto font-weight-bold">Course Added!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            You've successfull added a course.
        </div>
    </div>
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="courExist" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="ni ni-notification-70 text-danger me-2"></i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Course is Existing!</span>
            <small class="text-body"></small>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            The course you're trying to input already exists.
        </div>
    </div>
</div>
<!-- End alert -->
<footer class="footer pt-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                    document.write(new Date().getFullYear())
                    </script>,
                    SFAC. Compstud
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                            Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                            target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                            target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>