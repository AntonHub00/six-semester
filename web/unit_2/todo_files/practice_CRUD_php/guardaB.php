<?php
	$hostname="localhost";
	$user="root";
	$password="";
	$bd="ine";
	$connection = mysqli_connect($hostname, $user, $password);
	mysqli_select_db ($connection, $bd);
	$paterno=$_GET['paterno'];
	$materno=$_GET['materno'];	
	$nombre=$_GET['nombre'];	
	$consulta="INSERT INTO credencial(paterno,materno,nombre)
				VALUES('".$paterno."','".$materno."','".$nombre."')";
			
	$result = mysqli_query($connection, $consulta);		
	if($result)
		echo("Salio todo bien");
	else
		echo ("Salio todo mal");
	
	header('Location: contenedorB.php?op=0');
	
?>