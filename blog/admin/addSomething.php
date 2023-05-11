<!DOCTYPE html>
<html lang="en">
<?php
    #CODE ADD USER DÒNG 75 TRỞ XUỐNG
    #CODE ADD TOPIC DÒNG 125 TRỞ XUỐNG
    #CODE ADD POST DÒNG 155 TRỞ XUỐNG DO note trực tiếp trên đây mà

    #ADD TOPIC ra sao mình đã note trên file topics.php rồi,còn add users,posts thì tương tự thôi nên coi sơ là đc
    include("../app/helpers/middleware.php");
    include("../app/database/db.php");
    adminOnly();
    # biến dành cho chung các phần
    $errors = array(); 
    if (isset($_POST["add-post"])) {
        # biến dành cho posts.php
        $checkPublishedPost = "";
        if (isset( $_POST["publishedPost"])) {
            $checkPublishedPost = $_POST["publishedPost"];
        }else{
            $_POST["publishedPost"] = 0;
        }    
    }
    # biến dành cho topics.php
    $description = "";
    #biến dành cho users.php
    $username = "";
    $email = "";
    #khi mà nhấn nút add cái gì đó ở code bên dưới,nó sẽ vào đây !!
    if (isset($_POST["add-user"]) || isset($_POST["add-post"]) || isset($_POST["add-topic"])) {
        #trường hợp này như là phần reigister bên code blog/register.php ớ !!!
            include("../app/helpers/validate.php"); 
        #khi nào thêm topic nó sẽ vào đây
             $existTopic = array();
            include("../app/controllers/topics.php"); 
        #khi nào thêm post nó sẽ vào đây
            $existPost = array();
            include("../app/controllers/posts.php"); 
        #khi nào thêm users nó sẽ vào đây
            $existTopic = array();
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
                                                    <!-- NƠI ĐỂ ADD USER -->
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Add User</h5>
                                                            <a href="https://www.facebook.com/kinsoucustomshop">kết nối link facebook</a>
                                                            <span> Thêm <code>User</code> vào  </span>
                                                            <div class="card-block">
                                                                <h4 class="sub-title">form thêm user</h4>
                                                                <form action="addSomething.php" method="post" enctype="multipart/form-data">
                                                                   
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">tên người dùng</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="text" name="nameUser" value="<?php echo $username ?> " class="form-control" placeholder="tên user">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">email</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="email" name="emailUser" value="<?php
                                                                            echo $email ?>  " class="form-control"
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
                                                                        <label class="col-sm-2 col-form-label">mật khẩu</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="password" name="passwordUser" class="form-control"
                                                                            placeholder="nhập mật khẩu của user">
                                                                        </div>
                                                                    </div>
                                                                     <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">nhập lại mật khẩu</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="password" name="repeatPasswordUser" class="form-control"
                                                                            placeholder="nhập lại mật khẩu của user">
                                                                        </div>
                                                                    </div>
                                                                    <span style="color: green;">quyền admin <input name="adminCheckUser" type="checkbox"></span><br>
                                                                    <!-- 
                                                                    khi nhấn nút bến dưới, nó sẽ gửi các giá trị về trên file này luôn tương tự,có đều nó sẽ thêm các giá trị và biến nó nhứ $_POST !!!
                                                                    -->
                                                                    <input type="submit" name="add-user" value="ADD USER">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- NƠI ADD TOPIC-->
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Add Topic</h5>
                                                            <span> Thêm <code>Topic</code> vào  </span>
                                                            <div class="card-block">
                                                                <h4 class="sub-title">form thêm topic</h4>
                                                                <form action="addSomething.php" method="post">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">tên topic</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="text" class="form-control" placeholder="tên của topic" name="nameTopic">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">miêu tả của topic</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="text" class="form-control" value="<?php echo $description; ?>" 
                                                                            placeholder="miêu tả của topic" name="descriptionTopic">
                                                                        </div>
                                                                    </div>
                                                                    <input type="submit" value="ADD TOPIC" name="add-topic">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- NƠI ĐỂ ADD POST-->
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Add Post</h5>
                                                            <span>Thêm một bài<code>POST</code></span>
                                                            <div class="card-block">
                                                                <h4 class="sub-title">form thêm bài viết</h4>
                                                                <!--  enctype="multipart/form-data" -->
                                                                <form action="addSomething.php" method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" name="authorPost" value="<?php echo $_SESSION["id"] ?>  ">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">tiêu đề bài viết</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="text" name="titlePost" placeholder="tiêu đề của bài post" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">topic của bài viết</label>
                                                                        <div class="col-sm-10">
                                                                            <!-- lấy tất cả các topic rồi thêm lựa chon topic cho post-->
                                                                            <?php $topics = selectAll("topics") ?>

                                                                            <select name="idTopicPost" cols="30" rows="10">
                                                                                <?php foreach ($topics as $key => $topic): ?>
                                                                                
                                                                                    <?php $key = $key + 1; ?>
                                                                                    <option value=" <?php echo $topic["id"];  ?> "><?php echo $key . " " . $topic["name"]; ?> </option>
                                                                                
                                                                                <?php endforeach ?>
                                                   
                                                                            </select> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">hình ảnh của bài viết</label>
                                                                        <div class="col-sm-10">
                                                                            <input required  type="file" name="imagePost" id="imagePost">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">nội dung của bài viết</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea name="contentPost" class="form-control" placeholder="nơi viết nội dung bài viết" value="<?php echo $contentPost ?>" cols="30" rows="10"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <span>có sẵn sàng đăng bài chưa <input type="checkbox" name="publishedPost"></span>
                                                                    <input type="submit" value="ADD POST" name="add-post">
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
<?php include("../app/includes/JSAdmin.php"); ?>

</body>

</html>
