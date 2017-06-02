<?php
require_once('../../../../cp/conexion.php');

$id=$_POST['id'];

$sql = "SELECT * FROM archivo WHERE id_proyecto = $id";
$consulta = $conexion->query($sql);


?>
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><a href="" class="archivos">Proyectos</a>/<small><label >Archivos</label></small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
						<div class="form-group">
    						<label for="exampleInputEmail1">Nombre de archivo</label>
    						<input type="text" class="form-control" id="nom">
    						<small class="form-text text-muted">Nombre de el ejecutable o manual a subir</small>
  						</div>
  						<div class="form-group">
    						<input type="file" id="archivo" >
    						<small class="form-text text-muted">Busca el ejecutable o manual a subir</small>
  						</div>

						  <div class="form-group">
							<button class="btn btn-primary" id="storeArchivo">Subir</button>						  	
						  </div>
			</div>
		</div>
	</div>	

	<div class="container">
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
			<table class="table">
				<thead>
					<th>#</th>
					<th>nombre</th>
					<th></th>
				</thead>
				<tbody>
					<?php while($datos = $consulta->fetch_object()){ ?>
					<tr>
						<td><?= $datos->id_archivo; ?></td>
						<td><a href="files/<?= $datos->ruta; ?>" class="btn btn-link" target="_blank"><?= $datos->nom_archivo; ?></button></td>
						<td><button id="<?= $datos->id_archivo; ?>" class="btn btn-warning editProyecto"><i class="fa fa-pencil-square editUsuario" ></i></a>
							<button id="<?= $datos->id_archivo; ?>" class="btn btn-danger deleteProyecto"><i class="fa fa-trash"></i></button></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">

	$('.archivos').click(function(event){event.preventDefault(); cargarArchivos(); });	
	$('indexArchivos').click(function(){  var id = $(this).attr('id'); indexArchivos(id); })
	$('#storeProyecto').click(function(){  storeProyecto(); });
	$('.editProyecto').click(function(){  var id = $(this).attr('id'); editProyecto(id); });
	$('.deleteProyecto').click(function(){  var id = $(this).attr('id'); deleteProyecto(id); });


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
	function editProyecto(id)
	{
		var url = "layouts/proyectos/edit.php";
		$.post( url,{id:id}, function(data)
        {
           $('#page-wrapper').html(data);            
        });
	}

	


</script>


