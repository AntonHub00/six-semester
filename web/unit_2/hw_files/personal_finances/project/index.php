<?php

#Define constant with the path to root directory
$root = pathinfo($_SERVER['SCRIPT_FILENAME']);

define('BASE_FOLDER', basename($root['dirname']));
define('SITE_ROOT', realpath(dirname(__FILE__)));
define('SITE_URL', 'http://'.$_SERVER['HTTP_HOST'].'/'.BASE_FOLDER);

#Load routes controller (logic)
require_once(SITE_ROOT."/app/controllers/routes_controller.php");
