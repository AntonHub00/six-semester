<?php

#This function (with a anonymous function inside) autoload classes (dynamically),
#so it is not necessary to do it manually
spl_autoload_register(function($class_name){
    $includes_path = SITE_ROOT."/includes/{$class_name}.php";
    $controllers_path = SITE_ROOT."/app/controllers/{$class_name}/{$class_name}.php";
    $main_controller_path = SITE_ROOT."/app/controllers/{$class_name}.php";
    $models_path = SITE_ROOT."/app/models/{$class_name}.php";

    if(file_exists($includes_path))
	require_once $includes_path;
    elseif(file_exists($controllers_path))
	require_once $controllers_path;
    elseif(file_exists($main_controller_path))
	require_once $main_controller_path;
    elseif(file_exists($models_path))
	require_once $models_path;
    else{
	echo "Class $class_name not found";
	die();
    }
});

?>
