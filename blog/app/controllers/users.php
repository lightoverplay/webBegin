<?php
	#đã inludes file validate,valueForUser trong các file như index.php,login.php,register.php

	$table = "users";

	#quyền của người dùng,khách hàng tạo một tài khoản trên trang web
	if (isset($_POST['register-button'])) {
		
	 	validateRegister($_POST);
		if (count($errors) == 0) {
			unset($_POST['register-button']);
			unset($_POST['passwordConf']);
			$_POST['admin'] = 0;
			$_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);

			$array_register = [
				"username" => $_POST['username'],
				"admin" => $_POST['admin'],
				"image" => "",
				"password" => $_POST['password'],
				"email" => $_POST['email']
			];
			$array_notificaton = [
				"name" => $_POST['username'],
				"messenge" => "một tài khoản user được tạo có tên",
				"status" => "unread",
			];
			$notifications_id = create("notifications",$array_notificaton);
			$user_id = create($table,$array_register);
			$user = selectOne($table, ['id' => $user_id]);

			//log user in
			$_SESSION['id'] = $user['id'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['admin'] = $user['admin'];
			$_SESSION['messenge'] = "you are register successful";
			$_SESSION['type'] = 'alert-success';
			header("location:index.php");
			exit();

		}
		else{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$passwordConf =  $_POST['passwordConf'];
		}
	} 

	#khi đã vào đây thì
	if (isset($_POST['login-button'])) {
		

		#đã include file validate trên file blog/login.php để lấy function validateLogin đễ kiểm tra lỗi
	 	validateLogin($_POST);
	 	unset($_POST['login-button']);
		if (count($errors) == 0) {
			$user = selectOne($table,['email' => $_POST['email']]);
			if ($user && password_verify($_POST['password'], $user['password'])) {
				if ($user['admin'] == 1) {
						$array_notification = [
							"name" => $user['username'],
							"messenge" => "một tài khoản admin đăng nhập",
							"status" => "unread",
						];
						$notifications_id = create("notifications",$array_notification);	
					}else{
						$array_notification = [
							"name" => $user['username'],
							"messenge" => "một tài khoản user đăng nhập",
							"status" => "unread",
						];
						$notifications_id = create("notifications",$array_notification);
					}	
					//log user in
					$_SESSION['id'] = $user['id'];
					$_SESSION['username'] = $user['username'];
					$_SESSION['admin'] = $user['admin'];
					$_SESSION['messenge'] = "you are login successful";
					$_SESSION['type'] = 'alert-success';
					$_SESSION['id'] = $user['id'];
					if ($_SESSION['admin'] == 1) {						
						header("location:admin/dashboard.php");
					}else{
						header("location:index.php");
					}	
			}
			#khi tồn tại email trên db mà password không trùng với trên db nó cx gửi về luôn !!!
			else{
				#password người khác tự ghi lại
				#$password = $_POST['password'];
				array_push($errors, "password đã sai rồi");
				$email = $_POST['email'];	
			}
		}
		#nếu có lỗi thì nó trả về liền và không thực hiện đăng nhập cho người dùng
		else{
			#password người khác tự ghi lại
			#$password = $_POST['password'];
			array_push($errors,"");
			$email = $_POST['email'];	
		}
	} 
	#sửa thông tin cá nhân của tài khoản user thông thường không có quyền admin.
	#làm nó bên trang chính thức,để mn có quyền sửa tài khoản cá nhân.

	#quyền của người admin tạo một user tùy chọn.
	if (isset($_POST['add-user'])) {
		adminOnly();
		if ($_FILES["imageUser"]["name"] == "") {
			$imageCurrentUser = "";
		}else{
			#nếu đã đổi ảnh,nó sẽ lấy ảnh mới và chuyển vào fd ảnh đã chỉ định
			$imageCurrentUser = $_FILES["imageUser"]["name"];
			$destination = "../imageFromProcessingDatabase/" . $imageCurrentUser;
			$result = move_uploaded_file($_FILES["imageUser"]["tmp_name"], $destination);
			if ($result) {
				$_POST['imageUser'] = $image_name;
			}else{
				array_push($errors, "lỗi upload hình không được");
			}
		}
		validateRegisterAdmin($_POST);
		if (count($errors) == 0) {
			unset($_POST["add-user"]);
			unset($_POST["repeatPasswordUser"]);

			if (isset($_POST["adminCheckUser"])) {
				$_POST["adminCheckUser"] = 1;
				$messenge = "một tài khoản admin được tạo có tên";
			}else{
				$_POST["adminCheckUser"] = 0;
				$messenge = "một tài khoản user được tạo bởi tài khoản admin";
			}

			$_POST['passwordUser'] = password_hash($_POST['passwordUser'],PASSWORD_DEFAULT);
			$array_register = [
				"username" => $_POST['nameUser'],
				"admin" => $_POST["adminCheckUser"],
				"image" => $imageCurrentUser,
				"password" => $_POST['passwordUser'],
				"email" => $_POST['emailUser']
			];
			$array_notificaton = [
				"name" => $_POST['nameUser'],
				"messenge" => $messenge,
				"status" => "read",
			];

			$notifications_id = create("notifications",$array_notificaton);
			$user_id = create($table,$array_register);
			$user = selectOne($table, ['id' => $user_id]);
			//log user in
			$_SESSION['messenge'] = "đã tạo ra user thành công";
			$_SESSION['type'] = 'alert-success';
			header("location:index.php");
			exit();

		}else{
			$username = $_POST['nameUser'];
			$email = $_POST['emailUser'];	
		}		
	}
	#sưa tài khoản admin.
			#validation.
		#trong đó nếu mật khẩu cũ từ file editUsers.php không trùng với mật khẩu trong database,hiện lỗi
		#nếu có repeat password mới mà không có password mới,hiện lỗi và ghi vui lòng điền vào phần password.
		#còn lại nếu có thì đổi,không có giữ nghuyên
		#nếu có hình ảnh,thì update hình ảnh vàoui
		/*
		if ($_FILES["imageUser"]["name"] == "") {
			$imagecurrentUser = "";
		}else{
			#nếu đã đổi ảnh,nó sẽ lấy ảnh mới và chuyển vào fd ảnh đã chỉ định
			$imageCurrentPost = $_FILES["imageUser"]["name"];
			$destination = "../imageFromProcessingDatabase/" . $imageCurrentPost;
			$result = move_uploaded_file($_FILES["imageUser"]["tmp_name"], $destination);
			if ($result) {
				$_POST['imageUser'] = $image_name;
			}else{
				array_push($errors, "lỗi upload hình không được");
			}
		}
		*/
	#sửa tài khoản admin.
	if(isset($_POST['edit-admin'])){
		adminOnly();
		$user = selectOne($table,["email" => $_POST['emailUser']]);
		
		if($_FILES["imageUser"]["name"] == "") {
			if (isset($user["image"])) {
				$imageCurrentUser = $user["image"];
			}else{
				$imageCurrentUser = "";
			}
		}else{
			#nếu đã đổi ảnh,nó sẽ lấy ảnh mới và chuyển vào fd ảnh đã chỉ định
			$imageCurrentUser = $_FILES["imageUser"]["name"];
			$destination = "../imageFromProcessingDatabase/" . $imageCurrentUser;
			$result = move_uploaded_file($_FILES["imageUser"]["tmp_name"], $destination);
			if($result) {
				$_POST['imageUser'] = $image_name;
			}else{
				array_push($errors, "lỗi upload hình không được");
			}
		}
		$user = selectOne($table,['email' => $_POST['emailUser']]);
		
		validateEditAdmin($_POST);
		if (count($errors) == 0) {
			$user = selectOne($table,['email' => $_POST['emailUser']]);
				if ($user && password_verify($_POST['oldPasswordUser'], $user['password'])) {
					unset($_POST["edit-admin"]);
					unset($_POST["repeatNewPasswordUser"]);
					$id = $_POST["editUserID"];
					if (isset($_POST["adminCheckUser"])) {
						$_POST["adminCheckUser"] = 1;
					}else{
						$_POST["adminCheckUser"] = 0;
					}
					if ($_POST["newPasswordUser"] !== "") {
						$password = $_POST["newPasswordUser"];
						$password = password_hash($password, PASSWORD_DEFAULT);
						$array = [
							"username" => $_POST['nameUser'],
							"admin" => $_POST["adminCheckUser"],
							"image" => $imageCurrentUser,
							"password" => $password,
							"email" => $_POST['emailUser']
						];
					}else{
						unset($_POST["newPasswordUser"]);
						$password = $_POST["oldPasswordUser"];
						$password = password_hash($password, PASSWORD_DEFAULT);
						$array = [
							"username" => $_POST['nameUser'],
							"admin" => $_POST["adminCheckUser"],
							"image" => $imageCurrentUser,
							"password" => $password,
							"email" => $_POST['emailUser']
						];
					}
					$array_notificaton = [
						"name" => $_POST['nameUser'],
						"messenge" => "một tài khoản admin có thay đổi,đó là " . $_POST['nameUser'], 
						"status" => "read",
					];
					$notifications_id = create("notifications",$array_notificaton);
					
					$user_id = update($table,$id,$array);
					$_SESSION['messenge'] = "update admin user thành công";
					$_SESSION['type'] = 'alert-success';
					header("location:index.php");
					exit();	
					}else{
						array_push($errors, "password cũ không đúng với password của admin này");
					}
				}
		}



	#xóa một tài khoản user không có quyền admin.
	if (isset($_GET["deleteUserID"])) {
		adminOnly();
		$user = selectOne($table,["id" => $_GET["deleteUserID"]]);
		if (isset($user["admin"])) {
				$messenge = "một tài khoản admin đã xóa";
			}else{
				$messenge = "một tài khoản user đã xóa";
			}
		$array_notificaton = [
			"name" => $user['username'],
			"messenge" => "một tài khoản user đã xóa bởi admin", 
			"status" => "read",
		];
		$notifications_id = create("notifications",$array_notificaton);

		$id = $_GET["deleteUserID"];
		$count = delete($table,$id);
		$_SESSION['messenge'] = "xóa user thành công";
		$_SESSION['type'] = 'alert-success';
		header("location:index.php");
		exit();
	}
	


	

