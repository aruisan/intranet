<?php
require_once('../../../../cp/conexion.php');

$sql = "SELECT * FROM noticia WHERE id = 1 ";
$consulta = $conexion->query($sql);
$datos = $consulta->fetch_object();

?> 


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Noticias/<small><label >Ultima Actualizacion: <?= $datos->fecha; ?> </label></small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
            	<div class="col-sm-1 col-md-2 col-lg-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
                   		<div class="form-group">
    						<label for="exampleInputEmail1">Titulo de la Noticia</label>
    						<input type="text" class="form-control" id="titulo" value="<?= $datos->titulo; ?>">
    						<small class="form-text text-muted">Titulo de la Noticia que se vera en el index de la intranet</small>
  						</div>

  						  <div class="form-group">
						    <label for="exampleTextarea">Descripcion de la Noticia</label>
						    <textarea class="form-control" id="descripcion" rows="14"><?= $datos->descripcion; ?></textarea>
						    <small class="form-text text-muted">Descripcion de la Noticia que se vera en el index de la intranet</small>
						  </div>

						  <div class="form-group">
							<button class="btn btn-success" id="actualizarNoticia">Actualizar</button>						  	
						  </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <script type="text/javascript">
                $('#actualizarNoticia').click(function(){
                    actualizarNoticia();
                });

                function actualizarNoticia()
                {
                    var url = "core/controller/noticiasController.php";
                    var metodo = "actualizar";
                    var titulo = $('#titulo').val();
                    var descripcion = $('#descripcion').text();

                    $.post( url,{metodo:metodo, titulo:titulo, descripcion:descripcion }, function(data)
                    {
                        if(data == 1){
                            $('#page-wrapper').html('<center><span>La Noticia se Actualizo</span></center>');
                        }else{

                            $('#page-wrapper').html('<center><span>no se Actualizo los datos</span></center>');
                              }
                    });
                    setTimeout(function(){cargarNoticias(); }, 3000);

                }

            </script>