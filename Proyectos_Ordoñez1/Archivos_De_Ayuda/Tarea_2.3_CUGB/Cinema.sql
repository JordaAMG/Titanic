/*Base de datos para Cinema*/

CREATE DATABASE cinema_cugb;

use cinema_cugb;

CREATE TABLE peliculas(
    id_pelicula INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(30) NOT NULL,
    actores VARCHAR(100) NOT NULL,
    director VARCHAR(50) NOT NULL,
    guion VARCHAR(50) NOT NULL,
    produccion VARCHAR(50),
    anio INT(4) NOT NULL,
    nacionalidad VARCHAR(50),
    duracion VARCHAR(12), 
    genero VARCHAR(30),
    restriccion VARCHAR(30),
    sinopsis VARCHAR(1000)
);