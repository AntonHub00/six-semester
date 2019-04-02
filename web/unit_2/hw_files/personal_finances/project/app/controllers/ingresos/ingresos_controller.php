<?php

Session::check_session();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $account_name = $_POST["option"];
  $amount = $_POST["amount"];

  $able_to_add = Account::add_amount(Session::get(),
  $account_name, $amount);

  if($able_to_add){
      echo("<script>alert('Monto añadido exitosamente');
      window.location.replace('".SITE_URL."?controller=cuentas');</script>");
  }
  else{
      echo("<script>alert('ERROR: No se pudo añadir monto a la base de datos');
      window.location.replace('".SITE_URL."?controller=ingresos');</script>");
  }
}
else{
#So is GET method

  if(count($_GET) == 1){
    $accounts = Account::get_all(Session::get());
  }
  else{
  }
}

require_once(SITE_ROOT."/app/views/ingresos/ingresos.php");
