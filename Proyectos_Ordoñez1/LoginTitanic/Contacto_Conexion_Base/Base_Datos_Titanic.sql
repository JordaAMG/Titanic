DROP DATABASE IF EXISTS Titanic;
CREATE DATABASE Titanic;

USE Titanic;

CREATE TABLE login(
    correo VARCHAR(50) PRIMARY KEY,
    contraseña VARCHAR(255)  
);

CREATE TABLE grupos (
    id_grupo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_grupo VARCHAR(50),
    id_materia INT,
    semestre INT
);

CREATE TABLE alumnos(
    matricula_alumno INT PRIMARY KEY,
    contraseña VARCHAR(30),
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    id_grupo INT,
    FOREIGN KEY (correo) REFERENCES login(correo),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);

CREATE TABLE profesores(
    matricula_profesor INT PRIMARY KEY,
    contraseña VARCHAR(30),
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    FOREIGN KEY (correo) REFERENCES login(correo)
);

CREATE TABLE materias(
    id_materia INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    matricula_profesor INT,
    FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor)
);

ALTER TABLE grupos
ADD FOREIGN KEY (id_materia) REFERENCES materias(id_materia);

CREATE TABLE administradores(
    matricula_admin INT PRIMARY KEY,
    contraseña VARCHAR(30),
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    FOREIGN KEY (correo) REFERENCES login(correo)
);

CREATE TABLE profesores_grupos (
    matricula_profesor INT,
    id_grupo INT,
    PRIMARY KEY (matricula_profesor, id_grupo),
    FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);

CREATE TABLE calificaciones(
    id_calificacion_parcial INT AUTO_INCREMENT PRIMARY KEY,
    parcial_uno NUMERIC (2,1),
    parcial_dos NUMERIC (2,1),
    parcial_tres NUMERIC (2,1),
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
    justificante VARCHAR,
    matricula_alumno INT,
    id_materia INT,
    FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno),
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

-- Inserción de datos
INSERT INTO login (correo, contraseña) VALUES 
('alumno1@example.com', 'pass123'),
('alumno2@example.com', 'pass123'),
('alumno3@example.com', 'pass123'),
('alumno4@example.com', 'pass123'),
('alumno5@example.com', 'pass123'),
('profesor1@example.com', 'pass123'),
('profesor2@example.com', 'pass123'),
('profesor3@example.com', 'pass123'),
('profesor4@example.com', 'pass123'),
('profesor5@example.com', 'pass123'),
('titanic@gmail.com', 'hundido');

INSERT INTO administradores (matricula_admin, contraseña, nombre_completo, correo) VALUES 
(1, 'hundido', 'Titanic', 'titanic@gmail.com');

INSERT INTO profesores (matricula_profesor, contraseña, nombre_completo, correo) VALUES 
(1, 'pass123', 'Profesor Uno', 'profesor1@example.com'),
(2, 'pass123', 'Profesor Dos', 'profesor2@example.com'),
(3, 'pass123', 'Profesor Tres', 'profesor3@example.com'),
(4, 'pass123', 'Profesor Cuatro', 'profesor4@example.com'),
(5, 'pass123', 'Profesor Cinco', 'profesor5@example.com');

INSERT INTO materias (nombre, matricula_profesor) VALUES 
('Matemáticas', 1),
('Ciencias', 2),
('Historia', 3),
('Geografía', 4),
('Lengua', 5);

INSERT INTO grupos (nombre_grupo, id_materia, semestre) VALUES 
('Grupo A', 1, 1),
('Grupo B', 2, 1),
('Grupo C', 3, 1),
('Grupo D', 4, 1),
('Grupo E', 5, 1);

INSERT INTO alumnos (matricula_alumno, contraseña, nombre_completo, correo, id_grupo) VALUES 
(1, 'pass123', 'Alumno Uno', 'alumno1@example.com', 1),
(2, 'pass123', 'Alumno Dos', 'alumno2@example.com', 2),
(3, 'pass123', 'Alumno Tres', 'alumno3@example.com', 3),
(4, 'pass123', 'Alumno Cuatro', 'alumno4@example.com', 4),
(5, 'pass123', 'Alumno Cinco', 'alumno5@example.com', 5);

INSERT INTO profesores_grupos (matricula_profesor, id_grupo) VALUES 
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

INSERT INTO calificaciones (parcial_uno, parcial_dos, parcial_tres, matricula_alumno, id_materia) VALUES 
(9.0, 8.5, 9.5, 1, 1),
(7.0, 7.5, 8.0, 2, 2),
(8.5, 8.0, 8.5, 3, 3),
(6.0, 7.0, 7.5, 4, 4),
(9.5, 9.0, 9.5, 5, 5);

INSERT INTO horarios (dia, inicio, fin, id_materia) VALUES 
('Lunes', '08:00:00', '09:00:00', 1),
('Martes', '09:00:00', '10:00:00', 2),
('Miércoles', '10:00:00', '11:00:00', 3),
('Jueves', '11:00:00', '12:00:00', 4),
('Viernes', '12:00:00', '13:00:00', 5);

INSERT INTO asistencias (fecha, asistencia, falta, justificante, matricula_alumno, id_materia) VALUES 
('2023-01-01', TRUE, FALSE, FALSE, 1, 1),
('2023-01-02', TRUE, FALSE, FALSE, 2, 2),
('2023-01-03', TRUE, FALSE, FALSE, 3, 3),
('2023-01-04', TRUE, FALSE, FALSE, 4, 4),
('2023-01-05', TRUE, FALSE, FALSE, 5, 5);