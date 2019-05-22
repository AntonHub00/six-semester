var today = new Date();

// Set min date
var min_day = today.getDate();
var min_month = today.getMonth()+1; //January is 0
var min_year = today.getFullYear();

if(min_day < 10){
    min_day = '0' + min_day;
}
if(min_month < 10){
    min_month = '0' + min_month;
}

min_date = min_year + '-' + min_month + '-' + min_day;

document.getElementById("date_appointment").setAttribute("min", min_date);

// Set max date
var max_day = today.getDate();
var max_month = today.getMonth()+2; //January is 0
var max_year = today.getFullYear();

if(max_month == 12){
    max_month = 1;
}

if(max_day < 10){
    max_day = '0' + max_day;
}
if(max_month < 10){
    max_month = '0' + max_month;
}

max_date = max_year + '-' + max_month + '-' + max_day;

document.getElementById("date_appointment").setAttribute("max", max_date);
