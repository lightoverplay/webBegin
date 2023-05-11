<?php 
   #nhờ có phần search ở phần header mà với include db.php bên dưới
   include("app/database/db.php");
   include("app/helpers/middleware.php");

   include("app/includes/valueForUser.php"); 
?>
<!DOCTYPE html>
<html lang="en">
   <?php include("app/includes/head.php"); ?>
   <!-- body -->
   <body class="main-layout">
      <?php 
         # include các code giống nhau tại các file khác như about.php,marketing.php,...
         include("app/includes/loader.php"); 
         include("app/includes/header.php"); 
         # khi mà đăng nhập hay đăng ký thành công,$_SESSION["messenge"]
         include("app/helpers/mess.php"); 

      ?>
      <!-- revolution slider -->
      <div class="banner-slider">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-7">
                  <div id="slider_main" class="carousel slide" data-ride="carousel">
                     <!-- The slideshow -->
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <img src="asserts/images/slider_1.png" alt="#" />
                        </div>
                        <div class="carousel-item">
                           <img src="asserts/images/slider_1.png" alt="#" />
                        </div>
                     </div>
                     <!-- Left and right controls -->
                     <a class="carousel-control-prev" href="#slider_main" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     </a>
                     <a class="carousel-control-next" href="#slider_main" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     </a>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="full slider_cont_section">
                     <h4>More Featured in</h4>
                     <h3>Jack Blogger</h3>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look</p>
                     <div class="button_section">
                        <a href="about.php">Read More</a>
                        <a href="contact.php">Contact Us</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end revolution slider -->
      <!-- section --> 
      <div class="section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="heading">
                     <h3>About <span class="orange_color">Us</span></h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <img src="asserts/images/blog1.png" alt="#" />
               </div>
               <div class="col-md-6">
                  <div class="full blog_cont">
                     <h4>The biggest and most awesome camera of year</h4>
                     <h5>MAY 14 2019 5 READ</h5>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                  </div>
               </div>
            </div>
            <div class="row margin_top_30">
               <div class="col-md-6">
                  <img src="asserts/images/blog2.png" alt="#" />
               </div>
               <div class="col-md-6">
                  <div class="full blog_cont">
                     <h4>What 3 years of android taught me the hard way</h4>
                     <h5>MAY 19 2019  5 READ</h5>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                  </div>
               </div>
            </div>
            <div class="row margin_top_30">
               <div class="col-md-12">
                  <div class="button_section full center margin_top_30">
                     <a style="margin:0;" href="asserts/about.html">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- footer -->
      <?php include("app/includes/footers.php"); ?>
      <div class="cpy">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>Copyright © 2019 Design by <a href="https://html.design/">Free Html Templates</a></p>
               </div>
            </div>
         </div>
      </div>
      <!-- end footer -->
      <!-- include file java script từ fd app/helpers. -->
      <?php include("app/includes/javascript.php"); ?>
   </body>
</html>