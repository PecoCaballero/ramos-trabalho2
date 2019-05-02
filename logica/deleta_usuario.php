<?php 
    
include("modelUser.php");
include("bancoUser.php");

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}


$banco = new bancoUser();

$banco->deleteUser($_GET['user']);

header("Location: ../index.php");

?>