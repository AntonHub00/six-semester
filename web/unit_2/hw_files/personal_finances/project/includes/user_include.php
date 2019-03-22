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
      echo("<script>alert('Registrado correctamente')
        window.location.replace('index.php');</script>");
    }
    else{
      echo("<script>alert('ERROR: No se pudo registrar usuario en la base de datos')
        window.location.replace('login.php');</script>");
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

  public function get_credentials($username){
    if($this->exists($username)){
      echo("Should set session");
    }
    else{
      echo("<script>alert('Contraseña incorrecta');
      window.location.replace('login.php');</script>");
    }
  }
}
