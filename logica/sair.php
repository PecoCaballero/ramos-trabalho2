<?php 
	session_start();
	$_SESSION["user"] = [];
	header("location: http://localhost/pw2/trabalho2/login-page.php");

?>