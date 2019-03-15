<?php
	$id=$_GET['id'];
	$connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db ($connection, "ine");
	$consulta="SELECT credencial_id, paterno, materno, nombre 
				FROM credencial
				WHERE credencial_id=".$id."
				ORDER BY paterno,materno,nombre";	
	$result = mysqli_query($connection, $consulta);
	$row = mysqli_fetch_assoc($result);	
	$paterno=$row['paterno'];
	$materno=$row['materno'];
	$nombre=$row['nombre'];
?>
		<form name="miformulario" id="miformulario" method="get"  action="procesaupdate.php">		
			<div class="myField">
				<label for="paterno"> Apellido Paterno: </label>
				<input type="text" name="paterno" id="paterno" required 
					value= <?php echo $paterno; ?> > 
			</div>	

			<div class="myField">
				<label for="materno"> Apellido materno: </label>
				<input type="text" name="materno" id="materno" required 
				value= <?php echo $materno; ?>> 
			</div>				
			<div class="myField">
				<label for="nombre"> Nombre: </label>
				<input type="text" name="nombre" id="nombre" required
					value= <?php echo $nombre; ?>> 
			</div>	
			
			<div class="myField">	
				<label >  </label>			
				<input type="submit" class="formButton" value="Enviar" autofocus name="enviar"> 
				<input type="button" class="formButton" name="Cancelar" value="Cancelar" >			
			</div>					
		</form>



