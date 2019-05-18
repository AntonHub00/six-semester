<?php

#The "process" function must be implemented here and in all the controllers
#because is an abstract method inherit from "Controller"
#
#How to use process function:
#If it is a POST request, you process the data and you may or not return a
#view.
#If it is a GET request without parameters, it means the user just requested
#the page, so just return the view.
#If it is a GET request with params, you process the data and may or not return
#a view.
#
#Passing variables to views:
#Inside each conditional can be defined all the variables you need, then you
#can just use them inside the views because are in the same "scope", that's the
#reason why each conditional return a view.

class IndexController extends Controller{
    public static function process(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(isset($_POST['submit'])){
		if($_POST['submit'] == 'login'){
		    echo 'Login';
		}elseif($_POST['submit'] == 'signin'){
		    /* echo '<pre>';
		       print_r($_POST);
		       echo '</pre>';
		       die(); */
		    $result = Student::register(
			$_POST['id'],
			$_POST['nombre'],
			$_POST['primer_apellido'],
			$_POST['segundo_apellido'],
			$_POST['id_carrera'],
			$_POST['id_semestre'],
			$_POST['correo'],
			$_POST['telefono'],
			$_POST['id_genero'],
			$_POST['contrasena'],
			$_POST['nombre_tutor'],
			$_POST['primer_apellido_tutor'],
			$_POST['segundo_apellido_tutor'],
			$_POST['telefono_tutor'],
			$_POST['correo_tutor']);

		    if($result){
			echo "<script>alert('Estudiante registrado exitosamente');
			window.location = '';</script>";
		    }else{
			echo "<script>alert('Error al registrar estudiante');
			window.location = '';</script>";
		    }
		}
	    }
	}else{
	    $careers = Student::get_careers();
	    $genders = Student::get_genders();
	    $semesters = Student::get_semesters();

	    self::render_view("Index", array('careers' => $careers,
					     'genders' => $genders,
					     'semesters' => $semesters));
	}
    }
}

?>
