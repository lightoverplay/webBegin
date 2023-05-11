<?php 
    $path = basename($_SERVER['PHP_SELF']);
    $label = "";
    $ping = "";
    $notifications = selectAll("notifications");
    foreach ($notifications as $key => $notification) {
        if ($notification["status"] == "unread") {
            $label = "<label class=\"label label-danger\">New</label>";
            $ping = "<span class=\"badge bg-c-pink\"></span>";
        }
    }
 ?>
<?php if (isset($_GET["idActiveNotification"])) {
    $array = [
        "status" => "read"
    ];
    $notification_id = update("notifications",$_GET["idActiveNotification"],$array);
    header("location:$path");

} ?>

<nav class="navbar header-navbar pcoded-header">
                
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="dashboard.php">
                            <img class="img-fluid" src="assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <?php echo $ping; ?>
                                </a>
                                <!--<ul class="show-notification">-->
                                <ul class="show-notification">
                                    
                                    <li>
                                        <h6>Notifications</h6>
                                        <?php echo $label; ?>
                                    </li>
                                        <?php 
                                            $notifcations = selectAll("notifications"); 
                                           
                                        ?>
                                          <style>
                                            class.notification = {
                                                display: inline-block;
                                                padding-bottom: 0px;
                                                padding-top: 0px;
                                            }
                                        </style>
                                        <?php foreach ($notifcations as $key => $notification): ?>
                                            <?php if ($notification["status"] == "unread"): ?>
                                                <a class="notification" href="<?php echo $path; ?>?idActiveNotification=<?php echo $notification["id"];?>">
                                                    <li>
                                                        <div class="media">
                                                        <img class="d-flex align-self-center" src="assets/images/user.png" alt="Generic placeholder image">
                                                            <div class="media-body">
                                                                <h5 class="notification-user"><?php echo $notification["name"]; ?></h5>
                                                                <p class="notification-msg"><?php echo $notification["messenge"]; ?></p>
                                                                <span class="notification-time"><?php echo $notification["date"]; ?> </span>
                                                            </div>
                                                        </div>
                                                    </li>  
                                                </a>   
                                            <?php endif ?>
                                        <?php endforeach ?>
                                </ul>
                            </li>
                            
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $_SESSION['username']; ?> </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <?php $user = selectOne("users",["username" => $_SESSION['username']]); ?>
                                    <li>
                                        <a href="editUsers.php?editAdminID=<?php echo $user["id"];?>">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>