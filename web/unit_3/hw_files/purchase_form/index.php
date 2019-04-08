<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="container">
    <header class="main-header">
      Compras
    </header>
    <div class="insert-bill">
      <form action="#" method="GET">
        <table>
          <tr>
            <th>Proveedor</th>
            <th>Fecha</th>
            <th>Folio</th>
            <th>RFC</th>
            <th>Añadir</th>
          </tr>
          <tr>
            <td>
              <input type="text" placeholder="Proveedor">
            </td>
            <td>
              <input type="date">
            </td>
            <td>
              <input type="text" placeholder="Número de folio">
            </td>
            <td>
              <input type="text" placeholder="RFC">
            </td>
            <td>
              <input type="submit" value="Añadir">
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div class="bills">
      <form action="#" method="GET">
        <table>
          <tr>
            <th>Id</th>
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
              <input type="text">
            </td>
            <td>
              <input type="text">
            </td>
            <td>
              <input type="text">
            </td>
          </tr>
        </table>
        <input type="submit" value="Actualizar">
      </form>
    </div>
  </div>
</body>
</html>
