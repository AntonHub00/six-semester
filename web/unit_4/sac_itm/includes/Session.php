<?php

class Session{

    public static function set($id, $role){
	$_SESSION = array('id' => $id, 'role' => $role);
    }

    public static function get(){
	return (isset($_SESSION)) ? $_SESSION : false;
    }

    public static function get_role(){
	return (isset($_SESSION['role'])) ? $_SESSION['role'] : false;
    }

    public static function get_id(){
	return (isset($_SESSION['id'])) ? $_SESSION['id'] : false;
    }

    public static function unset(){
	if(isset($_SESSION))
	    unset($_SESSION);
    }

    public static function delete(){
	if (self::get())
	    session_destroy();
    }

    public static function show(){
	echo('<pre>');
	print_r($_SESSION);
	echo('</pre>');
    }

    public static function is_set(){
	return (self::get()) ? true : false;
    }
}
