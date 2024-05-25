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

    //metodo para obtener los registros de las materias
     public function consultar_asignaturas($id_materia = null) {
        if ($id_materia !== null) {
            $this->sentencia = "SELECT * FROM materias WHERE id_materia = '$id_materia'";
        } else {
            $this->sentencia = "SELECT * FROM materias";
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


    // metodo para verificar profesor
    public function verificar_profesor($matricula_profesor) {
    $this->sentencia = "SELECT * FROM profesores WHERE matricula_profesor = '$matricula_profesor'";
    $resultado = $this->obtener_sentencia();
    return $resultado->num_rows > 0;
} 

    //metodo para modificar el registro de la asignatura
    public function modificar_asignatura($id_materia, $nombre, $matricula_profesor) {
    if ($this->verificar_profesor($matricula_profesor)) {
        $this->sentencia = "UPDATE materias SET nombre = '$nombre', matricula_profesor = '$matricula_profesor' WHERE id_materia = '$id_materia'";
        $this->ejecutar_sentencia();
        return true;
    } else {
        return false;
    }
}

public function modificar_login($correo, $contraseña) {
    $this->sentencia = "UPDATE login SET contraseña = '$contraseña' WHERE correo = '$correo'";
    $this->ejecutar_sentencia();
}
  }

?>