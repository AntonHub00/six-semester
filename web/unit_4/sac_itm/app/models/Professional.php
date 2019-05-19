<?php

class Professional extends DB{

    public static function register($id, $name, $flastname, $slastname, $email,
				    $phone, $id_job, $password, $id_place, $id_entry_time,
				    $id_departure_time){

	$query = "INSERT INTO profesionista (id, nombre, primer_apellido,
        segundo_apellido, correo, telefono, id_puesto, contrasena, id_lugar)
        VALUES ('$id', '$name', '$flastname', '$slastname', '$email', '$phone',
        $id_job, '$password', $id_place, $id_entry_time, $id_departure_time)";

	$result = self::connect()->query($query);

	return $result;
    }

    public static function update($id, $name, $flastname, $slastname, $email,
				  $phone, $id_job, $password, $id_place, $id_entry_time,
				  $id_departure_time){

	$query = "UPDATE profesionista SET
        id = '$id',
        nombre = '$name',
        primer_apellido = '$flastname',
        segundo_apellido = '$slastname',
        correo = '$email',
        telefono = '$phone',
        id_puesto = $id_job,
        contrasena = '$password',
        id_lugar = $id_place,
        id_hora_entrada = $id_entry_time,
        id_hora_salida = $id_departure_time
        WHERE id = '$id';";

	$result = self::connect()->query($query);

	return $result;
    }

    public static function get($id){
	$query = "SELECT profesionista.id, nombre, primer_apellido,
        segundo_apellido, correo, telefono, id_puesto,
        puesto.descripcion as puesto_desc, contrasena, id_lugar,
        lugar.descripcion as lugar_desc,
        id_hora_entrada,
        (SELECT DATE_FORMAT(hora, '%H:%i') FROM horario WHERE id = id_hora_entrada) AS entrada_desc,
        id_hora_salida,
        (SELECT DATE_FORMAT(hora, '%H:%i') FROM horario WHERE id = id_hora_salida) AS salida_desc
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
