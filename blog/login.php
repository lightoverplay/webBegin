<?php 
  #nhờ có phần search ở phần header mà với include db.php bên dưới
  include("app/database/db.php");
  include("app/helpers/middleware.php");
	include("app/includes/valueForUser.php"); 

  #khi nhấn nút send bên dưới,sẽ vào khu vực này,bước này tương tự vớ register về cách lấy biến từ form,.. nên tự coi
	if (isset($_POST["login-button"])) {
    #đầu tiên khi vào file blog/app/helpers/validate.php chỉ để lấy code validateLogin()
		include("app/helpers/validate.php");
    #thứ hai khi đã validate và đã thành công,khi đó nó sẽ vào file users.php để đăng nhập.
		include("app/controllers/users.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
 	<?php include("app/includes/head.php"); ?>
	<body>
		<?php include("app/includes/loader.php"); ?>
      	<?php include("app/includes/header.php"); ?>
      	<?php include("app/includes/title.php"); ?>
      		<div class="col-md-12">
              	<div class="full comment_form">
                  <?php include("app/helpers/formError.php"); ?>
                 	<form action="login.php" method="post">
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12 register-middle ">
                                    <input type="email" name="email" value="<?php echo $email ?>" placeholder="email" required/>
                                    <input type="password" name="password" placeholder="password" required>
                                 </div>
                              </div>
                              <div class="row margin_top_30">
                                 <div class="col-md-12">
                                    <div class="center">
                                      <!-- khi nhấn nút send bên dưới,nó sẽ reload lại file với các value của các biến $_POST trong tag input-->
                                       <button name="login-button">Send</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                 	</form>
              	</div>
            </div>		
		<?php include("app/includes/javascript.php"); ?>
	</body>
</html>