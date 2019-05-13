<?php 

include("modelUser.php");
include("bancoUser.php");

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}

$user = new modelUser();

$user->constructorUser($_POST["login"], $_POST["nome"], $_POST["salario"], md5($_POST["senha"]), $_POST['permissao'], $_POST['departamento']);
print_r($user);

$banco = new bancoUser();

$banco->cadastraUser($user);

header("Location: ../index.php")

?>