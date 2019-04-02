<h3>Registrar categoría de gasto</h3>

<br>

<form action="<?php echo(SITE_URL);?>/index.php" method="POST" class="signin-wrapper">
  <input type="hidden" name="form" value="register">
  <div class="signin-grid-item username-box" style="display:inline;">
    <input type="text" id="category" name="category"
    placeholder="Categoría de gasto" maxlength="20" class="" required>
  </div>
  <div class="signin-grid-item submit-box" style="display:inline;">
    <button type="submit" name="posted" value="gastos">Añadir</button>
  </div>
</form>

<br>

<h3>Mis categorías de gasto</h3>

<br>

<?php if($categories): ?>
<table>
  <th>Categorías</th>
  <th>Actualizar</th>
  <th>Eliminar</th>
  <?php foreach($categories as $category): ?>
  <form action="<?php echo(SITE_URL);?>/?controller=gastos">
    <tr>
        <input type="hidden" name="controller"
        maxlength="20" required value="gastos">
      <td>
        <input type="text" name="category"
        maxlength="20" required value="<?php echo($category["description"]); ?>">
      </td>
        <input type="hidden" name="current_category" maxlength="20" required
        value="<?php echo($category["description"]); ?>">
      <td>
        <button type="submit" name="option" value="update">Actualizar</button>
      </td>
      <td>
        <button type="submit" name="option" value="delete">Eliminar</button>
      </td>
    </tr>
  </form>
  <?php endforeach; ?>
</table>
<?php else: ?>
  No tienes categorías registradas
<?php endif; ?>

<br>

<h3>Registrar gasto</h3>

<br>

<?php if($categories && $accounts): ?>
<form action="<?php echo(SITE_URL);?>/index.php" method="POST">
  <input type="hidden" name="form" value="spend">

  <select name="category_option">
  <?php foreach($categories as $category): ?>
    <option>
      <?php echo($category["description"]); ?>
    </option>
  <?php endforeach; ?>
  </select>

  <select name="account_option">
  <?php foreach($accounts as $account): ?>
    <option>
      <?php echo($account["name"]); ?>
    </option>
  <?php endforeach; ?>
  </select>

    <input type="text" pattern="\d+\.\d{1,2}" title="Debe ser decimal de máximo 2 decimales" name="amount"
    placeholder="Monto" maxlength="20" class="" required>

  <button type="submit" name="posted" value="gastos">Añadir</button>
</form>
<?php else: ?>
<p>No tienes cuentas o categorías registradas</p>
<?php endif; ?>

<br>

<h3>Mis gastos</h3>
