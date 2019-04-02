<?php

Session::check_session();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if($_POST["form"] == "register"){
    $category = $_POST["category"];

    if(User::category_exists(Session::get(), $category)){
      echo("<script>alert('Esa categoría a se encuentra registrada');
      window.location.replace('".SITE_URL."?controller=gastos');</script>");
    }
    else{
      $category_added = User::add_categorie(Session::get(), $category);

      if($category_added){
        echo("<script>alert('Categoría registrada exitosamente');
        window.location.replace('".SITE_URL."?controller=gastos');</script>");
      }
      else{
        echo("<script>alert('ERROR: No se pudo registrar categoría');
        window.location.replace('".SITE_URL."?controller=gastos');</script>");
      }
    }
  }
  else{
    $account_name = $_POST["account_option"];
    $amount = $_POST["amount"];
    $float_amount = (float) $amount;

    $account_got = Account::get(Session::get(),
    $account_name);
    $account_got = $account_got->fetch_assoc();
    $float_account_got = (float) $account_got["balance"];

    #print_r($account_got["balance"]);
    #var_dump($float_amount);
    #var_dump($float_account_got);
    #die();

    if($account_got){
      if($float_amount <= $float_account_got){

        $able_to_subtract = Account::subtract_amount(Session::get(),
        $account_name, $amount);

        if($able_to_subtract){
            echo("<script>alert('Gasto registrado exitosamente');
            window.location.replace('".SITE_URL."?controller=cuentas');</script>");
        }
        else{
            echo("<script>alert('ERROR: No se pudo registrar el gasto en la base de datos');
            window.location.replace('".SITE_URL."?controller=gastos');</script>");
        }
      }
      else{
        echo("<script>alert('ERROR: Fondos insuficientes');
        window.location.replace('".SITE_URL."?controller=cuentas');</script>");
      }
    }
    else{
        echo("<script>alert('ERROR: No se pudo obtener la información de la base de datos');
        window.location.replace('".SITE_URL."?controller=gastos');</script>");
    }
  }
}
else{
#So is GET method

  if(count($_GET) == 1){
    $user_in_session = Session::get();
    $categories = User::get_categories($user_in_session);
    $accounts = Account::get_all(Session::get());
  }
  else{
    if($_GET["option"] == "update"){
      $able_to_update = User::update_category(Session::get(),
      $_GET["category"], $_GET["current_category"]);

      if($able_to_update){
        echo("<script>alert('Categoría actualizada exitosamente');
        window.location.replace('".SITE_URL."?controller=gastos');</script>");
      }
      else{
        echo("<script>alert('ERROR: La categoría no pudo ser actualizada');
        window.location.replace('".SITE_URL."?controller=gastos');</script>");
      }
    }
    else{
      if($_GET["category"] != $_GET["current_category"]){
        echo("<script>alert('ERROR: No puedes modificar la categoría antes de eliminarla');
        window.location.replace('".SITE_URL."?controller=gastos');</script>");
      }
      else{
        $able_to_delete = User::delete_category(Session::get(),
        $_GET["category"]);

        if($able_to_delete){
          echo("<script>alert('Categoría eliminada exitosamente');
          window.location.replace('".SITE_URL."?controller=gastos');</script>");
        }
        else{
          echo("<script>alert('ERROR: No se pudo eliminar categoría de la base de datos');
          window.location.replace('".SITE_URL."?controller=gastos');</script>");
        }
      }
    }
  }
}

require_once(SITE_ROOT."/app/views/gastos/gastos.php");
