<?php
$title = file_get_contents(SITE_ROOT."/app/views/gastos/title.php");
$main_content_title = file_get_contents(SITE_ROOT."/app/views/gastos/main_content_title.php");
$main_content = file_get_contents(SITE_ROOT."/app/views/gastos/main_content.php");
$aside_content = file_get_contents(SITE_ROOT."/app/views/gastos/aside_content.php");

#Load template
require_once(SITE_ROOT."/app/views/base.php");
?>
