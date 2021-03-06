<?php
session_start();

include("logica/bancoUser.php");

$banco = new bancoUser();

$departamentos = $banco->getAllDepts();

if (!isset($_SESSION["user"])) {
	header("Location: ./login-page.php");
} else {
	if ($_SESSION["user"]["permissao"] == "admin") {
		$permissao = "Administrador";
	} else {
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
		<a class="navbar-brand"><?php echo $_SESSION["user"]["nome"] . ", " . $permissao; ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Exibe funcionário</a>
				</li>
				<li class="nav-item active">
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

	<div class="card text-center">
		<div class="card-body">
			<h5 class="card-title">Departamentos</h5>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Sigla</th>
						<th scope="col">Nome</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($departamentos as $departamento) {
						echo "
								<tr>
								<td>" . $departamento['sigla'] . "</td>
								<td>" . $departamento['nome'] . "</td>
				    		</tr>";
					}

					?>
				</tbody>
			</table>
		</div>
	</div>

</body>

</html>