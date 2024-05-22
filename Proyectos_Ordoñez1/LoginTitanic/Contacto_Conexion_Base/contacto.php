<?php
   include ("conexion.php");
   Class Contacto extends Conexion{


    // Método para agregar correo y contraseña a la tabla login
    public function agregar_correo_a_login($correo,$contraseña){
        $this->sentencia = "INSERT INTO login VALUES ('$correo','$contraseña' )";
        $bandera = $this->ejecutar_sentencia();
      }

    //lol
      
    //Metdodo para agregar alumnos
      public function agregar_alumno($matricula_alumno,$contraseña,$nombre_completo, $correo,$id_semestre){
         $this->sentencia = "INSERT INTO alumnos VALUES ($matricula_alumno,'$contraseña','$nombre_completo','$correo',$id_semestre)";
         $bandera = $this->ejecutar_sentencia();
    }

      //metodo para agregar profesores
       public function agregar_profesor($matricula_profesor, $contraseña,$nombre_completo, $correo){
         $this->sentencia = "INSERT INTO profesores VALUES ($matricula_profesor, '$contraseña','$nombre_completo', '$correo')";
         $bandera = $this->ejecutar_sentencia();
      }


 // Método para eliminar correo y contraseña de la tabla login
    public function eliminar_correo_de_login($correo) {
        $this->sentencia = "DELETE FROM login WHERE correo = '$correo'";
        $bandera = $this->ejecutar_sentencia();
    }

         // Método para eliminar alumnos
    public function eliminar_alumno($matricula_alumno) {

        // Obtener el correo del alumno que se va a eliminar
        $this->sentencia = "SELECT correo FROM alumnos WHERE matricula_alumno = $matricula_alumno";
        $resultado = $this->obtener_sentencia();
        if ($registro = $resultado->fetch_assoc()) {
            $correo = $registro['correo'];

            // Eliminar el registro de la tabla de alumnos
            $this->sentencia = "DELETE FROM alumnos WHERE matricula_alumno = $matricula_alumno";
            $this->ejecutar_sentencia();

            // Eliminar el registro asociado en la tabla login
            $this->eliminar_correo_de_login($correo);
        }
    }

     // Método para eliminar profesores
    public function eliminar_profesor($matricula_profesor) {

        // Obtener el correo del profesor que se va a eliminar
        $this->sentencia = "SELECT correo FROM profesores WHERE matricula_profesor = $matricula_profesor";
        $resultado = $this->obtener_sentencia();
        if ($registro = $resultado->fetch_assoc()) {
            $correo = $registro['correo'];

            // Eliminar el registro de la tabla de profesores
            $this->sentencia = "DELETE FROM profesores WHERE matricula_profesor = $matricula_profesor";
            $this->ejecutar_sentencia();

            // Eliminar el registro asociado en la tabla login
            $this->eliminar_correo_de_login($correo);
        }
    }

      //metodo para consultar alumnos
      public function consultar_alumnos(){
         $this->sentencia = "SELECT * FROM alumnos;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }
      
      //metodo para consultar profesores
      public function consultar_profesores(){
         $this->sentencia = "SELECT * FROM profesores;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      //metodo para modificar el registro del alumno
      public function modificar_alumnos($matricula_alumno, $contraseña, $nombre_completo, $correo, $id_semestre) {
    $this->sentencia = "UPDATE alumnos SET contraseña = '$contraseña', nombre_completo = '$nombre_completo', correo = '$correo', id_semestre = $id_semestre WHERE matricula_alumno = $matricula_alumno";
    $this->ejecutar_sentencia();
    }
      

      //metodo para modificar el registro del alumno
      public function modificar_profesor($matricula_profesor,$contraseña,$nombre_completo, $correo){
         $this->sentencia = "UPDATE contacto SET matricula_profesor='$matricula_profesor', contraseña='$contraseña', nombre_completo='$nombre_completo', correo='$correo' Where matricula_profesor= '$matricula_profesor' ";
         $bandera = $this->ejecutar_sentencia();
         return $bandera;

      //poner faltas
      public function Alta_Faltas($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta){
         $this->sentencia = "INSERT INTO asistencias VALUES ('',$V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta)";
         $bandera = $this->ejecutar_sentencia();
      }

      //Modificar faltas
      public function Modificar_Faltas($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta){
         $this->sentencia = "UPDATE asistencias SET V_Fecha_Fecha='$V_Fecha_Fecha', Asistencia='$Asistencia', Falta_de_Asistencia='$Falta_de_Asistencia', Justificante='$Justificante', Alumno_de_Falta='$Alumno_de_Falta', Materia_de_Falta=$Materia_de_Falta Where id= '$id' ";
         $bandera = $this->ejecutar_sentencia();
      }

      //Listar materias(Sirve para el momento de elegir un alumno sepamos de cual materia)
      public function consultar_Materias($matricula_profesor){//funcion para saver que materias imparte el maestro
         $this->sentencia = "SELECT materias.nombre, materias.id_materia
         FROM materias 
         INNER JOIN profesores
         ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      //Listar grupos(Sirve para el momento de elegir un alumno sepamos de cual Grupo)
      public function consultar_Grupos($matricula_profesor) {
      $this->sentencia = "SELECT 
         FROM semestre 
         INNER JOIN materias 
         ON semestre.id_semestre = materias.id_semestre
         INNER JOIN profesores 
         ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor";
         $resultado = $this->obtener_sentencia();
         return $resultado;
      }

      //lista alumnos junto a los 2 funciones anteriores
      public function Listar_Alumnos($matricula_profesor) {
         $this->sentencia = "SELECT alumnos.nombre_completo 
         FROM alumnos
         INNER JOIN materias ON alumnos.id_semestre = materias.id_semestre
         INNER JOIN profesores ON materias.matricula_profesor = profesores.matricula_profesor
         WHERE profesores.matricula_profesor = $matricula_profesor;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

      //Listar profesores(Solo sirve para  el usuario profesor, ya que para el usuario alumno/padre tiene que poner un "where" para que solo liste los profesores que le dan)
      public function Listar_Profesores(){
         $this->sentencia = "SELECT nombre_completo FROM profesores;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }

   }
?>