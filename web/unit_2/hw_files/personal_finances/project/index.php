<?php
#Define constant with the path to this directory

$root=pathinfo($_SERVER['SCRIPT_FILENAME']);
define ('BASE_FOLDER', basename($root['dirname']));

define ('SITE_ROOT', realpath(dirname(__FILE__)));
define ('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.BASE_FOLDER);

#print_r($root);
#echo("<br>");
#echo(BASE_FOLDER."<br>");
#echo(SITE_ROOT."<br>");
#echo(SITE_URL."<br>");

#Load controller (logic)
require_once(SITE_ROOT."/app/controllers/routes_controller.php");
