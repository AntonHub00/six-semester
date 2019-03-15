
<form name="miformulario" id="miformulario" method="get"  action="actualiza.php">		
	<div class="myField">
		<label for="paterno"> Apellido Paterno: </label>
		<input type="text" name="paterno" id="paterno" required 
		value=<?php echo $_GET['paterno'];  ?>  > 
	</div>	

	<div class="myField">
		<label for="materno"> Apellido materno: </label>
		<input type="text" name="materno" id="materno" required 
		value=<?php echo $_GET['materno'];  ?> > 
	</div>				
	<div class="myField">
		<label for="nombre"> Nombre: </label>
		<input type="text" name="nombre" id="nombre" required 
		value=<?php echo $_GET['nombre'];  ?> > 
	</div>	

		<input type="text" name="mi_id" id="mi_id" hidden 
		value=<?php echo $_GET['id'];  ?> > 
	
	<div class="myField">	
		<label >  </label>			
		<input type="submit" class="formButton" value="Enviar" autofocus name="enviar"> 
		<input type="button" class="formButton" name="Cancelar" value="Cancelar" >			
	</div>					
		</form>



