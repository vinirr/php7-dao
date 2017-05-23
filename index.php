<?php 

require_once("config.php");

// $sql = new Sql();
// $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>3));
// echo json_encode($result);

$usuario = new Usuario();
$usuario->loadById(3);
echo $usuario;
?>