DROP TABLE IF EXISTS recursos;
CREATE TABLE recursos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40),
    dni varchar (9),
    tipo enum('despacho','aula','laboratorio','salaReunion')
);

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password CHAR(255) NOT NULL,
		first_name VARCHAR(20),
		second_name VARCHAR(50),
    group_id INT(11) NOT NULL,
    created DATETIME
);
DROP TABLE IF EXISTS groups;
CREATE TABLE groups (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created DATETIME
);
