<?php
require_once('../../../cp/conexion.php');

$id = $_GET['dato'];

$sql = "UPDATE usuarios SET activo = 0 WHERE id_usuario = $id";
$desactivar = $conexion->query($sql);

if($desactivar){
	header('location:../');
}else{
	echo "error en el sql";
}

?>