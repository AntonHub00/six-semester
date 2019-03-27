<?php

require_once(SITE_ROOT."/app/models/db.php");
require_once(SITE_ROOT."/app/models/user.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $credentials_correct = User::check_credentials($username, $password);

  if($credentials_correct){
    Session::set($username);
    echo("<script>window.location.replace('".SITE_URL."');</script>");
  }
  else{
    Session::unset();
    echo("<script>alert('Usuario o contraseña incorrectos');
    window.location.replace('".SITE_URL."?controller=login');</script>");
  }
}


require_once(SITE_ROOT."/app/views/login/login.php");
