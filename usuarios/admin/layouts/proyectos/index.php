<?php
require_once('../../../../cp/conexion.php');

$sql = "SELECT * FROM proyecto WHERE activo = 1";
$consulta = $conexion->query($sql);


?>
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Proyectos/<small><label ></label></small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

	
	<div class="container">


		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
					<div class="row">
						
							<input type="text" id="nom" placeholder="escribe Un proyecto">
						
							<select id="permisos">
								<option value="todos">Todos</option>
								<option value="tecnico">Solo Tecnicos</option>
							</select>	
						
					</div>
					<div class="row">
						<button id="storeProyecto" class="btn btn-primary">Crear proyecto</button>
					</div>
			</div>
		</div>
	</div>	

	<div class="container">
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Proyecto</th>
					<th>Permisos</th>
					<th></th>
				</thead>
				<tbody>
					<?php while($datos = $consulta->fetch_object()){ ?>
					<tr>
						<td><?= $datos->id_proyecto; ?></td>
						<td><button id="<?= $datos->id_proyecto; ?>" class="btn btn-link indexArchivos"><?= $datos->nom_proyecto; ?></button></td>
						<td><?= $datos->permiso; ?></td>
						<td><button id="<?= $datos->id_proyecto; ?>" class="btn btn-warning editProyecto"><i class="fa fa-pencil-square editUsuario" ></i></button>
							<button id="<?= $datos->id_proyecto; ?>" class="btn btn-danger deleteProyecto"><i class="fa fa-trash"></i></button></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
	
	$('.indexArchivos').click(function(){  var id = $(this).attr('id'); indexArchivos(id); })
	$('#storeProyecto').click(function(){  storeProyecto(); });
	$('.editProyecto').click(function(){  var id = $(this).attr('id'); editProyecto(id); });
	$('.deleteProyecto').click(function(){  var id = $(this).attr('id'); deleteProyecto(id); });


	////function de crud/////


	function storeProyecto()
	{
		var url = "core/controller/proyectosController.php";
		var metodo = "store";
		var dato1 = $('#nom').val();
		var dato2 = $('#permisos').val();
		$.post( url,{metodo:metodo, nom:dato1, permiso:dato2 }, function(data)
                    {
                        if(data == 1){
                            $('#page-wrapper').html('<center><span>Se ha Creado Un nuevo Proyecto</span></center>');
                        }else{
                            $('#page-wrapper').html('<center><span>no se Creo el Proyecto</span></center>');
                              }
                    });
					setTimeout(function(){cargarArchivos(); }, 3000);

	}



	function deleteProyecto(id)
	{
		var url = "core/controller/proyectosController.php";
		var metodo = "delete";
		$.post( url,{metodo:metodo, id:id }, function(data)
                    {
                        if(data == 1){
                            $('#page-wrapper').html('<center><span>Se ha Eliminado el Proyecto</span></center>');
                        }else{
                            $('#page-wrapper').html('<center><span>no se ha eliminado el Proyecto</span></center>');
                              }
                    });
					setTimeout(function(){cargarArchivos(); }, 3000);
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


	function indexArchivos(id)
	{
		var url = "layouts/archivos/index.php";
		$.post( url,{id:id}, function(data)
        {
           $('#page-wrapper').html(data);            
        });
	}
	


</script>


