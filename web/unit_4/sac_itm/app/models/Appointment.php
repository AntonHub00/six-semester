<?php

class Appointment extends DB{

    public static function get_available_hours($id, $date){
	$query = "SELECT id, DATE_FORMAT(hora, '%H:%i') AS hora from horario WHERE id BETWEEN
        (SELECT id_hora_entrada FROM profesionista WHERE id = '$id')
        AND
        (SELECT id_hora_salida FROM profesionista WHERE id = '$id')
        AND
        id NOT IN (SELECT id_hora_inicio FROM cita WHERE fecha = '$date' AND id_profesionista = '$id')";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }

    public static function insert_appointment($id_professional, $id_student,
					      $date, $id_start, $id_end){
	$query = "INSERT INTO cita (id_profesionista, id_estudiante, fecha,
        id_hora_inicio, id_hora_fin, id_lugar)
        VALUES ($id_professional, $id_student, '$date', $id_start, $id_end,
        (SELECT id_lugar FROM profesionista WHERE id = '$id_professional'))";

	$result = self::connect()->query($query);

	return $result;
    }
}
