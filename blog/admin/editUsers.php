<!DOCTYPE html>
<html lang="en">
<?php
    include("../app/helpers/middleware.php");
    include("../app/database/db.php");
    adminOnly(); 
    # biến dành cho chung các phần
    $errors = array();
    # biến dành cho topics.php
    $description = "";

    #biến dành cho users.php
    $username = "";
    $email = "";

    #khi mà từ trang index.php qua trang editUsers.php
    if (isset($_GET["editAdminID"])) {        
        $id = $_GET["editAdminID"];
        $user = selectOne("users",["id" => $id]);
    }
    #khi mà dang thực hiện chức năng edit user
    if (isset($_POST["edit-admin"])) {
        include("../app/helpers/validate.php");
        $existAdmin = "";
        include("../app/controllers/users.php");
    }
?>



<?php include("../app/includes/headAdmin.php"); ?>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">                        
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php include("../app/includes/navHeaderAdmin.php"); ?>
            

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include("../app/includes/navSideAdmin.php"); ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                                <!-- Main-body start -->
                                <div class="main-body">
                                    <div class="page-wrapper">                                        
                                        <!-- Page body start -->
                                        <div class="page-body">
                                            <?php include("../app/helpers/formError.php"); ?>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- USER FORM -->
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>EDIT USER</h5>
                                                            <span>sửa thông tin của <code>User</code> vào  </span>
                                                            <div class="card-block">
                                                                <h4 class="sub-title">form sửa thông tin user</h4>
                                                                <form action="editUsers.php" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="editUserID" value="<?php echo $user["id"] ?> ">
                                                                   
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">tên người dùng</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="text" name="nameUser" value="<?php echo $user["username"] ?> " class="form-control" placeholder="tên user">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">email</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="email" readonly name="emailUser" value="<?php
                                                                            echo $user["email"] ?>  " class="form-control"
                                                                            placeholder="email của user">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <!-- để hiện thị toàn bộ thuộc tính file ảnh,bên kia file phải dùng $_FILES nha-->
                                                                        <label class="col-sm-2 col-form-label">hình ảnh người dùng(không bắt buộc)</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="file" name="imageUser" class="form-control"
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">mật khẩu cũ</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="password" name="oldPasswordUser" class="form-control"
                                                                            placeholder="nhập mật khẩu cũ của user">
                                                                        </div>
                                                                    </div> 
                                                                     <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">mật khẩu mới(không bắt buộc)</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="password" name="newPasswordUser" class="form-control"
                                                                            placeholder="nhập mật khẩu mới của user">
                                                                        </div>
                                                                    </div>
                                                                     <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">nhập lại mật khẩu mới(không bắt buộc)</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="password" name="repeatNewPasswordUser" class="form-control"
                                                                            placeholder="nhập lại mật khẩu mới của user">
                                                                        </div>
                                                                    </div>
                                                                    <span style="color: green;">quyền admin <input name="adminCheckUser" type="checkbox" checked></span><br>
                                                                    <input type="submit" name="edit-admin" value="ADD USER ADMIN">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="assets/js/classie/classie.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
