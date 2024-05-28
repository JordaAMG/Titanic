<?php 
   include ("Conexion.php");
   Class Contacto extends conexion{

    /*public function Listar_Profesores(){
        $this->sentencia = "SELECT nombre_completo FROM profesores;";
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }*/

    public function Listar_Alumnos($Matricula_Alumno) {
        $this->sentencia = "SELECT alumnos.matricula_alumno, alumnos.nombre_completo 
        FROM alumnos 
        INNER JOIN grupos 
        ON alumnos.matricula_alumno = grupos.matricula_alumno  
        WHERE grupos.matricula_alumno = $Matricula_Alumno";
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }

    public function Listar_Faltas($Matricula_Alumno){
        $this->sentencia = "SELECT alumnos.nombre_completo, asistencias.fecha, asistencias.falta 
        FROM alumnos
        INNER JOIN asistencias
        ON alumnos.matricula_alumno = asistencias.matricula_alumno
        INNER JOIN grupos
        ON alumnos.matricula_alumno = grupos.matricula_alumno
        WHERE grupos.id_grupo = $Matricula_Alumno";
        $resultado = $this->obtener_sentencia(); 
        return $resultado;
    }

    public function Listar_Profesores($Matricula_Alumno){
        $this->sentencia = "SELECT profesores.nombre_completo, materias.nombre
        FROM profesores
        INNER JOIN materias
        ON profesores.matricula_profesor = materias.matricula_profesor
        INNER JOIN grupos
        ON grupos.matricula_profesor = grupos.matricula_profesor
        INNER JOIN alumnos
        ON grupos.matricula_alumno = alumnos.matricula_alumno
        WHERE grupos.matricula_profesor = profesores.matricula_profesor
        AND alumnos.matricula_alumno = $Matricula_Alumno";
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






   /*try{
        public function consultar_nombre_usuariopadrealumno($nombre_completo){
            $this->sentencia ="SELECT alumnos.nombre_completo
            FROM alumnos
            JOIN grupos 
            ON alumnos.matricula_alumno = grupos.matricula_alumno;";
            $resultado = $this->obtener_sentencia();
            return $resultado;
        }

        public function consultar_horario_por_matricula($matricula_alumno){
            $this->sentencia = "SELECT horarios.dia, horarios.inicio, horarios.fin, materias.nombre FROM horarios JOIN materias ON horarios.id_materia = materias.id_materia JOIN grupos ON horarios.id_materia = grupos.id_materia WHERE grupos.matricula_alumno = 1;";
            $this->preparar_sentencia();
            $this->stmt->bind_param("i", $matricula_alumno);
            $resultado = $this->obtener_sentencia();
            return $resultado;
        }

/* SELECT horarios.dia, horarios.inicio, horarios.fin, materias.nombre FROM horarios JOIN materias ON horarios.id_materia = materias.id_materia JOIN grupos ON horarios.id_materia = grupos.id_materia WHERE grupos.matricula_alumno = materias.id_materia;

   public function consultar_nombreprofesores_padrealumno($matricula_alumno)   
   {
      $this->sentencia =" SELECT profesores.nombre_completo, materias.nombre 
      FROM profesores 
      JOIN materias 
      ON profesores.matricula_profesor = materias.matricula_profesor 
      JOIN grupos 
      ON materias.id_materia = grupos.id_materia 
      JOIN alumnos 
      ON grupos.matricula_alumno = alumnos.matricula_alumno 
      WHERE alumnos.matricula_alumno = materias.id_materia;";
      $resultado = $this->obtener_sentencia();
      return $resultado;
      /* 
      SELECT profesores.nombre_completo, materias.nombre FROM profesores JOIN materias ON profesores.matricula_profesor = materias.matricula_profesor JOIN grupos ON materias.id_materia = grupos.id_materia JOIN alumnos ON grupos.matricula_alumno = alumnos.matricula_alumno WHERE alumnos.matricula_alumno;
      
   }

   public function obtenerjustificantes_padrealumno() {
    // Aquí debes incluir la lógica para conectarte a la base de datos y otras configuraciones necesarias

    try {
        // Preparar la consulta SQL
        $this->sentencia = "SELECT asistencias.justificante
        FROM asistencias
        JOIN materias ON asistencias.id_materia = materias.id_materia
        JOIN grupos ON materias.id_materia = grupos.id_materia
        JOIN alumnos ON grupos.matricula_alumno = alumnos.matricula_alumno;";

        // Ejecutar la consulta
        $resultado = $this->obtener_sentencia($resultado);

        // Verificar si se obtuvieron resultados
        if ($resultado->rowCount() > 0) {
            // Retornar los resultados como un arreglo
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Si no hay resultados, retornar un arreglo vacío
            return [];
        }
    } catch (PDOException $e) {
        // Manejar cualquier excepción
        echo "Error al ejecutar la consulta: " . $e->getMessage();
        return false;
    }

    public function listarcalificaciones_padrealumno(){
        $this->sentencia = "SELECT calificaciones.parcial_uno, calificaciones.parcial_dos,calificaciones.parcial_tres, materias.nombre 
        FROM calificaciones 
        JOIN materias 
        ON calificaciones.id_materia=materias.id_materia 
        JOIN alumnos 
        ON materias.id_materia=alumnos.matricula_alumno;";
        $resultado = $this->obtener_sentencia();
        return $resultado;
    }*/
}
?>