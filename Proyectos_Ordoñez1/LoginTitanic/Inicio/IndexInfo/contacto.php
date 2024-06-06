<?php
include ("conexion.php");
Class Contacto extends Conexion {

    // Método para agregar correo y contraseña a la tabla login
    public function agregar_correo_a_login($correo, $contraseña) {
        $this->sentencia = "INSERT INTO login (correo, contraseña) VALUES ('$correo','$contraseña')";
        return $this->ejecutar_sentencia();
    }

    // Método para agregar alumnos
    public function agregar_alumno($matricula_alumno, $contraseña, $nombre_completo, $correo, $id_grupo) {
        $this->sentencia = "INSERT INTO alumnos (matricula_alumno, contraseña, nombre_completo, correo, id_grupo) VALUES ($matricula_alumno, '$contraseña', '$nombre_completo', '$correo', $id_grupo)";
        return $this->ejecutar_sentencia();
    }

    // Método para agregar profesores
    public function agregar_profesor($matricula_profesor, $contraseña, $nombre_completo, $correo) {
        $this->sentencia = "INSERT INTO profesores (matricula_profesor, contraseña, nombre_completo, correo) VALUES ($matricula_profesor, '$contraseña','$nombre_completo', '$correo')";
        return $this->ejecutar_sentencia();
    }

    // Método para agregar relación profesor-grupo
    public function agregar_profesor_grupo($matricula_profesor, $id_grupo) {
        $this->sentencia = "INSERT INTO profesores_grupos (matricula_profesor, id_grupo) VALUES ($matricula_profesor, $id_grupo)";
        return $this->ejecutar_sentencia();
    }
    public function consultar_profesores(){
         $this->sentencia = "SELECT * FROM profesores;";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
     }

    // Método para consultar los grupos
    public function consultar_grupos($id_grupo = null) {
        if ($id_grupo !== null) {
            $this->sentencia = "SELECT * FROM grupos WHERE id_grupo = '$id_grupo'";
        } else {
            $this->sentencia = "SELECT * FROM grupos";
        }
        return $this->obtener_sentencia();
    }
}
?>
