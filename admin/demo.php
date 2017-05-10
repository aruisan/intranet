
<table>
	<thead>
		<th>id</th>
		<th>titulo</th>
		<th>descripcion</th>
		<th>imagen</th>
	</thead>
	<tbody>
	<?php while($datos = $resultado->fetch_object()){ ?>
		<tr>
			<td><?php echo $datos['id_evento'] ?></td>
			<td><?php echo $datos['titulo'] ?></td>
			<td><?php echo $datos['descripcion'] ?></td>
			<td><img src="data:image/jpeg;base64,<?php echo base64_encode($datos['foto']); ?>" width="100" /></td>
		</tr>
	<?php } ?>
	</tbody>
</table>