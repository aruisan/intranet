<?php
//Archivo de conexión a la base de datos
require('../cp/conexion.php');
header("Content-Type: text/html;charset=utf-8");
$consulta = "SELECT * FROM actividades";
$resultado = $conexion->query($consulta);

?>


<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

<title>Subir imagen</title>
</head>

<body>
<form accept-charset="utf-8" method="POST" id="enviarimagenes" enctype="multipart/form-data" >
<label>Titulo</label><br>
<input type="text" name="titulo" />
<br><br>
<label>Descripcion</label><br>
<textarea name="descripcion"></textarea>
<br><br>
<select name="actividad">
<?php while($data= $resultado->fetch_object()){ ?>
<option value="<?= $data->id_actividad; ?>"><?= $data->nombre; ?></option>
<?php } ?>
</select><br><br>
<input type="file" name="imagen"/>
<br><br>
<button type="submit">ENVIAR</button>
</form>

<hr>
<div id="mensaje"></div>
<hr>
</body>
<script src="js/jquery-3.1.1.min.js"></script>
<script>
$("#enviarimagenes").on("submit", function(e){
	e.preventDefault();
	var formData = new FormData(document.getElementById("enviarimagenes"));

	$.ajax({
		url: "guardar.php",
		type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	}).done(function(echo){
		$("#mensaje").html(echo);
	});
});
</script>
</html>