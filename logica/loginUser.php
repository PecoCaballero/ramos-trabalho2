<?php 

include("bancoUser.php");

session_start();
$_SESSION = [];
$banco = new BancoUser();

$user = $banco->getUser($_POST["login"], $_POST["senha"]);
$senha = md5($_POST["senha"]);

echo $senha;
debug($user);

if($user["senha"] == $senha){
	$_SESSION['user'] = $user;
	header("location: http://localhost/pw2/trabalho2/index.php");
}
else{
	header("location: http://localhost/pw2/trabalho2/login-page.php?try=true");
}

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
	}


?>