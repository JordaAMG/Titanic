DROP DATABASE IF EXISTS Titanic;
CREATE DATABASE Titanic;

USE Titanic;

-- Crear tabla login
CREATE TABLE login(
    correo VARCHAR(50) PRIMARY KEY,
    contraseña VARCHAR(255)  
);

-- Crear tabla administradores
CREATE TABLE administradores(
    matricula_admin INT PRIMARY KEY,
    contraseña VARCHAR(30),
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    FOREIGN KEY (correo) REFERENCES login(correo)
);

-- Crear tabla profesores
CREATE TABLE profesores(
    matricula_profesor INT PRIMARY KEY,
    contraseña VARCHAR(30),
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    FOREIGN KEY (correo) REFERENCES login(correo)
);

-- Crear tabla materias
CREATE TABLE materias(
    id_materia INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    matricula_profesor INT,
    FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor)
);

-- Crear tabla grupos
CREATE TABLE grupos (
    id_grupo INT AUTO_INCREMENT PRIMARY KEY,
    nombre_grupo VARCHAR(50),
    id_materia INT,
    semestre INT,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

-- Crear tabla alumnos
CREATE TABLE alumnos(
    matricula_alumno INT PRIMARY KEY,
    contraseña VARCHAR(30),
    nombre_completo VARCHAR(100),
    correo VARCHAR(50),
    id_grupo INT,
    FOREIGN KEY (correo) REFERENCES login(correo),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);

-- Crear tabla profesores_grupos
CREATE TABLE profesores_grupos (
    matricula_profesor INT,
    id_grupo INT,
    PRIMARY KEY (matricula_profesor, id_grupo),
    FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor),
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo)
);

-- Crear tabla calificaciones
CREATE TABLE calificaciones(
    id_calificacion_parcial INT AUTO_INCREMENT PRIMARY KEY,
    parcial_uno NUMERIC (2, 1),
    parcial_dos NUMERIC (2, 1),
    parcial_tres NUMERIC (2, 1),
    matricula_alumno INT,
    id_materia INT,
    FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno),
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

-- Crear tabla horarios
CREATE TABLE horarios(
    id_horario INT AUTO_INCREMENT PRIMARY KEY,
    dia VARCHAR(20),
    inicio TIME,
    fin TIME,
    id_materia INT,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

-- Crear tabla asistencias
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

-- Insertar datos en login
INSERT INTO login (correo, contraseña) VALUES 
('admin@example.com', 'adminpass'),
('alumno1@example.com', 'alumpass1'),
('alumno2@example.com', 'alumpass2'),
('alumno3@example.com', 'alumpass3'),
('alumno4@example.com', 'alumpass4'),
('alumno5@example.com', 'alumpass5'),
('alumno6@example.com', 'alumpass6'),
('alumno7@example.com', 'alumpass7'),
('alumno8@example.com', 'alumpass8'),
('alumno9@example.com', 'alumpass9'),
('alumno10@example.com', 'alumpass10'),
('alumno11@example.com', 'alumpass11'),
('alumno12@example.com', 'alumpass12'),
('alumno13@example.com', 'alumpass13'),
('alumno14@example.com', 'alumpass14'),
('alumno15@example.com', 'alumpass15'),
('alumno16@example.com', 'alumpass16'),
('alumno17@example.com', 'alumpass17'),
('alumno18@example.com', 'alumpass18'),
('alumno19@example.com', 'alumpass19'),
('alumno20@example.com', 'alumpass20'),
('alumno21@example.com', 'alumpass21'),
('alumno22@example.com', 'alumpass22'),
('alumno23@example.com', 'alumpass23'),
('alumno24@example.com', 'alumpass24'),
('alumno25@example.com', 'alumpass25'),
('alumno26@example.com', 'alumpass26'),
('alumno27@example.com', 'alumpass27'),
('alumno28@example.com', 'alumpass28'),
('alumno29@example.com', 'alumpass29'),
('alumno30@example.com', 'alumpass30'),
('alumno31@example.com', 'alumpass31'),
('alumno32@example.com', 'alumpass32'),
('alumno33@example.com', 'alumpass33'),
('alumno34@example.com', 'alumpass34'),
('alumno35@example.com', 'alumpass35'),
('profesor1@example.com', 'profpass1'),
('profesor2@example.com', 'profpass2'),
('profesor3@example.com', 'profpass3'),
('profesor4@example.com', 'profpass4'),
('profesor5@example.com', 'profpass5'),
('profesor6@example.com', 'profpass6'),
('profesor7@example.com', 'profpass7'),
('profesor8@example.com', 'profpass8'),
('profesor9@example.com', 'profpass9'),
('profesor10@example.com', 'profpass10'),
('profesor11@example.com', 'profpass11'),
('profesor12@example.com', 'profpass12'),
('profesor13@example.com', 'profpass13'),
('profesor14@example.com', 'profpass14'),
('profesor15@example.com', 'profpass15'),
('profesor16@example.com', 'profpass16'),
('profesor17@example.com', 'profpass17'),
('profesor18@example.com', 'profpass18'),
('profesor19@example.com', 'profpass19'),
('profesor20@example.com', 'profpass20'),
('profesor21@example.com', 'profpass21'),
('profesor22@example.com', 'profpass22'),
('profesor23@example.com', 'profpass23');

-- Insertar datos en administradores
INSERT INTO administradores (matricula_admin, contraseña, nombre_completo, correo) VALUES 
(1, 'adminpass', 'Admin Uno', 'admin@example.com');

-- Insertar datos en profesores
INSERT INTO profesores (matricula_profesor, contraseña, nombre_completo, correo) VALUES 
(1, 'profpass1', 'Profesor Uno', 'profesor1@example.com'),
(2, 'profpass2', 'Profesor Dos', 'profesor2@example.com'),
(3, 'profpass3', 'Profesor Tres', 'profesor3@example.com'),
(4, 'profpass4', 'Profesor Cuatro', 'profesor4@example.com'),
(5, 'profpass5', 'Profesor Cinco', 'profesor5@example.com'),
(6, 'profpass6', 'Profesor Seis', 'profesor6@example.com'),
(7, 'profpass7', 'Profesor Siete', 'profesor7@example.com'),
(8, 'profpass8', 'Profesor Ocho', 'profesor8@example.com'),
(9, 'profpass9', 'Profesor Nueve', 'profesor9@example.com'),
(10, 'profpass10', 'Profesor Diez', 'profesor10@example.com'),
(11, 'profpass11', 'Profesor Once', 'profesor11@example.com'),
(12, 'profpass12', 'Profesor Doce', 'profesor12@example.com'),
(13, 'profpass13', 'Profesor Trece', 'profesor13@example.com'),
(14, 'profpass14', 'Profesor Catorce', 'profesor14@example.com'),
(15, 'profpass15', 'Profesor Quince', 'profesor15@example.com'),
(16, 'profpass16', 'Profesor Dieciséis', 'profesor16@example.com'),
(17, 'profpass17', 'Profesor Diecisiete', 'profesor17@example.com'),
(18, 'profpass18', 'Profesor Dieciocho', 'profesor18@example.com'),
(19, 'profpass19', 'Profesor Diecinueve', 'profesor19@example.com'),
(20, 'profpass20', 'Profesor Veinte', 'profesor20@example.com'),
(21, 'profpass21', 'Profesor Veintiuno', 'profesor21@example.com'),
(22, 'profpass22', 'Profesor Veintidós', 'profesor22@example.com'),
(23, 'profpass23', 'Profesor Veintitrés', 'profesor23@example.com');

-- Insertar datos en materias
INSERT INTO materias (nombre, matricula_profesor) VALUES 
('Matemáticas', 1),
('Ciencias', 2),
('Historia', 3),
('Geografía', 4),
('Lengua', 5),
('Física', 6),
('Química', 7);

-- Insertar datos en grupos
INSERT INTO grupos (nombre_grupo, id_materia, semestre) VALUES 
('Grupo 1', 1, 1),
('Grupo 2', 2, 1),
('Grupo 3', 3, 1),
('Grupo 4', 4, 1),
('Grupo 5', 5, 1),
('Grupo 6', 6, 1),
('Grupo 7', 7, 1);

-- Insertar datos en alumnos
INSERT INTO alumnos (matricula_alumno, contraseña, nombre_completo, correo, id_grupo) VALUES 
(1, 'alumpass1', 'Alumno Uno', 'alumno1@example.com', 1),
(2, 'alumpass2', 'Alumno Dos', 'alumno2@example.com', 1),
(3, 'alumpass3', 'Alumno Tres', 'alumno3@example.com', 1),
(4, 'alumpass4', 'Alumno Cuatro', 'alumno4@example.com', 1),
(5, 'alumpass5', 'Alumno Cinco', 'alumno5@example.com', 1),
(6, 'alumpass6', 'Alumno Seis', 'alumno6@example.com', 2),
(7, 'alumpass7', 'Alumno Siete', 'alumno7@example.com', 2),
(8, 'alumpass8', 'Alumno Ocho', 'alumno8@example.com', 2),
(9, 'alumpass9', 'Alumno Nueve', 'alumno9@example.com', 2),
(10, 'alumpass10', 'Alumno Diez', 'alumno10@example.com', 2),
(11, 'alumpass11', 'Alumno Once', 'alumno11@example.com', 3),
(12, 'alumpass12', 'Alumno Doce', 'alumno12@example.com', 3),
(13, 'alumpass13', 'Alumno Trece', 'alumno13@example.com', 3),
(14, 'alumpass14', 'Alumno Catorce', 'alumno14@example.com', 3),
(15, 'alumpass15', 'Alumno Quince', 'alumno15@example.com', 3),
(16, 'alumpass16', 'Alumno Dieciséis', 'alumno16@example.com', 4),
(17, 'alumpass17', 'Alumno Diecisiete', 'alumno17@example.com', 4),
(18, 'alumpass18', 'Alumno Dieciocho', 'alumno18@example.com', 4),
(19, 'alumpass19', 'Alumno Diecinueve', 'alumno19@example.com', 4),
(20, 'alumpass20', 'Alumno Veinte', 'alumno20@example.com', 4),
(21, 'alumpass21', 'Alumno Veintiuno', 'alumno21@example.com', 5),
(22, 'alumpass22', 'Alumno Veintidós', 'alumno22@example.com', 5),
(23, 'alumpass23', 'Alumno Veintitrés', 'alumno23@example.com', 5),
(24, 'alumpass24', 'Alumno Veinticuatro', 'alumno24@example.com', 5),
(25, 'alumpass25', 'Alumno Veinticinco', 'alumno25@example.com', 5),
(26, 'alumpass26', 'Alumno Veintiséis', 'alumno26@example.com', 6),
(27, 'alumpass27', 'Alumno Veintisiete', 'alumno27@example.com', 6),
(28, 'alumpass28', 'Alumno Veintiocho', 'alumno28@example.com', 6),
(29, 'alumpass29', 'Alumno Veintinueve', 'alumno29@example.com', 6),
(30, 'alumpass30', 'Alumno Treinta', 'alumno30@example.com', 6),
(31, 'alumpass31', 'Alumno Treinta y uno', 'alumno31@example.com', 7),
(32, 'alumpass32', 'Alumno Treinta y dos', 'alumno32@example.com', 7),
(33, 'alumpass33', 'Alumno Treinta y tres', 'alumno33@example.com', 7),
(34, 'alumpass34', 'Alumno Treinta y cuatro', 'alumno34@example.com', 7),
(35, 'alumpass35', 'Alumno Treinta y cinco', 'alumno35@example.com', 7);

-- Insertar datos en profesores_grupos
INSERT INTO profesores_grupos (matricula_profesor, id_grupo) VALUES 
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- Insertar datos en calificaciones
INSERT INTO calificaciones (parcial_uno, parcial_dos, parcial_tres, matricula_alumno, id_materia) VALUES 
(8.5, 7.5, 9.0, 1, 1),
(7.5, 6.5, 8.0, 2, 1),
(9.0, 8.0, 9.5, 3, 1),
(6.5, 5.5, 7.0, 4, 1),
(7.0, 6.0, 8.5, 5, 1),
(8.0, 7.0, 9.0, 6, 2),
(9.5, 8.5, 10.0, 7, 2),
(6.0, 5.0, 7.0, 8, 2),
(7.5, 6.5, 8.0, 9, 2),
(8.5, 7.5, 9.0, 10, 2),
(9.0, 8.0, 9.5, 11, 3),
(6.5, 5.5, 7.0, 12, 3),
(7.0, 6.0, 8.5, 13, 3),
(8.0, 7.0, 9.0, 14, 3),
(9.5, 8.5, 10.0, 15, 3),
(6.0, 5.0, 7.0, 16, 4),
(7.5, 6.5, 8.0, 17, 4),
(8.5, 7.5, 9.0, 18, 4),
(9.0, 8.0, 9.5, 19, 4),
(6.5, 5.5, 7.0, 20, 4),
(7.0, 6.0, 8.5, 21, 5),
(8.0, 7.0, 9.0, 22, 5),
(9.5, 8.5, 10.0, 23, 5),
(6.0, 5.0, 7.0, 24, 5),
(7.5, 6.5, 8.0, 25, 5),
(8.5, 7.5, 9.0, 26, 6),
(9.0, 8.0, 9.5, 27, 6),
(6.5, 5.5, 7.0, 28, 6),
(7.0, 6.0, 8.5, 29, 6),
(8.0, 7.0, 9.0, 30, 6),
(9.5, 8.5, 10.0, 31, 7),
(6.0, 5.0, 7.0, 32, 7),
(7.5, 6.5, 8.0, 33, 7),
(8.5, 7.5, 9.0, 34, 7),
(9.0, 8.0, 9.5, 35, 7);

-- Insertar datos en horarios
INSERT INTO horarios (dia, inicio, fin, id_materia) VALUES 
('Lunes', '08:00:00', '09:00:00', 1),
('Martes', '09:00:00', '10:00:00', 2),
('Miércoles', '10:00:00', '11:00:00', 3),
('Jueves', '11:00:00', '12:00:00', 4),
('Viernes', '12:00:00', '13:00:00', 5),
('Lunes', '13:00:00', '14:00:00', 6),
('Martes', '14:00:00', '15:00:00', 7);

-- Insertar datos en asistencias
INSERT INTO asistencias (fecha, asistencia, falta, justificante, matricula_alumno, id_materia) VALUES 
('2024-01-01', TRUE, FALSE, FALSE, 1, 1),
('2024-01-02', FALSE, TRUE, TRUE, 2, 1),
('2024-01-03', TRUE, FALSE, FALSE, 3, 1),
('2024-01-04', FALSE, TRUE, FALSE, 4, 1),
('2024-01-05', TRUE, FALSE, FALSE, 5, 1),
('2024-01-06', TRUE, FALSE, FALSE, 6, 2),
('2024-01-07', FALSE, TRUE, TRUE, 7, 2),
('2024-01-08', TRUE, FALSE, FALSE, 8, 2),
('2024-01-09', FALSE, TRUE, FALSE, 9, 2),
('2024-01-10', TRUE, FALSE, FALSE, 10, 2),
('2024-01-11', TRUE, FALSE, FALSE, 11, 3),
('2024-01-12', FALSE, TRUE, TRUE, 12, 3),
('2024-01-13', TRUE, FALSE, FALSE, 13, 3),
('2024-01-14', FALSE, TRUE, FALSE, 14, 3),
('2024-01-15', TRUE, FALSE, FALSE, 15, 3),
('2024-01-16', TRUE, FALSE, FALSE, 16, 4),
('2024-01-17', FALSE, TRUE, TRUE, 17, 4),
('2024-01-18', TRUE, FALSE, FALSE, 18, 4),
('2024-01-19', FALSE, TRUE, FALSE, 19, 4),
('2024-01-20', TRUE, FALSE, FALSE, 20, 4),
('2024-01-21', TRUE, FALSE, FALSE, 21, 5),
('2024-01-22', FALSE, TRUE, TRUE, 22, 5),
('2024-01-23', TRUE, FALSE, FALSE, 23, 5),
('2024-01-24', FALSE, TRUE, FALSE, 24, 5),
('2024-01-25', TRUE, FALSE, FALSE, 25, 5),
('2024-01-26', TRUE, FALSE, FALSE, 26, 6),
('2024-01-27', FALSE, TRUE, TRUE, 27, 6),
('2024-01-28', TRUE, FALSE, FALSE, 28, 6),
('2024-01-29', FALSE, TRUE, FALSE, 29, 6),
('2024-01-30', TRUE, FALSE, FALSE, 30, 6),
('2024-01-31', TRUE, FALSE, FALSE, 31, 7),
('2024-02-01', FALSE, TRUE, TRUE, 32, 7),
('2024-02-02', TRUE, FALSE, FALSE, 33, 7),
('2024-02-03', FALSE, TRUE, FALSE, 34, 7),
('2024-02-04', TRUE, FALSE, FALSE, 35, 7);