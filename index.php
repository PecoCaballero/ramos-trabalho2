<?php

session_start();

include("logica/bancoUser.php");

$banco = new bancoUser();

$funcionarios = $banco->getAllUsers();

if(!isset($_SESSION["user"])){
	header("location: ./login-page.php");
}
else{
	if($_SESSION["user"]["permissao"] == "admin"){
		$permissao = "Administrador";
	}
	else if($_SESSION["user"]["permissao"] == "usuario"){
		$permissao = "Usuário";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand"><?php echo $_SESSION["user"]["nome"].", ".$permissao; ?></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Exibe funcionário<span class="sr-only">(current)</span></a>
		      </li>
		      <?php if($_SESSION['user']['permissao'] == 'admin'){
						?>
						<li class="nav-item">
		        <a class="nav-link" href="cadastra-funcionario.php">Cadastra funcionário<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="cadastra-departamento.php">
		          Cadastra departamento
		        </a>
		      </li>
					<?php
					}?>
		      <li class="nav-item">
		        <a class="nav-link" href="exibe-departamento.php">Exibe departamento</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logica/sair.php">Sair</a>
		      </li>
		    </ul>
		  </div>
		</nav>

		<div class="card text-center">
  			<div class="card-body" >
    			<h5 class="card-title">Funcionário e seus salários</h5>
    			<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Nome</th>
				      <th scope="col">Salário</th>
							<th scope="col">Permissão</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		foreach ($funcionarios as $funcionario) {
								echo "<tr>
								<td>".$funcionario['nome']."</td>
								<td>".$funcionario['salario']."</td>";
								if($funcionario['permissao'] == 'usuario'){
									echo "<td>Usuário</td>";
								}
								else if($funcionario['permissao'] == 'admin'){
									echo "<td>Administrador</td>";
								}
				  		}
				  	?>
				  </tbody>
				</table>
  			</div>
		</div>

	</body>
</html>