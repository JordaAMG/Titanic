<?php
   include ("conexion.php");
   Class Contacto extends Conexion{


    // Método para agregar correo y contraseña a la tabla login
    public function agregar_correo_a_login($correo,$contraseña){
        $this->sentencia = "INSERT INTO login VALUES ('$correo','$contraseña' )";
        $bandera = $this->ejecutar_sentencia();
      }

    //Metdodo para agregar alumnos
      public function agregar_alumno($matricula_alumno,$contraseña,$nombre_completo, $correo){
         $this->sentencia = "INSERT INTO alumnos VALUES ($matricula_alumno,'$contraseña','$nombre_completo','$correo')";
         $bandera = $this->ejecutar_sentencia();
    }

      //metodo para agregar profesores
       public function agregar_profesor($matricula_profesor, $contraseña,$nombre_completo, $correo){
         $this->sentencia = "INSERT INTO profesores VALUES ($matricula_profesor, '$contraseña','$nombre_completo', '$correo')";
         $bandera = $this->ejecutar_sentencia();
      }

       //metodo para agregar asignaturas
       public function agregar_asignatura($id_materia, $nombre,$matricula_profesor){
         $this->sentencia = "INSERT INTO materias VALUES ($id_materia, '$nombre','$matricula_profesor')";
         $bandera = $this->ejecutar_sentencia();
      }


    }
  ?>