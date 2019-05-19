<?php

class Route{
    public static $valid_routes = array();

    public static function set($route, $function, $role = NULL){
	self::$valid_routes[] = $route;

	#This runs the function passed as param "$function"
	if(URL == $route){
	    if($role){
		if(Session::get_role() == $role){
		    $function->__invoke();
		}else{
		    echo "<script>window.location = 'index.php';</script>";
		}
	    }else{
		$function->__invoke();
	    }
	}
    }
}

?>
