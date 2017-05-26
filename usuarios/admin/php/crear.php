<?php
require_once('../../../cp/conexion.php');

$rol = $_POST['rol'];
$nick = $_POST['nick'];

$sql = "INSERT INTO usuarios (nick,rol) VALUES('$nick', '$rol') ";
$insertar = $conexion->query($sql);

if($insertar){
	header('location:../');
}else{
	echo "error";
}

?>