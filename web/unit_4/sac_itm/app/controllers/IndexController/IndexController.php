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
		    $student_result = Student::get_password_and_role($_POST['username']);
		    $professional_result = Professional::get_password_and_role($_POST['username']);
		    $admin_result = Administrator::get_password_and_role($_POST['username']);

		    # Is missing the checking of admin

		    if($student_result){
			$student_result = $student_result->fetch_assoc();
			$password = $student_result['contrasena'];
			$role = $student_result['rol'];

			if ($password === $_POST['password']){
			    Session::set($_POST['username'], $role);
			    echo "<script>window.location = 'StudentIndex';</script>";
			}else{
			    echo "<script>alert('El usuario o la contraseña son incorrectos');
			    window.location = '';</script>";
			}
		    }elseif($professional_result){
			$professional_result = $professional_result->fetch_assoc();
			$password = $professional_result['contrasena'];
			$role = $professional_result['rol'];

			if ($password === $_POST['password']){
			    Session::set($_POST['username'], $role);
			    echo "<script>window.location = 'ProfessionalIndex';</script>";
			}else{
			    echo "<script>alert('El usuario o la contraseña son incorrectos');
			    window.location = '';</script>";
			}
		    }elseif($admin_result){
			$admin_result = $admin_result->fetch_assoc();
			$password = $admin_result['contrasena'];
			$role = $admin_result['rol'];

			if ($password === $_POST['password']){
			    Session::set($_POST['username'], $role);
			    echo "<script>window.location = 'AdminIndex';</script>";
			}else{
			    echo "<script>alert('El usuario o la contraseña son incorrectos');
			    window.location = '';</script>";
			}
		    }else{
			echo "<script>alert('El usuario o la contraseña son incorrectos');
			window.location = '';</script>";
		    }
		}elseif($_POST['submit'] == 'signin'){
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
