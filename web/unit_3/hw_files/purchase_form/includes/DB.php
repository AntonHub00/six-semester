<?php

class DB{
  private static $host = "127.0.0.1";
  private static $user = "root";
  private static $password = "";
  private static $db = "compra";

  protected static function connect(){
    $connection = new mysqli(self::$host,
                             self::$user,
                             self::$password,
                             self::$db);

    if($connection->connect_errno){
      echo("<script>alert('ERROR: No se pudo conectar con la base de datos');
      window.location.replace('index.php');</script>");
    }
    else
      return $connection;
  }
}

?>
