<?php

   Class Contacto extends Conexion{

      public function alta($Titulo, $Actores, $Director, $Guion, $Produccion, $Anio, $Nacionalidad, $Duracion, $Genero, $Restricciones, $Sinopsis){
         $this->sentencia = "INSERT INTO Contacto VALUES ('','$Titulo', '$Actores', '$Director', '$Guion', '$Produccion', $Anio,'$Nacionalidad', $Duracion,'$Genero','$Restricciones','$Sinopsis')";
         $bandera = $this->ejecutar_sentencia();
      }

      public function consultar(){
         $this->sentencia = "SELECT * FROM Contacto;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      public function Listar_Alumnos($matricula_profesor){
         $this->sentencia = "SELECT alumnos.nombre_completo 
         FROM alumnos
         INNER JOIN materias ON alumnos.matricula_alumno = materias.matricula_alumno
         INNER JOIN semestre ON alumnos.id_semestre = semestre.id_semestre 
         AND materias.id_semestre = semestre.id_semestre;
         WHERE profesores.matricula_profesor = $matricula_profesor";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      public function consultar_id_maestro(){//funcion para saver que materias imparte el maestro
         $this->sentencia = "SELECT id_materia, nombre FROM materias 
         WHERE matricula_profesor = $matricula_profesor";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      public function cargar($id){
         $this->sentencia = "SELECT * From contacto;";
         $resultado = $this->obtener_sentencia();
         return $resultado;
      }

      public function baja($id){
         $this->sentencia = "DELETE FROM Contacto WHERE id = $id;";
         $this->ejecutar_sentencia();
      }


      

public function modificarAsistencia($fecha, $asistencia, $falta, $justificante, $alumno_id, $materia_id) {
    // Verificar que la sentencia no esté vacía
    if (!empty($this->sentencia)) {

        $conexion = new Conexion();

        // Ejecutar la consulta
        //echo $query;
        $resultado = $conexion->ejecutar_sentencia($this->sentencia);

        
        if ($resultado) {
            return true;
        } else {
            return false; 
        }
    } else {
        return false; 
    }
}




}

     
?>