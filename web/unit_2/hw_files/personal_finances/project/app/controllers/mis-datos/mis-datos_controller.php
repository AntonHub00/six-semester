<?php

Session::check_session();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = $_POST["username"];
  $name = $_POST["name"];
  $flastname = $_POST["flastname"];
  $slastname = $_POST["slastname"];
  $birthdate = $_POST["birthdate"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $password = $_POST["password"];

  if(User::exists($username) && ($username != Session::get())){
    echo("<script>alert('Este nombre de usuario no puede ser utilizado');
    window.location.replace('".SITE_URL."?controller=mis-datos');</script>");
  }
  else{
    $able_to_update = User::update($username, $name, $flastname, $slastname, $birthdate,
    $email, $phone, $password, Session::get());

    if($able_to_update){
      echo("<script>alert('Actualizado correctamente');
      window.location.replace('".SITE_URL."?controller=mis-datos');</script>");
    }
    else{
      echo("<script>alert('ERROR: No se pudo actualizar la información de usuario');
      window.location.replace('".SITE_URL."?controller=mis-datos');</script>");
    }
  }
}
else{
#So is GET method

  $user_in_session = Session::get();
  $data = User::get_all($user_in_session);

  if($data == false){
    echo("<script>alert('No se pudo obtener la información de la base de datos'); </script>");
    $data = NULL;
  }
}

require_once(SITE_ROOT."/app/views/mis-datos/mis-datos.php");
