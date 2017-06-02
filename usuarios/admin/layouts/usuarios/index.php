<?php
require_once('../../../../cp/conexion.php');

$sql = "SELECT * FROM usuarios WHERE activo = 1";
$consulta = $conexion->query($sql);


?>
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Usuarios/<small><label ></label></small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

	
	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-md-2 col-lg-4"></div>
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-4">
				<button class="btn btn-success">Nuevo Usuario</button>
			</div>
		</div><br><br>


		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<div class="row">
						
							<input type="text" id="nick" placeholder="escribe un nick">
						
							<select id="rol">
								<option value="admsin">ADMIN</option>
								<option value="tecnico">TECNICO</option>
								<option value="estandar">ESTANDAR</option>
							</select>	
						
					</div>
					<div class="row">
						<button id="storeUsuario" class="btn btn-primary">Crear Usuario</button>
					</div>
			</div>
		</div>
	</div>	

	<div class="container">
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
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
						<td><button id="<?= $datos->id_usuario; ?>" class="btn btn-warning editUsuario"><i class="fa fa-pencil-square editUsuario" ></i></button>
							<button id="<?= $datos->id_usuario; ?>" class="btn btn-danger deleteUsuario"><i class="fa fa-trash"></i></button></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
	$('#storeUsuario').click(function(){  storeUsuario(); });
	$('.editUsuario').click(function(){  var id = $(this).attr('id'); editUsuario(id); });
	$('.deleteUsuario').click(function(){  var id = $(this).attr('id'); deleteUsuario(id); });


	////function de crud/////


	function storeUsuario()
	{
		var url = "core/controller/usuariosController.php";
		var metodo = "store";
		var nick = $('#nick').val();
		var rol = $('#rol').val();
		$.post( url,{metodo:metodo, nick:nick, rol:rol }, function(data)
                    {
                        if(data == 1){
                            $('#page-wrapper').html('<center><span>Se ha Creado Un nuevo Usuario</span></center>');
                        }else{
                            $('#page-wrapper').html('<center><span>no se Creo el Usuario</span></center>');
                              }
                    });
					setTimeout(function(){cargarUsuarios(); }, 3000);

	}



	function deleteUsuario(id)
	{
		var url = "core/controller/usuariosController.php";
		var metodo = "delete";
		$.post( url,{metodo:metodo, id:id }, function(data)
                    {
                        if(data == 1){
                            $('#page-wrapper').html('<center><span>Se ha Eliminado el Usuario</span></center>');
                        }else{
                            $('#page-wrapper').html('<center><span>no se ha eliminado Usuario</span></center>');
                              }
                    });
					setTimeout(function(){cargarUsuarios(); }, 3000);
	}

	////function de formularios/////
	function editUsuario(id)
	{
		var url = "layouts/usuarios/edit.php";
		$.post( url,{id:id}, function(data)
        {
           $('#page-wrapper').html(data);            
        });
	}

	


</script>


