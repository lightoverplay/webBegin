<!DOCTYPE html>
<html lang="en">
<?php
    include("../app/helpers/middleware.php");
    include("../app/database/db.php");
    adminOnly(); 
    $description = ""; 
    $errors = array();
    $existTopic = array();
?> 
<!-- đây là làm khi mà từ index.php nhấn sửa qua-->
<?php if (isset($_GET["idTopic"])): ?>
    <?php
        include("../app/controllers/topics.php");   
    ?>  
<?php endif; ?>

<!-- đây là khi edit từ trang edit.php,dúng tại trang này-->
<?php if (isset($_POST["edit-topic"])): ?>
    <?php
        include("../app/helpers/validate.php");
        include("../app/controllers/topics.php"); 
    ?>  
<?php endif; ?>
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
                                                <!-- Topic -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Edit Topic</h5>
                                                        <span> Sửa đổi <code>Topic</code></span>
                                                        <div class="card-block">
                                                            <h4 class="sub-title">Name Topic</h4>
                                                            <form action="editTopics.php" method="post">
                                                                <input type="hidden" name="idTopic" value=" <?php echo $topicId ?> ">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="tên của topic" name="nameTopic" value=" <?php echo $topicName ?> ">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Description</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" value="<?php echo $topicDescription; ?>" 
                                                                        placeholder="miêu tả của topic" name="descriptionTopic">
                                                                    </div>
                                                                </div>
                                                                <input type="submit" value="Edit Topic" name="edit-topic">
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
