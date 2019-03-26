<?php

class Session{

  public static start(){
    if (session_status() == PHP_SESSION_NONE)
      session_start();
  }

  public static set($username){
    $_SESSION[$username] = $username
  }

  public static get($username){
    if(isset($_SESSION[$username]))
      return $_SESSION[$username]
    else
      return NULL
  }

  public static function nset($username){
    if(isset($_SESSION[$username])){
    }
  }

  public static delete(){
    session_destroy();
  }

  public static show(){
    echo("<pre>");
      print_r($_SESSION);
    echo("</pre>");
  }
}
