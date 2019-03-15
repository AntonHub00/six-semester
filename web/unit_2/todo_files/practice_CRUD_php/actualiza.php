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
	$id=$_GET['mi_id'];
	$consulta="UPDATE credencial
				SET paterno='".$paterno."', materno='".$materno."',nombre='".$nombre."'
				WHERE credencial_id=".$id;
	//echo $consulta;
	$result = mysqli_query($connection, $consulta);		
	if($result)
		echo("Salio todo bien");
	else
		echo ("Salio todo mal");
	
	header('Location: contenedor.php?op=0');
	
?>