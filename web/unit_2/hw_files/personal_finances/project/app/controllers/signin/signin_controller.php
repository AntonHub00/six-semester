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

  $db_user = new User($username);

  if($db_user->exists($username)){
    echo("<script>alert('Este nombre de usuario ya se encuentra registrado');
    window.location.replace('".SITE_URL."?controller=login');</script>");
  }
  else{
    $db_user->signin($username, $name, $flastname, $slastname, $birthdate,
    $email, $phone, $password);
  }
}

require_once(SITE_ROOT."/app/views/login/login.php");
