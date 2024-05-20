<?php
   include ("Conexion.php");
   Class Contacto extends conexion{

      public function alta($Titulo, $Actores, $Director, $Guion, $Produccion, $Anio, $Nacionalidad, $Duracion, $Genero, $Restricciones, $Sinopsis){
         $this->sentencia = "INSERT INTO Contacto VALUES ('','$Titulo', '$Actores', '$Director', '$Guion', '$Produccion', $Anio,'$Nacionalidad', $Duracion,'$Genero','$Restricciones','$Sinopsis')";
         $bandera = $this->ejecutar_sentencia();
      }

      public function Alta_Faltas($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta){
         $this->sentencia = "INSERT INTO asistencias VALUES ('',$V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta)";
         $bandera = $this->ejecutar_sentencia();
      }

      public function modificar($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta){
         $this->sentencia = "UPDATE asistencias SET V_Fecha_Fecha='$V_Fecha_Fecha', Asistencia='$Asistencia', Falta_de_Asistencia='$Falta_de_Asistencia', Justificante='$Justificante', Alumno_de_Falta='$Alumno_de_Falta', Materia_de_Falta=$Materia_de_Falta Where id= '$id' ";
         $bandera = $this->ejecutar_sentencia();
      }

      public function consultar(){
         $this->sentencia = "SELECT * FROM Contacto;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      public function consultar_Materias($matricula_profesor){//funcion para saver que materias imparte el maestro
         $this->sentencia = "SELECT materias.nombre, materias.id_materia
         FROM materias 
         INNER JOIN profesores
         ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }


      //Este sirve
      public function consultar_Grupos($matricula_profesor) {
      $this->sentencia = "SELECT nombre_grupo
         FROM grupos 
         INNER JOIN materias 
         ON grupos.id_grupo = materias.id_materia
         INNER JOIN profesores 
         ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor";
         $resultado = $this->obtener_sentencia();
         return $resultado;
      }
      
      //Estamos probando con esta 

      /*public function consultar_Grupos($Materia_Elegida) {
         $this->sentencia = "SELECT semestre.semestre, semestre.id_semestre
         FROM semestre 
         INNER JOIN materias 
         ON semestre.id_semestre = materias.id_semestre
         WHERE materias.nombre = '".$Materia_Elegida."' ";
         $resultado = $this->obtener_sentencia();
         return $resultado;
      }*/


      //esta es la que al finla debe funcionar
      public function Listar_Alumnos($matricula_profesor) {
         $this->sentencia = "SELECT alumnos.nombre_completo 
         FROM alumnos
         INNER JOIN materias ON alumnos.id_semestre = materias.id_semestre
         INNER JOIN profesores ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      //por si falla
      /*public function Listar_Alumnos(){
         $this->sentencia = "SELECT nombre_completo 
         FROM alumnos;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }*/

      public function Listar_Faltas_1(){
         $this->sentencia = "SELECT nombre_completo 
         FROM alumnos;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      public function Listar_Faltas_2(){
         $this->sentencia = "SELECT falta 
         FROM asistencias;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }


      public function Listar_Profesores(){
         $this->sentencia = "SELECT nombre_completo FROM profesores;";
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

   }
?>