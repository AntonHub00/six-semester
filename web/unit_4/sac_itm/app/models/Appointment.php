<?php

class Appointment extends DB{

    public static function get_available_hours($id, $date){
	$query = "SELECT id, DATE_FORMAT(hora, '%H:%i') AS hora from horario WHERE id BETWEEN
        (SELECT id_hora_entrada FROM profesionista WHERE id = '$id')
        AND
        (SELECT id_hora_salida FROM profesionista WHERE id = '$id')
        AND
        id NOT IN (SELECT id_hora_inicio FROM cita WHERE fecha = '$date' AND id_profesionista = '$id')
        AND
        id NOT IN (SELECT id_hora_inicio FROM cita WHERE id_lugar =
        (SELECT id_lugar from profesionista WHERE id = '$id')
        AND fecha = '$date')";

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

    public static function get_student_appointments($id){
	$query = "SELECT cita.id AS id, profesionista.nombre AS profesionista_nombre,
        profesionista.primer_apellido AS profesionista_primer_apellido,
        profesionista.segundo_apellido as profesionista_segundo_apellido,
        cita.fecha AS fecha, horario.hora AS hora_desc, cita.id_estado AS id_estado,
        estado.descripcion AS estado_desc, lugar.descripcion lugar_desc
        FROM cita
        INNER JOIN profesionista ON cita.id_profesionista = profesionista.id
        INNER JOIN horario ON cita.id_hora_inicio = horario.id
        INNER JOIN estado ON cita.id_estado = estado.id
        INNER JOIN lugar ON cita.id_lugar = lugar.id
        WHERE cita.id_estudiante = '$id'";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }

    public static function cancel_appointment($id){
	$query = "UPDATE cita SET id_estado = 3 WHERE id = $id;";

	$result = self::connect()->query($query);

	return $result;
    }
}
