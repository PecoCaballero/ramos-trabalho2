<?php


include("bancoUser.php");
$banco = new BancoUser();
function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}

debug($_POST);
if($_POST['senha'] == ''){
	$banco->editUserNoPassword($_GET['user'], $_POST['login'], $_POST['nome'], $_POST['permissao'], $_POST['salario'], $_POST['departamento']);
}
else{
	$banco->editUser($_GET['user'], $_POST['login'], $_POST['nome'], $_POST['permissao'], md5($_POST['senha']), $_POST['salario'], $_POST['departamento']);
}

header('Location: ../index.php');

?>