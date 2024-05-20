<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Calificaciones</title>
    <link rel="stylesheet" href="agregar.css">
</head>
<body>
<div class="ingreso">
    <h1>Ingreso de Calificaciones</h1>
   <?php    require_once '../../../conexion.php';

// Instancia de la clase Conexion
$conexion = new Conexion();

// Obtener las materias
$query_materias = "SELECT id_materia, nombre FROM materias";
$conexion->sentencia = $query_materias;

// Ejecutar la consulta para obtener las materias
$resultado_materias = $conexion->obtener_sentencia();
?>
    <!-- Formulario de selección de materia -->
    <form action="" method="post">
        <div class="parcial">
            <label for="materia">Selecciona una asignatura:</label>
            <select name="materia_id" id="materia">
                <?php while ($fila_materia = $resultado_materias->fetch_assoc()) { ?>
                    <option value="<?php echo $fila_materia['id_materia']; ?>"><?php echo $fila_materia['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="parcial">
            <input type="submit" value="Seleccionar">
        </div>
    </form>

    <?php  
    // Verificar si se ha enviado el formulario de selección de materia
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el ID de la materia seleccionada
        $materia_id = $_POST["materia_id"];

        // Obtener los alumnos matriculados en la materia seleccionada
        $query_alumnos = "SELECT matricula_alumno, nombre_completo FROM alumnos WHERE id_semestre IN (SELECT id_semestre FROM materias WHERE id_materia = $materia_id)";
        $conexion->sentencia = $query_alumnos;
        $resultado_alumnos = $conexion->obtener_sentencia();
    ?>
        <!-- Formulario de selección de alumno y calificación por parcial -->
        <form action="" method="post">
            <div class="parcial">
                <label for="alumno">Selecciona un alumno:</label>
                <select name="alumno_id" id="alumno">
                    <?php while ($fila_alumno = $resultado_alumnos->fetch_assoc()) { ?>
                        <option value="<?php echo $fila_alumno['matricula_alumno']; ?>"><?php echo $fila_alumno['nombre_completo']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="parcial">
                <label for="calificacion_parcial_1">Calificación Parcial 1:</label>
                <input type="number" name="calificacion_parcial_1" id="calificacion_parcial_1" step="0.1" min="0" max="10" required>
            </div>
            <div class="parcial">
                <label for="calificacion_parcial_2">Calificación Parcial 2:</label>
                <input type="number" name="calificacion_parcial_2" id="calificacion_parcial_2" step="0.1" min="0" max="10" required>
            </div>
            <div class="parcial">
                <label for="calificacion_parcial_3">Calificación Parcial 3:</label>
                <input type="number" name="calificacion_parcial_3" id="calificacion_parcial_3" step="0.1" min="0" max="10" required>
            </div>
            <input type="hidden" name="materia_id" value="<?php echo $materia_id; ?>">
            <div class="parcial">
                <input type="submit" value="Guardar Calificaciones">
            </div>
        </form>
    <?php } ?>

    <?php
    // Verificar si se han enviado los datos del formulario de ingreso de calificación
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el ID del alumno y de la materia
        if(isset($_POST["alumno_id"]) && isset($_POST["materia_id"])) {
            $alumno_id = $_POST["alumno_id"];
            $materia_id = $_POST["materia_id"];

            // Obtener las calificaciones parciales del formulario
            $calificacion_parcial_1 = isset($_POST["calificacion_parcial_1"]) ? $_POST["calificacion_parcial_1"] : null;
            $calificacion_parcial_2 = isset($_POST["calificacion_parcial_2"]) ? $_POST["calificacion_parcial_2"] : null;
            $calificacion_parcial_3 = isset($_POST["calificacion_parcial_3"]) ? $_POST["calificacion_parcial_3"] : null;

            // Verificar si ya existen calificaciones para este alumno y esta materia
            $query_existencia_calificaciones = "SELECT COUNT(*) AS num_filas FROM calificaciones WHERE matricula_alumno = $alumno_id AND id_materia = $materia_id";
            $conexion->sentencia = $query_existencia_calificaciones;
            $resultado_existencia_calificaciones = $conexion->obtener_sentencia();
            $fila_existencia_calificaciones = $resultado_existencia_calificaciones->fetch_assoc();
            $num_filas = $fila_existencia_calificaciones['num_filas'];

            if ($num_filas == 0) {
                // Si no existen calificaciones para este alumno y esta materia, insertamos nuevas calificaciones
                $query_insert_calificaciones = "INSERT INTO calificaciones (parcial_uno, parcial_dos, parcial_tres, matricula_alumno, id_materia) VALUES ($calificacion_parcial_1, $calificacion_parcial_2, $calificacion_parcial_3, $alumno_id, $materia_id)";
                $conexion->sentencia = $query_insert_calificaciones;
                $conexion->ejecutar_sentencia();
            } else {
                // Si ya existen calificaciones para este alumno y esta materia, actualizamos las calificaciones existentes
                $query_update_calificaciones = "UPDATE calificaciones SET parcial_uno = $calificacion_parcial_1, parcial_dos = $calificacion_parcial_2, parcial_tres = $calificacion_parcial_3 WHERE matricula_alumno = $alumno_id AND id_materia = $materia_id";
                $conexion->sentencia = $query_update_calificaciones;
                $conexion->ejecutar_sentencia();
            }

            echo "¡Las calificaciones parciales se han guardado correctamente!";
        } else {
            echo "sin guardar";
        }
    } else {
        // Mostrar un mensaje o redireccionar si no se han enviado datos del formulario
        echo "Por favor, selecciona una materia y completa el formulario de calificaciones.";
    }
    ?>
</div>
</body>
</html>

