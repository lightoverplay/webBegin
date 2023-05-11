<?php 
	session_start();
	require("connect.php");
	
	#print mọi thông số 
	function checkDataTransmit($records){
		#print_r là print cho mình và người dùng đọc dễ dàng,đồng thời nó cũng bảo mật biến đó có type j .
		echo "<pre>". print_r($records) ."</pre>";
		die();
	}

	#chức năng thực hiện code SQL,gửi yêu cầu lên db
	function executeSQl($sql,$conditions){
		global $conn;
		#$conn->prepare($sql) chỉ là một bước chuẩn bị để làm cái j đó trước khi thức hiện code sql lên db
		$stmt = $conn->prepare($sql);
		#bước đặt tất cả các biến trong $conditions là array của $values
		$values = array_values($conditions);
		#$type ="ss" nếu $condition = ["topic","description"]
		$types = str_repeat("s", count($values));
		#bước dưới đây không thực hiện được khi nếu có có bước prepare ở trên
		# đây là bước để kèm giá trị nó là gì, ví dụ $condition = ["topic","description"] thì bind param có nghĩa là chèn 2 biến chuỗi vào dấu ? của mỗi code sql !!!
		$stmt->bind_param($types,...$values);
		#thực hiện code thôi
		$stmt->execute();
		return $stmt;
	}
	#lấy hết tất cả các records trên db và tất cả cá record theo conditions nếu có
	function selectAll($table,$conditions = []){
		$sql = "SELECT * FROM $table";

		if (empty($conditions)) {
			#gọi biến $conn từ bên ngoài vào
			global $conn;
			#tại sao không dùng executeSQL ở đây vài tại function executeSQL có biến $conditions bắt buộc trong khi tại đây không biến $conditions.
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			return $records;
		}else{
			$i = 0;
			foreach ($conditions as $key => $value) {
				if ($i === 0) {
					$sql = $sql . " WHERE $key=?";
				}else{
					$sql = $sql . " AND $key=?";
				}
				$i++;
			}
			
			$stmt = executeSQl($sql,$conditions);
			$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			return $records;	
		}
	}

	#chức năng chọn một giá trị trong một table cụ thể có điều kiện(bắt buộc có điều kiện)
	function selectOne($table,$conditions){		
		$sql ="SELECT * FROM $table";
		$i = 0;
		foreach ($conditions as $key => $value) {
			if ($i === 0) {
				#phải có space từ WHERE,AND với dấu "
				$sql = $sql . " WHERE $key=?";
			}else{
				$sql = $sql . " AND $key=?";
			}
			$i++;
		}
		$sql = $sql . " LIMIT 1";
		$stmt =executeSQl($sql,$conditions);
		$records = $stmt->get_result()->fetch_assoc();
		return $records;	
	}

	#đã làm xong cái này,đã ok rồi, Nhưng mình cần lấy toàn bộ sự dữ liệu từ db,sau đó kiểm tra lại trên trang đăng ký( Nếu mình không kiểm tra thì nó sẽ tạo được các user giống nhau)
	#
	function create($table, $data){
		$sql = "INSERT INTO $table SET";

		$i = 0;
		foreach ($data as $key => $value) {
			if ($i === 0) {
				$sql = $sql . " $key=?";
			}else{
				$sql = $sql . ", $key=?";
			}
			$i++;
		}

		$stmt = executeSQl($sql, $data);
		$id = $stmt->insert_id;
		return $id;
		
	}
	/* test of create function,tạo ra một user mới
	 $data = [
		"username" => "khách hàng",
		"admin" => 1,
		"password" => "toilakhachhang",
		"email" => "minh@f.com"

	];
	create("users",$data); 
	*/

	#chỉnh sửa thông tin của user,không được thay đổi tên,chỉ thay đổi pass thôi
	function update($table,$id ,$data){
		$sql = "UPDATE $table SET";

		$i = 0;
		foreach ($data as $key => $value) {
			if ($i === 0) {
				$sql = $sql . " $key=?";
			}else{
				$sql = $sql . ", $key=?";
			}
			$i++;
		}
		$sql = $sql . " WHERE id=?";
		$data['id'] = $id;
		$stmt = executeSQl($sql, $data);
		$id = $stmt->insert_id;
		return $id;
	}
	/* check fucntion update
	$data = [
		"username" => "minhNguyen",
		"admin" => 1,
		"password" => "minhDepTrai",
		"email" => "nhuy@em.co"
	];
	$id = update("users", 2 , $data);
	*/
	function delete($table,$id){
		$sql = "DELETE FROM $table WHERE id=?";

		$stmt = executeSQl($sql, ['id'=> $id]);
		return $stmt->afected_rows;
	}
	
	function searchPost($term){
		$match = '%' . $term . '%';
		#lấy tất cả từ table của posts,table users chỉ lấy cột username.
		#kết nối từ user_id từ table posts với id từ table users ...
		$sql = "
		SELECT p.*,u.username 
		FROM posts AS p 
		JOIN users AS u 
		ON p.user_id=u.id 
		WHERE p.published = ?
		AND p.title LIKE ? OR p.body LIKE ?";

		$stmt = executeSQl($sql,['published' => 1 ,'title' => $match , 'body' => $match]);
		$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
		return $records;
	}

?>