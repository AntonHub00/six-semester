<?php

require_once(SITE_ROOT."/app/models/db.php");
require_once(SITE_ROOT."/app/models/user.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = $_POST["username"];
  $name = $_POST["name"];
  $flastname = $_POST["flastname"];
  $slastname = $_POST["slastname"];
  $birthdate = $_POST["birthdate"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];

  if(User::exists($username)){
    echo("<script>alert('Este nombre de usuario ya se encuentra registrado');
    window.location.replace('".SITE_URL."?controller=login');</script>");
  }
  else{
    $able_to_signin = User::signin($username, $name, $flastname, $slastname, $birthdate,
    $email, $phone, $password);

    if($able_to_signin){
      echo("<script>alert('Registrado correctamente');
      window.location.replace('".SITE_URL."?controller=login');</script>");
    }
    else{
      echo("<script>alert('ERROR: No se pudo registrar usuario en la base de datos');
      window.location.replace('".SITE_URL."?controller=login');</script>");
    }
  }
}

require_once(SITE_ROOT."/app/views/login/login.php");
