<?php 
   #nhờ có phần search ở phần header mà với include db.php bên dưới   
   include("app/database/db.php");
   include("app/helpers/middleware.php");
   guestOnly();
   include("app/includes/valueForUser.php"); ?>


<!DOCTYPE html>
<!-- nó sẽ lấy post dự trên id tương ứng của post-->
<?php $post = selectOne("posts",["id" => $_GET["idPost"]]); ?>
<html lang="en">
   <?php include("app/includes/head.php"); ?>
   <!-- body -->
   <body class="main-layout">
   <?php include("app/includes/loader.php"); ?>
   <?php include("app/includes/header.php"); ?>
      <!-- section --> 
      <!--sao đó echo ra để cho người dùng thấy thôi-->
      <div class="section layout_padding dark_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <img src="imageFromProcessingDatabase/<?php echo $post["image"];  ?>" alt="#" />
               </div>
               <div class="col-md-6">
                  <div class="full blog_cont">
                     <h3 class="white_font"><?php echo $post["title"]; ?></h3>
                     <h5 class="grey_font"><?php echo date('F j, Y',strtotime($post["create_at"])); ?></h5>
                     <p class="white_font"><?php echo $post["body"]; ?></p>
                  </div>
               </div>
            </div>
            
            </div>
         </div>
      </div>
      <!-- end section -->     
      <!-- footer -->
      <?php include("app/includes/footers.php");?>
      <!-- end footer -->
      <?php include("app/includes/javascript.php"); ?>
   </body>
</html>