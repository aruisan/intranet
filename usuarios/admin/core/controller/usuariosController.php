<?php
require_once('../../../../cp/conexion.php');



if($_POST['metodo']== "store"){
	store($_POST['nick'], $_POST['rol'], $conexion);

}elseif($_POST['metodo']== "delete"){
	delete($_POST['id'], $conexion);

}elseif($_POST['metodo'] == "update"){
	update($_POST['nick'], $_POST['rol'],$_POST['id'], $_POST['clave'], $conexion);
}




function store($nick, $rol, $conexion)
{

	$sql = "INSERT INTO usuarios (nick,rol) VALUES('$nick', '$rol') ";
	$insertar = $conexion->query($sql);

		if($insertar){
			echo 1;
		}else{
			echo 0;
		}

}


function delete($id, $conexion)
{
	$sql = "UPDATE usuarios SET activo = 0 WHERE id_usuario = $id";
	$desactivar = $conexion->query($sql);

		if($desactivar){
			echo 1;
		}else{
			echo 0;
		}
}


function update($nick, $rol, $id, $clave, $conexion)
{
	session_start();
	if($_SESSION['clave'] != $clave){
		$clave = md5($clave);
	}

	$sql = "UPDATE usuarios SET nick = '$nick', clave = '$clave', rol = '$rol' WHERE id_usuario = $id";
	$actualizar = $conexion->query($sql);

		if($actualizar){
			echo 1;
		}else{
			echo 0;
		}
}



?>