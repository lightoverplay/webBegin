<?php    
   #nhờ có phần search ở phần header mà với include db.php bên dưới
   include("app/database/db.php");
   include("app/helpers/middleware.php");

?>
<!DOCTYPE html>
<html lang="en">
   <?php include("app/includes/head.php"); ?>
   <!-- body -->
   <body class="main-layout">
   <?php include("app/includes/loader.php"); ?>
   <?php include("app/includes/header.php"); ?>
   <?php include("app/includes/title.php"); ?>
      <!-- section --> 
      <div class="section layout_padding dark_bg">
         <div class="container">
            
            <div class="row">
               <div class="col-md-6">
                  <img src="asserts/images/marketing_img.png" alt="#" />
               </div>
               <div class="col-md-6">
                  <div class="full blog_cont">
                     <h3 class="white_font">Where can I get some</h3>
                     <h5 class="grey_font">March 19 2019 5 READ</h5>
                     <p class="white_font">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined g to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator..</p>
                  </div>
               </div>
            </div>
            
            </div>
         </div>
      </div>
      <!-- end section -->

       <!-- section --> 
      <div class="section layout_padding">
         <div class="container">
            
            <div class="row">
   <div class="col-md-6">
                  <div class="full blog_cont">
                     <h3>Where can I get some</h3>
                     <h5>March 19 2019 5 READ</h5>
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined g to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator..</p>
                  </div>
               </div>
               <div class="col-md-6">
                  <img src="asserts/images/marketing_img.png" alt="#" />
               </div>
               
            </div>
         </div>
      </div>
      <!-- end section -->
      
      <!-- footer -->
      <?php include("app/includes/head.php"); ?>
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
      <?php include("app/includes/javascript.php"); ?>
   </body>
</html>