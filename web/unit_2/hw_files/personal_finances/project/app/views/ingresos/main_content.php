<br>

<h3>Registrar ingreso</h3>

<br>

<?php if($accounts): ?>
<form action="<?php echo(SITE_URL);?>/index.php" method="POST">
  <select name="option">
  <?php foreach($accounts as $account): ?>
    <option>
      <?php echo($account["name"]); ?>
    </option>
  <?php endforeach; ?>
  </select>
    <input type="text" pattern="\d+\.\d{1,2}" title="Debe ser decimal de máximo 2 decimales" name="amount"
    placeholder="Monto" maxlength="20" class="" required>
  <button type="submit" name="posted" value="ingresos">Añadir</button>
</form>
<?php else: ?>
<p>No tienes cuentas registradas</p>
<?php endif; ?>
