<?php
require_once('../../cp/conexion.php');

$sql = "SELECT * FROM usuarios WHERE activo = 1";
$consulta = $conexion->query($sql);




?>


<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../assets/font-awesome/css/font-awesome.min.css">


	<title>ADMIN</title>
</head>
<body>

	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-2 col-lg-4"></div>
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
				<button class="btn btn-success" id="nuevo">Nuevo Usuario</button>
			</div>
		</div><br><br>


		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="php/crear.php" method="POST">
					<div class="row">
						
							<input type="text" name="nick" placeholder="escribe un nick">
						
							<select name="rol">
								<option value="admsin">ADMIN</option>
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

	<div class="container">
		<table class="table">
			<thead>
				<th>#</th>
				<th>NICK</th>
				<th>CLAVE</th>
				<th>ROL</th>
				<th></th>
			</thead>
			<tbody>
				<?php while($datos = $consulta->fetch_object()){ ?>
				<tr>
					<td><?= $datos->id_usuario; ?></td>
					<td><?= $datos->nick; ?></td>
					<td><?= $datos->clave; ?></td>
					<td><?= $datos->rol; ?></td>
					<td><a href="php/editar.php?dato=<?= $datos->id_usuario; ?>" class="btn btn-warning"><i class="fa fa-pencil-square" ></i></a>
						<a href="php/eliminar.php?dato=<?= $datos->id_usuario; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>



