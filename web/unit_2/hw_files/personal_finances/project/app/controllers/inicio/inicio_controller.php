<?php

if(Session::get()){
  $username = Session::get();
  echo("Hello $username <br>");
  print_r($_SESSION);
}
else{
  echo("<script>alert('Necesitas iniciar sesión primero');
  window.location.replace('".SITE_URL."?controller=login');</script>");
}

require_once(SITE_ROOT."/app/views/inicio/inicio.php");
