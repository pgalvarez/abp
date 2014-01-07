DROP TABLE IF EXISTS recursos;
CREATE TABLE recursos(
	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(40),
	localizacion VARCHAR(40),
	tipo ENUM('despacho','aula','laboratorio','salaReunion')
);
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password CHAR(255) NOT NULL,
		first_name VARCHAR(20),
		second_name VARCHAR(50),
		dni VARCHAR(10),
		mail VARCHAR(50),
    group_id INT(11) NOT NULL,
    created DATETIME
);
DROP TABLE IF EXISTS groups;
CREATE TABLE groups (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created DATETIME
);
DROP TABLE IF EXISTS asignaturas;
CREATE TABLE asignaturas (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
		creditos INT(11),
		responsable_id INT(11) NOT NULL,
    created DATETIME
);
DROP TABLE IF EXISTS matriculas;
CREATE TABLE matriculas (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		asignaturas_id INT(11) NOT NULL,
    users_id INT(11) NOT NULL,
		matriculado TINYINT
);

DROP TABLE IF EXISTS calendarios;
CREATE TABLE calendarios (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		idGrupo INT(11) NOT NULL,
    horario DATETIME
);

DROP TABLE IF EXISTS asistencias;
CREATE TABLE asistencias (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		idUsuario INT(11) NOT NULL,
		idGrupo INT(11) NOT NULL
);



