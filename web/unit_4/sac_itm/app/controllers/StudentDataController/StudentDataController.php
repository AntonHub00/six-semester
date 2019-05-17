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

class StudentDataController extends Controller{
    public static function process(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	    echo 'Posted here';
	}
	elseif(count($_GET) > 1){
	    self::render_view("StudentData", NULL);
	}
	else{
	    $student_data = Student::get('16121053');
	    $careers = Student::get_careers();
	    $genders = Student::get_genders();

	    if(!$student_data){
		echo "<script>alert('No se pudo obtener los datos del usuario');
                window.location = 'StudentIndex';</script>";
	    }elseif(!$careers){
		echo "<script>alert('No se pudo obtener las carreras');
                window.location = 'StudentIndex';</script>";
	    }elseif(!$genders){
		echo "<script>alert('No se pudo obtener los géneros');
                window.location = 'StudentIndex';</script>";
	    }

	    self::render_view("StudentData", array('student_data' => $student_data,
	    'careers' => $careers, 'genders' => $genders));
	}
    }
}

?>
