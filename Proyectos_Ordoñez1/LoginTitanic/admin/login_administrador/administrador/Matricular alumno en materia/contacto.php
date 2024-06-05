<?php
include("conexion.php");
Class Contacto extends Conexion{

//metodo para consultar alumnos
      public function consultar_alumnos(){
         $this->sentencia = "SELECT * FROM alumnos;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

//metodo para consultar materias
      public function consultar_materias(){
         $this->sentencia = "SELECT * FROM materias;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }
// Método para matricular alumno en una materia
    public function matricular_alumno($matricula_alumno, $id_materia){
        // Verificar si el alumno ya está matriculado en la materia
        $this->sentencia = "SELECT * FROM calificaciones WHERE matricula_alumno = '$matricula_alumno' AND id_materia = '$id_materia';";
        $resultado = $this->obtener_sentencia();

        if ($resultado->num_rows > 0) {
            return "El alumno ya está matriculado en esta materia.";
        } else {
            // Insertar la matrícula en la base de datos
            $this->sentencia = "INSERT INTO calificaciones (matricula_alumno, id_materia) VALUES ('$matricula_alumno', '$id_materia');";
            $result = $this->ejecutar_sentencia();
            if ($result) {
                return "Alumno matriculado correctamente.";
            } else {
                return "Error al matricular al alumno.";
            }
        }
    }

}
?>