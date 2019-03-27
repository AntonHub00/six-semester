<?php

class DB_handler{

  private static $host;
  private static $user;
  private static $password;
  private static $db;

  protected static function connect(){
    self::$host = "127.0.0.1";
    self::$user = "root";
    self::$password = "";
    self::$db = "personal_finances_db";

    $connection = new mysqli(self::$host,
                             self::$user,
                             self::$password,
                             self::$db);

    if($connection->connect_errno){
      echo("<script>alert('ERROR: No se pudo conectar con la base de datos');
      window.location.replace('".SITE_URL."?controller=login');</script>");
    }
    else{
      return $connection;
    }
  }
}

