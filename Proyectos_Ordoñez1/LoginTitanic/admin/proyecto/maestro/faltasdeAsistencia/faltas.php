<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar faltas</title>
    <link rel="stylesheet" href="agregar.css">
</head>
<body>
<div class="ingreso">
    <h1>Ingreso de faltas de asistencia</h1>
<?php
    require_once('Conexion (1).php'); 


$conexion = new Conexion();

// Obtener las materias
$query_materias = "SELECT id_materia, nombre FROM materias";
$conexion->sentencia = $query_materias;

// Obtener las materias ejecutar 
$result_materias = $conexion->obtener_sentencia();
    ?>
    <!--selección de materia -->
    <form action="" method="post">
        <div class="parcial">
            <label for="materia">Selecciona una asignatura:</label>
            <select name="materia_id" id="materia">
                <?php while ($fila_materia = $result_materias->fetch_assoc()) { ?>
                    <option value="<?php echo $fila_materia['id_materia']; ?>"><?php echo $fila_materia['nombre']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="parcial">
            <input type="submit" value="Seleccionar">
        </div>
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $materia_id = $_POST["materia_id"];

    // Obtener los alumnos matriculados en la materia seleccionada
    $query_alumnos = "SELECT matricula_alumno, nombre_completo FROM alumnos WHERE id_semestre IN (SELECT id_semestre FROM materias WHERE id_materia = $materia_id)";
    $conexion->sentencia = $query_alumnos;
    $result_alumnos = $conexion->obtener_sentencia();
}
?>

<!-- seleccionar alumno y modificar asistencia-->
<form action="" method="post">
    <div class="parcial">
        <label for="alumno">Selecciona un alumno:</label>
        <select name="alumno_id" id="alumno">
            <?php while ($fila_alumno = $result_alumnos->fetch_assoc()) { ?>
                <option value="<?php echo $fila_alumno['matricula_alumno']; ?>"><?php echo $fila_alumno['nombre_completo']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="parcial">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required>
    </div>
    <div class="parcial">
        <label for="asistencia">Asistencia:</label>
        <input type="checkbox" name="asistencia" id="asistencia" value="1">
    </div>
    <div class="parcial">
        <label for="falta">Falta:</label>
        <input type="checkbox" name="falta" id="falta" value="1">
    </div>
    <div class="parcial">
        <label for="justificante">Justificante:</label>
        <input type="checkbox" name="justificante" id="justificante" value="1">
    </div>
    <input type="hidden" name="materia_id" value="<?php echo $materia_id; ?>">
    <div class="parcial">
        <input type="submit" value="Guardar Asistencia">
    </div>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('Contacto (1).php');
    // id de alumno y materia
    if(isset($_POST["alumno_id"]) && isset($_POST["materia_id"])) {
        $alumno_id = $_POST["alumno_id"];
        $materia_id = $_POST["materia_id"];

    
        $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : null;
        $asistencia = isset($_POST["asistencia"]) ? $_POST["asistencia"] : 0;
        $falta = isset($_POST["falta"]) ? $_POST["falta"] : 0;
        $justificante = isset($_POST["justificante"]) ? $_POST["justificante"] : 0;

        // Hacer la consulta
        $query = "INSERT INTO asistencias (fecha, asistencia, falta, justificante, matricula_alumno, id_materia) 
                  VALUES ('$fecha', $asistencia, $falta, $justificante, $alumno_id, $materia_id)";

        
        $contacto = new Contacto();

        $contacto->sentencia = $query;

        // Ejecutar consulta con contacto 
        $resultado = $contacto->ejecutar_sentencia();

        // Verificar el resultado de la ejecución
        if ($resultado) {
            echo "¡La asistencia se ha modificado correctamente!";
        } else {
            echo "Error al modificar la asistencia.";
        }
    } else {
        echo "No hay datos suficientes";
    }
} else {
    
    echo "Por favor, selecciona un alumno y completa el formulario para modificar la asistencia.";
}
?>

</div>

</body>
</html>
