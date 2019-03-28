<form action="<?php echo(SITE_URL);?>/index.php" method="POST" class="signin-wrapper">
  <div class="signin-grid-item username-box">
    <label for="username">Usuario</label>
    <input type="text" id="signin-username" name="username"
    placeholder="Usuario" maxlength="20" class="" required value="<?php echo($data["username"]); ?>">
  </div>
  <div class="signin-grid-item name-box">
    <label for="name">Nombre</label>
    <input type="text" id="signin-name" name="name" placeholder="Nombre"
      maxlength="50" class="" required value="<?php echo($data["name"]); ?>">
  </div>
  <div class="signin-grid-item slastname-box">
    <label for="slastname">Apellido Paterno</label>
    <input type="text" id="signin-flastname" name="flastname"
    placeholder="Apellido Paterno" maxlength="50" class="" required value="<?php echo($data["first_last_name"]); ?>">
  </div>
  <div class="signin-grid-item flastname-box">
    <label for="flastname">Apellido Materno</label>
    <input type="text" id="signin-slastname" name="slastname"
    placeholder="Apellido Materno" maxlength="50" class="" required value="<?php echo($data["second_last_name"]); ?>">
  </div>
  <div class="signin-grid-item birthdate-box">
    <label for="birthdate">Fecha de nacimiento</label>
    <input type="date" id="signin-birthdate" name="birthdate"
    maxlength="15" class="" required value="<?php echo($data["birthdate"]); ?>">
  </div>
  <div class="signin-grid-item email-box">
    <label for="email">Correo</label>
    <input type="email" pattern="\b.{1,50}\b" title="Máximo 50 caracteres"
    id="signin-email" name="email" placeholder="Correo" class="" required value="<?php echo($data["email"]); ?>">
  </div>
  <div class="signin-grid-item phone-box">
    <label for="phone">Número de teléfono</label>
    <input type="text" pattern="\d{10}" title="Deben ser 10 dígitos"
    id="signin-phone" name="phone" placeholder="Número de teléfono"
    class="" required value="<?php echo($data["phone"]); ?>">
  </div>
  <div class="signin-grid-item password-box">
    <label for="password">Contraseña</label>
    <input type="password" id="signin-password" name="password"
    placeholder="Contraseña" maxlength="15" class="" required value="<?php echo($data["password"]); ?>">
  </div>
  <div class="signin-grid-item submit-box">
    <button type="submit" name="posted" value="mis-datos">Actualizar</button>
  </div>
</form>
