CREATE DATABASE IF NOT EXISTS u466661310_uno CHARACTER SET latin1 COLLATE latin1_spanish_ci;

USE u466661310_uno;

CREATE TABLE administrador(
  id_administrador VARCHAR(10) NOT NULL,
  nombre VARCHAR(25) NOT NULL,
  apellido_paterno VARCHAR(25) NOT NULL,
  apellido_materno VARCHAR(25) NOT NULL,
  contrasena VARCHAR(16) NOT NULL,
  CONSTRAINT pk_administrador PRIMARY KEY (id_administrador)
);

CREATE TABLE tipo_servicio(
  id_tipo_servicio INT(11) NOT NULL AUTO_INCREMENT,
  descripcion TEXT NOT NULL,
  CONSTRAINT pk_tipo_servicio PRIMARY KEY (id_tipo_servicio)
);

CREATE TABLE estado(
  id_estado INT(11) NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(25) NOT NULL,
  CONSTRAINT pk_estado PRIMARY KEY (id_estado)
);

CREATE TABLE requerimiento(
  id_requerimiento INT(11) NOT NULL AUTO_INCREMENT,
  descripcion TEXT NOT NULL,
  CONSTRAINT pk_requerimiento PRIMARY KEY (id_requerimiento)
);

CREATE TABLE tarea(
  id_tarea INT(11) NOT NULL AUTO_INCREMENT,
  descripcion text NOT NULL,
  CONSTRAINT pk_tarea PRIMARY KEY (id_tarea)
);

CREATE TABLE investigador(
  id_investigador VARCHAR(25) NOT NULL,
  nombre VARCHAR(25) NOT NULL,
  apellido_paterno VARCHAR(25) NOT NULL,
  apellido_materno VARCHAR(25) NOT NULL,
  contrasena VARCHAR(16) NOT NULL,
  CONSTRAINT pk_investigador PRIMARY KEY (id_investigador)
);

CREATE TABLE proyecto(
  id_proyecto INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(25) NOT NULL,
  descripcion text NOT NULL,
  convenio VARCHAR(30),
  id_estado INT(11) NOT NULL,
  id_staff VARCHAR(25) NOT NULL,
  CONSTRAINT pk_proyecto PRIMARY KEY (id_proyecto),
  CONSTRAINT fk_id_estado_in_proyecto FOREIGN KEY (id_estado)
  references estado (id_estado)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_id_staff_in_proyecto FOREIGN KEY (id_staff)
  references investigador (id_investigador)
  ON UPDATE CASCADE
  ON DELETE NO ACTION
);

CREATE TABLE servicio(
  id_servicio INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(25) NOT NULL,
  id_tipo_servicio INT(11) NOT NULL,
  id_estado INT(11) NOT NULL,
  id_encargado VARCHAR(25) NOT NULL,
  CONSTRAINT pk_servicio PRIMARY KEY (id_servicio),
  CONSTRAINT fk_id_tipo_servicio_in_servicio FOREIGN KEY (id_tipo_servicio)
  references tipo_servicio (id_tipo_servicio)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_id_estado_in_servicio FOREIGN KEY (id_estado)
  references estado (id_estado)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_id_encargado_in_servicio FOREIGN KEY (id_encargado)
  references investigador (id_investigador)
  ON UPDATE CASCADE
  ON DELETE NO ACTION
);

CREATE TABLE equipo_proyecto(
  id_proyecto INT(11) NOT NULL,
  id_investigador VARCHAR(25) NOT NULL,
  CONSTRAINT fk_id_proyecto_in_equipo_proyecto FOREIGN KEY (id_proyecto)
  references proyecto (id_proyecto)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_id_investigador_in_equipo_proyecto FOREIGN KEY (id_investigador)
  references investigador (id_investigador)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT pk_equipo_proyecto PRIMARY KEY (id_proyecto, id_investigador)
);

CREATE TABLE equipo_servicio(
  id_servicio INT(11) NOT NULL,
  id_investigador VARCHAR(25) NOT NULL,
  CONSTRAINT fk_id_servicio_in_equipo_servicio FOREIGN KEY (id_servicio)
  references servicio (id_servicio)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_id_investigador_in_equipo_servicio FOREIGN KEY (id_investigador)
  references investigador (id_investigador)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT pk_equipo_servicio PRIMARY KEY (id_servicio, id_investigador)
);

CREATE TABLE lista_requerimientos(
  id_proyecto INT(11) NOT NULL,
  id_requerimiento INT(11) NOT NULL,
  CONSTRAINT fk_id_proyecto_in_lista_requerimientos FOREIGN KEY (id_proyecto)
  references proyecto (id_proyecto)
  ON UPDATE CASCADE
  ON DELETE CASCADE,
  CONSTRAINT fk_id_requerimiento_in_lista_requerimientos FOREIGN KEY (id_requerimiento)
  references requerimiento (id_requerimiento)
  ON UPDATE CASCADE
  ON DELETE CASCADE,
  CONSTRAINT pk_lista_requerimiento PRIMARY KEY (id_proyecto, id_requerimiento)
);

CREATE TABLE lista_tareas_proyecto(
  id_proyecto INT(11) NOT NULL,
  id_tarea INT(11) NOT NULL,
  CONSTRAINT fk_id_proyecto_in_lista_proyecto FOREIGN KEY (id_proyecto)
  references proyecto (id_proyecto)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_id_tarea_in_lista_tareas_proyecto FOREIGN KEY (id_tarea)
  references tarea (id_tarea)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT pk_lista_tareas_proyecto PRIMARY KEY (id_proyecto, id_tarea)
);

CREATE TABLE lista_tareas_servicio(
  id_servicio INT(11) NOT NULL,
  id_tarea INT(11) NOT NULL,
  CONSTRAINT fk_id_servicio_in_lista_tareas_servicio FOREIGN KEY (id_servicio)
  references servicio (id_servicio)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT fk_id_tarea_in_lista_tareas_servicio FOREIGN KEY (id_tarea)
  references tarea (id_tarea)
  ON UPDATE CASCADE
  ON DELETE NO ACTION,
  CONSTRAINT pk_lista_tareas_servicio PRIMARY KEY (id_servicio, id_tarea)
);

-- This code works --------------------------------------------

DELIMITER //
CREATE PROCEDURE insert_into_requirements_list
(IN project_id INT(11),
IN requirement TEXT)
BEGIN

DECLARE `should_rollback` BOOL DEFAULT FALSE;
DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `should_rollback` = TRUE;

START TRANSACTION;

INSERT INTO requerimiento (descripcion) VALUES (requirement);

SET @id_requirement = (SELECT LAST_INSERT_ID());

INSERT INTO lista_requerimientos (id_proyecto, id_requerimiento)
VALUES(project_id, @id_requirement);

IF `should_rollback` THEN
SELECT FALSE AS success;
ROLLBACK;
ELSE
SELECT TRUE AS success;
COMMIT;
END IF;

END //
DELIMITER ;


-- CALL insert_into_requirements_list(1, 'Otro requermiento');


-- DROP PROCEDURE IF EXISTS insert_into_requirements_list;


-- Insert project query

INSERT INTO investigador (id_investigador, nombre, apellido_paterno,
apellido_materno, contrasena) VALUES('jorge_jimenez', 'Jorge',
'Jimenez', 'Hernandez', 'pass');

INSERT INTO investigador (id_investigador, nombre, apellido_paterno,
apellido_materno, contrasena) VALUES('juan_megía', 'Juan',
'Megía', 'Sánchez', 'pass');


-- Insert estado query

INSERT INTO estado (descripcion) VALUES('Iniciado');
INSERT INTO estado (descripcion) VALUES('En proceso');
INSERT INTO estado (descripcion) VALUES('Suspendido');
INSERT INTO estado (descripcion) VALUES('Cancelado');

-- Insert project query

INSERT INTO proyecto (nombre, descripcion, id_estado, id_staff)
VALUES('Piezas metalica SEDEAM', 'Proyecto de investigación para el
desarrollo de una pieza metalica para el laboratorio de SEDEAM', 1,
'jorge_jimenez');

INSERT INTO proyecto (nombre, descripcion, id_estado, id_staff)
VALUES('Proyecto prueba', 'Proyecto de prueba para SEDEAM', 2,
'juan_megía');


-- Insert project team

INSERT INTO equipo_proyecto (id_proyecto, id_investigador) VALUES (1, 'jorge_jimenez');
INSERT INTO equipo_proyecto (id_proyecto, id_investigador) VALUES (1, 'juan_megía');

-- Select project info query

-- SELECT * FROM proyecto WHERE id_staff = 'juan_perez';


-- Get requirements query

-- SELECT descripcion FROM lista_requerimientos JOIN requerimiento ON
-- lista_requerimientos.id_requerimiento = requerimiento.id_requerimiento
-- WHERE lista_requerimientos.id_proyecto = 1;
