<?php

class Professional extends DB{

    public static function register($id, $name, $flastname, $slastname, $email,
				    $phone, $id_job, $password, $id_place){

	$query = "INSERT INTO profesionista (id, nombre, primer_apellido,
        segundo_apellido, correo, telefono, id_puesto, contrasena, id_lugar)
        VALUES ('$id', '$name', '$flastname', '$slastname', '$email', '$phone',
        $id_job, '$password', $id_place)";

	$result = self::connect()->query($query);

	return $result;
    }

    public static function update($id, $name, $flastname, $slastname, $email,
				  $phone, $id_job, $password, $id_place){

	$query = "UPDATE profesionista SET
        id = '112233',
        nombre = 'Jorge Marcos',
        primer_apellido = 'Mejía',
        segundo_apellido = 'Castillo',
        correo = 'jorgemc@gmail.com',
        telefono = '4444444444',
        id_puesto = 2,
        contrasena = 'pass',
        id_lugar = 2
        WHERE id = '112233';";

	$result = self::connect()->query($query);

	return $result;
    }

    public static function get($id){
	$query = "SELECT profesionista.id, nombre, primer_apellido,
        segundo_apellido, correo, telefono, id_puesto,
        puesto.descripcion as puesto_desc, contrasena, id_lugar,
        lugar.descripcion as lugar_desc
        FROM profesionista
        INNER JOIN puesto ON id_puesto = puesto.id
        INNER JOIN lugar ON id_lugar = lugar.id
        WHERE profesionista.id = '$id'";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }

    public static function get_password_and_role($id){
	$query = "SELECT contrasena, rol FROM profesionista WHERE id = '$id'";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }
}
