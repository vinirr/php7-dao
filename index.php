<?php 

require_once("config.php");

// $sql = new Sql();
// $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>3));
// echo json_encode($result);


//Carrega um usuário no objeto
// $usuario = new Usuario();
// $usuario->loadById(4);
// echo $usuario;


//Carrega uma lista de usuários
// $lista = Usuario::getList();
// echo json_encode($lista);


//Carrega uma lista de usuarios buscando pelo login
// $search = Usuario::search('vrr20');
// echo json_encode($search);


// Carrega um usuário usando o login e a senha
// $usuario = new Usuario();
// $usuario->login("vrr20", "2133");
// echo $usuario;


// Carrega e insere usuario
// $usuario = new Usuario("maciotagem", "1234");
// $usuario->insert();
// echo $usuario;


// Altera um usuário
// $usuario = new Usuario();
// $usuario->loadById(6);
// $usuario->update("novoLogin", "novaSenha");
// echo $usuario;


// Deleta um usuário
$usuario = new Usuario();
$usuario->loadById(6);
$usuario->delete();
echo $usuario;

?>