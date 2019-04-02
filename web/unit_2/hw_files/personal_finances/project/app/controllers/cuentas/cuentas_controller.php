<?php

Session::check_session();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $account_name = $_POST["name"];
  $account_number =  $_POST["number"];
  $account_balance =  $_POST["balance"];

  if(Account::get(Session::get(), $account_name)){
    echo("<script>alert('Esta cuenta ya se encuentra registrada');
    window.location.replace('".SITE_URL."?controller=cuentas');</script>");
  }
  else{
    $able_to_register = Account::register(Session::get(), $account_name, $account_number,
    $account_balance);

    if(!$able_to_register){
    echo("<script>alert('No se pudo registrar cuenta en la base de datos');
    window.location.replace('".SITE_URL."?controller=logout');</script>");
    }
    else{
    echo("<script>alert('Cuenta registrada exitosamente');
    window.location.replace('".SITE_URL."?controller=cuentas');</script>");
    }
  }
}
else{
#So is GET method

  if(count($_GET) == 1){
    $accounts = Account::get_all(Session::get());
  }
  else{
    $account_name = $_GET["name"];
    $account_number = $_GET["number"];
    $account_balance = $_GET["balance"];
    $account_current_name = $_GET["current_name"];

    if($_GET["option"] == "update"){
      $able_to_update = Account::update(Session::get(),
        $account_name, $account_current_name, $account_number,
        $account_balance);

      if($able_to_update){
        echo("<script>alert('Cuenta actualizada exitosamente');
        window.location.replace('".SITE_URL."?controller=cuentas');</script>");
      }
      else{
        echo("<script>alert('ERROR: La cuenta no pudo ser actualizada');
        window.location.replace('".SITE_URL."?controller=cuentas');</script>");
      }
    }
    else{
      $account_name = $_GET["name"];
      $account_number = $_GET["number"];
      $account_balance = $_GET["balance"];
      $account_current_name = $_GET["current_name"];
      $account_current_number = $_GET["current_number"];
      $account_current_balance = $_GET["current_balance"];

      if($account_name != $account_current_name or
        $account_number != $account_current_number or
        $account_balance != $account_current_balance){
          echo("<script>alert('ERROR: No puedes modificar la cuenta antes de eliminarla');
          window.location.replace('".SITE_URL."?controller=cuentas');</script>");
      }
      else{
        $able_to_delete = Account::delete(Session::get(), $account_name);

        if($able_to_delete){
          echo("<script>alert('Cuenta eliminada exitosamente');
          window.location.replace('".SITE_URL."?controller=cuentas');</script>");
        }
        else{
          echo("<script>alert('ERROR: No se pudo eliminar cuenta de la base de datos');
          window.location.replace('".SITE_URL."?controller=cuentas');</script>");
        }
      }
    }
  }
}

require_once(SITE_ROOT."/app/views/cuentas/cuentas.php");
