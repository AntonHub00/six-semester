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
	    <form action="<?php echo SITE_URL; ?>/AdminRegisterProfessional" method="POST">
	      <div style="float:left">
		<div>
		  <label for="">Id</label>
		</div>
		<div>
		  <input name="id" type="text" value="" maxlength="15" required/>
		</div>
	      </div>
	      <div style="float:left">
		<div>
		  <label for="">Nombre</label>
		</div>
		<div>
		  <input name="nombre" type="text" value="" maxlength="35" required/>
		</div>
	      </div>
	      <div >
		<div>
		  <label for="">Primer apellido</label>
		</div>
		<div>
		  <input name="primer_apellido" type="text" value="" maxlength="35" required/>
		</div>
	      </div>
	      <br/>
	      <div style="float:left">
		<div>
		  <label for="">Segundo apellido</label>
		</div>
		<div>
		  <input name="segundo_apellido" type="text" value="" required/>
		</div>
	      </div>
	      <div style="float:left">
		<div>
		  <label for="">Correo</label>
		</div>
		<div>
		  <input name="correo" type="email" value="" maxlength="35" required/>
		</div>
	      </div>
	      <div >
		<div>
		  <label for="">Teléfono</label>
		</div>
		<div>
		  <input name="telefono" type="text" value="" maxlength="15" required/>
		</div>
	      </div>
	      <br/>
	      <div style="float:left">
		<div>
		  <label for="">Puesto</label>
		</div>
		<div>
		  <select name="id_puesto" >
		    <?php foreach ($vars['jobs'] as $job): ?>
		      <option value="<?php echo $job['id']; ?>">
			<?php echo $job['descripcion']; ?>
		      </option>
		    <?php endforeach; ?>
		  </select>
		</div>
	      </div>
	      <div style="float:left">
		<div>
		  <label for="">Contraseña</label>
		</div>
		<div>
		  <input name="contrasena" type="password" value="" maxlength="80" required/>
		</div>
	      </div>
	      <div>
		<div>
		  <label for="">Lugar</label>
		</div>
		<div>
		  <select name="id_lugar" >
		    <?php foreach ($vars['places'] as $place): ?>
		      <option value="<?php echo $place['id']; ?>">
			<?php echo $place['descripcion']; ?>
		      </option>
		    <?php endforeach; ?>
		  </select>
		</div>
	      </div>
	      <br/>
	      <div style="float:left">
		<div>
		  <label for="">Hora de entrada</label>
		</div>
		<div>
		  <select name="id_hora_entrada" >
		    <?php foreach ($vars['hours'] as $hour): ?>
		      <option value="<?php echo $hour['id']; ?>">
			<?php echo $hour['hora']; ?>
		      </option>
		    <?php endforeach; ?>
		  </select>
		</div>
	      </div>
	      <div>
		<div>
		  <label for="">Hora de salida</label>
		</div>
		<div>
		  <select name="id_hora_salida" >
		    <?php foreach ($vars['hours'] as $hour): ?>
		      <option value="<?php echo $hour['id']; ?>">
			<?php echo $hour['hora']; ?>
		      </option>
		    <?php endforeach; ?>
		  </select>
		</div>
		</div>
		<br/>
		<div>
		  <div>
		    <input name="submit" type="submit" value="Registrar"/>
		  </div>
		</div>
	      </form>
	  </article>
	</section>
      </main><!--End main-->
      <footer class="grid-item footer">
	SAC-ITM &copy 2019
      </footer><!--End footer-->
    </div><!--En wrapper-->
  </body>
</html>
