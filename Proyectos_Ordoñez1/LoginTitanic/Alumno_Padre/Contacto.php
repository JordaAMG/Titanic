<?php 
include("Conexion.php");
class Contacto extends Conexion{
   try{
         public function consultar_nombre_usuariopadrealumno($nombre_completo)
         {
$this->sentencia ="SELECT alumnos.nombre_completo
FROM alumnos
JOIN grupos ON alumnos.matricula_alumno = grupos.matricula_alumno;";
$resultado = $this->obtener_sentencia();
return $resultado;
         }
      public function consultar_horario_por_matricula($matricula_alumno)
{
    $this->sentencia = "SELECT horarios.dia, horarios.inicio, horarios.fin, materias.nombre FROM horarios JOIN materias ON horarios.id_materia = materias.id_materia JOIN grupos ON horarios.id_materia = grupos.id_materia WHERE grupos.matricula_alumno = 1;";
    $this->preparar_sentencia();
    $this->stmt->bind_param("i", $matricula_alumno);
    $resultado = $this->obtener_sentencia();
    return $resultado;
}
/* SELECT horarios.dia, horarios.inicio, horarios.fin, materias.nombre FROM horarios JOIN materias ON horarios.id_materia = materias.id_materia JOIN grupos ON horarios.id_materia = grupos.id_materia WHERE grupos.matricula_alumno = materias.id_materia;*/

   public function consultar_nombreprofesores_padrealumno($matricula_alumno)   
   {
      $this->sentencia =" SELECT profesores.nombre_completo, materias.nombre FROM profesores JOIN materias ON profesores.matricula_profesor = materias.matricula_profesor JOIN grupos ON materias.id_materia = grupos.id_materia JOIN alumnos ON grupos.matricula_alumno = alumnos.matricula_alumno WHERE alumnos.matricula_alumno = materias.id_materia;";
      $resultado = $this->obtener_sentencia();
      return $resultado;
      /* 
      SELECT profesores.nombre_completo, materias.nombre FROM profesores JOIN materias ON profesores.matricula_profesor = materias.matricula_profesor JOIN grupos ON materias.id_materia = grupos.id_materia JOIN alumnos ON grupos.matricula_alumno = alumnos.matricula_alumno WHERE alumnos.matricula_alumno;
      */
      

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
   $this->sentencia = "SELECT calificaciones.parcial_uno, calificaciones.parcial_dos,calificaciones.parcial_tres, materias.nombre from calificaciones JOIN materias on calificaciones.id_materia=materias.id_materia JOIN alumnos on materias.id_materia=alumnos.matricula_alumno;";
   $resultado = $this->obtener_sentencia();
   return $resultado;

}
}






}
?>