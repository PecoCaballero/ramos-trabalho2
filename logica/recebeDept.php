<?php 

include("modelDept.php");
include("bancoUser.php");

function debug($param){
	echo "<pre>";
	print_r($param);
	echo "</pre>";
}

$dept = new modelDept();
$banco = new bancoUser();

$dept->constructorDept($_POST["sigla"], $_POST["nome"]);
$banco->cadastraDept($dept);


header("Location: ../exibe-departamento.php")

?>