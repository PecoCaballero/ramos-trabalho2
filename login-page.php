<?php 


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="card ">
		<div class="card-body">
			<h5 class="card-title">Sistema DW1 - Script</h5>
			<form method="POST" action="logica/loginUser.php">
			  <div class="form-group">
			    <label for="login">Login</label>
			    <input class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Username">
			  </div>
			  <div class="form-group">
			    <label for="senha">Senha</label>
			    <input type="password" class="form-control" name="senha" id="senha" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-primary">Entrar</button>
			</form>
		<div>
	</div>
</body>
</html>