<?php 
	session_start();
	$_SESSION["user"] = [];
	header("Location: ../login-page.php")

?>