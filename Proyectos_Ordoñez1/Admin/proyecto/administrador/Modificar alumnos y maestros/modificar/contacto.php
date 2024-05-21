<?php
   include ("conexion.php");
   Class Contacto extends Conexion{


       public function consultar_alumnos($matricula_alumno = null) {
        if ($matricula_alumno !== null) {
            $this->sentencia = "SELECT * FROM alumnos WHERE matricula_alumno = '$matricula_alumno'";
        } else {
            $this->sentencia = "SELECT * FROM alumnos";
        }
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
      public function modificar_alumnos($matricula_alumno, $contraseña, $nombre_completo, $correo) {
    $this->sentencia = "UPDATE alumnos SET contraseña = '$contraseña', nombre_completo = '$nombre_completo', correo = '$correo' WHERE matricula_alumno = $matricula_alumno";
    $this->ejecutar_sentencia();
    }
      

      //metodo para modificar el registro del alumno
      public function modificar_profesor($matricula_profesor,$contraseña,$nombre_completo, $correo){
         $this->sentencia = "UPDATE contacto SET matricula_profesor='$matricula_profesor', contraseña='$contraseña', nombre_completo='$nombre_completo', correo='$correo' Where matricula_profesor= '$matricula_profesor' ";
         $bandera = $this->ejecutar_sentencia();
         return $bandera;
      }

        public function modificar_login($correo, $contraseña) {
        $this->sentencia = "UPDATE login SET contraseña = '$contraseña' WHERE correo = '$correo'";
        $this->ejecutar_sentencia();
    }
  }

?>