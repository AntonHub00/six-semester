<?php

class User extends DB_handler{

  public function signin($username, $name, $fln, $sln, $birthdate,
                            $email, $phone, $password){
    $query = "INSERT INTO user (username, name, first_last_name,
              second_last_name, birthdate, email, phone, password)
              VALUES('$username', '$name', '$fln', '$sln', '$birthdate',
              '$email', '$phone', '$password')";

    $result = $this->connect()->query($query);

    if($result){
      echo("<script>alert('Registrado correctamente');
      window.location.replace('".SITE_URL."');</script>");
    }
    else{
      echo("<script>alert('ERROR: No se pudo registrar usuario en la base de datos');
      window.location.replace('".SITE_URL."?controller=login');</script>");
    }
  }

  public function exists($username){
    $query = "SELECT name FROM user WHERE username = '$username'";

    $result = $this->connect()->query($query);

    if($result->num_rows > 0)
      return true;
    else
      return false;
  }

  public function check_credentials($username, $password){
    $query = "SELECT $username WHERE password = $password";

    $result = $this->connect()->query($query);

    if($result->num_rows > 0){
      echo("<script>window.location.replace('".SITE_URL."');</script>");
    }
    else{
      echo("<script>alert('ERROR: Usuario o contraseña inválidos');
      window.location.replace('".SITE_URL."?controller=login');</script>");
    }
  }
}