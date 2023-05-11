<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['admin']);
unset($_SESSION['messege']);
unset($_SESSION['type']);
unset($_SESSION['password']);
unset($_SESSION['passwordConf']);

session_destroy();

header('location:../index.php');

 ?>