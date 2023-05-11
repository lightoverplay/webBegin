<?php 
	
	$table = "posts";
	#cái $_POST['add-post'] bên addSomething qua ớ,nữa là vá validate ở đâu luôn cho khỏe !!!
	if (isset($_POST["add-post"])) {	
		adminOnly();	
		unset($_POST["add-post"]);
		if (!empty($_FILES["imagePost"])) {
			$image_name = $_FILES["imagePost"]["name"];
			$destination = "../imageFromProcessingDatabase/" . $image_name;
			$result = move_uploaded_file($_FILES["imagePost"]["tmp_name"], $destination);
			if ($result) {
				$_POST['imagePost'] = $image_name;
			}else{
				array_push($errors, "lỗi upload hình không được");
			}
		}else{
			array_push($errors, "lỗi ảnh không tải lên file này được");
		}
		
		validatePost($_POST);		
		if (count($errors) == 0) {
			#tên đăng nhập tùy vào session của từng người,đọi làm post xong đã rồi làm sau
			$username = $_POST["authorPost"];
			#check là post đã sẵn sàng đăng cho mn xem chưa
			if (isset($_POST["publishedPost"])) {
				$_POST["publishedPost"] = 1;
			}else{
				$_POST["publishedPost"] = 0;
			}

			$_POST['contentPost'] = $_POST['contentPost'];
			$array = [
				"user_id" => $username,
				"topic_id" => $_POST["idTopicPost"],
				"published" => $_POST["publishedPost"],
				"title" => $_POST['titlePost'] ,
				"image" => $_POST['imagePost'],
				"body" => htmlentities($_POST['contentPost']) ,
			];
			$array_notification = [
				"name" => $_POST["titlePost"],
				"messenge" => "đã thêm một bài post bởi tài khoản admin",
				"status" => "read",
			];
			$notification_id = create("notifications",$array_notification);
			$post_id = create($table,$array);

			$_SESSION['messenge'] = "tạo post thành công";
			$_SESSION['type'] = 'alert-success';
			header("location:index.php");
			exit();
			
		}else{
			$contentPostError = $_POST["contentPost"];
			$checkPublishedPost = $_POST["publishedPost"];
		}
	}
	if (isset($_POST["edit-post"])) {
		adminOnly();
		#var_dump($_POST);
		$id = $_POST["idPost"];
		$post = selectOne("posts",["id" => $id ]);		
		$imagePost = $post["image"];
		unset($_POST["edit-post"]);
		$currentImagePost = $_FILES["imagePost"]["name"];

		if ($_FILES["imagePost"]["name"] == "" || $imagePost == $_FILES["imagePost"]["name"]) {
			
			$imageCurrentPost = $post["image"];
				
		}else{
			#nếu đã đổi ảnh,nó sẽ lấy ảnh mới và chuyển vào fd ảnh đã chỉ định
			$imageCurrentPost = $_FILES["imagePost"]["name"];
			$destination = "../imageFromProcessingDatabase/" . $imageCurrentPost;
			$result = move_uploaded_file($_FILES["imagePost"]["tmp_name"], $destination);
			if ($result) {
				$_POST['imagePost'] = $image_name;
			}else{
				array_push($errors, "lỗi upload hình không được");
			}
		}
		if (count($errors == 0)) {
			
				#làm sao mà nếu image không thay đổi,lấy tên từ database về rồi gắn vào trong array,mấy cái khác tương tự
				#mình làm hệ thông user sau
				#đúng ra là $username = $_SESSION["username"];
				$username = 1;
				$array = [
					"user_id" => $username,
					"topic_id" => $_POST["idTopicPost"],
					"published" => $_POST["publishedPost"],
					"title" => $_POST['titlePost'] ,
					"image" => $imageCurrentPost,
					"body" => htmlentities($_POST['contentPost'])
				];
				#test for transform
				#var_dump($_POST);
				#die();
				$array_notification = [
					"name" => $_POST["titlePost"],
					"messenge" => "đã sửa đổi một post bởi tài khoản admin",
					"status" => "read",

				];
				$notification_id = create("notifications",$array_notification);
				$post_id = update($table,$id,$array);
				$_SESSION['messenge'] = "thay đổi post thành công";
				$_SESSION['type'] = 'alert-success';
				header("location:index.php");
				exit();
			
		}else{
			$_SESSION['messenge'] = "thay đổi post thất bại do " . $errors;
			$_SESSION['type'] = 'alert-danger';
			header("locaion:index.php");
			exit();
		}
	}
	#$_GET["publishedPost"] = id của post trên database !!!
	#cái này là cho trang Add post admin nè
	#đổi trạng thái đăng bài của một bài post
    if (isset($_GET["publishedPost"])) {
    	adminOnly();
        $table = "posts";
        $publishedPost = selectOne("posts",["id" => $_GET["publishedPost"]]);
        if ($publishedPost["published"] === 1) {
            ;
            $array = [
                    "user_id" => $publishedPost["user_id"],
                    "topic_id" => $publishedPost["topic_id"],
                    "published" => 0,
                    "title" => $publishedPost['title'] ,
                    "image" => $publishedPost["image"],
                    "body" => htmlentities($publishedPost['body'])
                ];
            $post_id = update($table,$_GET["publishedPost"],$array);
            $_SESSION['messenge'] = "hủy đăng bài thành công";
            $_SESSION['type'] = 'alert-success';
            header("location:index.php");
            exit();
        }
        if($publishedPost["published"] === 0){
            $publishedPost["published"] = 1;
            $array = [
                    "user_id" => $publishedPost["user_id"],
                    "topic_id" => $publishedPost["topic_id"],
                    "published" => 1,
                    "title" => $publishedPost['title'] ,
                    "image" => $publishedPost["image"],
                    "body" => htmlentities($publishedPost['body'])
                ];
            $post_id = update($table,$_GET["publishedPost"],$array);
            $_SESSION['messenge'] = "đăng bài thành công";
            $_SESSION['type'] = 'alert-success';
            header("location:index.php");
            exit();
        }
    }

	#xóa một bài post
	if (isset($_GET["idPostDelete"])) {
		$post = selectOne($table,["id" =>$_GET["idPostDelete"]]);
		$id = $_GET["idPostDelete"];
		$array_notification = [
				"name" => $_POST["nameTopic"],
				"messenge" => "đã xóa một topic bởi tài khoản admin",
				"status" => "read",
		];
		$notification_id = create("notifications",$array_notification);
		$count = delete($table,$id);
		$_SESSION['messenge'] = "xóa post thành công";
		$_SESSION['type'] = 'alert-success';
		header("location:index.php");
		exit();
	}





 ?>