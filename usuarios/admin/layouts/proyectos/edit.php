<?php
session_start();
require_once('../../../../cp/conexion.php');

$edit= $_POST['id'];

$sql = "SELECT * FROM proyecto WHERE id_proyecto = $edit";
$consulta = $conexion->query($sql);
$datos = $consulta->fetch_object();

?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><a href="" class="archivos">Proyectos</a>/<small><label >Editar Proyecto</label></small></h1>
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
							<input type="hidden" id="di" value="<?= $datos->id_proyecto; ?>">
							<input type="text" id="nom" value="<?= $datos->nom_proyecto; ?>">
							<select id="permisos">
								<option value="todos" <?php if($datos->permiso == "todos"){ echo 'selected'; } ?> >Todos</option>
								<option value="tecnico" <?php if($datos->permiso == "tecnico"){ echo 'selected'; } ?> >Solo Tecnicos</option>
							</select>	
						
					</div><br>
					<div class="row">
						<button class="btn btn-success" id="updateProyecto">Editar</button>
					</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$('.archivos').click(function(event){event.preventDefault(); cargarArchivos(); });
		$('#updateProyecto').click(function(){ updateProyecto();  });


	function updateProyecto()
	{
		var url = "core/controller/proyectosController.php";
		var metodo = "update";
		var dato1 = $('#nom').val();
		var dato2 = $('#permisos').val();
		var dato3 = $('#di').val();
		$.post( url,{metodo:metodo, nom:dato1, permiso:dato2, id:dato3 }, function(data)
                    {
                        if(data == 1){
                            $('#page-wrapper').html('<center><span>Se ha Editado el Proyecto</span></center>');
                        }else{
                            $('#page-wrapper').html('<center><span>no se ha Editado el Proyecto</span></center>');
                              }
                    });
					setTimeout(function(){cargarArchivos(); }, 3000);

	}


	</script>