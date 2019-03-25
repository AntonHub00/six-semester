<?php
$title = file_get_contents(SITE_ROOT."/app/views/cuentas/title.php");
$main_content_title = file_get_contents(SITE_ROOT."/app/views/cuentas/main_content_title.php");
$main_content = file_get_contents(SITE_ROOT."/app/views/cuentas/main_content.php");
$aside_content = file_get_contents(SITE_ROOT."/app/views/cuentas/aside_content.php");

#Load template
require_once(SITE_ROOT."/app/views/base.php");
?>
