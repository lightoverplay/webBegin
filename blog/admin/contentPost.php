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
		<?php 
			include("../app/controllers/posts.php");

			$id = $_GET["idPostContent"];

			$array = [
				"id" => $id,
			];

			$post = selectOne("posts",$array);
			
		?>

		<h1>Đây là POST của bài có tiêu đề <?php echo $post["title"]; ?> </h1>

		<p><?php echo $post["title"]; ?></p>	

		<span>đây là hình ảnh của bài có tiêu đề <?php echo $post["title"];?> </span> <br>
		<?php $sourceImage = "../imageFromProcessingDatabase/".$post['image'].""; ?>
		<img src="<?php echo $sourceImage; ?>" alt="hiện thị lỗi">	
		<p>đây là toàn bộ content của bài này: <br>
			<?php echo $post["body"]; ?></p>
	</body>
</html>