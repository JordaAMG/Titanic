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

      public function consultar_Grupos($matricula_profesor, $Materia_Elegida) {
         $this->sentencia = "SELECT grupos.nombre_grupo 
         FROM grupos 
         WHERE grupos.matricula_profesor = $matricula_profesor 
         AND grupos.id_materia = $Materia_Elegida";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      //Este sirve(agregar semestre)
      /*public function consultar_Grupos($matricula_profesor, $Materia_Elegida) {
      $this->sentencia = "SELECT nombre_grupo
         FROM grupos 
         INNER JOIN materias 
         ON grupos.id_materia = materias.id_materia
         INNER JOIN profesores 
         ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor
         AND materias.id_materia = '$Materia_Elegida'";
         $resultado = $this->obtener_sentencia();
         return $resultado;
      }*/

      //esta es la que al finla debe funcionar
      /*public function Listar_Alumnos($matricula_profesor) {
         $this->sentencia = "SELECT alumnos.nombre_completo 
         FROM alumnos
         INNER JOIN grupos 
         ON alumnos.matricula_alumno = grupos.matricula_alumno
         INNER JOIN materias 
         ON materias.id_materia = grupos.id_materia
         INNER JOIN profesores 
         ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }*/

      public function Listar_Alumnos($matricula_profesor, $Materia_Elegida, $Grupo_Elegido) {
         $this->sentencia = "SELECT alumnos.nombre_completo 
         FROM alumnos 
         INNER JOIN grupos 
         ON alumnos.matricula_alumno = grupos.matricula_alumno 
         INNER JOIN materias 
         ON grupos.id_materia = materias.id_materia 
         WHERE grupos.matricula_profesor = $matricula_profesor 
         AND grupos.id_materia = $Materia_Elegida 
         AND grupos.id_grupo = $Grupo_Elegido";
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