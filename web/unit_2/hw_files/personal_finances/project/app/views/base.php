<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo($title);?></title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  <div class="wrapper">
    <header class="grid-item main-header">
      <a href="index.php">FINANZAPP</a>
    </header><!--End header-->
    <nav class="grid-item navbar">
      <ul class="menu">
        <li class="menu-item">
          <a href="index.php"> Inicio </a>
        </li>
        <li class="menu-item">
          <a href="index.php?view=gastos"> Gastos </a>
        </li>
        <li class="menu-item">
          <a href="index.php?view=ingresos"> Ingresos </a>
        </li>
        <li class="menu-item">
          <a href="index.php?view?=cuentas"> Cuentas </a>
        </li>
        <li class="menu-item">
          <a href="view.php?view=mis-datos"> Mis datos </a>
        </li>
        <li class="menu-item">
          <a href="index.php?view=login"> Cerrar sesión </a>
        </li>
      </ul><!--End menu-->
    </nav><!--End navbar-->
    <main class="grid-item main">
      <section>
      <header><?php echo($main_content_title);?></header>
        <article><?php echo($main_content);?></article>
      </section>
    </main><!--End main-->
    <aside class="grid-item aside">
      <section>
        <header>
          Menu <br>
        </header>
        <article><?php echo($aside_content);?></article>
      </section>
    </aside><!--End aside-->
    <footer class="grid-item footer">
      Finanzapp &copy 2019
    </footer><!--End footer-->
  </div><!--En wrapper-->
</body>
</html>
