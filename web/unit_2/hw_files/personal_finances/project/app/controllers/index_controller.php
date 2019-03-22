<?php
if(isset($_GET["view"])){
  $view = $_GET["view"];
}
else{
  $view = "index";
}

#Load view
require_once("../app/views/$view.php");
