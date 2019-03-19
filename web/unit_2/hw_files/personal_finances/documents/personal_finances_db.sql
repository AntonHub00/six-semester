CREATE DATABASE IF NOT EXISTS personal_finances_db;

USE personal_finances_db;

CREATE TABLE user
(	username VARCHAR(20) PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	first_last_name VARCHAR(50) NOT NULL,
	second_last_name VARCHAR(50) NOT NULL,
	birthdate DATE NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone VARCHAR(10) NOT NULL,
	password VARCHAR(15) NOT NULL
);

CREATE TABLE bank
(	id INT PRIMARY KEY AUTO_INCREMENT,
	description VARCHAR(20) NOT NULL
);

CREATE TABLE transaction_type
(	id INT PRIMARY KEY AUTO_INCREMENT,
	description VARCHAR(20) NOT NULL
);

CREATE TABLE account
(
	number VARCHAR(20) PRIMARY KEY,
	id_bank INT NOT NULL,
	balance INT NOT NULL,
	id_user VARCHAR(20) NOT NULL,
	FOREIGN KEY (id_user) REFERENCES user(username)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (id_bank) REFERENCES bank(id)
	ON DELETE CASCADE
	ON UPDATE CASCADE
);

CREATE TABLE transaction
(	id INT PRIMARY KEY AUTO_INCREMENT,
	date DATE NOT NULL,
	time TIME NOT NULL,
	amount INT NOT NULL,
	id_user VARCHAR(20) NOT NULL,
	id_transaction_type INT NOT NULL,
	payment_concept VARCHAR(30) NOT NULL,
	account_number VARCHAR(20) NOT NULL,
	FOREIGN KEY (id_user) REFERENCES user(username)
	ON DELETE no action
	ON UPDATE cascade,
	FOREIGN KEY (id_transaction_type) REFERENCES transaction_type(id)
	ON DELETE no action
	ON UPDATE cascade,
	FOREIGN KEY (account_number) REFERENCES account(number)
	ON DELETE no action
	ON UPDATE cascade
);
