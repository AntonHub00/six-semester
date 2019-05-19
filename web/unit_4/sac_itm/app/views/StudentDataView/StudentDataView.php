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
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/static/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/static/css/font_awesome_4_7_0.css">
  </head>
  <body>
    <div class="wrapper">
      <nav class="grid-item navbar">
	<ul class="menu">
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/StudentIndex">SAC-ITM</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/StudentIndex"> Inicio </a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/StudentMakeAppointment">Agendar</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/StudentAppointments">Citas agendadas</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL; ?>/StudentData">Mis datos</a>
          </li>
          <li class="menu-item">
            <a href="<?php echo SITE_URL ?>/CloseSession"> Cerrar sesión </a>
          </li>
	</ul><!--End menu-->
      </nav><!--End navbar-->
      <main class="grid-item main">
	<section>
	  <header>Mis datos</header>
	  <article>
	    <?php if ($vars['student_data']): ?>
	      <?php $student_data = $vars['student_data']->fetch_assoc(); ?>
	      <form action="<?php echo SITE_URL; ?>/StudentData" method="POST">
		<div style="float:left">
		  <div>
		    <label for="">Número de control</label>
		  </div>
		  <div>
		    <input name="id" type="text" value="<?php echo $student_data['id']; ?>" disabled required/>
		  </div>
		</div>
		<div style="float:left">
		  <div>
		    <label for="">Nombre</label>
		  </div>
		  <div>
		    <input name="nombre" type="text" value="<?php echo $student_data['nombre']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<div >
		  <div>
		    <label for="">Primer apellido</label>
		  </div>
		  <div>
		    <input name="primer_apellido" type="text" value="<?php echo $student_data['primer_apellido']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<br/>
		<div style="float:left">
		  <div>
		    <label for="">Segundo apellido</label>
		  </div>
		  <div>
		    <input name="segundo_apellido" type="text" value="<?php echo $student_data['segundo_apellido']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<div style="float:left">
		  <div>
		    <label for="">Carrera</label>
		  </div>
		  <div>
		    <select name="id_carrera" >
		      <?php foreach ($vars['careers'] as $career): ?>
			<?php if ($career['id'] == $student_data['id_carrera']): ?>
			  <option value="<?php echo $career['id']; ?>" selected="selected">
			    <?php echo $career['descripcion']; ?>
			  </option>
			<?php else: ?>
			  <option value="<?php echo $career['id']; ?>">
			    <?php echo $career['descripcion']; ?>
			  </option>
			<?php endif; ?>
		      <?php endforeach; ?>
		    </select>
		  </div>
		</div>
		<div>
		  <div>
		    <label for="">Semestre</label>
		  </div>
		  <div>
		    <select name="id_semestre" >
		      <?php foreach ($vars['semesters'] as $semester): ?>
			<?php if ($semester['id'] == $student_data['id_semestre']): ?>
			  <option value="<?php echo $semester['id']; ?>" selected="selected">
			    <?php echo $semester['id']; ?>
			  </option>
			<?php else: ?>
			  <option value="<?php echo $semester['id']; ?>">
			    <?php echo $semester['id']; ?>
			  </option>
			<?php endif; ?>
		      <?php endforeach; ?>
		    </select>
		  </div>
		</div>
		<br/>
		<div style="float:left">
		  <div>
		    <label for="">Correo</label>
		  </div>
		  <div>
		    <input name="correo" type="text" value="<?php echo $student_data['correo']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<div style="float:left">
		  <div>
		    <label for="">Teléfono</label>
		  </div>
		  <div>
		    <input name="telefono" type="text" value="<?php echo $student_data['telefono']; ?>" maxlength="15" required/>
		  </div>
		</div>
		<div>
		  <div>
		    <label for="">Género</label>
		  </div>
		  <div>
		    <select name="id_genero" >
		      <?php foreach ($vars['genders'] as $gender): ?>
			<?php if ($gender['id'] == $student_data['id_genero']): ?>
			  <option value="<?php echo $gender['id']; ?>" selected="selected">
			    <?php echo $gender['descripcion']; ?>
			  </option>
			<?php else: ?>
			  <option value="<?php echo $gender['id']; ?>">
			    <?php echo $gender['descripcion']; ?>
			  </option>
			<?php endif; ?>
		      <?php endforeach; ?>
		    </select>
		  </div>
		</div>
		<br/>
		<div style="float:left">
		  <div>
		    <label for="">Contraseña</label>
		  </div>
		  <div>
		    <input name="contrasena" type="password" value="<?php echo $student_data['contrasena']; ?>" maxlength="80" required/>
		  </div>
		</div>
		<div style="float:left">
		  <div>
		    <label for="">Nombre de tutor</label>
		  </div>
		  <div>
		    <input name="nombre_tutor" type="text" value="<?php echo $student_data['nombre_tutor']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<div>
		  <div>
		    <label for="">Primer apellido tutor</label>
		  </div>
		  <div>
		    <input name="primer_apellido_tutor" type="text" value="<?php echo $student_data['primer_apellido_tutor']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<br/>
		<div style="float:left">
		  <div>
		    <label for="">Segundo apellido tutor</label>
		  </div>
		  <div>
		    <input name="segundo_apellido_tutor" type="text" value="<?php echo $student_data['segundo_apellido_tutor']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<div style="float:left">
		  <div>
		    <label for="">Teléfono tutor</label>
		  </div>
		  <div>
		    <input name="telefono_tutor" type="text" value="<?php echo $student_data['telefono_tutor']; ?>" maxlength="15" required/>
		  </div>
		</div>
		<div>
		  <div>
		    <label for="">Correo tutor</label>
		  </div>
		  <div>
		    <input name="correo_tutor" type="email" value="<?php echo $student_data['correo_tutor']; ?>" maxlength="35" required/>
		  </div>
		</div>
		<br/>
		<div>
		  <div>
		    <input name="submit" type="submit" value="Actualizar"/>
		  </div>
		</div>
	      </form>
	    <?php else: ?>
	      <?php echo ('No se pudieron obtener tus datos de la base de datos'); ?>
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
