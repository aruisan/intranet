<?php
require_once('../../../cp/conexion.php');

$user= $_GET['dato'];

$sql = "SELECT * FROM usuarios WHERE id_usuario = $user";
$consulta = $conexion->query($sql);
$datos = $consulta->fetch_object();

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="update.php" method="POST">
					<div class="row">
							<input type="hidden" name="di" value="<?= $datos->id_usuario; ?>">
							<input type="text" name="nick" value="<?= $datos->nick; ?>">
							<input type="text" name="clave" value="<?= $datos->clave; ?>">
						
							<select name="rol">
								<option value="admin" <?php if($datos->rol == "admin"){ echo 'selected'; } ?> >ADMIN</option>
								<option value="tecnico" <?php if($datos->rol == "tecnico"){ echo 'selected'; } ?>>TECNICO</option>
								<option value="estandar" <?php if($datos->rol == "estandar"){ echo 'selected'; } ?>>ESTANDAR</option>
							</select>	
						
					</div><br>
					<div class="row">
						<input type="submit" value="EDITAR" class="btn btn-success">
					</div>
				</form>	
			</div>
		</div>
	</div>