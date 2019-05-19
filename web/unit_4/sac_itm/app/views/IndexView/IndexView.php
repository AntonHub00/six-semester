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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>/static/css/login.css">
  </head>
  <body>
    <div class="wrapper">
      <header class="main-header">
	sac-itm
      </header>
      <form action="<?php echo SITE_URL;?>/" method="POST" class="signin-wrapper">
	<div class="title-box">
          Registrarse
	</div>
	<div class="signin-grid-item control-num-box">
          <label for="id">Número de control</label>
	  <input name="id" type="text" required/>
	</div>
	<div class="signin-grid-item name-box">
          <label for="name">Nombre</label>
	  <input name="nombre" type="text" maxlength="35" required/>
	</div>
	<div class="signin-grid-item flastname-box">
          <label for="slastname">Primer apellido</label>
	  <input name="primer_apellido" type="text" maxlength="35" required/>
	</div>
	<div class="signin-grid-item slastname-box">
          <label for="flastname">Segundo apellido</label>
	  <input name="segundo_apellido" type="text" maxlength="35" required/>
	</div>
	<div class="signin-grid-item career-box">
          <label for="id_carrera">Carrera</label>
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
	<div class="signin-grid-item semester-box">
	  <label for="id_semestre">Semestre</label>
	  <select name="id_semestre">
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
	<div class="signin-grid-item email-box">
          <label for="password">Correo</label>
	  <input name="correo" type="text" maxlength="35" required/>
	</div>
	<div class="signin-grid-item phone-box">
          <label for="phone">Teléfono</label>
	  <input name="telefono" type="text" maxlength="15" required/>	</div>
	  <div class="signin-grid-item gender-box">
            <label for="password">Género</label>
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
	  <div class="signin-grid-item password-box">
            <label for="password">Contraseña</label>
	    <input name="contrasena" type="password" maxlength="80" required/>
	  </div>
	  <div class="signin-grid-item tutor-name-box">
            <label for="password">Nombre tutor</label>
	    <input name="nombre_tutor" type="text" maxlength="35" required/>
	  </div>
	  <div class="signin-grid-item tutor-flastname-box">
            <label for="password">Primer apellido tutor</label>
	    <input name="primer_apellido_tutor" type="text" maxlength="35" required/>
	  </div>
	  <div class="signin-grid-item tutor-slastname-box">
            <label for="password">Segundo apellido tutor</label>
	    <input name="segundo_apellido_tutor" type="text" maxlength="35" required/>
	  </div>
	  <div class="signin-grid-item tutor-phone-box">
            <label for="password">Teléfono tutor</label>
	    <input name="telefono_tutor" type="text" maxlength="15" required/>
	  </div>
	  <div class="signin-grid-item tutor-email-box">
            <label for="password">Correo tutor</label>
	    <input name="correo_tutor" type="email" maxlength="35" required/>
	  </div>
	  <div class="signin-grid-item submit-box">
            <button type="submit" name="submit" value="signin">Registrarse</button>
	  </div>
      </form>

      <form action="<?php echo SITE_URL; ?>/" method="POST" class="login-wrapper">
	<div class="title-box">
          Ingresar
	</div>
	<div class="login-grid-item username-box">
          <label for="username">Usuario</label>
          <input type="text" id="login-username" name="username" placeholder="Usuario"
		 maxlength="20" class="" required>
	</div>
	<div class="login-grid-item password-box">
          <label for="password">Contraseña</label>
          <input type="password" id="login-password" name="password"
		 placeholder="Contraseña" maxlength="15" class="" required>
	</div>
	<div class="login-grid-item submit-box">
          <button type="submit" name="submit" value="login">Ingresar</button>
	</div>
      </form>
    </div>
  </body>
</html>
