<?php 

class Usuario {
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function getDeslogin(){
		return $this->deslogin;
	}
	public function getDessenha(){
		return $this->dessenha;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setIdusuario($value){
		$this->idusuario = $value;
	}
	public function setDeslogin($value){
		$this->deslogin = $value;
	}
	public function setDessenha($value){
		$this->dessenha = $value;
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")
		));
	}

	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$id
		));

		if(count($results) > 0) {
			$this->setData($results[0]);
		}
	}

	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
	}

	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH", array(
			":SEARCH"=>"%".$login."%"
		));
	}

	public function login($login, $password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));

		if(count($results) > 0 && count($results) < 2){
			$this->setData($results[0]);
		} else {
			throw new Exception("Login e/ou senha inválidos");
		}
	}

	public function setData($data){
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}

	public function insert(){
		$sql = new Sql();
		$sql->query("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (:LOGIN, :PASSWORD)", array(
			":LOGIN"=>$this->getDeslogin(),
			":PASSWORD"=>$this->getDessenha()
		));

		$lastId = $sql->conn->lastInsertId();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
			":ID"=>$lastId
		));

		if(count($results) > 0){
			$this->setData($results[0]);
		}
	}

}

?>