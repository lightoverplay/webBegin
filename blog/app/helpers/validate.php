<?php 

#có thể khi làm trên project test thứ hai thì mình sẽ không tạo ra file validate mà làm trực tiếp trên controllers luôn cho tiện xử lý.

#hoặc là làm gọn lại như validateRegister à validateRegisterAdmin thành một,có j thêm một chú thôi thành validateCreateUser
#Rồi validateEditUser !!!
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

#thực hiện cái này lúc add user admin nè !!! bên addSomething.php ớ :)) để verify cái user đã tồn tại chưa ấy mà !!!

function validateRegisterAdmin(){

	global $errors;
	global $table;
	global $user;
	if ($_POST['passwordUser'] !== $_POST['repeatPasswordUser']) {
		array_push($errors, 'password do not match');
	}
	$existingEmail = selectOne($table, ["email" => $_POST['emailUser']]);
	if (isset($existingEmail)) {
		array_push($errors, "email already have");
	}
	$existingUsername = selectOne("users", ["username" => $_POST['nameUser']]);
	if (isset($existingUsername)) {
		array_push($errors, "username already have been chose");
	}
}

#khi nhấn nút send trên file blog/login.php thì nó vào đây để lấy cái code chức năng thôi
function validateLogin(){
	#đầu tiên là gọi lại biến từ bên ngoài,dùng global để gửi các biến từ bên ngoài vào trong.
	#đã include file blog/app/includes/valueForUser.php trong file blog/login.php rồi để lấy ba biến $erros,$table,$user.
	global $errors;
	global $table;
	global $user;

	#lấy một hàng giá trị từ $table với email bằng $_POST['email'](là giá trị của thuộc tính name tại tag input trong file blog/login.php)
	$user = selectOne($table, ["email" => $_POST['email']]);

	#khi gặp lỗi à không có user nào phù hợp với $_POST['email'] trong db.
	if(empty($user)){
		array_push($errors, 'email not ready exist');
	}
}


function validateEditAdmin(){
	global $errors;
	global $table;
	global $existAdmin;

	#từ file editUsers.php nha.
	$existAdmin = selectOne($table,["username" => $_POST["nameUser"]]);
	if (isset($existAdmin)) {
		if ($existAdmin["id"] == $_POST["editUserID"]) {
			$true = 0;		
		}else{
			array_push($errors, "user này đã tồn tại rồi");
		}
	}
	if (isset($_POST["newPasswordUser"])) {
		if ($_POST["newPasswordUser"] !== $_POST["repeatNewPasswordUser"]) {
			array_push($errors, "password mới và repeat password không trùng nhau");
		}
	}
	#coi lại neu password cu khong trung voi password trong database thi bao loi
	 

}

#thực hiện cái này lúc add topic nè !!! bên addSomething.php ớ :)) để verify cái topic đã tồn tại chưa ấy mà !!!
function validateTopic(){
	global $errors;
	global $table;
	global $existTopic;
	$existTopic = selectOne($table , ["name" => $_POST['nameTopic']]);

	if(isset($existTopic)){
		array_push($errors, 'Topic này đã tồn tại');
	}	
}

#thực hiện cái này lúc add post nè !!! bên addSomething.php ớ :)) để verify cái post đã tồn tại chưa ấy mà !!!

function validatePost(){
	global $errors;
	global $table;
	global $existPost;
	$existPost = selectOne($table , ["title" => $_POST['titlePost']]);

	if(isset($existPost)){
		array_push($errors, 'title của bài viết này đã tồn tài');
	}	
}


 ?>