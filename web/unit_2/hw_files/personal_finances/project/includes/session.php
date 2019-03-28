<?php

class Session{

  public static function start(){
    if (session_status() == PHP_SESSION_NONE)
      session_start();
  }

  public static function set($username){
    $_SESSION["username"] = $username;
  }

  public static function get(){
    if(isset($_SESSION["username"]))
      return $_SESSION["username"];
    else
      return false;
  }

  public static function unset(){
    if(isset($_SESSION["username"]))
      unset($_SESSION["username"]);
  }

  public static function delete(){
    session_destroy();
  }

  public static function show(){
    echo("<pre>");
      print_r($_SESSION);
    echo("</pre>");
  }

  public static function check_session(){
    if(!self::get()){
      echo("<script> window.location.replace('".SITE_URL."?controller=login');</script>");
    }
  }
}
