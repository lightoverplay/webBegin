<?php 
	include("../app/helpers/middleware.php");
    include("../app/database/db.php");
    adminOnly(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php $user = selectOne("users",["id" => $_GET["imageIdUser"]]); ?>
	<h1>đây là hình ảnh của user</h1>
	<img src="../imageFromProcessingDatabase/<?php echo $user["image"]; ?>" alt="">
</body>
</html>