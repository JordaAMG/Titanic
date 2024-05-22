<?php
   include ("conexion.php");
   Class Contacto extends Conexion{


    // Método para agregar correo y contraseña a la tabla login
    public function agregar_correo_a_login($correo,$contraseña){
        $this->sentencia = "INSERT INTO login VALUES ('$correo','$contraseña' )";
        $bandera = $this->ejecutar_sentencia();
      }

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
      }
  }

?>