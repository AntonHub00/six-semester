<form action="<?php echo(SITE_URL);?>/index.php" method="POST" class="signin-wrapper">
  <div class="signin-grid-item username-box">
    <label for="category">Gasto</label>
    <input type="text" id="category" name="category"
    placeholder="Categoría de gasto" maxlength="20" class="" required>
  </div>
  <div class="signin-grid-item submit-box">
    <button type="submit" name="posted" value="gastos">Añadir</button>
  </div>
</form>

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

