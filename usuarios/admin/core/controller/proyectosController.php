<?php
require_once('../../../../cp/conexion.php');



if($_POST['metodo']== "store"){
	store($_POST['nom'], $_POST['permiso'], $conexion);

}elseif($_POST['metodo']== "delete"){
	delete($_POST['id'], $conexion);

}elseif($_POST['metodo'] == "update"){
	update($_POST['nom'], $_POST['permiso'],$_POST['id'], $conexion);
}




function store($nom, $permiso, $conexion)
{

	$sql = "INSERT INTO proyecto (nom_proyecto, permiso) VALUES('$nom', '$permiso') ";
	$insertar = $conexion->query($sql);

		if($insertar){
			echo 1;
		}else{
			echo 0;
		}

}


function delete($id, $conexion)
{
	$sql = "UPDATE proyecto SET activo = 0 WHERE id_proyecto = $id";
	$desactivar = $conexion->query($sql);

		if($desactivar){
			echo 1;
		}else{
			echo 0;
		}
}


function update($nom, $permiso, $id, $conexion)
{

	$sql = "UPDATE proyecto SET nom_proyecto = '$nom', permiso = '$permiso' WHERE id_proyecto = $id";
	$actualizar = $conexion->query($sql);

		if($actualizar){
			echo 1;
		}else{
			echo 0;
		}
}


?>