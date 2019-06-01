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

class StudentAppointmentsController extends Controller{
    public static function process(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    if(isset($_POST['appointment_id'])){
		$result = Appointment::cancel_appointment($_POST['appointment_id']);

		if(!$result){
		    echo "<script>alert('Error al cancelar cita');
                    window.location = 'StudentAppointments';</script>";
		}else{
		    echo "<script>alert('Cita cancelada exitosamente');
                    window.location = 'StudentAppointments';</script>";
		}
	    }
	}else{
	    $result = Appointment::get_student_appointments(Session::get_id());

	    self::render_view("StudentAppointments", array('appointments' => $result));
	}
    }
}

?>
