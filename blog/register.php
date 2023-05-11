<?php 
	#nhờ có phần search ở phần header mà với include db.php bên dưới
	# nhờ có cái ghestOnly mà mới include thêm biến db.php !!! chắc vậy !!!
	include("app/database/db.php");
	include("app/helpers/middleware.php");
	include("app/includes/valueForUser.php");

	#khi nhấn nút send bên dưới,sẽ vào khu vực này
	if (isset($_POST["register-button"])) {
		#đầu tiên khi vào file blog/app/helpers/validate.php chỉ để lấy code validateRegister() về lại đây
		include("app/helpers/validate.php");
		#sao khi quét xong hết validate.php,nó sẽ lấy phần này về !!!
		/* 
		function validateRegister(){
			global $errors;
			global $table;
			global $user;
			if ($_POST['passwordConf'] !== $_POST['password']) {
				array_push($errors, 'password do not match');
			}
			$existingEmail = selectOne($table, ["email" => $_POST['email']]);
			if (isset($existingEmail)) {
				array_push($errors, "email already have");
			}
			$existingUsername = selectOne("users", ["username" => $_POST['username']]);
			if (isset($existingUsername)) {
				array_push($errors, "username already have been chose");
			}
		}
		 rồi mới vào phần user để kiểm tra xem người dùng đăng ký có hợp lý không,bước này tương tự với login nên không ghi*/
		include("app/controllers/users.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
 	<?php include("app/includes/head.php") ?>
	<body>
		<!-- ba file này bên code php cho front-edn nào cx có -->
		<?php include("app/includes/loader.php"); ?>
      	<?php include("app/includes/header.php"); ?>
		<?php include("app/includes/title.php"); ?>
		<!-- đây dùng đẻ làm form đăng ký người dùng -->
		     	<div class="col-md-12">
                  	<div class="full comment_form">
                  		<!-- gửi toàn bộ dữ liệu qua cho trang register.php trước !! các dữ liệu đó là $_POST["username"] $_POST["email"] $_POST["password"] $_POST["passwordConf"]-->
                     	<form action="register.php" method="post">
	                           <div class="col-md-12">
	                              <div class="row">
	                                 <div class="col-md-12 register-middle ">
	                                 	<!-- khi gặp lỗi trong lúc đăng nhập,tất cả mọi thứ người dùng nhập sẽ được giữ lại để người dùng khỏi nhập lại ở value="<?php echo $username ?>,... -->
	                                    <input type="text" name="username" value="<?php echo $username ?>" placeholder="username" required />
	                                    <input type="email" name="email" value="<?php echo $email ?>" placeholder="email" required/>
	                                    <input type="password" name="password" placeholder="password" required>
	                                    <input type="password" name="passwordConf" placeholder="password confirm" required>
	                                 </div>
	                              </div>
	                              <div class="row margin_top_30">
	                                 <div class="col-md-12">
	                                 	<?php include("app/helpers/formError.php"); ?>
	                                    <div class="center">
	                                    	<!-- khi nhấn nút send thì nó sẽ gửi thôi-->
	                                       <button name="register-button">Send</button>
	                                    </div>
	                                 </div>
	                              </div>
	                           </div>
                     	</form>
                  	</div>
               </div>
            </div>

		<?php include("app/includes/javascript.php"); ?>
	</body>
</html>