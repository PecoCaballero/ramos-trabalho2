<?php
session_start();
include("logica/bancoUser.php");
$banco = new bancoUser();

$departamentos = $banco->getAllDepts();


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

foreach ($funcionarios as $funcionario) {
	if ($funcionario['login'] == $_GET['user']) {
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
		<a class="navbar-brand"><?php echo $_SESSION["user"]["nome"] . ", " . $permissao; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Exibe funcionário</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="exibe-departamento.php">Exibe departamento<span class="sr-only">(current)</span></a>
				</li>
				<?php if ($_SESSION["user"]["permissao"] == "admin") {
					?>
					<li class="nav-item">
						<a class="nav-link" href="cadastra-funcionario.php">Cadastra funcionário</a>
					</li><?php
					}
					?>
				<?php if ($_SESSION["user"]["permissao"] == "admin") {
					?>
					<li class="nav-item">
						<a class="nav-link" href="cadastra-departamento.php">
							Cadastra departamento
						</a>
					</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="logica/sair.php">Sair</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Editar usuário</h5>
			<form method="POST" action="logica/recebe_usuario.php">
				<div class="row">
					<div class="col">
						<label for="login">Login: </label>
						<input type="text" class="form-control" id="login" name="login" placeholder=<?= $user['login'] ?>>
					</div>
					<div class="col">
						<label for="nome">Nome: </label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder=<?= $user['nome'] ?>>
					</div>
					<div class="col">
						<label for="permissao">Permissão: </label>
						<select class="form-control" name="permissao">
							<option value="usuario">Usuário</option>
							<option value="admin">Administrador</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label for="senha">Senha: </label>
						<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
					</div>
					<div class="col">
						<label for="salario">Salário: </label>
						<input type="text" class="form-control" id="salario" name="salario" placeholder=<?= $user['salario'] ?>>
					</div>
					<div class="col">
						<label for="departamento">Departamento</label>
						<select class="form-control" name="departamento">
							<?php
							foreach ($departamentos as $departamento) {
								?><option value="<?php $departamento['nome'] ?>"><?php echo $departamento['nome'] ?></option><?php
																															}
																															?>
						</select>
					</div>
				</div>
				<button type="submit" name="cadastrar" value="Editar" class="btn btn-primary">Editar</button>
			</form>

</body>

</html>