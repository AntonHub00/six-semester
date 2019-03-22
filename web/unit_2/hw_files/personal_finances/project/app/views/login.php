<?php
  require_once("includes/db_include.php");
  require_once("includes/user_include.php");

  if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["signin"])){
      $username = $_POST["username"];
      $name = $_POST["name"];
      $flastname = $_POST["flastname"];
      $slastname = $_POST["slastname"];
      $birthdate = $_POST["birthdate"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $password = $_POST["password"];

      $db_user = new User($username);

      if($db_user->exists($username)){
        echo("<script>alert('Este nombre de usuario ya se encuentra registrado');
        window.location.replace('login.php');</script>");
      }
      else{
        $db_user->signin($username, $name, $flastname, $slastname,
        $birthdate, $email, $phone, $password);
      }
    }
    else{
      $username = $_POST["username"];
      $password = $_POST["password"];

      $db_user = new User($username);

      $db_user->get_credentials($username);
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div class="wrapper">
    <header class="main-header">
      finanzapp
    </header>
    <form action="login.php" method="POST" class="signin-wrapper">
      <input type="hidden" id="signin" name="signin">
      <div class="title-box">
        Registrarse
      </div>
      <div class="signin-grid-item username-box">
        <label for="username">Usuario</label>
        <input type="text" id="signin-username" name="username"
        placeholder="Usuario" maxlength="20" class="" required>
      </div>
      <div class="signin-grid-item name-box">
        <label for="name">Nombre</label>
        <input type="text" id="signin-name" name="name" placeholder="Nombre"
        maxlength="50" class="" required>
      </div>
      <div class="signin-grid-item slastname-box">
        <label for="slastname">Apellido Paterno</label>
        <input type="text" id="signin-flastname" name="flastname"
        placeholder="Apellido Paterno" maxlength="50" class="" required>
      </div>
      <div class="signin-grid-item flastname-box">
        <label for="flastname">Apellido Materno</label>
        <input type="text" id="signin-slastname" name="slastname"
        placeholder="Apellido Materno" maxlength="50" class="" required>
      </div>
      <div class="signin-grid-item birthdate-box">
        <label for="birthdate">Fecha de nacimiento</label>
        <input type="date" id="signin-birthdate" name="birthdate"
        maxlength="15" class="" required>
      </div>
      <div class="signin-grid-item email-box">
        <label for="email">Correo</label>
        <input type="email" pattern="\b.{1,50}\b" title="Máximo 50 caracteres"
        id="signin-email" name="email" placeholder="Correo" class="" required>
      </div>
      <div class="signin-grid-item phone-box">
        <label for="phone">Número de teléfono</label>
        <input type="text" pattern="\d{10}" title="Deben ser 10 dígitos"
        id="signin-phone" name="phone" placeholder="Número de teléfono"
        class="" required>
      </div>
      <div class="signin-grid-item password-box">
        <label for="password">Contraseña</label>
        <input type="password" id="signin-password" name="password"
        placeholder="Contraseña" maxlength="15" class="" required>
      </div>
      <div class="signin-grid-item submit-box">
        <input type="submit">
      </div>
    </form>

    <form action="login.php" method="POST" class="login-wrapper">
      <input type="hidden" id="login" name="login">
      <div class="title-box">
        Ingresar
      </div>
      <div class="login-grid-item username-box">
        <label for="username">Usuario</label>
        <input type="text" id="login-username" name="username" placeholder="Usuario"
        maxlength="20" class="">
      </div>
      <div class="login-grid-item password-box">
        <label for="password">Contraseña</label>
        <input type="password" id="login-password" name="password"
        placeholder="Contraseña" maxlength="15" class="">
      </div>
      <div class="login-grid-item submit-box">
        <input type="submit">
      </div>
    </form>
  </div>
</body>
</html>
