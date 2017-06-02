<?php
session_start();
require_once('../../../../cp/conexion.php');

$user= $_POST['id'];

$sql = "SELECT * FROM usuarios WHERE id_usuario = $user";
$consulta = $conexion->query($sql);
$datos = $consulta->fetch_object();

$_SESSION['clave']= $datos->clave;

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><a href="" class="usuarios">Usuarios</a>/<small><label >Editar Usuario</label></small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-xs-9 col-sm-8 col-md-8 col-lg-8">
					<div class="row">
							<input type="hidden" id="di" value="<?= $datos->id_usuario; ?>">
							<input type="text" id="nick" value="<?= $datos->nick; ?>">
							<input type="text" id="clave" value="<?= $datos->clave; ?>">
						
							<select id="rol">
								<option value="admin" <?php if($datos->rol == "admin"){ echo 'selected'; } ?> >ADMIN</option>
								<option value="tecnico" <?php if($datos->rol == "tecnico"){ echo 'selected'; } ?>>TECNICO</option>
								<option value="estandar" <?php if($datos->rol == "estandar"){ echo 'selected'; } ?>>ESTANDAR</option>
							</select>	
						
					</div><br>
					<div class="row">
						<button class="btn btn-success" id="updateUsuarios">Editar</button>
					</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('#updateUsuarios').click(function(){ updateUsuarios();  });


	function updateUsuarios()
	{
		var url = "core/controller/usuariosController.php";
		var metodo = "update";
		var nick = $('#nick').val();
		var rol = $('#rol').val();
		var clave = $('#clave').val();
		var id = $('#di').val();
		$.post( url,{metodo:metodo, nick:nick, rol:rol, clave:clave, id:id }, function(data)
                    {
                        if(data == 1){
                            $('#page-wrapper').html('<center><span>Se ha Editado el Usuario</span></center>');
                        }else{
                            $('#page-wrapper').html('<center><span>no se ha Editado el Usuario</span></center>');
                              }
                    });
					setTimeout(function(){cargarUsuarios(); }, 3000);

	}


	</script>