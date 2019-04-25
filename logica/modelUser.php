<?php 
	class modelUser{
		private $login;
		private $nome;
		private $salario;
		private $senha;

		function constructorUser($login, $nome, $salario, $senha){
			$this->setLogin($login);
			$this->setNome($nome);
			$this->setSalario($salario);
			$this->setSenha($senha);
		}

		public function getLogin(){
			return $this->login;
		}
		public function setLogin($login){
			$this->login = $login;
			return $this;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
			return $this;
		}
		public function getSalario(){
			return $this->salario;
		}
		public function setSalario($salario){
			$this->salario = $salario;
			return $this;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$this->senha = $senha;
			return $this;
		}
					
	}

?>