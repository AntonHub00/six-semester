<!DOCTYPE html>
<html lang="es">
<head>
	<title>Formularios</title>
	<link rel="stylesheet" href="miestilo.css">
</head>
<body>
	<div id="agrupar">
		<header id="cabecera">
			<h1>Contenedor de Formularios</h1>		
		</header>
		<nav id="menu">
			<ul>
				<li><a href="contenedorB.php?op=1">Agregar</a></li>
				<li><a>Salir</a></li>			
			</ul>		
		</nav>
		<section id="agrupar">
		<?php
			if(isset($_GET['op']))
				if($_GET['op']=='1') 
					include('agregarB.php');
			else
				include('listarB.php');
		?>
		

		</section>
		<footer id="pie">
			Derechos Reservados &copy; 2019 por la mañana Grupo WebA
		</footer>
	</div>
	</body>
</html>
	




