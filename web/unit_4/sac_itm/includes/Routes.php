<?php

#The "set" method sets the name of the route and an anonymous function
#associated with it. The anonymous function calls the "process" function that is
#defined in the the "Controller" class wich is (and must be) extended by all
#the routes.

#if(!Session::in_session())
#  Controller::render_view();

Route::set("index.php", function(){
    IndexController::process();
});

#Admin stuff -------------------------------------------------------------------
Route::set("AdminIndex", function(){
    AdminIndexController::process();
});

#Profesional stuff -------------------------------------------------------------
Route::set("ProfessionalIndex", function(){
    ProfessionalIndexController::process();
});

#Student stuff -----------------------------------------------------------------
Route::set("StudentIndex", function(){
    StudentIndexController::process();
});

Route::set("StudentMakeAppointment", function(){
    StudentMakeAppointmentController::process();
});

Route::set("StudentAppointments", function(){
    StudentAppointmentsController::process();
});

Route::set("StudentData", function(){
    StudentDataController::process();
});

#If the route the user typed doesn't exist, then render 404 page ---------------
if(!in_array(URL, Route::$valid_routes))
    Controller::render_view("404", NULL);

?>
