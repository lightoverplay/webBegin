<?php 
	#xác định dạng cần phải kết nối 
	# $host là host mà mình kết nối (ra bên real db thì có lẻ sẽ có thay đổi)
	$host = "localhost";
	# $user là user trong db có
	$user = "nhutminh";
	#pass là password của user đó
	$pass =	"code@3009";
	# tên của db mình cần có
	$db_name = "blog";

	$conn = new MYSQLi($host,$user,$pass,$db_name);
	if ($conn->connect_error) {
		die('Database connection error: ' . $conn->connect_error);
	}

 ?>