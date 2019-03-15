<?php

// vamos a eliminar un registro

	$hostname="localhost";
	$user="root";
	$password="";
	$bd="ine";
	$connection = mysqli_connect($hostname, $user, $password);
	mysqli_select_db ($connection, $bd);
	$mi_id=$_GET['id'];
	
	$consulta="DELETE FROM credencial
				WHERE credencial_id=".$mi_id;
			
	$result = mysqli_query($connection, $consulta);		
	if($result)
		echo("Salio todo bien");
	else
		echo ("Salio todo mal");
	
	header('Location: contenedor.php?op=0');

?>











