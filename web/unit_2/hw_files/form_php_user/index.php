<?php
$title = "Usuarios";
require_once("top_code.php");
require_once("database.php");

$query = "SELECT * FROM persona";

$result = $connection->query($query);
?>

<a href="create.php">
  <button>
    Crear
  </button>
</a>

<table>
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Modificar</th>
    <th>Eliminar</th>
  </tr>
  <?php foreach($result as $row): ?>
    <tr>
      <td> <?php echo($row["id"]); ?> </td>
      <td> <?php echo($row["name"]); ?> </td>
      <td> <?php echo($row["email"]); ?> </td>
      <td>
      <a href="modify.php?id=<?php echo($row["id"]); ?>">
            <button>
              Modificar
            </button>
          </a>
      </td>
      <td>
          <a href="delete.php?id=<?php echo($row["id"]); ?>">
            <button>
              Eliminar
            </button>
          </a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<?php
require_once("bottom_code.php");
?>
