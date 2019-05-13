<?php 
	

class BancoUser{

	function conexao(){
		$servidor = "localhost";
		$usuario = "root";
        $senha = "";
        $banco = "trabalhopw2";
        $con = mysqli_connect($servidor, $usuario, $senha, $banco);

        if(mysqli_connect_errno()){
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else{
        	return $con;
        }
	}

	function getAllDepts(){
		$con = $this->conexao();
		$sql = "SELECT * FROM Departamento";
		$resultado = $con->query($sql);
		$data = [];
		while($row = $resultado->fetch_assoc()){
			array_push($data, $row);
		}
		return $data;
	}

	function getUser($login){
		$con = $this->conexao();
		$sql = "SELECT id, senha, nome, salario, permissao FROM Usuario WHERE login='".$login."'";
		$resultado = $con->query($sql);
		$data = [];
		while($row = $resultado->fetch_assoc()){
			$data = $row;
		}
		return $data;
	}

	function getAllUsers(){
		$con = $this->conexao();
		$sql = "SELECT * FROM Usuario";
		$resultado = $con->query($sql);
		$data = [];
		while($row = $resultado->fetch_assoc()){
			array_push($data, $row);
		}
		return $data;
	}

	function cadastraDept($modelDept){
		$con = $this->conexao();
		$sql = "INSERT INTO Departamento (sigla, nome) VALUES ('{$modelDept->getSigla()}', '{$modelDept->getNome()}')";
		$this->debug($sql);
		if($con->query($sql)){
			echo "cadastrado";
		}
		else{
			echo "deu erro";
		}
	}

	function cadastraUser($modelUser){
		$con = $this->conexao();
		$sql = "INSERT INTO usuario (login, nome, salario, senha, permissao, departamento_fk) VALUES ('{$modelUser->getLogin()}', '{$modelUser->getNome()}', 
		'{$modelUser->getSalario()}', '{$modelUser->getSenha()}', '{$modelUser->getPermissao()}', '{$modelUser->getDept()}')";
		$this->debug($sql);
		if($con->query($sql)){
			echo "cadastrado";
		}
		else{
			echo "deu erro";
		}
	}

	function debug($param){
		echo "<pre>";
		print_r($param);
		echo "</pre>";
	}
	
	function deleteUser($user){
		$con = $this->conexao();
		$sql = "UPDATE usuario SET permissao='NULL' where login='{$user}'";
		$this->debug($sql);
		if($con->query($sql)){
			return True;
		}
		else{
			return False;
		}
	}

	function getDeptFk($nome) {
		$con = $this->conexao();
		$sql = "SELECT id FROM departamento where nome='{$nome}'";
		$resultado = $con->query($sql);
		$data = [];
		while($row = $resultado->fetch_assoc()){
			array_push($data, $row);
		}
		return $data;
	}

	function editUser($id, $user, $nome, $permissao, $senha, $salario, $departamento){
		$con = $this->conexao();
		$sql = "UPDATE usuario SET login='{$user}', nome='{$nome}', senha='{$senha}', salario='{$salario}', departamento_fk='{$departamento}', permissao='{$permissao}' where login='{$id}'";
		$this->debug($sql);
		if($con->query($sql)){
			return True;
		}
		else{
			return False;
		}
	}
}

?>