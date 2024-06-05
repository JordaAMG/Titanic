<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar faltas</title>
    <link rel="stylesheet" href="agregar.css">
</head>
<body>
    
    <header id="cabeza">
            <article id="Info_usuario">
                <input id="Imagen0" type="image" src="icon_usuario.PNG" alt="Enviar" width="60px" height="60px">
                <a href=""></a>
                <div id="Info_usuario1">
                    <p>Nombre del Profesor:</p>
                    <?php
                        if (isset($_COOKIE['username'])) {
                        $username = $_COOKIE['username'];
                        echo "$username";
                        } else {
                            echo "No se ha encontrado el nombre.";
                        }
                    ?>
                    <p>Numero de cuenta:</p>
                    <?php
                        if (isset($_COOKIE['matricula'])) {
                        $matricula = $_COOKIE['matricula'];
                            echo "$matricula";
                        } else {
                            echo "No se ha encontrado la matrícula.";
                        }
                    ?>
               </div>
            </article>

            <article id="Info_ListAlumn">
                <div>
                    Listar Profesores:
                </div>
            </article>

            <article id="cerrar_secion0">
                <a href="?opc=cerrar_secion"> <li>Cerrar Secion</li> </a>
                <input id="Imagen0" type="image" src="Icon_salir.PNG" alt="Enviar" width="30px" height="30px">
            </article>
        </header>

<div class="ingreso">
    <h1>Ingreso de faltas de asistencia</h1>
<?php
    require_once('Conexion.php'); 

    $conexion = new Conexion();
    $matricula_profesor = 2; // Define la matrícula del profesor a consultar

    if (!isset($_REQUEST["opc1"]) && !isset($_REQUEST["opc2"]) && !isset($_REQUEST["opc3"])) {
        // Obtener las materias que imparte el profesor
        $query_materias = "SELECT id_materia, nombre FROM materias WHERE matricula_profesor = $matricula_profesor";
        $conexion->sentencia = $query_materias;
        $result_materias = $conexion->obtener_sentencia();

        echo "<h2>Selecciona una materia</h2>";
        if ($result_materias->num_rows > 0) {
            while ($fila = $result_materias->fetch_assoc()) {
                echo '<a href="?opc1=' . $fila["id_materia"] . '">' . $fila["nombre"] . '</a><br>';
            }
        } else {
            echo "El profesor no imparte ninguna materia.";
        }
    }

    if (isset($_REQUEST["opc1"]) && !isset($_REQUEST["opc2"]) && !isset($_REQUEST["opc3"])) {
        $Materia_Elegida = $_REQUEST["opc1"];
        // Obtener los grupos de la materia seleccionada
        $query_grupos = "SELECT id_grupo, nombre_grupo FROM grupos WHERE id_materia = $Materia_Elegida AND matricula_profesor = $matricula_profesor";
        $conexion->sentencia = $query_grupos;
        $result_grupos = $conexion->obtener_sentencia();

        echo "<h2>Selecciona un grupo</h2>";
        if ($result_grupos->num_rows > 0) {
            while ($fila = $result_grupos->fetch_assoc()) {
                echo '<a href="?opc2=' . $fila["id_grupo"] . '&materia_id=' . $Materia_Elegida . '">' . $fila["nombre_grupo"] . '</a><br>';
            }
        } else {
            echo "La materia no tiene grupos";
        }
    }

    if (isset($_REQUEST["opc2"]) && !isset($_REQUEST["opc3"])) {
        $Grupo_Elegido = $_REQUEST["opc2"];
        $Materia_Elegida = $_REQUEST["materia_id"];
        // Obtener los alumnos del grupo seleccionado
        $query_alumnos = "SELECT matricula_alumno, nombre_completo FROM alumnos WHERE matricula_alumno IN (SELECT matricula_alumno FROM grupos WHERE id_grupo = $Grupo_Elegido)";
        $conexion->sentencia = $query_alumnos;
        $result_alumnos = $conexion->obtener_sentencia();

        echo "<h2>Selecciona un alumno</h2>";
        if ($result_alumnos->num_rows > 0) {
            while ($alumno = $result_alumnos->fetch_assoc()) {
                echo '<a href="?opc3=' . $alumno["matricula_alumno"] . '&grupo_id=' . $Grupo_Elegido . '&materia_id=' . $Materia_Elegida . '">' . $alumno["nombre_completo"] . '</a><br>';
            }
        } else {
            echo "El grupo no tiene alumnos.";
        }
    }

    if (isset($_REQUEST["opc3"])) {
        $alumno_id = $_REQUEST["opc3"];
        $grupo_id = $_REQUEST["grupo_id"];
        $materia_id = $_REQUEST["materia_id"];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fecha = $_POST["fecha"];
            $asistencia = isset($_POST["asistencia"]) ? 1 : 0;
            $falta = isset($_POST["falta"]) ? 1 : 0;
            $justificante = isset($_POST["justificante"]) ? 1 : 0;

            // Validar los checkbox
            if ($asistencia && ($falta || $justificante)) {
                echo "REVISE: Asistencia no debe llebar falta ni justificante ";
            } elseif ($falta && $asistencia) {
                echo "REVISE: No se pueden marcar falta y asitencia al mismo tiempo.";
            } elseif ($justificante && !$falta) {
                echo "REVISE: Justificante solo puede ser seleccionado si falta está marcado.";
            } else {
                // Insertar la asistencia
                $query_insert_asistencia = "INSERT INTO asistencias (fecha, asistencia, falta, justificante, matricula_alumno, id_materia) VALUES ('$fecha', $asistencia, $falta, $justificante, $alumno_id, $materia_id)";
                $conexion->sentencia = $query_insert_asistencia;
                if ($conexion->ejecutar_sentencia()) {
                    echo "¡La asistencia se ha registrado correctamente!";
                } else {
                    echo "Error al registrar la asistencia.";
                }
            }
        }
?>
        <h2>Registrar asistencia para el alumno</h2>
        <form method="post">
            Fecha: <input type="date" name="fecha" required><br>
            Asistencia: <input type="checkbox" id="asistencia" name="asistencia" <?php if(isset($_POST['asistencia'])) echo 'checked'; ?>><br>
            Falta: <input type="checkbox" id="falta" name="falta" <?php if(isset($_POST['falta'])) echo 'checked'; ?>><br>
            Justificante: <input type="checkbox" id="justificante" name="justificante" <?php if(isset($_POST['justificante'])) echo 'checked'; ?>><br>
            <input type="submit" value="Registrar">
        </form>
<?php
    }
?>
</div>
</body>
</html>
