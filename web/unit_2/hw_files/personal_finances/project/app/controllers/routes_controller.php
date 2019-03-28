<?php

if($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET["controller"])){
    $controller = $_GET["controller"];
  }
  else{
    $controller = "inicio";
  }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
  $controller = $_POST["posted"];
}

require_once(SITE_ROOT."/app/models/db.php");
require_once(SITE_ROOT."/app/models/user.php");
require_once(SITE_ROOT."/includes/session.php");

Session::start();

#Load controller
require_once(SITE_ROOT."/app/controllers/$controller/$controller"."_controller.php");
