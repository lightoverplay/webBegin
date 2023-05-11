<?php 
    include("../app/helpers/middleware.php");
    include("../app/database/db.php");
    adminOnly(); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include("../app/database/db.php"); ?>
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
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-map bg-c-pink"></i>
                                                    <div class="d-inline">
                                                       <h4>Google Map</h4>
                                                       <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-lg-4">
                                            <div class="page-header-breadcrumb">
                                                <ul class="breadcrumb-title">
                                                    <li class="breadcrumb-item">
                                                        <a href="index.html">
                                                            <i class="icofont icofont-home"></i>
                                                        </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Maps</a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#!">Google Maps</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                
                                <!-- Page body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Basic map start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Basic</h5>
                                                    <span>Map shows places around the world</span>
                                                    <div class="card-header-right">                                                             <i class="icofont icofont-spinner-alt-5"></i>                                                         </div>
                                                </div>
                                                <div class="card-block">
                                                    <div id="gmaps-simple" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- Basic map end -->
                                        </div>
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Markers map start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Markers</h5>
                                                    <span>Maps shows <code>location</code> of the place</span>
                                                    <div class="card-header-right">                                                             <i class="icofont icofont-spinner-alt-5"></i>                                                         </div>
                                                </div>
                                                <div class="card-block">
                                                    <div id="markermap" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- Markers map end -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Overlay map start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Street View</h5>
                                                    <span>Map shows view of street</span>
                                                    <div class="card-header-right">                                                             <i class="icofont icofont-spinner-alt-5"></i>                                                         </div>
                                                </div>
                                                <div class="card-block">
                                                    <div id="overlayermap" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- Overlay map start -->
                                        </div>
                                        <div class="col-lg-12 col-xl-6">
                                            <!-- Street View map start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Polygon</h5>
                                                    <span>Map shows Polygon Area</span>
                                                    <div class="card-header-right">                                                             <i class="icofont icofont-spinner-alt-5"></i>                                                         </div>
                                                </div>
                                                <div class="card-block">
                                                    <div id="polymap" class="set-map"></div>
                                                </div>
                                            </div>
                                            <!-- Street View map end -->
                                        </div>
                                 </div>
                            </div>
                            <!-- Page body end -->
                        </div>
                    </div>
                    <!-- Main-body end -->

    
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
