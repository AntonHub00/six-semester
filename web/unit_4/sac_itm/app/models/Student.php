<?php

class Student extends DB{

    public static function register($id, $name, $student_f_lastname,
				    $student_s_lastname, $career_id,
				    $semester, $student_email, $student_phone,
				    $gender_id, $password, $tutor_name,
				    $tutor_f_lastname, $tutor_s_lastname,
				    $tutor_phone, $tutor_email){

	$query = "INSERT INTO estudiante (id, nombre, primer_apellido,
        segundo_apellido, id_carrera, semestre, correo, telefono, id_genero,
        contrasena, nombre_tutor, primer_apellido_tutor, segundo_apellido_tutor,
        telefono_tutor, correo_tutor)
        VALUES('$id', '$name', '$student_f_lastname', '$student_s_lastname',
        $career_id, $semester, '$student_email','$student_phone', $gender_id,
        '$password', '$tutor_name', '$tutor_f_lastname', '$tutor_s_lastname',
        '$tutor_phone','$tutor_email')";

	$result = self::connect()->query($query);

	return $result;
    }

    public static function get($id){
	$query = "SELECT estudiante.id, nombre, primer_apellido, segundo_apellido,
        id_carrera, carrera.descripcion AS carrera_desc, semestre, correo,
        telefono, id_genero, genero.descripcion AS genero_desc, contrasena,
        nombre_tutor,primer_apellido_tutor, segundo_apellido_tutor,
        telefono_tutor, correo_tutor
        FROM estudiante
        INNER JOIN carrera ON estudiante.id_carrera = carrera.id
        INNER JOIN genero ON estudiante.id_genero = genero.id
        WHERE estudiante.id = '$id'";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }

    public static function get_careers(){
	$query = "SELECT id, descripcion FROM carrera";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }

    public static function get_genders(){
	$query = "SELECT id, descripcion FROM genero";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }
}
