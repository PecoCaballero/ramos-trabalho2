<?php 
session_start();

if(!isset($_SESSION["user"])){
	header("location: http://localhost/pw2/trabalho2/login-page.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title> Cadastra Funcionário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#"><?php if(isset($_SESSION)){ echo $_SESSION["user"]["nome"]; }?></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Exibe funcionário</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link active" href="cadastra-funcionario.php">Cadastra funcionário<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="cadastra-departamento.php">
		          Cadastra departamento
		        </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="exibe-departamento.php">Exibe departamento</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logica/sair.php">Sair</a>
		      </li>
		    </ul>
		  </div>
		</nav>

	<div class="card">
	<div class="card-body">
	<h5 class="card-title">Formulário de Cadastro</h5>
	<form method="POST" action="logica/recebe_usuario.php">
	  <div class="row">
	    <div class="col">
	      <label for="login">Login: </label>
	      <input type="text" class="form-control" id="login" name="login" placeholder="Username">
	    </div>
	    <div class="col">
	    	<label for="nome">Nome: </label>
	      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
	    </div>
	  </div>
	  <div class="row">
	    <div class="col">
	    	<label for="senha">Senha: </label>
	      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
	    </div>
	    <div class="col">
	    	<label for="salario">Salário: </label>
	      <input type="text" class="form-control" id="salario" name="salario" placeholder="Salário">
	    </div>
	  </div>
	   <button type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">Cadastrar</button>
	</form>

</body>
</html>