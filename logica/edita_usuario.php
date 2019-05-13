<?php


include("bancoUser.php");

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}

debug($_POST);
echo $_GET['user'];


$banco = new BancoUser();


$banco->editUser($_GET['user'], $_POST['login'], $_POST['nome'], $_POST['permissao'], md5($_POST['senha']), $_POST['salario'], $_POST['departamento']);
header('Location: ../index.php');

?>