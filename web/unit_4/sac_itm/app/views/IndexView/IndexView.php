<?php
#This file can contain php and html to place the values got from the controller.
#Conditionals and loops can be used inside this file
#
#If any other file is require to create the view (like templates or code
#snippets) can be placed in the same directoy where this file is located
#(require "file.php")
?>

<h1>This the Index view</h1>

<form action="<?php echo SITE_URL;?>/" method="get">
<input type="submit" name="my_name" value="to_get">
</form>

<form action="<?php echo SITE_URL;?>/" method="post">
<input type="submit" name="my_name" value="to_post">
</form>

<a href="<?php echo SITE_URL;?>/">Ir a index</a>

<br>
<p>You can use loops:</p>
<?php for($i=0; $i < 5; $i++):?>
<?php echo "Hello <br>";?>
<?php endfor;?>

<br>
<p>And use varibles passed from the controller:</p>

<?php if(isset($_GET["my_name"])): ?>
<div>Parameters: <?php echo $_GET["my_name"]; ?></div>
<?php else: ?>
<div>No parameters</div>
<?php endif; ?>
