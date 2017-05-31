<?php
require_once('../../../cp/conexion.php');

$sql = "SELECT * FROM noticia WHERE id = 1 ";
$consulta = $conexion->query($sql);
$datos = $consulta->fetch_object();

?> 



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
                	<form action="php/crudNoticias/update.php" method="POST">
                   		<div class="form-group">
    						<label for="exampleInputEmail1">Titulo de la Noticia</label>
    						<input type="text" class="form-control" name="titulo" value="<?= $datos->titulo; ?>">
    						<small class="form-text text-muted">Titulo de la Noticia que se vera en el index de la intranet</small>
  						</div>

  						  <div class="form-group">
						    <label for="exampleTextarea">Descripcion de la Noticia</label>
						    <textarea class="form-control" name="descripcion" rows="14"><?= $datos->descripcion; ?></textarea>
						    <small class="form-text text-muted">Descripcion de la Noticia que se vera en el index de la intranet</small>
						  </div>

						  <div class="form-group">
							<input type="submit" class="btn btn-success" value="Actualizar">						  	
						  </div>
                   </form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->