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
				<form id="formArchivo"  enctype="multipart/form-data" method="POST" action="../../core/crud/guardar.php">
						<div class="form-group">
    						<label for="exampleInputEmail1">Nombre de archivo</label>
    						<input type="text" class="form-control" id="nom" name="nom">
    						<small class="form-text text-muted">Nombre de el ejecutable o manual a subir</small>
  						</div>
  						<div class="form-group">
    						<input type="file" id="archivo" name="archivo">
    						<small class="form-text text-muted">Busca el ejecutable o manual a subir</small>
  						</div>

						  <div class="form-group">
						  	<input type="submit" class="btn btn-primary" value="Subir">
													  	
						  </div>
				</form>
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
	//$("#formArchivo").on("submit", function(e){e.preventDefault();   alert('dieron click'); storeProyecto2();});	
	//$('indexArchivos').click(function(){  var id = $(this).attr('id'); indexArchivos(id); })

	$('.editProyecto').click(function(){  var id = $(this).attr('id'); editProyecto(id); });
	$('.deleteProyecto').click(function(){  var id = $(this).attr('id'); deleteProyecto(id); });


	////function de crud/////


	function storeProyecto()
	{
		var url = "core/controller/archivosController.php";
		var metodo = "store";
		var nom = $('#nom').val();
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

	$('#storeArchivo2').click(function(event){  
		event.preventDefault();
		var url = "core/controller/archivosController.php";
		var metodo ="metodo";
		var formData = new FormData(document.getElementById("formArchivo"));
			formData.append("metodo", metodo);



		$.ajax({
	            url: url,
	            type: "post",
    			dataType: "html",
    			data: formData,
    			cache: false,
    			contentType: false,
    			processData: false
	              success: function (data) 
	              {
	                 console.log(data);
	                 alert(data)
	              }
	             });

	 });


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

	
        $("#storeArchivo").click( function(event){
            event.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formArchivo"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "core/controller/archivosController.php",
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
	     		processData: false
            })
                .done(function(res){
                    console.log(res);
                });
        });

</script>


