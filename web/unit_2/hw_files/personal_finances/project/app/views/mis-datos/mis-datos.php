<?php

#Load the content in this file, so I can write HTML and replace them
#in the tamplate
$title = file_get_contents(SITE_ROOT."/app/views/mis-datos/title.php");

$main_content_title = file_get_contents(SITE_ROOT."/app/views/mis-datos/main_content_title.php");

$main_content = file_get_contents(SITE_ROOT."/app/views/mis-datos/main_content.php");

$aside_content = file_get_contents(SITE_ROOT."/app/views/mis-datos/aside_content.php");

$style_links = file_get_contents(SITE_ROOT."/app/views/mis-datos/style_sheets_links.php");

#$data variables is available; contains all user data

#Load template
require_once(SITE_ROOT."/app/views/base.php");
?>
