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
    <title>Citas agendadas</title>
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
	  <header>Citas agendadas</header>
	  <article>
	    <?php if ($vars['appointments']): ?>
	      <table>
		<tr>
		  <th>Profesionista</th>
		  <th>Fecha</th>
		  <th>Hora</th>
		  <th>Estado de cita</th>
		  <th>Lugar</th>
		  <th>Cancelar</th>
		</tr>
		<?php foreach ($vars['appointments'] as $appointment): ?>
		  <tr>
		    <td><?php echo "{$appointment['profesionista_nombre']}
		      {$appointment['profesionista_primer_apellido']}
		      {$appointment['profesionista_segundo_apellido']}"; ?></td>
		    <td><?php echo $appointment['fecha']; ?></td>
		    <td><?php echo $appointment['hora_desc']; ?></td>
		    <td><?php echo $appointment['estado_desc']; ?></td>
		    <td><?php echo $appointment['lugar_desc']; ?></td>
		    <td>
		      <?php if ($appointment['id_estado'] == 2): ?>
			<form action="<?php echo SITE_URL; ?>/StudentAppointments" method="POST">
			  <button name="appointment_id" type="submit" value="<?php echo $appointment['id']; ?>">Cancelar</button>
			</form>
		      <?php endif; ?>
		    </td>
		<?php endforeach; ?>
	      </table>
	    <?php else: ?>
	      <p>No has agendado ninguna cita</p>
	    <?php endif; ?>
	  </article>
	</section>
      </main><!--End main-->
      <footer class="grid-item footer">
	SAC-ITM &copy 2019
      </footer><!--End footer-->
    </div><!--En wrapper-->
  </body>
</html>
