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
    <title>Agendar cita</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/static/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/static/css/font_awesome_4_7_0.css">
  </head>
  <body>
    <div class="wrapper">
      <nav class="grid-item navbar">
	<ul class="menu">
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/StudentIndex">SAC-ITM</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/StudentIndex"> Inicio </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/StudentMakeAppointment">Agendar</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/StudentAppointments">Citas agendadas</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/StudentData">Mis datos</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/CloseSession"> Cerrar sesión </a>
          </li>
	</ul><!--End menu-->
      </nav><!--End navbar-->
      <main class="grid-item main">
	<section>
	  <header>Agendar cita</header>
	  <article>
	    <?php if(isset($vars['step_1'])): ?>
	      <h3>Paso 1: Elige profesionista</h3>
	      <br/>
	      <form action="<?php echo SITE_URL ?>/StudentMakeAppointment" method="GET">
		<select name="id_professional" >
		  <?php foreach ($vars['professionals'] as $professional): ?>
		    <option value="<?php echo $professional['id']; ?>">
		      <?php echo "{$professional['nombre']}
                    {$professional['primer_apellido']}
                    {$professional['segundo_apellido']}
                    ({$professional['puesto_desc']})"; ?>
		    </option>
		  <?php endforeach; ?>
		</select>
		<input name="data_from_step_1" type="submit" value="Seleccionar"/>
	      </form>
	    <?php elseif(isset($vars['step_2'])): ?>
	      <?php $pro = $vars['professional']; ?>
	      <h3>Paso 2: Elige fecha de cita con <?php echo "{$pro['nombre']} {$pro['primer_apellido']} {$pro['segundo_apellido']}"; ?></h3>
	      <br/>
	      <form action="<?php echo SITE_URL ?>/StudentMakeAppointment" method="GET">
		<input name="id_professional" type="hidden" value="<?php echo $vars['id_professional']; ?>"/>
		<input id="date_appointment" name="date" type="date" min="" max="" required/>
		<input name="data_from_step_2" type="submit" value="Seleccionar"/>
	      </form>
	    <?php elseif(isset($vars['step_3'])): ?>
	      <?php $pro = $vars['professional']; ?>
	      <h3>Paso 3: Elige hora de cita con <?php echo "{$pro['nombre']}
             {$pro['primer_apellido']}
             {$pro['segundo_apellido']}";?> el <?php echo $vars['date_parsed']; ?></h3>
	      <br/>
	      <form action="<?php echo SITE_URL ?>/StudentMakeAppointment" method="GET">
		<input name="id_professional" type="hidden" value="<?php echo $vars['id_professional']; ?>"/>
		<input name="date" type="hidden" value="<?php echo $vars['date']; ?>"/>
		<select name="id_start_hour" >
		  <?php foreach ($vars['hours'] as $hour): ?>
		    <?php if ($hour['id'] < $vars['professional']['id_hora_salida']): ?>
		      <option value="<?php echo $hour['id']; ?>">
			<?php echo $hour['hora']; ?>
		      </option>
		    <?php endif; ?>
		  <?php endforeach; ?>
		</select>
		<input name="data_from_step_3" type="submit" value="Seleccionar"/>
	      </form>
	    <?php endif; ?>
	  </article>
	</section>
      </main><!--End main-->
      <footer class="grid-item footer">
	SAC-ITM &copy 2019
      </footer><!--End footer-->
    </div><!--En wrapper-->
    <script type="text/javascript" src="<?php echo SITE_URL; ?>/static/js/min_and_max_date.js"></script>
  </body>
</html>
