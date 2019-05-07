<?php 
	class modelUser{
		private $login;
		private $nome;
		private $salario;
		private $senha;
		private $permissao;
		private $dept;

		function constructorUser($login, $nome, $salario, $senha, $permissao, $dept){
			$this->setLogin($login);
			$this->setNome($nome);
			$this->setSalario($salario);
			$this->setSenha($senha);
			$this->setPermissao($permissao);
			$this->setDept($dept);
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
		public function getPermissao(){
			return $this->permissao;
		}
		public function setPermissao($permissao){
			$this->permissao = $permissao;
			return $this;
		}
		public function getDept(){
			return $this->dept;
		}
		public function setDept($dept){
			$this->dept = $dept;
			return $this;
		}
					
	}

?>