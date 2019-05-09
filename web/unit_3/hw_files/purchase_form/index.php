<?php

  require "includes/DB.php";
  require "includes/Provider.php";
  require "includes/Product.php";

  $providers = Provider::get_all();
  $products = Product::get_all();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/main.js"></script>
</head>
<body>
  <div class="container">
    <header class="main-header">
      Facturas
    </header>
    <div class="insert-bill">
      <form action="#" method="GET">
        <table>
          <tr>
            <th>Proveedor</th>
            <th>Fecha actual</th>
            <th>Folio</th>
            <th>RFC</th>
          </tr>
          <tr>
            <td>
              <select id="provider" name="provider">
                <?php if($providers): ?>
                  <?php foreach($providers as $provider): ?>
                    <!-- <option value="" onchange=""></option> -->
                    <option value="<?php echo $provider["id"]; ?>">
                      <?php echo $provider["razon_social"]; ?>
                    </option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </td>
            <td>
              <input type="date" id="date-form">
            </td>
            <td>
              <input type="text" placeholder="Número de folio">
            </td>
            <td>
              <input type="text" id="rfc" placeholder="RFC" disabled>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div class="bills">
      <form action="#" method="GET">
        <table>
          <tr>
            <th>#</th>
            <th>Cantidad</th>
            <th>Artículo/servicio</th>
            <th>Precio</th>
            <th>Subtotal</th>
          </tr>
          <tr>
            <td>
              <input type="text" disabled>
            </td>
            <td>
              <input type="number">
            </td>
            <td>
              <select>
                <option value="">Artículo o servicio</option>
              </select>
            </td>
            <td>
              <input type="number" step="0.01">
            </td>
            <td>
              <input type="number" step="0.01">
            </td>
          </tr>
        </table>
        <input type="submit" value="Añadir">
      </form>
    </div>
  </div>
</body>
</html>
