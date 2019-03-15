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
				<td> ID</td><td>Paterno </td><td> Materno</td><td>Nombre</td>
			</tr>
			<?php
			while($row = mysqli_fetch_assoc($result))
			{	
				echo "<tr>";
				echo "	<td>" .$row['credencial_id']."</td><td>".
						$row['paterno']."</td><td>" .$row['materno'].
						"</td><td>".$row['nombre']."</td>";
				echo "</tr>";	
			}
			?>
		</table>
