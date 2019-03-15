CREATE DATABASE IF NOT EXISTS personal_finances_db;

USE personal_finances_db;

CREATE persona
{
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(50) NOT NULL,
	apellido_m VARCHAR(50) NOT NULL,
	apellido_p VARCHAR(50) NOT NULL,
	fecha_nac DATE NOT NULL,
	correo VARCHAR(50) NOT NULL,
	teléfono VARCHAR(15) NOT NULL,
	usuario VARCHAR(15) UNIQUE,
	contraseña VARCHAR(15 NOT NULL)
};

CREATE cuenta
{
	id INT PRIMARY KEY AUTO_INCREMENT,
	numero VARCHAR(20) UNIQUE,
	banco VARCHAR(20),
	saldo INT,
	id_persona INT,
	FOREIGN KEY (id_persona) REFERENCES persona(id)
	ON DELETE no action
	ON UPDATE cascade
};

CREATE tipo_transaccion
{
	id INT PRIMARY KEY AUTO_INCREMENT,
	descripcion VARCHAR(20),
};

CREATE transaccion
{
	id INT PRIMARY KEY AUTO_INCREMENT,
	fecha DATE,
	hora TIME,
	id_persona INT,
	monto INT,
	id_tipo INT,
	concepto VARCHAR(30),
	numero_cuenta INT,
	FOREIGN KEY (id_persona) REFERENCES persona(id)
	ON DELETE no action
	ON UPDATE cascade,
	FOREIGN KEY (id_tipo) REFERENCES tipo_transaccion(id)
	ON DELETE no action
	ON UPDATE cascade,
	FOREIGN KEY (id_numero_cuenta) REFERENCES cuenta(numero)
	ON DELETE no action
	ON UPDATE cascade
};
