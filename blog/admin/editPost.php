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
<?php 
#khi mà từ trang index.php qua trang editPost,nó sẽ lấy các giá trị của bảng mà có id(của database) = id(id từ editPost) của editPost
#sao đó ghi là các giá trị từ database trên thẻ input của editPost
if (isset($_GET["editPost"])) {
    $post = selectOne("posts",["id" => $_GET["editPost"]]);
 } ?>
  <!--  đây là khi edit từ trang edit.php,dúng tại trang này -->
<?php if (isset($_POST["edit-post"])): ?>
    <?php
        
        include("../app/controllers/posts.php"); 
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
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>edit Post</h5>
                                                        <span>Nếu khung nào đó mà không muốn thay đổi,đừng ghi gì cả,nếu không muốn thay đổi hình,đùng làm gì trong khung hình</span>
                                                        <div class="card-block">
                                                            <h4 class="sub-title">form thêm bài viết</h4>
                                                            <!--  enctype="multipart/form-data" -->
                                                            <form action="editPost.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="idPost" value="<?php echo $_GET["editPost"] ?>">
                                                                <input type="hidden" name="authorPost" value="author">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">tiêu đề bài viết</label>
                                                                    <div class="col-sm-10">
                                                                        <input required value=" <?php echo $post["title"]; ?> "  type="text" name="titlePost" placeholder="tiêu đề của bài post" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">topic của bài viết</label>
                                                                    <div class="col-sm-10">
                                                                        <!-- lấy tất cả các topic rồi thêm lựa chon topic cho post-->
                                                                        <?php $topics = selectAll("topics") ?>
                                                                        <select name="idTopicPost" cols="30" rows="10">
                                                                            <?php foreach ($topics as $key => $topic): ?>
                                        
                                                                                <?php if (isset($post["id"])): ?>
                                                                                    <?php $topic["id"] = $post["topic_id"];
                                                                                            $key = $key + 1; ?>
                                                                                    <option selected value=" <?php echo $topic["id"];  ?> "><?php echo $key . " " . $topic["name"]; ?> </option>
                                                                                <?php endif ?>
                                                                            <?php endforeach ?>
                                                                        </select> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">hình ảnh của bài viết</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" name="imagePost" id="imagePost">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">nội dung của bài viết</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea  name="contentPost" class="form-control" placeholder="nơi viết nội dung bài viết" cols="30" rows="10"> <?php echo $post["body"]; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <?php if ($post["published"] === 1): ?>
                                                                    <span>có sẵn sàng đăng bài chưa <input type="checkbox" name="publishedPost" checked></span>
                                                                    <?php else: ?>
                                                                    <span>có sẵn sàng đăng bài chưa <input type="checkbox" name="publishedPost"></span> 
                                                                <?php endif ?>
                                                                <input type="submit" value="EDIT POST" name="edit-post">                                                                          
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
