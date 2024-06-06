<?php 
   include ("Conexion.php");
   Class Contacto extends Conexion{

    /*public function Listar_Profesores(){
        $this->sentencia = "SELECT nombre_completo FROM profesores;";
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }*/

    public function Listar_Alumnos($Grupo_Alumno) {
        $this->sentencia = "SELECT alumnos.matricula_alumno, alumnos.nombre_completo
        FROM alumnos 
        INNER JOIN grupos 
        ON alumnos.id_grupo = grupos.id_grupo  
        WHERE grupos.id_grupo = $Grupo_Alumno";
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }

    public function Listar_Faltas($Matricula_Alumno){
        $this->sentencia = "SELECT alumnos.nombre_completo, asistencias.fecha, asistencias.falta 
        FROM alumnos
        INNER JOIN asistencias
        ON alumnos.matricula_alumno = asistencias.matricula_alumno
        WHERE alumnos.matricula_alumno = $Matricula_Alumno";//esta mal
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }

    public function Listar_Profesores($Matricula_Alumno){
        $this->sentencia = "SELECT profesores.nombre_completo, materias.nombre
        FROM profesores

        INNER JOIN materias
        ON profesores.matricula_profesor = materias.matricula_profesor
        
        INNER JOIN profesores_grupos
        ON profesores.matricula_profesor = profesores_grupos.matricula_profesor

        INNER JOIN grupos
        ON profesores_grupos.id_grupo = grupos.id_grupo
        
        INNER JOIN alumnos
        ON grupos.id_grupo = alumnos.id_grupo
        
        WHERE profesores_grupos.matricula_profesor = profesores.matricula_profesor
        AND alumnos.matricula_alumno = $Matricula_Alumno";
        
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }

    public function consultar_Materias($Matricula_Alumno){
         $this->sentencia = "SELECT materias.nombre, materias.id_materia
         FROM materias 
         INNER JOIN calificaciones
         ON materias.id_materia = calificaciones.id_materia
         INNER JOIN alumnos
         ON calificaciones.matricula_alumno = alumnos.matricula_alumno
         WHERE alumnos.matricula_alumno = $Matricula_Alumno";
         $resultado = $this->obtener_sentencia(); 
         return $resultado;
    }

    public function Consultar_Calificaciones($Matricula_Alumno){
        $this->sentencia = "SELECT calificaciones.id_calificacion_parcial, calificaciones.parcial_uno, calificaciones.parcial_dos, calificaciones.parcial_tres  
        FROM calificaciones
        INNER JOIN alumnos
        ON calificaciones.matricula_alumno = alumnos.matricula_alumno
        WHERE alumnos.matricula_alumno = $Matricula_Alumno";
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }

    public function Solicitud_JustificanteF1($Fecha_Justificante, $Fase_Justificante){
        $this->sentencia = "UPDATE asistencias 
        SET justificante = '$Fase_Justificante'
        WHERE fecha = '$Fecha_Justificante'";
        return $this->ejecutar_sentencia();
    }

    public function verificar_Justificante($Fecha_Justificante){
        $this->sentencia = "SELECT justificante
        FROM asistencias
        WHERE fecha = $Fecha_Justificante";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }
}
?>