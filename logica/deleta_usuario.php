<?php 


echo('ansfioasnfinaf');

include("bancoUser.php");
include("modelUser.php");

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}


$banco = new BancoUser();

$banco->deleteUser($_GET['user']);


//header("Location: ../index.php");

?>