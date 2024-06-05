<?php
include("conexion.php");

Class Contacto extends Conexion {


    // Método para consultar alumnos
    public function consultar_alumnos($matricula_alumno = null) {
        if ($matricula_alumno !== null) {
            $this->sentencia = "SELECT * FROM alumnos WHERE matricula_alumno = '$matricula_alumno'";
        } else {
            $this->sentencia = "SELECT * FROM alumnos";
        }
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }

    // Método para consultar profesores
    public function consultar_profesores($matricula_profesor = null) {
        if ($matricula_profesor !== null) {
            $this->sentencia = "SELECT * FROM profesores WHERE matricula_profesor = '$matricula_profesor'";
        } else {
            $this->sentencia = "SELECT * FROM profesores";
        }
        return $this->obtener_sentencia();
    }

    // Método para consultar asignaturas
    public function consultar_asignaturas($id_materia = null) {
        if ($id_materia !== null) {
            $this->sentencia = "SELECT * FROM materias WHERE id_materia = '$id_materia'";
        } else {
            $this->sentencia = "SELECT * FROM materias";
        }
        return $this->obtener_sentencia();
    }

    // Método para consultar horario
    public function consultar_horario($id_materia) {
        $this->sentencia = "SELECT * FROM horarios WHERE id_materia = '$id_materia'";
        return $this->obtener_sentencia();
    }

    // Método para modificar asignatura y horario
    public function modificar_asignatura($id_materia, $nombre, $matricula_profesor, $dia, $inicio, $fin) {
        if ($this->verificar_profesor($matricula_profesor)) {
            // Modificar asignatura
            $this->sentencia = "UPDATE materias SET nombre = '$nombre', matricula_profesor = '$matricula_profesor' WHERE id_materia = '$id_materia'";
            $this->ejecutar_sentencia();

            // Modificar horario
            $this->sentencia = "UPDATE horarios SET dia = '$dia', inicio = '$inicio', fin = '$fin' WHERE id_materia = '$id_materia'";
            $this->ejecutar_sentencia();
            return true;
        } else {
            return false;
        }
    }

    public function verificar_profesor($matricula_profesor) {
        $this->sentencia = "SELECT * FROM profesores WHERE matricula_profesor = '$matricula_profesor'";
        $resultado = $this->obtener_sentencia();
        return $resultado->num_rows > 0;
    }
}
?>