<?php
session_start();

include("logica/bancoUser.php");

if (!isset($_SESSION["user"])) {
	header("location: ./login-page.php");
} else if ($_SESSION["user"]["permissao"] != 'admin') {
	header("location: ./index.php");
} else {
	if ($_SESSION["user"]["permissao"] == "admin") {
		$permissao = "Administrador";
	} else if ($_SESSION["user"]["permissao"] == "usuario") {
		$permissao = "Usuário";
	}
}

$banco = new bancoUser();
$funcionarios = $banco->getAllUsers();

foreach ($funcionarios as $funcionario){
    if ($funcionario['login'] == $_GET['user']){
        $user = $funcionario;
        break;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Edita Usuário</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><?php if (isset($_SESSION)) {
																				echo $_SESSION["user"]["nome"] . ", " . $permissao;
																			} ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	</nav>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Ediçao de usuário</h5>
			<form method="POST" action="logica/recebe_usuario.php">
				<div class="row">
					<div class="col">
						<label for="login">Login: </label>
						<input type="text" class="form-control" id="login" name="login" placeholder=<?=$user['login']?>>
					</div>
					<div class="col">
						<label for="nome">Nome: </label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder=<?=$user['nome']?>>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="senha">Senha: </label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
					</div>
					<div class="col">
						<label for="salario">Salário: </label>
						<input type="text" class="form-control" id="salario" name="salario" placeholder=<?=$user['salario']?>>
					</div>
					<div class="col">
						<label for="permissao">Permissão: </label>
						<select class="form-control" name="permissao">
							<option value="usuario">Usuário</option>
							<option value="admin">Administrador</option>
						</select>
					</div>
				</div>
				<button type="submit" name="cadastrar" value="Editar" class="btn btn-primary">Editar</button>
			</form>

</body>

</html>