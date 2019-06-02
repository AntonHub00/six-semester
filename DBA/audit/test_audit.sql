DROP DATABASE IF EXISTS test_audit;


CREATE DATABASE IF NOT EXISTS test_audit;


USE test_audit;


CREATE TABLE person(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
birthdate DATE NOT NULL,
PRIMARY KEY (id)
);


CREATE TABLE pet(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(20) NOT NULL,
animal VARCHAR(20) NOT NULL,
PRIMARY KEY (id)
);


CREATE TABLE audit(
id INT NOT NULL AUTO_INCREMENT,
query_type VARCHAR(10),
table_name VARCHAR(50) NOT NULL,
row_pk VARCHAR(20) NOT NULL,
field_name VARCHAR(20) DEFAULT NULL,
previous_value VARCHAR(50) DEFAULT NULL,
new_value VARCHAR(50) DEFAULT NULL,
date_and_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
user_name VARCHAR(50) NOT NULL,
host_name VARCHAR(50) NOT NULL,
mac VARCHAR(50) NOT NULL,
host_ip VARCHAR(50) NOT NULL,
PRIMARY KEY(id)
);


--------------------------------------------------------------------------------
-- 'Person' triggers


DELIMITER //
CREATE TRIGGER update_person_trigger AFTER UPDATE ON person
FOR EACH ROW
BEGIN

IF OLD.id <> NEW.id THEN

SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'UPDATE', NEW.id, 'id', OLD.id, NEW.id, @user_name, @@hostname,
@mac, @ip);

END IF;


IF OLD.name <> NEW.name THEN

SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1)  INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1)  INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'UPDATE', NEW.id, 'name', OLD.name, NEW.name, @user_name, @@hostname,
@mac, @ip);

END IF;


IF OLD.birthdate <> NEW.birthdate THEN

SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1)  INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1)  INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'UPDATE', NEW.id, 'birthdate', OLD.birthdate, NEW.birthdate, @user_name, @@hostname,
@mac, @ip);

END IF;


END; //
DELIMITER ;


DELIMITER //
CREATE TRIGGER insert_person_trigger AFTER INSERT ON person
FOR EACH ROW
BEGIN


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'INSERT', NEW.id, 'id', NULL, NEW.id, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'INSERT', NEW.id, 'name', NULL, NEW.name, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'INSERT', NEW.id, 'birthdate', NULL, NEW.birthdate, @user_name, @@hostname,
@mac, @ip);


END; //
DELIMITER ;


DELIMITER //
CREATE TRIGGER delete_person_trigger AFTER DELETE ON person
FOR EACH ROW
BEGIN


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'DELETE', OLD.id, 'id', OLD.id, NULL, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'DELETE', OLD.id, 'name', OLD.name, NULL, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('person', 'DELETE', OLD.id, 'birthdate', OLD.birthdate, NULL, @user_name, @@hostname,
@mac, @ip);


END; //
DELIMITER ;


--------------------------------------------------------------------------------
-- 'pet' triggers


DELIMITER //
CREATE TRIGGER update_pet_trigger AFTER UPDATE ON pet
FOR EACH ROW
BEGIN


IF OLD.id <> NEW.id THEN

SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'UPDATE', NEW.id, 'id', OLD.id, NEW.id, @user_name, @@hostname,
@mac, @ip);

END IF;


IF OLD.name <> NEW.name THEN

SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1)  INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1)  INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'UPDATE', NEW.id, 'name', OLD.name, NEW.name, @user_name, @@hostname,
@mac, @ip);

END IF;


IF OLD.animal <> NEW.animal THEN

SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1)  INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1)  INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'UPDATE', NEW.id, 'animal', OLD.animal, NEW.animal, @user_name, @@hostname,
@mac, @ip);

END IF;


END; //
DELIMITER ;


DELIMITER //
CREATE TRIGGER insert_pet_trigger AFTER INSERT ON pet
FOR EACH ROW
BEGIN


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'INSERT', NEW.id, 'id', NULL, NEW.id, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'INSERT', NEW.id, 'name', NULL, NEW.name, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'INSERT', NEW.id, 'animal', NULL, NEW.animal, @user_name, @@hostname,
@mac, @ip);


END; //
DELIMITER ;


DELIMITER //
CREATE TRIGGER delete_pet_trigger AFTER DELETE ON pet
FOR EACH ROW
BEGIN


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'DELETE', OLD.id, 'id', OLD.id, NULL, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'DELETE', OLD.id, 'name', OLD.name, NULL, @user_name, @@hostname,
@mac, @ip);


SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1) INTO @user_name; -- (user)
SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1) INTO @ip; -- (ip)
SELECT concat(substring(uid, 25,2)
, ':',  substring(uid, 27,2)
, ':',  substring(uid, 29,2)
, ':',  substring(uid, 31,2)
, ':',  substring(uid, 33,2)
, ':',  substring(uid, 35,2)
)AS mac INTO @mac from (select uuid() uid) AS alias; -- (MAC)

-- Do something
INSERT INTO audit (table_name, query_type, row_pk, field_name, previous_value, new_value,
user_name, host_name, mac, host_ip)
VALUES ('pet', 'DELETE', OLD.id, 'animal', OLD.animal, NULL, @user_name, @@hostname,
@mac, @ip);


END; //
DELIMITER ;


-- Insert queries
INSERT INTO person (name, birthdate) VALUES ('Antonio', '1998-07-31'), ('Julia', '1998-08-27');

INSERT INTO pet (name, animal) VALUES ('Kiki', 'Cat'), ('Fifi', 'Dog');

---------------------------------------------
-- Queries for audit table

-- SELECT @@hostname; (Machine name)
-- SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', -1)  INTO @host_name (ip)
-- SELECT SUBSTRING_INDEX(CURRENT_USER(), '@', 1)  INTO @user_name (user)

-- (MAC)
-- select concat(substring(uid, 25,2)
-- , ':',  substring(uid, 27,2)
-- , ':',  substring(uid, 29,2)
-- , ':',  substring(uid, 31,2)
-- , ':',  substring(uid, 33,2)
-- , ':',  substring(uid, 35,2)
-- ) AS mac from (select uuid() uid) AS alias;


---------------------------------------------
