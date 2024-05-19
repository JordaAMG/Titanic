<?php 
include_once("conexion.php");

class gestion extends conexion{ //pasa todos los metodos y variables de la clase Conexion a la clase gestion

    //Metodo para dar de alta una pelicula
    public function alta($titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $duracion, $genero, $restriccion, $sinopsis){
        $this->sentencia = "INSERT INTO peliculas(titulo, actores, director, guion, produccion, anio, nacionalidad, duracion, genero, restriccion, sinopsis) VALUES ('$titulo', '$actores', '$director', '$guion', '$produccion', '$anio', '$nacionalidad', '$duracion', '$genero', '$restriccion', '$sinopsis');";
        $bandera = $this->ejectuar_sentencia();
    }
   
    //Metodo para consultar informacion
    public function consultar(){
        $this->sentencia = "SELECT * FROM peliculas;";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    //Metodo para dar de baja una pelicula
    public function baja($id_pelicula){
        $this->sentencia = "DELETE FROM peliculas WHERE id_pelicula = '$id_pelicula';";
        $bandera = $this->ejectuar_sentencia();

    }
    
    //Metodo para modificar una pelicula
    public function modificar($titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $duracion, $genero, $restriccion, $sinopsis){
        $this->sentencia = "UPDATE peliculas SET titulo = '$titulo', actores = '$actores', directo = '$director', guion = '$guion', produccion = '$produccion', anio = '$anio', nacionalidad = '$nacionalidad', duracion = '$duracion', genero = '$genero', restriccion = '$restriccion', sinopsis= '$sinopsis' WHERE id_pelicula= $id"; 
        $resultado= $this->ejectuar_sentencia();
        return $resultado;

     }
     
     //Metodo para cargar información de una pelicula en base a su id
     public function cargar($id){
         $this->sentencia = "SELECT * FROM peliculas WHERE id_pelicula = '$id';";
        $resultado= $this->obtener_sentencia();
        return $resultado;
     }


     public function actualizar($id_pelicula, $titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $duracion, $genero, $restriccion, $sinopsis)
     {
         $this->sentencia = "UPDATE peliculas SET
             titulo = '$titulo',
             actores = '$actores',
             director = '$director',
             guion = '$guion',
             produccion = '$produccion',
             anio = $anio,
             nacionalidad = '$nacionalidad',
             duracion = '$duracion',
             genero = '$genero',
             restriccion = '$restriccion',
             sinopsis = '$sinopsis'
             WHERE id_pelicula = $id_pelicula";
         $this->ejectuar_sentencia();
     }


}

?>