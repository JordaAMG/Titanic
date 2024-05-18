DROP DATABASE IF EXISTS BASE_USUARIO_PROFESOR;
CREATE DATABASE BASE_USUARIO_PROFESOR;

USE BASE_USUARIO_PROFESOR;

CREATE TABLE PROFESORES(
    Matricula_Profesor INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Contrasenia_Profesor varchar(8),
    Nombre_Profesor varchar(30),
    Correo_Profesor varchar(30)
);

CREATE TABLE ALUMNOS(
    Matricula_Alumno INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Contrasenia_Alumno varchar(8),
    Nombre_Alumno varchar(30),
    Correo_Alumno varchar(30)
);

CREATE TABLE ASISTENCIA(
    id_Asistencia INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Dia date,
    Asistencia BOOLEAN(10),
    Falta BOOLEAN(10),
    Justificante varchar(10),
    FOREIGN KEY (Matricula_Alumno) REFERENCES ALUMNOS(Matricula_Alumno),
    FOREIGN KEY (Matricula_Profesor) REFERENCES PROFESORES(Matricula_Profesor)
);
