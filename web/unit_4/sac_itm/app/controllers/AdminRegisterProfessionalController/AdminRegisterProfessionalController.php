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

class AdminRegisterProfessionalController extends Controller{
    public static function process(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(isset($_POST['submit'])){

		if($_POST['id_hora_salida'] <= $_POST['id_hora_entrada']){
		    echo "<script>alert('La hora de salida no puede ser menor que la hora de entrada');
			window.location = 'AdminRegisterProfessional';</script>";
		}

		$result = Professional::register(
		    $_POST['id'],
		    $_POST['nombre'],
		    $_POST['primer_apellido'],
		    $_POST['segundo_apellido'],
		    $_POST['correo'],
		    $_POST['telefono'],
		    $_POST['id_puesto'],
		    $_POST['contrasena'],
		    $_POST['id_lugar'],
		    $_POST['id_hora_entrada'],
		    $_POST['id_hora_salida']);

		if($result){
		    echo "<script>alert('Profesionista registrado exitosamente');
			window.location = 'AdminRegisterProfessional';</script>";
		}else{
		    echo "<script>alert('Error al registrar profesionista');
			window.location = 'AdminRegisterProfessional';</script>";
		}
	    }
	}else{
	    $jobs = Professional::get_jobs();
	    $places = Professional::get_places();
	    $hours = Professional::get_all_hours();

	    if(!$jobs){
		echo "<script>alert('Error al obtener puestos');
                    window.location = 'AdminIndex';</script>";
	    }elseif(!$places){
		echo "<script>alert('Error al obtener lugares');
                    window.location = 'AdminIndex';</script>";
	    }elseif(!$hours){
		echo "<script>alert('Error al obtener horas');
                    window.location = 'AdminIndex';</script>";
	    }

	    self::render_view("AdminRegisterProfessional", array('jobs' => $jobs,
								 'places' => $places,
								 'hours' => $hours));
	}
    }
}
?>
