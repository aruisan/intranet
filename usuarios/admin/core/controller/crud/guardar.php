<?php
	session_start();
	require '../../cp/conexion.php';
	setlocale(LC_ALL,"es_ES");

	$ff_load = date('Y/m/d');
	$nombre = $_POST['nombre'];
	$fecha = $_POST['fecha'];
	
	$id_insert = $_SESSION['proceso'];
	
	if($_FILES["archivo"]["error"]>0)
	{
		echo "Error al cargar archivo";	
	} else 
	{
		
		$permitidos = array("application/pdf");
		$limite_kb = 2000;
		
		if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024)
		{
			
			$ruta = '../../files/'.$id_insert.'/';
			$archivo = $ruta.$_FILES["archivo"]["name"];
			$taru = $id_insert.'/'.$_FILES["archivo"]["name"];
			
			if(!file_exists($ruta))
			{
				mkdir($ruta);
			}
			
			if(!file_exists($archivo))
			{
				$sql = "INSERT INTO documento (nom_documento, ff_file, ff_load, ruta, id_proceso) VALUES ('$nombre', '$fecha', '$ff_load', '$taru', '$id_insert')";
				$insertar = $conexion->query($sql);

				if($insertar)
				{
					$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
					if($resultado)
					{
						session_destroy();
					}else
					{
						echo "Error al guardar archivo";
					}
				}else
				{
					die('Error en el sql'.$conexion->connect_error);
				}
					
			} else 
			{
				echo "Archivo ya existe";
			}
				
			
		} else 
		{
			echo "Archivo no permitido o excede el tamaño";
		}
		
	}	
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../css/bootstrap-theme.css" rel="stylesheet">
		<script src="../../js/jquery-3.1.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="../../../index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
