                    <?php 
                            $dashboard = "";
                            $addSomething = "";
                            $index = "";
                            $chart = "";
                            $map_google = "";
                            

                            $path = basename($_SERVER['PHP_SELF']);
                            if ($path == "dashboard.php") {
                                $dashboard = "active";
                            }elseif ($path == "addSomething.php") {
                                $addSomething = "active";
                            }elseif ($path == "index.php") {
                                $index = "active";
                            }elseif ($path == "chart.php") {
                                $chart = "active";
                            }elseif ($path == "map_google.php") {
                                $map_google = "active";
                            }
                     ?>
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="active">
                                <div class="main-menu-header">
                                    <img class="img-40 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span><?php echo $_SESSION['username']?></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a>
                                            <a href="auth-normal-sign-in.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pcoded-search">
                                <span class="searchbar-toggle">  </span>
                                <div class="pcoded-search-box ">
                                    <input type="text" placeholder="Search">
                                    <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="<?php echo $dashboard; ?>">
                                    <a href="dashboard.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php #includes("../app/includes/navSideComponentsAdmin"); ?>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="../index.php">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">HOME-BLOG</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php #includes("../app/includes/navSideComponentsAdmin"); ?>
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Forms &amp; Tables</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class=" <?php echo $index; ?> ">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">INDEX BOARD</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class=" <?php echo $addSomething; ?> ">
                                    <a href="addSomething.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Add User,Post,Topic</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Chart &amp; Maps</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class=" <?php echo $chart; ?> ">
                                    <a href="chart.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Chart</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class=" <?php echo $map_google; ?> ">
                                    <a href="map_google.php">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Maps</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <?php #include("../app/includes/navSidePageOfChartMaps.glyphicon-paperclip"); ?>
                                
                            </ul>
                            <?php #include("../app/includes/navSideOtherAdmin.php"); ?>
                        </div>
                    </nav>