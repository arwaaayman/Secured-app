<?php session_start();
	session_destroy();
	setcookie('user','Block try After 10 minutes',time()+60);
	header("location:loginpage.php");
?>