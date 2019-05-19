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

class StudentIndexController extends Controller{
    public static function process(){
	$result = Student::get(Session::get_id());

	if(!$result){
	    echo "<script>alert('Error al obtener los datos del estudiante');
            window.location = 'CloseSession';</script>";
	}

	$result = $result->fetch_assoc()['nombre'];

	self::render_view("StudentIndex", array('student_name' => $result));
    }
}

?>
