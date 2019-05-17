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
          </li>
          <li class="menu-item">
            <a href="#">Alumnos
	      <i class="fa fa-caret-down"></i>
	    </a>
          </li>
          <li class="menu-item">
            <a href="#">Citas agendadas</a>
          </li>
          <li class="menu-item">
            <a href="#">Estadísticas
	      <i class="fa fa-caret-down"></i>
	    </a>
          </li>
          <li class="menu-item">
            <a href="#"> Cerrar sesión </a>
          </li>
	</ul><!--End menu-->
      </nav><!--End navbar-->
      <main class="grid-item main">
	<section>
	  <header>Inicio</header>
	  <article>
	    Quis commodo odio aenean sed adipiscing diam donec adipiscing
	    tristique risus nec feugiat in fermentum posuere urna nec
	    tincidunt praesent semper. Nibh tortor, id aliquet lectus
	    proin nibh nisl, condimentum.
	  </article>
	</section>
      </main><!--End main-->
      <footer class="grid-item footer">
	SAC-ITM &copy 2019
      </footer><!--End footer-->
    </div><!--En wrapper-->
  </body>
</html>
