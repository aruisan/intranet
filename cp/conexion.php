<?php
	$conexion = new mysqli('localhost', 'root', 'oskr1987', 'intranet');
	$acentos = $conexion->query("SET NAMES 'utf8'");
		if ($conexion->connect_error){

			die('Error en la conexion'.$conexion->connect_error);
		}
?>