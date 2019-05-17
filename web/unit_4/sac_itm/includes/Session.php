<?php

class Session{

  public static function start(){
    if (session_status() == PHP_SESSION_NONE)
      session_start();
  }

  public static function set($username, $role){
    $_SESSION = array("username" => $username, "role" => $role);
  }

  public static function get(){
    if(isset($_SESSION))
      return $_SESSION;
    else
      return false;
  }

  public static function unset(){
    if(isset($_SESSION))
      unset($_SESSION);
  }

  public static function delete(){
    session_destroy();
  }

  public static function show(){
    echo("<pre>");
      print_r($_SESSION);
    echo("</pre>");
  }

  public static function in_session(){
    if(self::get())
      return true;
    else
      return false;
  }
}
