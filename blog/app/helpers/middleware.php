<?php 

function userOnly($redirect = '/index.php')
{
	if (empty($_SESSION['id'])) {
		$_SESSION["messenge"] = 'You need to login first';
		$_SESSION["type"] = "error";
		header('location: '. "http://localhost/blog" . $redirect );
		exit(0);
	}
}
function adminOnly($redirect = '/index.php')
{
	if (empty($_SESSION['id']) || empty($_SESSION["admin"])) {
		$_SESSION["messenge"] = 'You need not authorized';
		$_SESSION["type"] = "error";
		header('location: '. "http://localhost/blog" . $redirect );
		exit(0);
	}
}


 ?>