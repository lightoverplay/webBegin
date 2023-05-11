<?php 
	$table = "topics";
	
	
	if (isset($_POST["add-topic"])) {
		adminOnly();
		unset($_POST["add-topic"]);
		#code dòng dưới có được vì nó đã qua file validate.php trước trong file addSomething.php rồi !!!.
		validateTopic($_POST);
		#khi đã xác định không lỗi rồi,nó sẽ tiếp hành nhập topic vào file db 
		if (count($errors) == 0) {
			$array = [
				"name" => $_POST["nameTopic"],
				"description" => $_POST["descriptionTopic"],
			];
			#test for transform
			#var_dump($_POST);
			#die();
			$array_notification = [
				"name" => $_POST["nameTopic"],
				"messenge" => "đã tạo ra một topic bởi tài khoản admin",
				"status" => "read",

			];
			#mình có làm thêm hệ thống notification,nếu có ai dù admin hoạt động thêm,sữa hay xóa j đó,nó cx sẽ thông báo lên hệ thống admin !!
			$notification_id = create("notifications",$array_notification);

			#đây là đã thành công rồi đó !!
			$topic_id = create($table, $array);
			$_SESSION['messenge'] = "tạo topic thành công";
			$_SESSION['type'] = 'alert-success';
			header("location:index.php");
			exit();
		}else{
			$description = $_POST["descriptionTopic"];
		}		
	}
#đưa cho edit page tất cả dữ liệu cần sửa,và gửi để hiện description của topic
	if (isset($_GET["idTopic"])){
		adminOnly();
		$id = $_GET["idTopic"];
		$topic = selectOne($table,["id" => $id]);
		$topicId = $topic["id"];
		$topicName = $topic["name"];
		$topicDescription = $topic["description"];
	}

	if (isset($_POST["edit-topic"])){
		adminOnly();
		$id = $_POST["idTopic"];
		unset($_POST["edit-topic"]);
		$array = [
			"name" => $_POST["nameTopic"],
			"description" => $_POST["descriptionTopic"],
		];
		$array_notification = [
				"name" => $_POST["nameTopic"],
				"messenge" => "đã sửa đổi một topic bởi tài khoản admin",
				"status" => "read",

			];
		$notification_id = create("notifications",$array_notification);
		#test for transform
		#var_dump($_POST);
		#die();
		$topic_id = update($table,$id,$array);
		$_SESSION['messenge'] = "update topic thành công";
		$_SESSION['type'] = 'alert-success';
		header("location:index.php");
		exit();
	}

	if (isset($_GET["idTopicDelete"])) {
		adminOnly();
		$array_notification = [
				"name" => $_POST["nameTopic"],
				"messenge" => "đã xóa một topic bởi tài khoản admin",
				"status" => "read",

			];
		$notification_id = create("notifications",$array_notification);
		$id = $_GET["idTopicDelete"];
		$count = delete($table,$id);
		$_SESSION['messenge'] = "xóa topic thành công";
		$_SESSION['type'] = 'alert-success';
		header("location:index.php");
		exit();
	}



?>