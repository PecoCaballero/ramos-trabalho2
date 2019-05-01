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
		$sql = "SELECT senha, nome, salario, permissao FROM Usuario WHERE login='".$login."'";
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
		$sql = "INSERT INTO usuario (login, nome, salario, senha, permissao) VALUES ('{$modelUser->getLogin()}', '{$modelUser->getNome()}', 
		'{$modelUser->getSalario()}', '{$modelUser->getSenha()}', '{$modelUser->getPermissao()}')";
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
	
}

?>