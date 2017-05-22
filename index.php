<?php 

require_once("config.php");

$jose = new Usuario();
$jose->loadById(4);
echo $jose;

?>