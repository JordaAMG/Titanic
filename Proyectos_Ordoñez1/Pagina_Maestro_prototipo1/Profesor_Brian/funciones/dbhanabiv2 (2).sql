CREATE DATABASE hanabi;

USE hanabi;

CREATE TABLE login(
    correo VARCHAR(50) PRIMARY KEY,
    contraseña VARCHAR(255)  
);

CREATE TABLE semestre(
    id_semestre INT AUTO_INCREMENT PRIMARY KEY,
    semestre VARCHAR(30)
);

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
    FOREIGN KEY (matricula_profesor) REFERENCES profesores(matricula_profesor),
    FOREIGN KEY (id_semestre) REFERENCES semestre(id_semestre),
    FOREIGN KEY (matricula_alumno) REFERENCES alumnos(matricula_alumno)
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

INSERT INTO login (correo, contraseña) VALUES
('maria.gonzalez@ucol.mx', 'J4sE9rT7'),
('javier.perez@ucol.mx', 'B3fR5jW8'),
('diego.martinez@ucol.mx', 'N7sK4pT2'),
('sofia.perez@ucol.mx', 'G8fJ5wE3'),
('david.lopez@ucol.mx', 'H4jR6tY9'),
('elena.hernandez@ucol.mx', 'V2dE9fG6'),
('juan.ramirez@ucol.mx', 'A6gH8jQ3'),
('maria.torres@ucol.mx', 'C5vT9kR2'),
('pedro.sanchez@ucol.mx', 'X3pW6zE7'),
('ana.gonzalez@ucol.mx', 'L9hA2sG5'),
('carlos.martinez@ucol.mx', 'U4rF5yH7'),
('diego.hernandez@ucol.mx', 'Q5jD2kL9'),
('laura.rodriguez@ucol.mx', 'R6wG3eP1'),
('david.perez@ucol.mx', 'T2rY4hA8'),
('maria.garcia@ucol.mx', 'N9yH5tW4'),
('carlos.torres@ucol.mx', 'B7uJ8fR3'),
('ana.martinez@ucol.mx', 'X5zS9qW8'),
('diego.gonzalez@ucol.mx', 'P3lK6yT2'),
('maria.perez@ucol.mx', 'G4jN9hE7'),
('carlos.sanchez@ucol.mx', 'Q7wE5tR9'),
('sofia.torres@ucol.mx', 'Z9xW4nF2');

INSERT INTO alumnos (matricula_alumno, contraseña, nombre_completo, correo, id_semestre)
VALUES
    (20001001, 'L6hG3kW2', 'Ana Martínez García', 'ana.martinez@ucol.mx', 1),
    (20001002, 'T8dN2qA5', 'Carlos Sánchez López', 'carlos.sanchez@ucol.mx', 5),
    (20001003, 'J4sE9rT7', 'María González Rodríguez', 'maria.gonzalez@ucol.mx', 2),
    (20001004, 'B3fR5jW8', 'Javier Pérez Martínez', 'javier.perez@ucol.mx', 2),
    (20001005, 'M9kS2hQ6', 'Laura Rodríguez Díaz', 'laura.rodriguez@ucol.mx', 6),
    (20001006, 'N7sK4pT2', 'Diego Martínez López', 'diego.martinez@ucol.mx', 3),
    (20001007, 'G8fJ5wE3', 'Sofía Pérez García', 'sofia.perez@ucol.mx', 4),
    (20001008, 'H4jR6tY9', 'David López Sánchez', 'david.lopez@ucol.mx', 4),
    (20001009, 'V2dE9fG6', 'Elena Hernández Martínez', 'elena.hernandez@ucol.mx', 5),
    (20001010, 'A6gH8jQ3', 'Juan Ramírez Rodríguez', 'juan.ramirez@ucol.mx', 5),
    (20001011, 'C5vT9kR2', 'María Torres Pérez', 'maria.torres@ucol.mx', 6),
    (20001012, 'X3pW6zE7', 'Pedro Sánchez García', 'pedro.sanchez@ucol.mx', 6),
    (20001013, 'L9hA2sG5', 'Ana González Díaz', 'ana.gonzalez@ucol.mx', 1),
    (20001014, 'U4rF5yH7', 'Carlos Martínez López', 'carlos.martinez@ucol.mx', 2),
    (20001016, 'Q5jD2kL9', 'Diego Hernández Martínez', 'diego.hernandez@ucol.mx', 4),
    (20001018, 'T2rY4hA8', 'David Pérez López', 'david.perez@ucol.mx', 6),
    (20001019, 'N9yH5tW4', 'María García Martínez', 'maria.garcia@ucol.mx', 1),
    (20001020, 'B7uJ8fR3', 'Carlos Torres Rodríguez', 'carlos.torres@ucol.mx', 2),
    (20001022, 'P3lK6yT2', 'Diego González López', 'diego.gonzalez@ucol.mx', 4),
    (20001023, 'G4jN9hE7', 'María Pérez García', 'maria.perez@ucol.mx', 5),
    (20001025, 'Z9xW4nF2', 'Sofía Torres Rodríguez', 'sofia.torres@ucol.mx', 1);

INSERT INTO semestre (id_semestre, semestre) VALUES
(1, 'Primer semestre'),
(2, 'Quinto semestre'),
(3, 'Segundo semestre'),
(4, 'Tercer semestre'),
(5, 'Sexto semestre'),
(6, 'Cuarto semestre');

INSERT INTO materias (nombre, matricula_profesor, id_semestre, matricula_alumno)
VALUES
    ('Matemáticas', 10001, 1, 20001001),
    ('Física', 10002, 2, 20001002),
    ('Química', 10003, 3, 20001003),
    ('Biología', 10004, 4, 20001004),
    ('Historia', 10005, 5, 20001005),
    ('Literatura', 10006, 6, 20001006),
    ('Geografía', 10007, 1, 20001007),
    ('Arte', 10008, 2, 20001008),
    ('Música', 10009, 3, 20001009),
    ('Educación Física', 10010, 4, 20001010),
    ('Informática', 10011, 5, 20001011),
    ('Inglés', 10012, 6, 20001012),
    ('Ciencias Sociales', 10013, 1, 20001013),
    ('Economía', 10014, 2, 20001014),
    ('Filosofía', 10015, 3, 20001016),
    ('Psicología', 10016, 4, 20001018),
    ('Sociología', 10017, 5, 20001019),
    ('Derecho', 10018, 6, 20001020),
    ('Medicina', 10019, 1, 20001022),
    ('Enfermería', 10020, 2, 20001023),
    ('Odontología', 10021, 3, 20001025);