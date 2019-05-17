CREATE DATABASE IF NOT EXISTS sac_itm CHARACTER SET latin1 COLLATE latin1_spanish_ci;

USE sac_itm;

--Begin table independent ----------------------------------------
CREATE TABLE semestre
(
id INT NOT NULL,
PRIMARY KEY(id)
);


CREATE TABLE puesto
(
id INT NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(30) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE genero
(
id INT NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(10) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE lugar
(
id INT NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(30) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE carrera
(
id INT NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(50) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE administrador
(
id VARCHAR(15) NOT NULL,
nombre VARCHAR(35) NOT NULL,
primer_apellido VARCHAR(35) NOT NULL,
segundo_apellido VARCHAR(35) NOT NULL,
telefono VARCHAR(15) NOT NULL,
correo VARCHAR(35) NOT NULL,
rol INT NOT NULL DEFAULT 3,
contrasena VARCHAR(80) NOT NULL,
PRIMARY KEY(id)
);
--End table independent ----------------------------------------

--Begin table dependent ----------------------------------------

--Need "carrera" table created
CREATE TABLE estudiante
(
id VARCHAR(15) NOT NULL,
nombre VARCHAR(35) NOT NULL,
primer_apellido VARCHAR(35) NOT NULL,
segundo_apellido VARCHAR(35) NOT NULL,
id_carrera INT NOT NULL,
id_semestre INT NOT NULL,
correo VARCHAR(35) NOT NULL,
telefono VARCHAR(15) NOT NULL,
id_genero INT NOT NULL,
contrasena VARCHAR(80) NOT NULL,
nombre_tutor VARCHAR(35) NOT NULL,
primer_apellido_tutor VARCHAR(35) NOT NULL,
segundo_apellido_tutor VARCHAR(35) NOT NULL,
telefono_tutor VARCHAR(15) NOT NULL,
correo_tutor VARCHAR(35) NOT NULL,
rol INT NOT NULL DEFAULT 1,
PRIMARY KEY(id),
FOREIGN KEY (id_carrera) REFERENCES carrera(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_genero) REFERENCES genero(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_semestre) REFERENCES semestre(id)
ON UPDATE CASCADE
ON DELETE CASCADE
);

--Need "puesto", "lugar" tables created
CREATE TABLE profesionista
(
id VARCHAR(15) NOT NULL,
nombre VARCHAR(35) NOT NULL,
primer_apellido VARCHAR(35) NOT NULL,
segundo_apellido VARCHAR(35) NOT NULL,
correo VARCHAR(35) NOT NULL,
telefono VARCHAR(15) NOT NULL,
id_puesto INT NOT NULL,
contrasena VARCHAR(80) NOT NULL,
id_lugar INT NOT NULL,
rol INT NOT NULL DEFAULT 2,
PRIMARY KEY(id),
FOREIGN KEY (id_puesto) REFERENCES puesto(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_lugar) REFERENCES lugar(id)
ON UPDATE CASCADE
ON DELETE CASCADE
);

--Need "profesionista.id" tables created
CREATE TABLE horario
(
id_profesionista VARCHAR(15) NOT NULL,
entrada TIME,
salida TIME,
FOREIGN KEY (id_profesionista) REFERENCES profesionista(id)
ON UPDATE CASCADE
ON DELETE CASCADE
);

--Need "profesionista.id", "estudiante.id", "horario" tables created
CREATE TABLE cita
(
id INT NOT NULL AUTO_INCREMENT,
id_profesionista VARCHAR(15) NOT NULL,
id_estudiante VARCHAR(15) NOT NULL,
fecha DATE NOT NULL,
hora_inicio TIME NOT NULL,
hora_fin TIME NOT NULL,
PRIMARY KEY(id),
FOREIGN KEY (id_estudiante) REFERENCES estudiante(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_profesionista) REFERENCES profesionista(id)
ON UPDATE CASCADE
ON DELETE CASCADE
);
--End table dependent ----------------------------------------

--Data
INSERT INTO semestre (id) VALUES (1), (2), (3), (4), (5), (6), (7), (8),
(9), (10), (11), (12), (13);

INSERT INTO puesto (descripcion) VALUES ('Psicólogo'), ('Nutriólogo');

INSERT INTO genero (descripcion) VALUES ('Maculino'), ('Femenino');

INSERT INTO lugar (descripcion) VALUES ('Salon F5'), ('Salon K3'), ('Salon C3');

INSERT INTO carrera (descripcion) VALUES ('Ing. Materiales'), ('Ing. Mecatrónica'),
('Ing. Mecánica'), ('Ing. Bioquímica'), ('Ing. Eléctrica'), ('Ing. Electrónica'),
('Ing. Industrial'), ('Ing. Gestión Empresarial'),  ('Ing. Sistemas Computacionales'),
('Lic. Administración'), ('Contabilidad'), ('Ing. TICs'), ('Ing. Informática');

INSERT INTO administrador (id, nombre, primer_apellido, segundo_apellido, telefono,
correo, contrasena)
VALUES('admin', 'Antonio Emiko', 'Ochoa', 'Adame', '1122334455',
'antonhub00@gmail.com', 'pass');

INSERT INTO estudiante (id, nombre, primer_apellido, segundo_apellido, id_carrera,
id_semestre, correo, telefono, id_genero, contrasena, nombre_tutor, primer_apellido_tutor,
segundo_apellido_tutor,telefono_tutor, correo_tutor)
VALUES
('16121053', 'Antonio Emiko', 'Ochoa', 'Adame', 9, 5, 'antonhub00@gmail.com',
'1122334455', 1, 'pass', 'Josefa', 'Pérez', 'Prado', '5544332211',
'jp_prado@gmail.com');

INSERT INTO profesionista (id, nombre, primer_apellido, segundo_apellido, correo,
telefono, id_puesto, contrasena, id_lugar)
VALUES
('1', 'Antonio Emiko', 'Ochoa', 'Adame', 'antonhub00@gmail.com', '9988776655', 1,
'pass', 2);

INSERT INTO horario (id_profesionista, entrada, salida)
VALUES('1', '07:00', '15:00');

INSERT INTO cita (id_profesionista, id_estudiante, fecha, hora_inicio, hora_fin)
VALUES('1', '16121053', '10/12/18', '12:00','15:00');

--Justfor queries
--DATE_FORMAT('10/12/18','%m/%d/%Y') : You get DATE as a STRING
--TIME_FORMAT('16:00', '%H:%i') : You get TIME as a STRING
--STR_TO_DATE('18/12/2010', '%d/%m/%Y') : You convert STRING to DATE to GET and INSERT