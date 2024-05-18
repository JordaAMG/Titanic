CREATE DATABASE hanabi;

USE hanabi;

CREATE TABLE login(
	correo VARCHAR (50) PRIMARY KEY,
	contraseña VARCHAR (30)
);

CREATE TABLE administradores(
	matricula_admin INT (8) PRIMARY KEY,
	contraseña VARCHAR (30),
	nombre_completo VARCHAR (100),
	correo VARCHAR (50),
	FOREIGN KEY (correo) REFERENCES login(correo)
);

CREATE TABLE profesores(
	matricula_profesor INT (8) PRIMARY KEY,
	contraseña VARCHAR (30),
	nombre_completo VARCHAR (100),
	correo VARCHAR (50),
	FOREIGN KEY (correo) REFERENCES login(correo)
);

CREATE TABLE alumnos(
	matricula_alumno INT (8) PRIMARY KEY,
	contraseña VARCHAR (30),
	nombre_completo VARCHAR (100),
	correo VARCHAR (50),
	FOREIGN KEY (correo) REFERENCES login(correo)
);

CREATE TABLE materias(
	id_materia INT (8) AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR (50),
	matricula_profesor INT,
	FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor)
);

CREATE TABLE calificaciones(
	id_calificacion_parcial INT (8) AUTO_INCREMENT PRIMARY KEY,
	parcial_uno NUMERIC (2, 1),
	parcial_dos NUMERIC (2, 1),
	parcial_tres NUMERIC (2, 1),
	matricula_alumno INT, 
	FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno)
);

CREATE TABLE horarios(
	id_horario INT (8) AUTO_INCREMENT PRIMARY KEY,
	dia VARCHAR (20),
	inicio TIME,
	fin TIME,
	id_materia INT,
	FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

CREATE TABLE asistencias(
	id_asistencias INT (8) AUTO_INCREMENT PRIMARY KEY,
	fecha DATE,
	asistencia BOOLEAN,
	falta BOOLEAN,
	justificante BOOLEAN,
	matricula_alumno INT,
	id_materia INT,
	FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno),
	FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);


