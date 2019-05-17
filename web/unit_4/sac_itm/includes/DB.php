<?php

#This class just sets the database info and contains a function wich just creates
#the connection and return it
class DB{

  private static $host;
  private static $user;
  private static $password;
  private static $db;

  protected static function connect(){
    self::$host = "localhost";
    self::$user = "root";
    self::$password = "";
    self::$db = "sac_itm";

    $connection = new mysqli(self::$host,
                             self::$user,
                             self::$password,
                             self::$db);

    if($connection->connect_errno){
      Controller::render_view("NoDBConnection", NULL);
      die();
    }
    else
      return $connection;
  }
}

?>
