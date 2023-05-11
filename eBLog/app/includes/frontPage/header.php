      <div class="loader_bg">
       <div class="loader"><img src="asserts/images/loading.gif" alt="#" /></div>
      </div>
      <header>
        <?php
         #gọi biến để xác định biến nào nên là active,nói chung là truy cập file nào,thì active tại file đó !!!
            $index = "";
            $about = "";
            $product = "";
            $blog = "";
            $contact = "";
            $login = "";
            $register = "";

            #path này đại diện cho file đang truy cập tại thời điểm đó
            $path = basename($_SERVER['PHP_SELF']);

            if ($path == "index.php") {
               $index = "class=\"active\"";
            }elseif ($path == "about.php") {
               $about = "class=\"active\"";
            }elseif ($path == "product.php") {
               $product = "class=\"active\"";
            }elseif ($path == "blog.php") {
               $blog = "active";
            }elseif ($path == "contact.php") {
               $contact = "class=\"active\"";
            }elseif ($path == "login.php") {
               $login = "class=\"active\"";
            }elseif ($path == "register.php") {
               $register = "class=\"active\"";
            } ?>
         <!-- header inner -->
         <div class="header">
            <div class="head_top">
               <div class="container">
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                       <div class="top-box">
                        <ul class="sociel_link">
                         <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                         <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                         <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                         <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                     </ul>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                       <div class="top-box">
                        <p>long established fact that a reader will be </p>
                    </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="index.php"><img src="asserts/images/logo.jpg" alt="logo"/></a> </div>
                     </div>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li <?php echo $index; ?>> <a href="index.php">Home</a> </li>
                              <li <?php echo $about; ?>> <a href="about.php">About</a> </li>
                              <li <?php echo $product; ?>> <a href="product.php">product</a> </li>
                              <li <?php echo $blog; ?>> <a href="blog.php"> Blog</a> </li>
                              <li <?php echo $contact; ?>> <a href="contact.php">Contact</a> </li>
                              <li class="mean-last"> <a href="#">signup</a> </li>
                               
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                  <li><a class="buy" href="#">Login</a></li>
               </div>
            </div>
         </div>
         <!-- end header inner --> 
      </header>