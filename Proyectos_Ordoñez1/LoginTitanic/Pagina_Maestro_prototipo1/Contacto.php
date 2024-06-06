<?php
require_once("Conexion.php");

class Contacto extends Conexion {
    //ejem
    public function alta($Titulo, $Actores, $Director, $Guion, $Produccion, $Anio, $Nacionalidad, $Duracion, $Genero, $Restricciones, $Sinopsis) {
        $this->sentencia = "INSERT INTO Contacto VALUES ('','$Titulo', '$Actores', '$Director', '$Guion', '$Produccion', $Anio,'$Nacionalidad', $Duracion,'$Genero','$Restricciones','$Sinopsis')";
        $bandera = $this->ejecutar_sentencia();
    }

    public function Alta_Faltas($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta) {
        $this->sentencia = "INSERT INTO asistencias VALUES ('',$V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta)";
        $bandera = $this->ejecutar_sentencia();
    }

    public function modificar($Titulo, $Actores, $Director, $Guion, $Produccion, $Anio, $Nacionalidad, $Duracion, $Genero, $Restricciones, $Sinopsis, $id) {
        $this->sentencia = "UPDATE contacto SET Titulo='$Titulo', Actores='$Actores', Director='$Director', Guion='$Guion', Produccion='$Produccion', Anio='$Anio',Nacionalidad='$Nacionalidad', Duracion='$Duracion',Genero='$Genero',Restricciones='$Restricciones',Sinopsis='$Sinopsis' Where id= '$id' ";
        $bandera = $this->ejecutar_sentencia();
        return $bandera;
    }

    public function consultar() {
        $this->sentencia = "SELECT * FROM Contacto;";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function consultar_Materias($matricula_profesor) {
        $this->sentencia = "SELECT materias.nombre, materias.id_materia
                            FROM materias 
                            INNER JOIN profesores ON materias.matricula_profesor = profesores.matricula_profesor
                            WHERE profesores.matricula_profesor = $matricula_profesor";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function consultar_Grupos($matricula_profesor, $Materia_Elegida) {
        $this->sentencia = "SELECT grupos.nombre_grupo, grupos.semestre, grupos.id_grupo 
                            FROM grupos 
                            INNER JOIN profesores_grupos ON grupos.id_grupo = profesores_grupos.id_grupo
                            WHERE profesores_grupos.matricula_profesor = $matricula_profesor 
                            AND grupos.id_materia = $Materia_Elegida";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function Modificar_Faltas($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta) {
        $this->sentencia = "UPDATE asistencias SET V_Fecha_Fecha='$V_Fecha_Fecha', Asistencia='$Asistencia', Falta_de_Asistencia='$Falta_de_Asistencia', Justificante='$Justificante', Alumno_de_Falta='$Alumno_de_Falta', Materia_de_Falta=$Materia_de_Falta Where id= '$id'";
        $bandera = $this->ejecutar_sentencia();
    }

    public function Consultar_Calificaciones($matricula_alumno) {
        $this->sentencia = "SELECT calificaciones.id_calificacion_parcial, calificaciones.parcial_uno, calificaciones.parcial_dos, calificaciones.parcial_tres  
                            FROM calificaciones
                            INNER JOIN alumnos ON calificaciones.matricula_alumno = alumnos.matricula_alumno
                            WHERE alumnos.matricula_alumno = $matricula_alumno";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function Agregar_Calificaciones($alumno_id, $materia_id, $calificacion_parcial_1, $calificacion_parcial_2, $calificacion_parcial_3) {
        $this->sentencia = "SELECT COUNT(*) AS num_filas FROM calificaciones WHERE matricula_alumno = $alumno_id AND id_materia = $materia_id";
        $resultado_existencia = $this->obtener_sentencia();
        $fila_existencia = $resultado_existencia->fetch_assoc();
        $num_filas = $fila_existencia['num_filas'];

        if ($num_filas == 0) {
            $this->sentencia = "INSERT INTO calificaciones (parcial_uno, parcial_dos, parcial_tres, matricula_alumno, id_materia) VALUES ($calificacion_parcial_1, $calificacion_parcial_2, $calificacion_parcial_3, $alumno_id, $materia_id)";
            $this->ejecutar_sentencia();
            return "¡Las calificaciones parciales se han guardado correctamente!";
        } else {
            return "Las calificaciones ya existen.";
        }
    }

    public function Modificar_Calificaciones($parcial_uno, $parcial_dos, $parcial_tres, $matricula_alumno, $Materia_Elegida) {
        $this->sentencia = "UPDATE calificaciones 
                            SET parcial_uno = $parcial_uno, parcial_dos = $parcial_dos, parcial_tres = $parcial_tres 
                            WHERE matricula_alumno = $matricula_alumno 
                            AND id_materia = $Materia_Elegida";
        $this->ejecutar_sentencia();
        return "¡Las calificaciones parciales se han modificado correctamente!";
    }

    public function Listar_Alumnos($Grupo_Elegido) {
        $this->sentencia = "SELECT alumnos.matricula_alumno, alumnos.nombre_completo 
                            FROM alumnos 
                            INNER JOIN grupos ON alumnos.id_grupo = grupos.id_grupo  
                            WHERE grupos.id_grupo = $Grupo_Elegido";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function Listar_Faltas($Grupo_Elegido) {
        $this->sentencia = "SELECT alumnos.nombre_completo, asistencias.fecha, asistencias.falta 
                            FROM alumnos
                            INNER JOIN asistencias ON alumnos.matricula_alumno = asistencias.matricula_alumno
                            INNER JOIN grupos ON alumnos.id_grupo = grupos.id_grupo
                            WHERE grupos.id_grupo = $Grupo_Elegido";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function Listar_Profesores() {
        $this->sentencia = "SELECT nombre_completo FROM profesores;";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function cargar($id) {
        $this->sentencia = "SELECT * From contacto;";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function baja($id) {
        $this->sentencia = "DELETE FROM Contacto WHERE id = $id;";
        $this->ejecutar_sentencia();
    }
}
?>