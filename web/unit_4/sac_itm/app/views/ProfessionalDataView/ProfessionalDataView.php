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
    <title>Mis datos</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/static/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/static/css/font_awesome_4_7_0.css">
  </head>
  <body>
    <div class="wrapper">
      <nav class="grid-item navbar">
	<ul class="menu">
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/ProfessionalIndex">SAC-ITM</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/ProfessionalIndex"> Inicio </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/ProfessionalAppointments">Citas agendadas</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/ProfessionalData">Mis datos</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/CloseSession"> Cerrar sesión </a>
          </li>
	</ul><!--End menu-->
      </nav><!--End navbar-->
      <main class="grid-item main">
	<section>
	  <header>Mis datos</header>
	  <article>
	    <?php $professional_data = $vars['professional_data']->fetch_assoc(); ?>
	    <div style="float:left">
	      <div>
		<label for="">Id</label>
	      </div>
	      <div>
		<input name="id" type="text" value="<?php echo $professional_data['id']; ?>" disabled/>
	      </div>
	    </div>
	    <div style="float:left">
	      <div>
		<label for="">Nombre</label>
	      </div>
	      <div>
		<input name="nombre" type="text" value="<?php echo $professional_data['nombre']; ?>" disabled/>
	      </div>
	    </div>
	    <div >
	      <div>
		<label for="">Primer apellido</label>
	      </div>
	      <div>
		<input name="primer_apellido" type="text" value="<?php echo $professional_data['primer_apellido']; ?>" disabled/>
	      </div>
	    </div>
	    <br/>
	    <div style="float:left">
	      <div>
		<label for="">Segundo apellido</label>
	      </div>
	      <div>
		<input name="segundo_apellido type="text" value="<?php echo $professional_data['segundo_apellido']; ?>" disabled/>
	      </div>
	    </div>
	    <div style="float:left">
	      <div>
		<label for="">Correo</label>
	      </div>
	      <div>
		<input name="correo" type="email" value="<?php echo $professional_data['correo']; ?>" disabled/>
	      </div>
	    </div>
	    <div >
	      <div>
		<label for="">Telefono</label>
	      </div>
	      <div>
		<input name="telefono" type="text" value="<?php echo $professional_data['telefono']; ?>" disabled/>
	      </div>
	    </div>
	    <br/>
	    <div style="float:left">
	      <div>
		<label for="">Puesto</label>
	      </div>
	      <div>
		<input name="segundo_apellido type="text" value="<?php echo $professional_data['puesto_desc']; ?>" disabled/>
	      </div>
	    </div>
	    <div style="float:left">
	      <div>
		<label for="">Contraseña</label>
	      </div>
	      <div>
		<input name="contrasena" type="password" value="<?php echo $professional_data['contrasena']; ?>" disabled/>
	      </div>
	    </div>
	    <div >
	      <div>
		<label for="">Lugar</label>
	      </div>
	      <div>
		<input name="lugar" type="text" value="<?php echo $professional_data['lugar_desc']; ?>" disabled/>
	      </div>
	    </div>
	    <br/>
	    <div style="float:left">
	      <div>
		<label for="">Hora de entrada</label>
	      </div>
	      <div>
		<input name="id_hora_entrada"type="text" value="<?php echo $professional_data['entrada_desc']; ?>" disabled/>
	      </div>
	    </div>
	    <div style="float:left">
	      <div>
		<label for="">Hora de salida</label>
	      </div>
	      <div>
		<input name="id_hroa_salida" type="text" value="<?php echo $professional_data['salida_desc']; ?>" disabled/>
	      </div>
	    </div>
	  </article>
	</section>
      </main><!--End main-->
      <footer class="grid-item footer">
	SAC-ITM &copy 2019
      </footer><!--End footer-->
    </div><!--En wrapper-->
  </body>
</html>
