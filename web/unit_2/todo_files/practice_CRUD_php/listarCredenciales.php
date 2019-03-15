<?php
	$connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db ($connection, "ine");
	$consulta="SELECT credencial_id, paterno, materno, nombre 
				FROM credencial
				ORDER BY paterno,materno,nombre";	
	$result = mysqli_query($connection, $consulta);		
?>

<table id="tabla">
	<tr>
		<td>ID</td> <td>Paterno</td><td>Materno</td><td>Nombre</td><td></td>
	</tr>
<?php		
	while($row = mysqli_fetch_assoc($result))
	{
		$id= $row['credencial_id'];
		$paterno= $row['paterno'];	
		$materno= $row['materno'];
		$nombre= $row['nombre'];			
?>	
	<tr>
		<td><?php echo $id; ?></td> 
		<td><?php echo $paterno; ?></td>
		<td><?php echo $materno; ?></td>
		<td><?php echo $nombre; ?></td>

		<td><a href="contenedor.php?id=<?php echo $id; ?>
					&paterno=<?php echo $paterno; ?>
					&materno=<?php echo $materno; ?>
					&nombre=<?php echo $nombre; ?>
					&op=2">Modificar</a>
		
		
		
		<a href="eliminar.php?id=<?php echo $id; ?>">Eliminar</a></td>
		
	</tr>
	<?php } ?>
</table>			

