<?php
require_once('../../../../cp/conexion.php');

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$fecha = date('Y/m/d h:m:s');



$sql = "UPDATE noticia SET titulo='$titulo', descripcion='$descripcion', fecha='$fecha' WHERE id = 1";
$actualizacion= $conexion->query($sql);

if($actualizacion){
	echo '<center><h1>La Noticia se ha Actualizado</h1></center>
				<script>setTimeout(function(){ 
					window.location="../../"}, 3000);
				</script>';
}


?>

