<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "datos_formulario";

$connection = new mysqli($host, $user, $password, $db);

if($connection->connect_error){
  die("<h1>No se pudo connectar con la DB</h1>");
}
?>
