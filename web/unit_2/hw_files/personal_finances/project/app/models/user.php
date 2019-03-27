<?php

class User extends DB_handler{

  public static function signin($username, $name, $fln, $sln, $birthdate,
                            $email, $phone, $password){

    $query = "INSERT INTO user (username, name, first_last_name,
              second_last_name, birthdate, email, phone, password)
              VALUES('$username', '$name', '$fln', '$sln', '$birthdate',
              '$email', '$phone', '$password')";

    $result = self::connect()->query($query);

    if($result)
      return true;
      #echo("<script>alert('Registrado correctamente');
      #window.location.replace('".SITE_URL."?controller=login');</script>");
    else
      return false;
      #echo("<script>alert('ERROR: No se pudo registrar usuario en la base de datos');
      #window.location.replace('".SITE_URL."?controller=login');</script>");
  }

  public static function exists($username){
    $query = "SELECT username FROM user WHERE username = '$username'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return true;
    else
      return false;
  }

  public static function check_credentials($username, $password){
    $query = "SELECT username FROM user WHERE
      username = '$username' AND password = '$password'";

    $result = self::connect()->query($query);

    if($result->num_rows > 0)
      return true;
    else
      return false;
  }
}
