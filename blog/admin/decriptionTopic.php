<?php 
	include("../app/helpers/middleware.php");
    include("../app/database/db.php");
    adminOnly(); 
	include("../app/controllers/topics.php");
	
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		

		<h1>Đây là Topic <?php echo $topicName; ?> </h1>
		<p><?php echo $topicDescription; ?></p>	
		
	</body>
</html>