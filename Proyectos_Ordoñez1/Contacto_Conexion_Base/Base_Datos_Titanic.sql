DROP DATABASE IF EXISTS Titanic;
CREATE DATABASE Titanic;

USE Titanic;

CREATE TABLE login(
    correo VARCHAR(50) PRIMARY KEY,
    contraseña VARCHAR(255)  
);

CREATE TABLE semestre(
    id_semestre INT AUTO_INCREMENT PRIMARY KEY,
    semestre VARCHAR(30)
);

CREATE TABLE grupos (
    id_grupo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_grupo VARCHAR(50)
);

CREATE TABLE alumnos(
    matricula_alumno INT(8) PRIMARY KEY,
    contraseña VARCHAR(255),  
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    id_semestre INT,
    id_grupo INT,
    FOREIGN KEY (correo) REFERENCES login(correo),
    FOREIGN KEY (id_semestre) REFERENCES semestre(id_semestre),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);

CREATE TABLE profesores(
    matricula_profesor INT(8) PRIMARY KEY,
    contraseña VARCHAR(255),  
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    matricula_alumno INT,
    FOREIGN KEY (correo) REFERENCES login(correo),
    FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno)
);

CREATE TABLE administradores(
    matricula_admin INT(8) PRIMARY KEY,
    contraseña VARCHAR(255),  
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    FOREIGN KEY (correo) REFERENCES login(correo)
);

CREATE TABLE materias(
    id_materia INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    matricula_profesor INT,
    id_semestre INT,
    matricula_alumno INT,
    id_grupo INT,
    FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor),
    FOREIGN KEY (id_semestre) REFERENCES semestre(id_semestre),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);

CREATE TABLE calificaciones(
    id_calificacion_parcial INT AUTO_INCREMENT PRIMARY KEY,
    parcial_uno NUMERIC(2, 1),
    parcial_dos NUMERIC(2, 1),
    parcial_tres NUMERIC(2, 1),
    calif_total NUMERIC(2, 1),
    matricula_alumno INT,
    id_materia INT,
    FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno),
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

CREATE TABLE horarios(
    id_horario INT AUTO_INCREMENT PRIMARY KEY,
    dia VARCHAR(20),
    inicio TIME,
    fin TIME,
    id_materia INT,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

CREATE TABLE asistencias(
    id_asistencias INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE,
    asistencia BOOLEAN,
    falta BOOLEAN,
    justificante BOOLEAN,
    matricula_alumno INT,
    id_materia INT,
    FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno),
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);



