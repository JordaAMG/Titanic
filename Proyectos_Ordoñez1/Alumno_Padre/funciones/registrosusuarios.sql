--Registros Profesores
INSERT INTO login (correo, contraseña)
VALUES
    ('juan.garcia@ucol.mx','R3tXf7qS'),
    ('maria.rodriguez@ucol.mx','pZ6dY8aC'),
    ('pedro.martinez@ucol.mx','gF9uQ4vT'),
    ('ana.lopez@ucol.mx','bA5xZ1eR'),
    ('jose.perez@ucol.mx','sN3mD8hW'),
    ('laura.sanchez@ucol.mx','cJ7kU5pX'),
    ('carlos.gomez@ucol.mx','rE2vN9yQ'),
    ('sofia.diaz@ucol.mx','fW4qK8sE'),
    ('luisa.ruiz@ucol.mx','uV6tF3zA'),
    ('javier.hernandez@ucol.mx','hT7wY9jR'),
    ('elena.gonzalez@ucol.mx','mC5bD2pQ'),
    ('miguel.fernandez@ucol.mx','aF3rH6tW'),
    ('carmen.lopez@ucol.mx','dG8kT5zR'),
    ('francisco.martin@ucol.mx','oL2fJ4qE'),
    ('paula.jimenez@ucol.mx','jK9zS7xT'),
    ('david.torres@ucol.mx','eP4rW1yU'),
    ('isabel.ramirez@ucol.mx','iR6sX9wY'),
    ('diego.garcia@ucol.mx','tQ8yZ5vU'),
    ('beatriz.perez@ucol.mx','lM2xN7zP'),
    ('lucia.martinez@ucol.mx','wH5nT3kU'),
    ('antonio.sanchez@ucol.mx','pX6bJ9hR'),
    ('natalia.diaz@ucol.mx','rZ9gE1dW'),
    ('marcos.ruiz@ucol.mx','aU7yF4qJ'),
    ('adriana.gomez@ucol.mx','bV3eK6jT'),
    ('ruben.hernandez@ucol.mx','cW2kV5hF');

    INSERT INTO profesores (matricula_profesor, contraseña, nombre_completo, correo)
VALUES
    (1001, 'R3tXf7qS', 'Juan García Pérez', 'juan.garcia@ucol.mx'),
    (1002, 'pZ6dY8aC', 'María Rodríguez López', 'maria.rodriguez@ucol.mx'),
    (1003, 'gF9uQ4vT', 'Pedro Martínez Ruiz', 'pedro.martinez@ucol.mx'),
    (1004, 'bA5xZ1eR', 'Ana López García', 'ana.lopez@ucol.mx'),
    (1005, 'sN3mD8hW', 'José Pérez Martínez', 'jose.perez@ucol.mx'),
    (1006, 'cJ7kU5pX', 'Laura Sánchez Fernández', 'laura.sanchez@ucol.mx'),
    (1007, 'rE2vN9yQ', 'Carlos Gómez Rodríguez', 'carlos.gomez@ucol.mx'),
    (1008, 'fW4qK8sE', 'Sofía Díaz Pérez', 'sofia.diaz@ucol.mx'),
    (1009, 'uV6tF3zA', 'Luisa Ruiz Martínez', 'luisa.ruiz@ucol.mx'),
    (1010, 'hT7wY9jR', 'Javier Hernández García', 'javier.hernandez@ucol.mx'),
    (1011, 'mC5bD2pQ', 'Elena González López', 'elena.gonzalez@ucol.mx'),
    (1012, 'aF3rH6tW', 'Miguel Fernández Rodríguez', 'miguel.fernandez@ucol.mx'),
    (1013, 'dG8kT5zR', 'Carmen López Sánchez', 'carmen.lopez@ucol.mx'),
    (1014, 'oL2fJ4qE', 'Francisco Martín Pérez', 'francisco.martin@ucol.mx'),
    (1015, 'jK9zS7xT', 'Paula Jiménez Martínez', 'paula.jimenez@ucol.mx'),
    (1016, 'eP4rW1yU', 'David Torres González', 'david.torres@ucol.mx'),
    (1017, 'iR6sX9wY', 'Isabel Ramírez Ruiz', 'isabel.ramirez@ucol.mx'),
    (1018, 'tQ8yZ5vU', 'Diego García López', 'diego.garcia@ucol.mx'),
    (1019, 'lM2xN7zP', 'Beatriz Pérez Martín', 'beatriz.perez@ucol.mx'),
    (1020, 'wH5nT3kU', 'Lucía Martínez Sánchez', 'lucia.martinez@ucol.mx'),
    (1021, 'pX6bJ9hR', 'Antonio Sánchez Pérez', 'antonio.sanchez@ucol.mx'),
    (1022, 'rZ9gE1dW', 'Natalia Díaz Martínez', 'natalia.diaz@ucol.mx'),
    (1023, 'aU7yF4qJ', 'Marcos Ruiz García', 'marcos.ruiz@ucol.mx'),
    (1024, 'bV3eK6jT', 'Adriana Gómez López', 'adriana.gomez@ucol.mx'),
    (1025, 'cW2kV5hF', 'Rubén Hernández Rodríguez', 'ruben.hernandez@ucol.mx');

--Registros Alumnos

    INSERT INTO alumnos (correo, contraseña)
VALUES
    ('ana.martinez@ucol.mx','L6hG3kW2'),
    ('carlos.sanchez@ucol.mx','T8dN2qA5'),
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
    (20001015, 'M8bN7vE4', 'Sofía Pérez Rodríguez', 'sofia.perez@ucol.mx', 3),
    (20001016, 'Q5jD2kL9', 'Diego Hernández Martínez', 'diego.hernandez@ucol.mx', 4),
    (20001017, 'R6wG3eP1', 'Laura Rodríguez García', 'laura.rodriguez@ucol.mx', 1),
    (20001018, 'T2rY4hA8', 'David Pérez López', 'david.perez@ucol.mx', 6),
    (20001019, 'N9yH5tW4', 'María García Martínez', 'maria.garcia@ucol.mx', 1),
    (20001020, 'B7uJ8fR3', 'Carlos Torres Rodríguez', 'carlos.torres@ucol.mx', 2),
    (20001021, 'X5zS9qW8', 'Ana Martínez Pérez', 'ana.martinez@ucol.mx', 3),
    (20001022, 'P3lK6yT2', 'Diego González López', 'diego.gonzalez@ucol.mx', 4),
    (20001023, 'G4jN9hE7', 'María Pérez García', 'maria.perez@ucol.mx', 5),
    (20001024, 'Q7wE5tR9', 'Carlos Sánchez Martínez', 'carlos.sanchez@ucol.mx', 6),
    (20001025, 'Z9xW4nF2', 'Sofía Torres Rodríguez', 'sofia.torres@ucol.mx', 1);

    INSERT INTO semestre (id_semestre, semestre) VALUES
    (1, 'Primer semestre'),
    (2, 'Quinto semestre'),
    (3, 'Segundo semestre'),
    (4, 'Tercer semestre'),
    (5, 'Sexto semestre'),
    (6, 'Cuarto semestre');


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
    (20001015, 'M8bN7vE4', 'Sofía Pérez Rodríguez', 'sofia.perez@ucol.mx', 3),
    (20001016, 'Q5jD2kL9', 'Diego Hernández Martínez', 'diego.hernandez@ucol.mx', 4),
    (20001017, 'R6wG3eP1', 'Laura Rodríguez García', 'laura.rodriguez@ucol.mx', 1),
    (20001018, 'T2rY4hA8', 'David Pérez López', 'david.perez@ucol.mx', 6),
    (20001019, 'N9yH5tW4', 'María García Martínez', 'maria.garcia@ucol.mx', 1),
    (20001020, 'B7uJ8fR3', 'Carlos Torres Rodríguez', 'carlos.torres@ucol.mx', 2),
    (20001021, 'X5zS9qW8', 'Ana Martínez Pérez', 'ana.martinez@ucol.mx', 3),
    (20001022, 'P3lK6yT2', 'Diego González López', 'diego.gonzalez@ucol.mx', 4),
    (20001023, 'G4jN9hE7', 'María Pérez García', 'maria.perez@ucol.mx', 5),
    (20001024, 'Q7wE5tR9', 'Carlos Sánchez Martínez', 'carlos.sanchez@ucol.mx', 6),
    (20001025, 'Z9xW4nF2', 'Sofía Torres Rodríguez', 'sofia.torres@ucol.mx', 1);

--Administrador

    INSERT INTO administradores (matricula_admin, contraseña, nombre_completo, correo)
VALUES
    ('dzamora11@ucol.mx','diegopapa123');

    INSERT INTO administradores (matricula_admin, contraseña, nombre_completo, correo)
VALUES
    (6969, 'diegopapa123', 'Diego Zamora', 'dzamora11@ucol.mx');



--Insertar materias

INSERT INTO materias (nombre, matricula_profesor, id_semestre) VALUES
('Matemáticas I', 1001, 1),--1
('Física I', 1002, 1),--2
('Programación I', 1003, 1),--3
('Inglés I', 1004, 1),--4
('Probabilidad y Estadística I', 1005, 1),--5
('Redes de Computadoras I', 1006, 1),--6
('Mecánica Clásica I', 1007, 1),--7

('Matemáticas 2', 1001, 2),--8
('Física 2', 1002, 2),--9
('Programación 2', 1003,2),--10
('Inglés 2', 1004, 2),--11
('Probabilidad y Estadística 2',1005, 2),--12
('Redes de Computadoras 2', 1006, 2),--13
('Mecánica Clásica 2', 1007, 2),--14

('Matemáticas 3', 1001,3),--15
('Física 3', 1002, 3),--16
('Programación 3', 1003,3),--17
('Inglés 3', 1004,3),--18
('Probabilidad y Estadística 3',1005, 3),--19
('Redes de Computadoras 3', 1006, 3),--20
('Mecánica Clásica 3', 1007, 3),--21

('Matemáticas 4', 1001, 4),--22
('Física 4', 1002, 4),--23
('Programación 4', 1003, 4),--24
('Inglés 4', 1004, 4),--25
('Probabilidad y Estadística 4',1005, 4),--26
('Redes de Computadoras 4', 1006, 4),--27
('Mecánica Clásica 4', 1007, 4),--28

('Matemáticas 5', 1001, 5),--29
('Física 5', 1002, 5),--30
('Programación 5', 1003,5),--31
('Inglés 5', 1004, 5),--32
('Probabilidad y Estadística 5',1005, 5),--33
('Redes de Computadoras 5', 1006, 5),--34
('Mecánica Clásica 5', 1007, 5),--35

('Matemáticas 6', 1001, 6),--36
('Física 6', 1002, 6),--37
('Programación 6', 1003,6),--38
('Inglés 6', 1004, 6),--39
('Probabilidad y Estadística 6',1005, 6),--40
('Redes de Computadoras 6', 1006, 6),--41
('Mecánica Clásica 6', 1007, 6);--42

--Insertar horarios

INSERT INTO horarios (id_materia, dia, inicio, fin)
VALUES
-- Lunes
(1, 'Lunes', '13:00', '14:30'), -- Matemáticas I
(5, 'Lunes', '14:45', '16:15'), -- Probabilidad y Estadística I
(6, 'Lunes', '16:30', '18:00'), -- Redes de Computadoras I
(1, 'Lunes', '18:15', '19:45'), -- Matemáticas I r
(5, 'Lunes', '20:00', '21:30'), -- Probabilidad y Estadística I r

-- Martes
(2, 'Martes', '13:00', '14:30'), -- Física I
(3, 'Martes', '14:45', '16:15'), -- Programación I
(4, 'Martes', '16:30', '18:00'), -- Inglés I
(2, 'Martes', '18:15', '19:45'), -- Física I r
(3, 'Martes', '20:00', '21:30'), -- Programación I r

-- Miércoles
(6, 'Miércoles', '13:00', '14:30'), -- Redes de Computadoras I
(1, 'Miércoles', '14:45', '16:15'), -- Matemáticas I
(7, 'Miércoles', '16:30', '18:00'), -- Mecánica Clásica I
(6, 'Miércoles', '18:15', '19:45'), -- Redes de Computadoras I r
(1, 'Miércoles', '20:00', '21:30'), -- Matemáticas I r

-- Jueves
(2, 'Jueves', '13:00', '14:30'), -- Física I
(3, 'Jueves', '14:45', '16:15'), -- Programación I
(4, 'Jueves', '16:30', '18:00'), -- Inglés I
(2, 'Jueves', '18:15', '19:45'), -- Física I r
(3, 'Jueves', '20:00', '21:30'), -- Programación I r

-- Viernes
(1, 'Viernes', '13:00', '14:30'), -- Matemáticas I
(5, 'Viernes', '14:45', '16:15'), -- Probabilidad y Estadística I
(6, 'Viernes', '16:30', '18:00'), -- Redes de Computadoras I
(1, 'Viernes', '18:15', '19:45'), -- Matemáticas I r
(5, 'Viernes', '20:00', '21:30'); -- Probabilidad y Estadística I r


--semestre 2


-- Lunes
(8, 'Lunes', '13:00', '14:30'), -- Matemáticas 2
(12, 'Lunes', '14:45', '16:15'), -- Probabilidad y Estadística 2
(13, 'Lunes', '16:30', '18:00'), -- Redes de Computadoras 2
(8, 'Lunes', '18:15', '19:45'), -- Matemáticas 2 r
(12, 'Lunes', '20:00', '21:30'), -- Probabilidad y Estadística 2 r

-- Martes
(9, 'Martes', '13:00', '14:30'), -- Física 2
(10, 'Martes', '14:45', '16:15'), -- Programación 2
(11, 'Martes', '16:30', '18:00'), -- Inglés 2
(9, 'Martes', '18:15', '19:45'), -- Física 2 r
(10, 'Martes', '20:00', '21:30'), -- Programación 2 r

-- Miércoles
(13, 'Miércoles', '13:00', '14:30'), -- Redes de Computadoras 2
(8, 'Miércoles', '14:45', '16:15'), -- Matemáticas 2
(14, 'Miércoles', '16:30', '18:00'), -- Mecánica Clásica 2
(13, 'Miércoles', '18:15', '19:45'), -- Redes de Computadoras 2 r
(8, 'Miércoles', '20:00', '21:30'), -- Matemáticas 2 r

-- Jueves
(9, 'Jueves', '13:00', '14:30'), -- Física 2
(10, 'Jueves', '14:45', '16:15'), -- Programación 2
(11, 'Jueves', '16:30', '18:00'), -- Inglés 2
(9, 'Jueves', '18:15', '19:45'), -- Física 2 r
(10, 'Jueves', '20:00', '21:30'), -- Programación 2 r

-- Viernes
(8, 'Viernes', '13:00', '14:30'), -- Matemáticas 2
(12, 'Viernes', '14:45', '16:15'), -- Probabilidad y Estadística 2
(13, 'Viernes', '16:30', '18:00'), -- Redes de Computadoras 2
(8, 'Viernes', '18:15', '19:45'), -- Matemáticas 2 r
(12, 'Viernes', '20:00', '21:30'), -- Probabilidad y Estadística 2 r


--semestre 3

-- Lunes
(15, 'Lunes', '13:00', '14:30'), -- Matemáticas 3
(19, 'Lunes', '14:45', '16:15'), -- Probabilidad y Estadística 3
(20, 'Lunes', '16:30', '18:00'), -- Redes de Computadoras 3
(15, 'Lunes', '18:15', '19:45'), -- Matemáticas 3 r
(19, 'Lunes', '20:00', '21:30'), -- Probabilidad y Estadística 3 r

-- Martes
(16, 'Martes', '13:00', '14:30'), -- Física 3
(17, 'Martes', '14:45', '16:15'), -- Programación 3
(18, 'Martes', '16:30', '18:00'), -- Inglés 3
(16, 'Martes', '18:15', '19:45'), -- Física 3 r
(17, 'Martes', '20:00', '21:30'), -- Programación 3 r

-- Miércoles
(20, 'Miércoles', '13:00', '14:30'), -- Redes de Computadoras 3
(15, 'Miércoles', '14:45', '16:15'), -- Matemáticas 3
(21, 'Miércoles', '16:30', '18:00'), -- Mecánica Clásica 3
(20, 'Miércoles', '18:15', '19:45'), -- Redes de Computadoras 3 r
(15, 'Miércoles', '20:00', '21:30'), -- Matemáticas 3 r

-- Jueves
(16, 'Jueves', '13:00', '14:30'), -- Física 3
(17, 'Jueves', '14:45', '16:15'), -- Programación 3
(18, 'Jueves', '16:30', '18:00'), -- Inglés 3
(16, 'Jueves', '18:15', '19:45'), -- Física 3 r
(17, 'Jueves', '20:00', '21:30'), -- Programación 3 r

-- Viernes
(15, 'Viernes', '13:00', '14:30'), -- Matemáticas 3
(19, 'Viernes', '14:45', '16:15'), -- Probabilidad y Estadística 3
(20, 'Viernes', '16:30', '18:00'), -- Redes de Computadoras 3
(15, 'Viernes', '18:15', '19:45'), -- Matemáticas 3 (Repetición)
(19, 'Viernes', '20:00', '21:30'), -- Probabilidad y Estadística 3 (Repetición)


--semestre 4


-- Lunes
(22, 'Lunes', '13:00', '14:30'), -- Matemáticas 4
(26, 'Lunes', '14:45', '16:15'), -- Probabilidad y Estadística 4
(27, 'Lunes', '16:30', '18:00'), -- Redes de Computadoras 4
(22, 'Lunes', '18:15', '19:45'), -- Matemáticas 4 r
(26, 'Lunes', '20:00', '21:30'), -- Probabilidad y Estadística 4 r

-- Martes
(23, 'Martes', '13:00', '14:30'), -- Física 4
(24, 'Martes', '14:45', '16:15'), -- Programación 4
(25, 'Martes', '16:30', '18:00'), -- Inglés 4
(23, 'Martes', '18:15', '19:45'), -- Física 4 r
(24, 'Martes', '20:00', '21:30'), -- Programación 4 r

-- Miércoles
(27, 'Miércoles', '13:00', '14:30'), -- Redes de Computadoras 4
(22, 'Miércoles', '14:45', '16:15'), -- Matemáticas 4
(28, 'Miércoles', '16:30', '18:00'), -- Mecánica Clásica 4
(27, 'Miércoles', '18:15', '19:45'), -- Redes de Computadoras 4 r
(22, 'Miércoles', '20:00', '21:30'), -- Matemáticas 4 r

-- Jueves
(23, 'Jueves', '13:00', '14:30'), -- Física 4
(24, 'Jueves', '14:45', '16:15'), -- Programación 4
(25, 'Jueves', '16:30', '18:00'), -- Inglés 4
(23, 'Jueves', '18:15', '19:45'), -- Física 4 r
(24, 'Jueves', '20:00', '21:30'), -- Programación 4 r

-- Viernes
(22, 'Viernes', '13:00', '14:30'), -- Matemáticas 4
(26, 'Viernes', '14:45', '16:15'), -- Probabilidad y Estadística 4
(27, 'Viernes', '16:30', '18:00'), -- Redes de Computadoras 4
(22, 'Viernes', '18:15', '19:45'), -- Matemáticas 4 r
(26, 'Viernes', '20:00', '21:30'), -- Probabilidad y Estadística 4 r


--semestre 5


-- Lunes
(29, 'Lunes', '13:00', '14:30'), -- Matemáticas 5
(33, 'Lunes', '14:45', '16:15'), -- Probabilidad y Estadística 5
(34, 'Lunes', '16:30', '18:00'), -- Redes de Computadoras 5
(29, 'Lunes', '18:15', '19:45'), -- Matemáticas 5 r
(33, 'Lunes', '20:00', '21:30'), -- Probabilidad y Estadística 5 r

-- Martes
(30, 'Martes', '13:00', '14:30'), -- Física 5
(31, 'Martes', '14:45', '16:15'), -- Programación 5
(32, 'Martes', '16:30', '18:00'), -- Inglés 5
(30, 'Martes', '18:15', '19:45'), -- Física 5 r
(31, 'Martes', '20:00', '21:30'), -- Programación 5 r

-- Miércoles
(34, 'Miércoles', '13:00', '14:30'), -- Redes de Computadoras 5
(29, 'Miércoles', '14:45', '16:15'), -- Matemáticas 5
(35, 'Miércoles', '16:30', '18:00'), -- Mecánica Clásica 5
(34, 'Miércoles', '18:15', '19:45'), -- Redes de Computadoras 5 r
(29, 'Miércoles', '20:00', '21:30'), -- Matemáticas 5 r

-- Jueves
(30, 'Jueves', '13:00', '14:30'), -- Física 5
(31, 'Jueves', '14:45', '16:15'), -- Programación 5
(32, 'Jueves', '16:30', '18:00'), -- Inglés 5
(30, 'Jueves', '18:15', '19:45'), -- Física 5 r
(31, 'Jueves', '20:00', '21:30'), -- Programación 5 r
-- Viernes
(29, 'Viernes', '13:00', '14:30'), -- Matemáticas 5
(33, 'Viernes', '14:45', '16:15'), -- Probabilidad y Estadística 5
(34, 'Viernes', '16:30', '18:00'), -- Redes de Computadoras 5
(29, 'Viernes', '18:15', '19:45'), -- Matemáticas 5 r
(33, 'Viernes', '20:00', '21:30'); -- Probabilidad y Estadística 5 r


--semestre 6

-- Lunes
(36, 'Lunes', '13:00', '14:30'), -- Matemáticas 6
(40, 'Lunes', '14:45', '16:15'), -- Probabilidad y Estadística 6
(41, 'Lunes', '16:30', '18:00'), -- Redes de Computadoras 6
(36, 'Lunes', '18:15', '19:45'), -- Matemáticas 5 r
(40, 'Lunes', '20:00', '21:30'), -- Probabilidad y Estadística 6r

-- Martes
(37, 'Martes', '13:00', '14:30'), -- Física 6
(38, 'Martes', '14:45', '16:15'), -- Programación 6
(39, 'Martes', '16:30', '18:00'), -- Inglés 6
(37, 'Martes', '18:15', '19:45'), -- Física 6 r
(38, 'Martes', '20:00', '21:30'), -- Programación 6 r

-- Miércoles
(41, 'Miércoles', '13:00', '14:30'), -- Redes de Computadoras 6
(36, 'Miércoles', '14:45', '16:15'), -- Matemáticas 6
(42, 'Miércoles', '16:30', '18:00'), -- Mecánica Clásica 6
(41, 'Miércoles', '18:15', '19:45'), -- Redes de Computadoras 6 r
(36, 'Miércoles', '20:00', '21:30'), -- Matemáticas 6 r

-- Jueves
(37, 'Jueves', '13:00', '14:30'), -- Física 6
(38, 'Jueves', '14:45', '16:15'), -- Programación6
(39, 'Jueves', '16:30', '18:00'), -- Inglés 6
(37, 'Jueves', '18:15', '19:45'), -- Física 6 r
(38, 'Jueves', '20:00', '21:30'), -- Programación 6 r
-- Viernes
(36, 'Viernes', '13:00', '14:30'), -- Matemáticas 6
(40, 'Viernes', '14:45', '16:15'), -- Probabilidad y Estadística 6
(41, 'Viernes', '16:30', '18:00'), -- Redes de Computadoras 6
(36, 'Viernes', '18:15', '19:45'), -- Matemáticas 6 r
(40, 'Viernes', '20:00', '21:30'); -- Probabilidad y Estadística 6 r


