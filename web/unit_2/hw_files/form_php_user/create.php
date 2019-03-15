<?php
$title = "Crear";
require_once("top_code.php");
require_once("database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["name"]) && isset($_POST["email"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $query = "INSERT INTO persona (name, email) VALUES('$name', '$email')";
    $result = $connection->query($query);

    if($result){
      echo("Hecho!");
    }
    else{
      echo("Hubo un error al guardar los datos");
    }

  }
}

?>

<?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
<a href="create.php">
  <button>
    Crear otro
  </button>
</a>

<?php else: ?>

<form action="create.php" method="POST">
  <input type="text" name="name" placeholder="Nombre">
  <input type="email" name="email" placeholder="Correo">
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
