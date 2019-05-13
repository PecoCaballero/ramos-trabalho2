<?php 

session_start();
$_SESSION = [];

$_SESSION['root'] = "C:/xampp/htdocs/pw2/trabalho2/";

include_once $_SESSION['root']."logica/bancoUser.php";


$banco = new BancoUser();

$user = $banco->getUser($_POST["login"], $_POST["senha"]);
$senha = md5($_POST["senha"]);

//debug($user);

if($user["senha"] == $senha){
	$_SESSION['user'] = $user;
	header("Location: ../index.php");
}
else{
	header("Location: ../login-page.php?try=true");
}

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
	}


?>