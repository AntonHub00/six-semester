<?php

$username = Session::get();

$name = User::get_name($username);

if($name == false){
    echo("<script>alert('Error al obtener la información de la base de datos');
    window.location.replace('".SITE_URL."?controller=logout');</script>");
}
?>

Bienvenido <?php echo($name);?>
