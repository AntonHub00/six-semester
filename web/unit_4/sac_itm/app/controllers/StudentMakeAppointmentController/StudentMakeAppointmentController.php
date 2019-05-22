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

class StudentMakeAppointmentController extends Controller{
    public static function process(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    self::render_view("StudentMakeAppointment", NULL);
	}
	elseif(count($_GET) > 1){
	    if(isset($_GET['data_from_step_1'])){
		$professional = Professional::get($_GET['id_professional']);

		if(!$professional){
		    echo "<script>alert('Error al obtener datos del profesionista');
                    window.location = 'StudentMakeAppointment';</script>";
		}else{
		    $professional = $professional->fetch_assoc();
		}

		self::render_view("StudentMakeAppointment", array('step_2' => true,
								  'id_professional' => $_GET['id_professional'],
								  'professional' => $professional));
	    }elseif(isset($_GET['data_from_step_2'])){
		$professional = Professional::get($_GET['id_professional']);
		$hours = Appointment::get_available_hours($_GET['id_professional'],
							  $_GET['date']);

		if(!$professional){
		    echo "<script>alert('Error al obtener datos del profesionista');
                    window.location = 'StudentMakeAppointment';</script>";
		}else{
		    $professional = $professional->fetch_assoc();
		}

		if(!$hours){
		    echo "<script>alert('Error al obtener el horario del profesionista');
                    window.location = 'StudentMakeAppointment';</script>";
		}

		$day = date('d', strtotime($_GET['date']));
		$month = date('F', strtotime($_GET['date']));
		$year = date('Y', strtotime($_GET['date']));

		$date_parsed = "$day de $month del $year";

		self::render_view("StudentMakeAppointment", array('step_3' => true,
								  'id_professional' => $_GET['id_professional'],
								  'professional' => $professional,
								  'date' => $_GET['date'],
								  'date_parsed' => $date_parsed,
								  'hours' => $hours));
	    }if(isset($_GET['data_from_step_3'])){
		$id_end_hour = $_GET['id_start_hour'] + 1;

		$result = Appointment::insert_appointment($_GET['id_professional'],
							  Session::get_id(),
							  $_GET['date'],
							  $_GET['id_start_hour'],
							  $id_end_hour);

		if(!$result){
		    echo "<script>alert('Error al almacenar la cita en la base de datos');
                    window.location = 'StudentMakeAppointment';</script>";
		}else{
		    echo "<script>alert('Cita establecida exitosamente');
                    window.location = 'StudentMakeAppointment';</script>";
		}
	    }
	}
	else{
	    $result = Professional::get_all();

	    if(!$result){
		echo "<script>alert('Error al obtener datos de los profesionistas');
                    window.location = 'StudentIndex';</script>";
	    }
	    self::render_view("StudentMakeAppointment", array('step_1' => true,
							      'professionals' => $result));
	}
    }
}

?>
