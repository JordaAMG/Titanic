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

      public function modificar($Titulo,$Actores,$Director,$Guion,$Produccion,$Anio,$Nacionalidad,$Duracion,$Genero,$Restricciones,$Sinopsis,$id){
         $this->sentencia = "UPDATE contacto SET Titulo='$Titulo', Actores='$Actores', Director='$Director', Guion='$Guion', Produccion='$Produccion', Anio='$Anio',Nacionalidad='$Nacionalidad', Duracion='$Duracion',Genero='$Genero',Restricciones='$Restricciones',Sinopsis='$Sinopsis' Where id= '$id' ";
         $bandera = $this->ejecutar_sentencia();
         return $bandera;
      }

      public function Modificar_Faltas($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta){
         $this->sentencia = "UPDATE asistencias SET V_Fecha_Fecha='$V_Fecha_Fecha', Asistencia='$Asistencia', Falta_de_Asistencia='$Falta_de_Asistencia', Justificante='$Justificante', Alumno_de_Falta='$Alumno_de_Falta', Materia_de_Falta=$Materia_de_Falta Where id= '$id' ";
         $bandera = $this->ejecutar_sentencia();
      }

      public function Consultar_Calificaciones($matricula_alumno){
         $this->sentencia = "SELECT calificaciones.id_calificacion_parcial, calificaciones.parcial_uno, calificaciones.parcial_dos, calificaciones.parcial_tres  
         FROM calificaciones
         INNER JOIN alumnos
         ON calificaciones.matricula_alumno = alumnos.matricula_alumno
         WHERE alumnos.matricula_alumno = $matricula_alumno";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      public function Modificar_Calificaciones($parcial_uno, $parcial_dos, $parcial_tres, $id_calificacion_parcial, $matricula_alumno, $Materia_Elegida){
         $this->sentencia = "UPDATE calificaciones SET parcial_uno='$parcial_uno', parcial_dos='$parcial_dos', parcial_tres='$parcial_tres'
         Where id_calificacion_parcial= '$id_calificacion_parcial' 
         AND matricula_alumno = $matricula_alumno
         AND id_materia = $Materia_Elegida";
      }

      public function consultar(){
         $this->sentencia = "SELECT * FROM Contacto;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      //Este sirve(agregar semestre)
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
         $this->sentencia = "SELECT grupos.nombre_grupo, grupos.id_grupo 
         FROM grupos 
         WHERE grupos.matricula_profesor = $matricula_profesor 
         AND grupos.id_materia = $Materia_Elegida";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      public function Listar_Alumnos($Grupo_Elegido) {
         $this->sentencia = "SELECT alumnos.matricula_alumno, alumnos.nombre_completo 
         FROM alumnos 
         INNER JOIN grupos 
         ON alumnos.matricula_alumno = grupos.matricula_alumno  
         WHERE grupos.id_grupo = $Grupo_Elegido";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      //por si fala
      /*public function Listar_Alumnos(){
         $this->sentencia = "SELECT nombre_completo 
         FROM alumnos;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }*/

      public function Listar_Faltas($Grupo_Elegido){
         $this->sentencia = "SELECT alumnos.nombre_completo, asistencias.fecha, asistencias.falta 
         FROM alumnos
         INNER JOIN asistencias
         ON alumnos.matricula_alumno = asistencias.matricula_alumno
         INNER JOIN grupos
         ON alumnos.matricula_alumno = grupos.matricula_alumno
         WHERE grupos.id_grupo = $Grupo_Elegido";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

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