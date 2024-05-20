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

INSERT INTO semestre (id_semestre, semestre) VALUES
    (1, 'Primer semestre'),
    (2, 'Quinto semestre'),
    (3, 'Segundo semestre'),
    (4, 'Tercer semestre'),
    (5, 'Sexto semestre'),
    (6, 'Cuarto semestre');

CREATE TABLE alumnos(
    matricula_alumno INT(8) PRIMARY KEY,
    contraseña VARCHAR(255),  
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    id_semestre INT,
    FOREIGN KEY (correo) REFERENCES login(correo),
    FOREIGN KEY (id_semestre) REFERENCES semestre(id_semestre)
);

CREATE TABLE profesores(
    matricula_profesor INT(8) PRIMARY KEY,
    contraseña VARCHAR(255),  
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    FOREIGN KEY (correo) REFERENCES login(correo)
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
    FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor),
    FOREIGN KEY (id_semestre) REFERENCES semestre(id_semestre)
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