<?php
# Start the Session
session_start();

#Defines a constant wich contains the route the user is trying to access (from
#the URL) wich is got from the ".htaccess" file
define("URL", $_GET["url"]);

#Define variable wich contains an associative array with the path where this "index.php"
#file is located, the name of this file (index.php), the extension (php) and the
#name file (index)
$root = pathinfo($_SERVER["SCRIPT_FILENAME"]);

#Define a constant wich contains the name of the  base directory where this
#"index.php" file is located
define("BASE_FOLDER", basename($root["dirname"]));

#Define a constant wich contains the "full path" of the directory where this
#"index.php" file is located
#The purpose of this constant is to use it for "includes"; to "require" or
#"include" files.
define("SITE_ROOT", realpath(dirname(__FILE__)));

#Define a constant wich contains the path of the host contatenated with the
#base directory
#Example "http://127.0.0.1/project/" where the "project" directory is the base
#directory of the project
#The purpose of this constant is to use it for redirects, CSS, JS, etc.
define("SITE_URL", "http://".$_SERVER["HTTP_HOST"]."/".BASE_FOLDER);

#Requires a file which contains an autoload function for classes
require_once SITE_ROOT."/includes/Autoloader.php";

#Require a file wich contains all the routes that are available in the
#application
#
#The Route class inside Route.php will be autoload because
#of the spl_autoload_register function above
require_once SITE_ROOT."/includes/Routes.php";

?>
