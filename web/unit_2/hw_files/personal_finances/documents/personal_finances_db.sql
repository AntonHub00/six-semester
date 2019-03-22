CREATE DATABASE IF NOT EXISTS personal_finances_db;

USE personal_finances_db;

CREATE TABLE transaction_type
(	id INT NOT NULL AUTO_INCREMENT,
	description VARCHAR(20) NOT NULL,
	CONSTRAINT pk_transaction_type PRIMARY KEY (id)
);

CREATE TABLE user
(	username VARCHAR(20) NOT NULL,
	name VARCHAR(50) NOT NULL,
	first_last_name VARCHAR(50) NOT NULL,
	second_last_name VARCHAR(50) NOT NULL,
	birthdate DATE NOT NULL,
	email VARCHAR(50) NOT NULL,
	phone VARCHAR(10) NOT NULL,
	password VARCHAR(15) NOT NULL,
	CONSTRAINT pk_user PRIMARY KEY (username)
);

CREATE TABLE categories
(	user_id VARCHAR(20) NOT NULL,
	description VARCHAR(20) NOT NULL,
	CONSTRAINT fk_user_id_categories FOREIGN KEY (user_id)
	REFERENCES user(username)
	ON UPDATE CASCADE
	ON DELETE CASCADE,
	CONSTRAINT pk_categories PRIMARY KEY (user_id, description)
);

CREATE TABLE account
(
	user_id VARCHAR(20) NOT NULL,
	number VARCHAR(20) NOT NULL UNIQUE,
	bank VARCHAR(30) NOT NULL,
	balance INT NOT NULL,
	CONSTRAINT fk_user_id_account FOREIGN KEY (user_id)
	REFERENCES user(username)
	ON DELETE CASCADE
	ON UPDATE CASCADE,
	CONSTRAINT pk_account PRIMARY KEY (user_id, number)
);

CREATE TABLE transaction
(	id INT NOT NULL AUTO_INCREMENT,
	date DATE NOT NULL,
	time TIME NOT NULL,
	amount INT NOT NULL,
	user_id VARCHAR(20) NOT NULL,
	transaction_type_id INT NOT NULL,
	payment_concept VARCHAR(30) NOT NULL,
	account_number VARCHAR(20) NOT NULL,
	CONSTRAINT fk_user_id_transaction FOREIGN KEY (user_id)
	REFERENCES user(username)
	ON UPDATE CASCADE
	ON DELETE NO ACTION,
	CONSTRAINT fk_transaction_type_id_transaction FOREIGN KEY (transaction_type_id)
	REFERENCES transaction_type(id)
	ON UPDATE CASCADE
	ON DELETE NO ACTION,
	CONSTRAINT fk_account_number_transaction FOREIGN KEY (account_number)
	REFERENCES account(number)
	ON UPDATE CASCADE
	ON DELETE NO ACTION,
	CONSTRAINT pk_transaction PRIMARY KEY (id)
);
