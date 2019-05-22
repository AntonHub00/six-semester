CREATE DATABASE IF NOT EXISTS sac_itm CHARACTER SET latin1 COLLATE latin1_spanish_ci;

USE sac_itm;

--Begin table independent ----------------------------------------
CREATE TABLE estado
(
id INT NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(30) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE horario
(
id INT NOT NULL AUTO_INCREMENT,
hora TIME,
PRIMARY KEY(id)
);

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

--Need "puesto", "lugar" and "horario" tables created
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
id_hora_entrada INT NOT NULL,
id_hora_salida INT NOT NULL,
rol INT NOT NULL DEFAULT 2,
PRIMARY KEY(id),
FOREIGN KEY (id_puesto) REFERENCES puesto(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_lugar) REFERENCES lugar(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_hora_entrada) REFERENCES horario(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_hora_salida) REFERENCES horario(id)
ON UPDATE CASCADE
ON DELETE CASCADE
);


--Need "profesionista.id", "estudiante.id", "horario" tables created
CREATE TABLE cita
(
id_profesionista VARCHAR(15) NOT NULL,
id_estudiante VARCHAR(15) NOT NULL,
fecha DATE NOT NULL,
id_hora_inicio INT NOT NULL,
id_hora_fin INT NOT NULL,
id_estado INT NOT NULL DEFAULT 2,
id_lugar INT NOT NULL,
FOREIGN KEY (id_estudiante) REFERENCES estudiante(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_profesionista) REFERENCES profesionista(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_hora_inicio) REFERENCES horario(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_hora_fin) REFERENCES horario(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_estado) REFERENCES estado(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
FOREIGN KEY (id_lugar) REFERENCES lugar(id)
ON UPDATE CASCADE
ON DELETE CASCADE,
PRIMARY KEY(id_profesionista, fecha, id_hora_inicio, id_lugar)
);
--End table dependent ----------------------------------------

--Data
INSERT INTO estado (descripcion) VALUES ('Finalizada'), ('En espera'), ('Cancelada');

INSERT INTO horario (hora) VALUES ('07:00'), ('08:00'), ('09:00'), ('10:00'),
('11:00'), ('12:00'), ('13:00'), ('14:00'), ('15:00'), ('16:00'), ('17:00'),
('18:00'), ('19:00'), ('20:00');

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
telefono, id_puesto, contrasena, id_lugar, id_hora_entrada, id_hora_salida)
VALUES
('112233', 'Antonio Emiko', 'Ochoa', 'Adame', 'antonhub00@gmail.com', '9988776655', 1,
'pass', 1, 3, 8);

INSERT INTO profesionista (id, nombre, primer_apellido, segundo_apellido, correo,
telefono, id_puesto, contrasena, id_lugar, id_hora_entrada, id_hora_salida)
VALUES
('111111', 'Juan', 'Pérez', 'Martínez', 'juanpm@gmail.com', '1111000000', 2,
'pass', 1, 4, 10);


INSERT INTO cita (id_profesionista, id_estudiante, fecha, id_hora_inicio, id_hora_fin, id_lugar)
VALUES ('112233', '16121053', CURRENT_DATE(), 3, 4, (SELECT id_lugar FROM
profesionista WHERE id = '112233'));

INSERT INTO cita (id_profesionista, id_estudiante, fecha, id_hora_inicio, id_hora_fin, id_lugar)
VALUES ('112233', '16121053', CURRENT_DATE(), 9, 10, (SELECT id_lugar FROM
profesionista WHERE id = '112233'));

-- SELECT id, DATE_FORMAT(hora, '%H:%i') from horario WHERE id BETWEEN
-- (SELECT id_hora_entrada FROM profesionista WHERE id = '112233')
-- AND
-- (SELECT id_hora_salida FROM profesionista WHERE id = '112233')
-- AND
-- id NOT IN (SELECT id_hora_inicio FROM cita WHERE fecha = '2019-05-21' AND id_profesionista = '112233');


--Justfor queries
--DATE_FORMAT('10/12/18','%m/%d/%Y') : You get DATE as a STRING
--TIME_FORMAT('16:00', '%H:%i') : You get TIME as a STRING
--STR_TO_DATE('18/12/2010', '%d/%m/%Y') : You convert STRING to DATE to GET and INSERT


-- SELECT DATE_FORMAT(entrada, '%H:%i'), DATE_FORMAT(salida, '%H:%i')
-- FROM horario
-- WHERE id_profesionista = '112233';
