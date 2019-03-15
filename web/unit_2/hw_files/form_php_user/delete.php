<?php
$title = "Eliminar";
require_once("top_code.php");
require_once("database.php");

if(isset($_GET["id"])){
  $id = $_GET["id"];

  $query = "DELETE FROM persona WHERE id = $id";
  $result = $connection->query($query);

  if($result){
    echo("Hecho!");
  }
  else{
    echo("Hubo un error al eliminar usuario");
  }
}
else{
  echo("No se ha seleccionado un usuario a eliminar");
}
?>

<a href="index.php">
  <button>
    Regresar
  </button>
</a>

<?php
require_once("bottom_code.php");
?>
