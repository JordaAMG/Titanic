<?php
include("Conexion.php");

class Contacto extends Conexion {

    // Método para obtener las asignaturas en las que el alumno está matriculado
    public function consultar_asignaturas_alumno($matricula_alumno) {
        $this->sentencia = "SELECT materias.id_materia, materias.nombre 
                            FROM calificaciones 
                            JOIN materias ON calificaciones.id_materia = materias.id_materia 
                            WHERE calificaciones.matricula_alumno = '$matricula_alumno'";
        $resultado = $this->obtener_sentencia();
        if (!$resultado) {
            echo "Error en la consulta: " . $this->conexion->error;
        }
        return $resultado;
    }

    // Método para consultar el horario de una asignatura
    public function consultar_horario($id_materia) {
        $this->sentencia = "SELECT dia, inicio, fin FROM horarios WHERE id_materia = '$id_materia'";
        $resultado = $this->obtener_sentencia();
        if (!$resultado) {
            echo "Error en la consulta: " . $this->conexion->error;
        }
        return $resultado;
    }
}
?>