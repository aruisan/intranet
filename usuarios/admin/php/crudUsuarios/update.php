<?php
require_once('../../../cp/conexion.php');

$id = $_POST['di'];
$nick = $_POST['nick'];
$clave = md5($_POST['clave']);
$rol = $_POST['rol'];

$sql = "UPDATE usuarios SET nick = '$nick', clave = '$clave', rol = '$rol' WHERE id_usuario = $id";
$desactivar = $conexion->query($sql);

if($desactivar){
	header('location:../');
}else{
	echo "error en el sql";
}

?>