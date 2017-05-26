<?php
require_once('../../cp/conexion.php');

$user= $_GET['datos'];

$sql = "SELECT * FROM usuarios WHERE id_usuario = $user";
$consulta = $conexion->query($sql);
$datos = $consulta->fetch_object()

?>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="php/crear.php" method="POST">
					<div class="row">
	
							<input type="text" name="nick" plceholder="escribe un nick">
						
							<select name="rol">
								<option value="admnin">ADMIN</option>
								<option value="tecnico">TECNICO</option>
								<option value="estandar">ESTANDAR</option>
							</select>	
						
					</div>
					<div class="row">
						<input type="submit" value="CREAR" class="btn btn-primary">
					</div>
				</form>	
			</div>
		</div>
	</div>