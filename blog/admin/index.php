<!DOCTYPE html>
<html lang="en">
<?php 
    include("../app/helpers/middleware.php");
    include("../app/database/db.php");
    die();
    #sau khi update ma thieu may dong lenh nay thi cai $_SESSION["name"] = "";
?>
<?php include("../app/includes/headAdmin.php"); ?>


<?php 
#khi nhấn nút delete user,nó sẽ đi vào đây với giá trị $_GET["deleteUserID"] kèm biến là ID bài viết !!!
#tất cả nút delete cách làm đều tương tự nha !!!
if (isset($_GET)): ?>
    <?php include("../app/helpers/validate.php"); ?>
    <?php 
    #khi nào thêm topic nó sẽ vào đây
        $existTopic = array();
        include("../app/controllers/topics.php");  
    #khi nào thêm post nó sẽ vào đây
        $existPost = array();
        include("../app/controllers/posts.php"); 
    #khi nào thêm users nó sẽ vào đây
        #giá trị $_GET["deleteUserID"] sẽ vào đây
        $existTopic = array();
        include("../app/controllers/users.php");
    ?>
<?php endif ?>

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
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <?php include("../app/helpers/mess.php"); ?>
                                    <!-- Basic table card start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>User Table</h5>
                                            <span>cho thấy đang có bao nhiêu <code>USER</code>hiện có của khách hàng,người tới coi trang web</span>
                                            <div class="card-header-right">   
                                                <ul class="list-unstyled card-option">        
                                                    <li><i class="icofont icofont-simple-left "></i></li>
                                                    <li><i class="icofont icofont-maximize full-card"></i></li> 
                                                    <li><i class="icofont icofont-minus minimize-card"></i></li>        
                                                    <li><i class="icofont icofont-refresh reload-card"></i></li>        
                                                    <li><i class="icofont icofont-error close-card"></i></li>    
                                                    </ul>
                                            </div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>stt</th>
                                                            <th>username</th>
                                                            <th>email</th>
                                                            <!--gặp lỗi redirectcting có thể do thiếu tag <a>-->
                                                            <th><a>hình ảnh của username</a></th>
                                                            <th>ngày tạo</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        #hiện thị hết tất cả các user không có quyền admin đây nè 
                                                        #giá trị hiển thị ra sao,có trên note code web !!!
                                                            $userNormal = selectAll("users",["admin" => 0]); 
                                                            $RealKey = 1;
                                                        ?>
                                                        <?php foreach ($userNormal as $key => $user): ?>
                                                                <tr>
                                                                    <td><?php echo $RealKey++; ?> </td>
                                                                    <td><?php echo $user["username"]; ?></td>
                                                                    <td><?php echo $user["email"]; ?></td>
                                                                    <?php if ($user["image"] == ""): ?>
                                                                        <td>chưa có hình ảnh</td>
                                                                        <?php else: ?>
                                                                        <td><a href="#">hình ảnh đây</a></td>
                                                                    <?php endif ?>
                                                                   <td><?php echo $user["create_at"]; ?> </td>
                                                                    <!-- khi nhấn nút xóa,nó sẽ gửi biến qua file tương tự với $_GET["deleteUserID"] thôi -->
                                                                    <td >
                                                                        <a class="dropdown-item" style="color: red;" href="index.php?deleteUserID=<?php echo $user["id"];?> ">xóa</a>
                                                                    </td>
                                                                </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Admin Table</h5>
                                            <span>cho thấy đang có bao nhiêu <code>USER</code> hiện có của quản trị viên luôn</span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>stt</th>
                                                            <th>username</th>
                                                            <th>email</th>
                                                            <!--lỗi redicrecting có thể do thiếu tag a-->
                                                            <th><a>hình ảnh của username</a></th>
                                                            <th>ngày tạo ra</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            
                                                            $userAdmin = selectAll("users",["admin" => 1]); 
                                                            $RealKey = 1;
                                                        ?>

                                                        <?php foreach ($userAdmin as $key => $user): ?>
                                                                <tr>
                                                                    <td><?php echo $RealKey++; ?> </td>
                                                                    <td><?php echo $user["username"]; ?></td>
                                                                    <td><?php echo $user["email"]; ?></td>
                                                                    <?php if ($user["image"] == ""): ?>
                                                                        <td>chưa có hình ảnh</td>
                                                                        <?php else: ?>
                                                                        <td><a href="imageUser.php?imageIdUser=<?php echo $user["id"]?>">hình ảnh đây</a></td>
                                                                    <?php endif ?>
                                                                    <td> <?php echo $user["create_at"];?> </td>
                                                                    <td >
                                                                        <div >
                                                                            <span class="btn btn-primary" data-toggle="dropdown">action</span>
                                                                            <div class="dropdown-menu">
                                                                              <a class="dropdown-item" style="color: green;" href="editUsers.php?editAdminID=<?php echo $user["id"]; ?> ">sửa</a>
                                                                              <a class="dropdown-item" style="color: red;" href="index.php?deleteUserID=<?php echo $user['id']; ?>">xóa</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                           
                                                            
                                                        <?php endforeach; ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Topic table</h5>
                                            <span>Thể hiện hiện tại đang có bao nhiêu <code>TOPIC</code> hiện có</span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>stt</th>
                                                            <th>tên topic</th>
                                                            <th>miêu tả</th>
                                                            <th>ngày tạo ra</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $topics = selectAll("topics"); ?>
                                                        <?php foreach ($topics as $key => $topic): ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $key + 1; ?></th>
                                                                <td> <?php echo $topic["name"] ?></td>
                                                                <td><a href="decriptionTopic.php?idTopic=<?php echo $topic["id"]?>">decription của <?php echo $topic["name"]; ?> </a></td>
                                                                <td><?php echo $topic["create_at"]; ?> </td>
                                                                <td >
                                                                    <div >
                                                                        <span class="btn btn-primary" data-toggle="dropdown">action</span>
                                                                        <div class="dropdown-menu">
                                                                          <a class="dropdown-item" style="color: green;" href="editTopics.php?idTopic=<?php echo $topic["id"] ?>">sửa</a>
                                                                          <a class="dropdown-item" style="color: red;" href="index.php?idTopicDelete=<?php echo $topic["id"] ?>">xóa</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- POST INDEX-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Post Table</h5>
                                            <span>Thể hiện hiện tại đang có bao nhiêu <code>POST</code>  hiện có</span>
                                            <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>stt</th>
                                                            <th>tên người tạo bài viết</th>
                                                            <th>tiêu đề</th>
                                                            <th>topic của bài</th>
                                                            <th>ngày tạo ra</th>
                                                            <th>hình ảnh và nội dung bài viết</th>
                                                            <th>đăng chưa</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $posts = selectAll("posts");?>
                                                         
                                                        <?php foreach ($posts as $key => $post): ?>
                                                            <?php $topic = selectOne("topics",["id" => $post["topic_id"]]); ?>
                                                            
                                                                <tr>
                                                                    <th scope="row"><?php echo $key + 1; ?></th>
                                                                    <td><?php 
                                                                        $user = selectOne("users",["id" => $post["user_id"]]);
                                                                        echo $user["username"];
                                                                     ?> </td>
                                                                    <td><?php echo $post["title"]; ?></td>
                                                                    <td><?php echo $topic['name']; ?></td>
                                                                    <td><?php echo $post["create_at"]; ?>  </td>
                                                                    <td><a href="contentPost.php?idPostContent=<?php echo $post["id"]?>">nội dung bài đây</a></td>
                                                                    <?php if ($post["published"] === 1): ?>
                                                                        <td >
                                                                            <div >
                                                                                <span class="btn btn-primary" data-toggle="dropdown">đã đăng</span>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item" style="color: red;" href="index.php?publishedPost=<?php echo $post['id'] ?>">không đăng nữa</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    <?php else: ?>
                                                                        <td >
                                                                            <div >
                                                                                <span class="btn btn-primary" data-toggle="dropdown">chưa đăng</span>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item" style="color: red;" href="index.php?publishedPost=<?php echo $post['id'] ?>">đăng bài trên post</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    <?php endif ?>
                                                                    <td >
                                                                        <div >
                                                                            <span class="btn btn-primary" data-toggle="dropdown">action</span>
                                                                            <div class="dropdown-menu">
                                                                              <a class="dropdown-item" style="color: green;" href="editPost.php?editPost=<?php echo $post['id'] ?>">sửa</a>
                                                                              <a class="dropdown-item" style="color: red;" href="index.php?idPostDelete=<?php echo $post['id'] ?> ">xóa</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php #endforeach ?>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->

                        <div id="styleSelector">

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
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
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
