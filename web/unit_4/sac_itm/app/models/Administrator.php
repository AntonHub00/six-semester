<?php

class Administrator extends DB{

    public static function get_password_and_role($id){
	$query = "SELECT contrasena, rol FROM administrador WHERE id = '$id'";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }
}
