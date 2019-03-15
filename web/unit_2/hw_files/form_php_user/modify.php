<?php
$title = "Modificar";
require_once("top_code.php");
require_once("database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(!(empty($_POST["name"]) && empty($_POST["email"]))){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $id = $_POST["id"];

    $query = "UPDATE persona SET name = '$name', email = '$email' WHERE id = $id";
    $result = $connection->query($query);

    if($result){
      echo("Hecho!");
    }
    else{
      echo("Hubo un error al actualizar la información de este usuario");
    }
  }
}
else{
  if(isset($_GET["id"])){
    $id = $_GET["id"];

    $query = "SELECT * FROM persona WHERE id = $id";
    $result = $connection->query($query);

    if(empty($result)){
      echo("Error");
      die("Hubo un error al obtener datos de este usuario");
    }
    else{
      $result = $result->fetch_assoc();
    }
  }
  else{
    echo("No se ha seleccionado un usuario a modificar");
    echo("
      <button>
        <a href=\"index.php\">Regresar</a>
      </button>
    ");
    die();
  }
}
?>

<?php if($_SERVER["REQUEST_METHOD"] != "POST"): ?>

<form action="modify.php" method="POST">
  <input type="text" name="name" value="<?php echo($result["name"]); ?>">
  <input type="email" name="email" value = "<?php echo($result["email"]); ?>">
  <input type="hidden" name="id" value = "<?php echo($result["id"]); ?>">
  <input type="submit">
</form>

<?php endif; ?>

<a href="index.php">
  <button>
    Regresar
  </button>
</a>

<?php
require_once("bottom_code.php");
?>
