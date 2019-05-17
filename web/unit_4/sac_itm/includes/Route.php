<?php

class Route{
  public static $valid_routes = array();

  public static function set($route, $function){
    self::$valid_routes[] = $route;

    #This runs the function passed as param "$function"
    if(URL == $route)
      $function->__invoke();
  }
}

?>
