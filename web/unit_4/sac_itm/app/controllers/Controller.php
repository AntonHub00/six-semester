<?php

#By being an abstract class, the abstract method "process" must be implemented
#by all the controllers.
#
#The "render_view" function just require de view according with the parameter
#
#"vars" variable is an array with all the variables that will be available in the
#scope of the view.

abstract class Controller{
  public static function render_view($view_name, $vars){
    require_once SITE_ROOT."/app/views/{$view_name}View/{$view_name}View.php";
  }

  abstract public static function process();
}

?>
