<?php
   include ("conexion.php");
   Class Contacto extends Conexion{

  //metodo para obtener los registros de los alumnos
       public function consultar_alumnos($matricula_alumno = null) {
        if ($matricula_alumno !== null) {
            $this->sentencia = "SELECT * FROM alumnos WHERE matricula_alumno = '$matricula_alumno'";
        } else {
            $this->sentencia = "SELECT * FROM alumnos";
        }
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }
      
      //metodo para obtener los registros de los profesores
     public function consultar_profesores($matricula_profesor = null) {
        if ($matricula_profesor !== null) {
            $this->sentencia = "SELECT * FROM profesores WHERE matricula_profesor = '$matricula_profesor'";
        } else {
            $this->sentencia = "SELECT * FROM profesores";
        }
        return $this->obtener_sentencia();
    }

      //metodo para modificar el registro del alumno
      public function modificar_alumno($matricula_alumno, $contraseña, $nombre_completo, $correo) {
    $this->sentencia = "UPDATE alumnos SET contraseña = '$contraseña', nombre_completo = '$nombre_completo', correo = '$correo' WHERE matricula_alumno = $matricula_alumno";
    $this->ejecutar_sentencia();
    }
      

      //metodo para modificar el registro del alumno
     public function modificar_profesor($matricula_profesor, $contraseña, $nombre_completo, $correo) {
    $this->sentencia = "UPDATE profesores SET contraseña = '$contraseña', nombre_completo = '$nombre_completo', correo = '$correo' WHERE matricula_profesor = '$matricula_profesor'";
    $this->ejecutar_sentencia();
}

public function modificar_login($correo, $contraseña) {
    $this->sentencia = "UPDATE login SET contraseña = '$contraseña' WHERE correo = '$correo'";
    $this->ejecutar_sentencia();
}
  }

?>