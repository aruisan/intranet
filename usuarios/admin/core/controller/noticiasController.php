<?php
require_once('../../../../cp/conexion.php');


if($_POST['metodo']== "actualizar"){
	update($_POST['titulo'], $_POST['descripcion'], $conexion);
}




function update($titulo, $descripcion, $conexion)
{
	$fecha = date('Y/m/d h:m:s');

	$sql = "UPDATE noticia SET titulo='$titulo', descripcion='$descripcion', fecha='$fecha' WHERE id = 1";
	$actualizacion= $conexion->query($sql);

		if($actualizacion){
		echo 1;
		}else{
		echo 0;
		}

}


?>

