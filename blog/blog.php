<?php  
   #nhờ có phần search ở phần header mà với include db.php bên dưới  
   include("app/database/db.php");
   include("app/helpers/middleware.php");
   guestOnly(); 
?>
<!DOCTYPE html>
<html lang="en">
   <?php include("app/includes/head.php"); ?>
   <!-- body -->
   <body class="main-layout">
   <?php include("app/includes/loader.php"); ?>
   <?php include("app/includes/header.php"); ?>
      <!-- revolution slider --> 
      <?php include("app/includes/title.php"); ?>
      <!-- section --> 

      <style>
         .image_post {
            width: 1000px;
            height: 500px;
            text-align: center;
         }
      </style>
      <!-- 
         cái này được truy cập từ phần header của tất cả mọi trang,phần search post hay topic ớ !!!,
         ví dụ như blog/index.php , blog/marketing.php,dòng 130 trong file header.php 
      -->
      <?php if (isset($_GET["idTopicBlog"])): ?>
         <?php    
            if (isset($_POST["search_term"])) {
               $posts = searchPost($_POST["search_term"]); 
            }else{
               $posts = selectAll("posts",["published" => "1","topic_id" => $_GET["idTopicBlog"]]);
            }
         ?>

         <?php 
         #trường hợp không có có topic nào miêu tả giống như vậy ớ, thì nó hiện cái này
            if (count($posts) == 0): ?>
            <?php echo "<h1 style=\"style=text-align: center;\">bị không có bài post theo yêu cầu</h1>" ?>
         <?php endif ?>
         <?php foreach ($posts as $key => $post): ?>
               <div class="section layout_padding blog_blue_bg light_silver">
               <div class="container">   
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <a href="simplePage.php?idPost=<?php echo $post["id"]; ?> ">
                        <div class="full">
                           <div class="big_blog">
                              <img class="img-responsive image_post" src="imageFromProcessingDatabase/<?php echo $post["image"];  ?> " alt="#" />
                           </div>
                           <!-- nó chỉ là chức năng hiện ngày tháng năm thôi-->
                           <div class="blog_cont_2">
                              <h3><?php echo $post["title"] ?></h3>
                              <p class="sublittle"><?php echo date('F j, Y',strtotime($post["create_at"])); ?></p>
                              <p><?php echo substr($post["body"], 0 ,150) . "..." ; ?></p>
                           </div>
                        </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach ?>
      <?php else: ?>
                  <?php    
            if (isset($_POST["search_term"])) {
               $posts = searchPost($_POST["search_term"]); 
            }else{
               $posts = selectAll("posts",["published" => "1"]);
            }

         ?>
         <?php if (count($posts) == 0): ?>
            <?php echo "<h1 style=\"style=text-align: center;\">bị không có bài post theo yêu cầu</h1>" ?>
         <?php endif ?>
         <?php foreach ($posts as $key => $post): ?>
               <div class="section layout_padding blog_blue_bg light_silver">
               <div class="container">   
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                        <!-- khi họ nhấn vào cột bài viết này,nó sẽ dẫn đến trang simplePage.php với biến $_GET["idPost"] = id của post được chỉ định-->
                        <a href="simplePage.php?idPost=<?php echo $post["id"]; ?> ">
                        <div class="full">
                           <div class="big_blog">
                              <img class="img-responsive image_post" src="imageFromProcessingDatabase/<?php echo $post["image"];  ?> " alt="#" />
                           </div>
                           <div class="blog_cont_2">
                              <h3><?php echo $post["title"] ?></h3>
                              <!-- cách sắp xếp ngày tháng năm của php thôi-->
                              <p class="sublittle"><?php echo date('F j, Y',strtotime($post["create_at"])); ?></p>
                              <!-- cách để bài viết chỉ chứa 150 ký tự !!!-->
                              <p><?php echo substr($post["body"], 0 ,150) . "..." ; ?></p>
                           </div>
                        </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach ?>
      <?php #endfor ?>
      <?php endif ?>
      

      <!-- end section -->

<!-- section -->
      <section class="layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="heading" style="padding-left: 15px;padding-right: 15px;">
                     <h4 style="border-bottom: solid #333 1px;">Comments / 2</h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full comment_blog_line">
                     <div class="row">
                        <div class="col-md-1">
                           <img src="asserts/images/c_1.png" alt="#" />
                        </div>
                        <div class="col-md-9">
                           <div class="full contact_text">
                              <h3>Veniam</h3>
                              <h4>Posted on Jan 10 / 2017 at 06:53 am</h4>
                              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet 
                                 dolore magna aliquam erat volutpat.
                              </p>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="reply_bt" href="#">Reply</a>
                        </div>
                     </div>
                  </div>
                  <div class="full comment_blog_line">
                     <div class="row">
                        <div class="col-md-1">
                           <img src="asserts/images/c_2.png" alt="#" />
                        </div>
                        <div class="col-md-9">
                           <div class="full contact_text">
                              <h3>Jack</h3>
                              <h4>Posted on Jan 10 / 2017 at 06:53 am</h4>
                              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet 
                                 dolore magna aliquam erat volutpat.
                              </p>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="reply_bt" href="#">Reply</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row margin_top_30">
               <div class="col-md-12 margin_top_30">
                  <div class="heading" style="padding-left: 15px;padding-right: 15px;">
                     <h4>Post : Your Comment</h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full comment_form">
                     <form action="index.html">
                        <fieldset>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-6">
                                    <input type="text" name="name" placeholder="Name" required="#" />
                                    <input type="email" name="email" placeholder="Email" required="#" />
                                 </div>
                                 <div class="col-md-6">
                                    <textarea placeholder="Comment"></textarea>
                                 </div>
                              </div>
                              <div class="row margin_top_30">
                                 <div class="col-md-12">
                                    <div class="center">
                                       <button>Send</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
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