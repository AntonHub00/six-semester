<?php
#This file can contain php and html to place the values got from the controller.
#Conditionals and loops can be used inside this file
#
#If any other file is require to create the view (like templates or code
#snippets) can be placed in the same directoy where this file is located
#(require "file.php")
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>The title</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/static/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/static/css/font_awesome_4_7_0.css">
    <style>
     nav ul ul {
       display: none;
     }

     nav ul li:hover > ul {
       display: block;
     }

     nav ul ul li {
       position: relative;
       list-style:none;
     }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <nav class="grid-item navbar">
	<ul class="menu">
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/AdminIndex">SAC-ITM</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/AdminIndex"> Inicio </a>
          </li>
          <li class="menu-item">
            <a href=#>Profesionistas
	      <i class="fa fa-caret-down"></i>
	    </a>
	    <ul>
	      <li><a href="<?php echo SITE_URL ?>/AdminRegisterProfessional">Registrar profesionista</a></li>
	      <li><a href="">Ver profesionistas</a></li>
	    </ul>
          </li>
          <li class="menu-item">
            <a href="#">Alumnos</a>
          </li>
          <li class="menu-item">
            <a href="#">Citas agendadas</a>
          </li>
          <li class="menu-item">
            <a href="#">Estadísticas
	      <i class="fa fa-caret-down"></i>
	    </a>
	    <ul>
	      <li><a href="">No disponible</a></li>
	    </ul>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/CloseSession"> Cerrar sesión </a>
          </li>
	</ul><!--End menu-->
      </nav><!--End navbar-->
      <main class="grid-item main">
	<section>
	  <header>Inicio</header>
	  <article>
	    <h3>Bienvenido admin!</h3>
	  </article>
	</section>
      </main><!--End main-->
      <footer class="grid-item footer">
	SAC-ITM &copy 2019
      </footer><!--End footer-->
    </div><!--En wrapper-->
  </body>
</html>
