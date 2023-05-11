      <!-- header
      được include bởi các file như blog/index.php , blog/marketing.php ,...
       -->
      <header class="video_backgroud_header">
         <!-- header inner -->
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-3 logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="index.php"><img src="asserts/images/logo.png" alt="#"></a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <?php
                           #gọi biến để xác định biến nào nên là active,nói chung là truy cập file nào,thì active tại file đó !!!
                              $index = "";
                              $about = "";
                              $marketing = "";
                              $blog = "";
                              $contact = "";
                              $login = "";
                              $register = "";


                              $topics = selectAll("topics");
                              #path này đại diện cho file đang truy cập tại thời điểm đó
                              $path = basename($_SERVER['PHP_SELF']);

                              if ($path == "index.php") {
                                 $index = "class=\"active\"";
                              }elseif ($path == "about.php") {
                                 $about = "class=\"active\"";
                              }elseif ($path == "marketing.php") {
                                 $marketing = "class=\"active\"";
                              }elseif ($path == "blog.php") {
                                 $blog = "active";
                              }elseif ($path == "contact.php") {
                                 $contact = "class=\"active\"";
                              }elseif ($path == "login.php") {
                                 $login = "class=\"active\"";
                              }elseif ($path == "register.php") {
                                 $register = "class=\"active\"";
                              } ?>
                              <?php if (isset($_SESSION['id']) && $_SESSION['admin'] == 1 ): ?>
                                    <ul class="menu-area-main">
                                       <li <?php echo $index;?> >
                                          <a href="index.php">Home</a>
                                       </li>
                                       <li <?php echo $marketing;?> >
                                          <a href="marketing.php">Marketing</a>
                                       </li>
                                       <li class="dropdown <?php echo $blog;?> ">
                                         <a class="dropdown-toggle" data-toggle="dropdown" href="blog.php">BLOG
                                         <span class="caret"></span></a>
                                         <ul class="dropdown-menu">
                                          <li><a href="blog.php">full topic</a></li>
                                          <?php foreach ($topics as $key => $topic): ?>
                                              <li><a href="blog.php?idTopicBlog=<?php echo $topic["id"];  ?>"><?php echo $topic["name"]; ?></a></li>
                                          <?php endforeach ?>
                                         </ul>
                                       </li>
                                       <li <?php echo $contact; ?>>
                                          <a href="contact.php">Contact us</a>
                                       </li>
                                        <li>
                                          <a href="admin/dashboard.php">dashboard</a>
                                       </li>
                                       <li>
                                          <a href="logout.php">logout</a>
                                       </li>
                                       <!-- đây là chứng năng search luôn,chức năng này ở blog/app/database/db.php,gửi biến dữ liệu qua file blog.php !!! -->
                                       <li>
                                          <div class="section search_input search ">
                                          <form action="blog.php" method ="post">
                                          <input type="text" name="search_term" class="text-input" placeholder="Search...">
                                          </form>
                                          </div>
                                       </li>
                                 </ul>
                                 <?php elseif (isset($_SESSION['id'])):?>
                                    <ul class="menu-area-main">
                                       <li <?php echo $index; ?>>
                                          <a href="index.php">Home</a>
                                       </li>
                                       <li <?php echo $marketing; ?>>
                                          <a href="marketing.php">Marketing</a>
                                       </li>
                                       <li class="dropdown <?php echo $blog; ?>">
                                         <a class="dropdown-toggle" data-toggle="dropdown" href="blog.php">BLOG
                                         <span class="caret"></span></a>
                                          <ul class="dropdown-menu">
                                             <li><a href="blog.php">full topic</a></li>
                                             <?php foreach ($topics as $key => $topic): ?>
                                                <li><a href="blog.php?idTopicBlog=<?php echo $topic["id"];  ?>"><?php echo $topic["name"]; ?></a></li>
                                             <?php endforeach ?>
                                         </ul>                                       
                                      </li>
                                       <li <?php echo $contact; ?>>
                                          <a href="contact.php">Contact us</a>
                                       </li>
                                       <li>
                                          <a href="logout.php">logout</a>
                                       </li>
                                       <li>
                                          <div class="section search_input search ">
                                          <form action="blog.php" method ="post">
                                          <input type="text" name="search_term" class="text-input" placeholder="Search...">
                                          </form>
                                          </div>
                                       </li>
                                    </ul>
                                 <?php else: ?>
                                    <ul class="menu-area-main">
                                       <li <?php echo $index; ?>>
                                          <a href="index.php">Home</a>
                                       </li>
                                       <li <?php echo $marketing; ?>>
                                          <a href="marketing.php">Marketing</a>
                                       </li>
                                       <li class="dropdown <?php echo $blog; ?>">
                                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">Blog
                                         <span class="caret"></span></a>
                                         <ul class="dropdown-menu">
                                             <li><a href="blog.php">full topic</a></li>
                                             <?php foreach ($topics as $key => $topic): ?>
                                                         <li><a href="blog.php?idTopicBlog=<?php echo $topic["id"];  ?>"><?php echo $topic["name"]; ?></a></li>
                                             <?php endforeach ?>
                                         </ul>   
                                       </li>
                                       <!---->
                                       <!-- tại đây là include header vào trong file login,register luôn,lúc đầu chỉ cần include dd.php khi thực hiện login,register luôn,nhưng có selectAll nên phải include file dd.php hay dòng đầu luôn,là vào trang là include ngay luôn.-->
                                       <li <?php echo $login; ?> >
                                          <a href="login.php">Login</a>
                                       </li>
                                       <li <?php echo $register; ?> >
                                          <a href="register.php">Register</a>
                                       </li>
                                       <li>
                                          <div class="section search_input search ">
                                          <form action="blog.php" method ="post">
                                          <input type="text" name="search_term" class="text-input" placeholder="Search...">
                                          </form>
                                          </div>
                                       </li>
                                    </ul>
                              <?php endif ?>                 
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->