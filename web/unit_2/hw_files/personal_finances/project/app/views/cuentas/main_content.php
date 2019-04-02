<h4>Registrar cuenta</h4>

<br>

<form action="<?php echo(SITE_URL);?>/index.php" method="POST" class="signin-wrapper">
  <div class="signin-grid-item username-box">
    <label for="name">Nombre de cuenta</label>
    <input type="text" id="name" name="name"
    placeholder="Nombre de cuenta" maxlength="30" class="" required>
  </div>
  <div class="signin-grid-item username-box">
    <label for="number">Número de cuenta</label>
    <input type="text" pattern="\d{1,20}" title="Solo dígitos (máximo 20)" id="number" name="number"
    placeholder="opcional" class="">
  </div>
  <div class="signin-grid-item username-box">
    <label for="balance">Saldo</label>
    <input type="text" pattern="\d+\.\d{1,2}" title="Debe ser decimal de máximo 2 decimales"id="balance" name="balance"
    placeholder="saldo" maxlength="20" class="" required>
  </div>
  <div class="signin-grid-item submit-box">
    <button type="submit" name="posted" value="cuentas">Registrar</button>
  </div>
</form>

<br>

<h3>Mis cuentas</h3>

<br>

<div style="width:100px">
<?php if($accounts): ?>
<table width="80%"style="border:1px solid #000;">
  <th style="border:1px solid #000;">Cuenta</th>
  <th style="border:1px solid #000;">Número de cuenta</th>
  <th style="border:1px solid #000;">Saldo</th>
  <th style="border:1px solid #000;">Actualizar</th>
  <th style="border:1px solid #000;">Eliminar</th>
  <?php foreach($accounts as $account): ?>
  <form action="<?php echo(SITE_URL);?>/?controller=cuentas">
    <tr>
        <input type="hidden" name="controller"
        maxlength="20" required value="cuentas">
      <td style="border:1px solid #000;">
        <input type="text" name="name"
        maxlength="30" required value="<?php echo($account["name"]); ?>">
      </td>
      <td style="border:1px solid #000;">
        <input type="text" pattern="\d{1,20}" title="Solo dígitos (máximo 20)" name="number"
        value="<?php echo($account["number"]); ?>">
      </td>
      <td style="border:1px solid #000;">
        <input type="text" pattern="\d+\.\d{1,2}" title="Debe ser decimal de máximo 2 decimales" name="balance"
        maxlength="20" required value="<?php echo($account["balance"]); ?>">
      </td>
        <input type="hidden" name="current_name" required
        value="<?php echo($account["name"]); ?>">
        <input type="hidden" name="current_number" required
        value="<?php echo($account["number"]); ?>">
        <input type="hidden" name="current_balance" required
        value="<?php echo($account["balance"]); ?>">
      <td style="border:1px solid #000;">
        <button type="submit" name="option" value="update">Actualizar</button>
      </td>
      <td style="border:1px solid #000;">
        <button type="submit" name="option" value="delete">Eliminar</button>
      </td>
    </tr>
  </form>
  <?php endforeach; ?>
</table>
</div>
<?php else: ?>
  No tienes cuentas registradas
<?php endif; ?>
