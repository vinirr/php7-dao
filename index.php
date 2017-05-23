<?php 

require_once("config.php");

// $sql = new Sql();
// $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>3));
// echo json_encode($result);


//Carrega um usuário no objeto
// $usuario = new Usuario();
// $usuario->loadById(3);
// echo $usuario;


//Carrega uma lista de usuários
// $lista = Usuario::getList();
// echo json_encode($lista);


//Carrega uma lista de usuarios buscando pelo login
$search = Usuario::search('vrr20');
echo json_encode($search);

?>