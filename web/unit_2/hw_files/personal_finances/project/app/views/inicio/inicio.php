<?php
$title = file_get_contents(SITE_ROOT."/app/views/inicio/title.php");
$main_content_title = file_get_contents(SITE_ROOT."/app/views/inicio/main_content_title.php");
$main_content = file_get_contents(SITE_ROOT."/app/views/inicio/main_content.php");
$aside_content = file_get_contents(SITE_ROOT."/app/views/inicio/aside_content.php");

#Load template
require_once(SITE_ROOT."/app/views/base.php");
?>
