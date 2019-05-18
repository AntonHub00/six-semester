<?php

class Student extends DB{

    public static function register($id, $name, $student_f_lastname,
				    $student_s_lastname, $career_id,
				    $semester, $student_email, $student_phone,
				    $gender_id, $password, $tutor_name,
				    $tutor_f_lastname, $tutor_s_lastname,
				    $tutor_phone, $tutor_email){

	$query = "INSERT INTO estudiante (id, nombre, primer_apellido,
        segundo_apellido, id_carrera, id_semestre, correo, telefono, id_genero,
        contrasena, nombre_tutor, primer_apellido_tutor, segundo_apellido_tutor,
        telefono_tutor, correo_tutor)
        VALUES('$id', '$name', '$student_f_lastname', '$student_s_lastname',
        $career_id, $semester, '$student_email','$student_phone', $gender_id,
        '$password', '$tutor_name', '$tutor_f_lastname', '$tutor_s_lastname',
        '$tutor_phone','$tutor_email')";

	$result = self::connect()->query($query);

	return $result;
    }

    public static function update($id, $name, $student_f_lastname,
				  $student_s_lastname, $career_id,
				  $semester, $student_email, $student_phone,
				  $gender_id, $password, $tutor_name,
				  $tutor_f_lastname, $tutor_s_lastname,
				  $tutor_phone, $tutor_email){

	$query = "UPDATE estudiante SET nombre = '$name',
        primer_apellido = '$student_f_lastname',
        segundo_apellido = '$student_s_lastname', id_carrera = $career_id,
        id_semestre = $semester, correo = '$student_email',
        telefono = '$student_phone', id_genero = $gender_id,
        contrasena = '$password', nombre_tutor = '$tutor_name',
        primer_apellido_tutor = '$tutor_f_lastname',
        segundo_apellido_tutor = '$tutor_s_lastname',
        telefono_tutor = '$tutor_phone', correo_tutor = '$tutor_email'
        WHERE id = '$id'";

	$result = self::connect()->query($query);

	return $result;
    }

    public static function get($id){
	$query = "SELECT estudiante.id, nombre, primer_apellido, segundo_apellido,
        id_carrera, carrera.descripcion AS carrera_desc, id_semestre, correo,
        telefono, id_genero, genero.descripcion AS genero_desc, contrasena,
        nombre_tutor,primer_apellido_tutor, segundo_apellido_tutor,
        telefono_tutor, correo_tutor
        FROM estudiante
        INNER JOIN carrera ON estudiante.id_carrera = carrera.id
        INNER JOIN genero ON estudiante.id_genero = genero.id
        INNER JOIN semestre ON estudiante.id_semestre = semestre.id
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

    public static function get_semesters(){
	$query = "SELECT id FROM semestre";

	$result = self::connect()->query($query);

	return ($result->num_rows > 0) ? $result : false;
    }
}
