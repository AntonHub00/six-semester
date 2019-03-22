CREATE DATABASE IF NOT EXISTS personal_finances_db;

USE personal_finances_db;

create table persona
(
	persona_id INT PRIMARY KEY,
	fecha_nacimiento date NOT NULL,
	correo varchar(45),
	telefono varchar(10),

);
