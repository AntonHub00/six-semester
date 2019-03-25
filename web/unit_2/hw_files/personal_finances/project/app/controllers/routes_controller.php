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
  echo($_POST["posted"]);
  die();
  $controller = $_POST["posted"];
}

#Load view
require_once(SITE_ROOT."/app/controllers/$controller/$controller"."_controller.php");
