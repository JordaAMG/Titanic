<?php
   include ("conexion.php");
   Class Contacto extends Conexion{
      

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

    // Método para eliminar asignaturas
    public function eliminar_asignatura($id_materia) {

            // Eliminar el registro de la tabla de materias
            $this->sentencia = "DELETE FROM materias WHERE id_materia = $id_materia";
            $this->ejecutar_sentencia();
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

      //metodo para consultar profesores
      public function consultar_asignaturas(){
         $this->sentencia = "SELECT * FROM materias;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
      }


  }

?>