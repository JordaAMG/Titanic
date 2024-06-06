<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Calificaciones</title>
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
    <h1>Ingreso de Calificaciones</h1>

    <?php
    require_once("Contacto.php"); // Incluye el archivo Contacto.php que contiene la definición de la clase Contacto

    $obj = new contacto(); // Crea una nueva instancia de la clase Contacto
    $matricula_profesor = $_COOKIE['matricula']; // Define la matrícula del profesor a consultar

    $resultado = $obj->consultar_Materias($matricula_profesor); // Llama al método consultar_Materias de la clase Contacto

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo '<a href="?opc1=' . $fila["id_materia"] . '">' . $fila["nombre"] . '</a><br>';
        }
    } else {
        echo "El profesor no imparte ninguna materia.";
    }

    if (isset($_REQUEST["opc1"])) {
        $Materia_Elegida = $_REQUEST["opc1"];
        $resultado = $obj->consultar_Grupos($matricula_profesor, $Materia_Elegida);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo '<a href="?opc2=' . $fila["id_grupo"] . '&materia_id=' . $Materia_Elegida . '">' . $fila["nombre_grupo"] . ' ' . $fila["semestre"] . '</a><br>';
            }
        } else {
            echo "La materia no tiene grupos";
        }
    }

    if (isset($_REQUEST["opc2"])) {
        $Grupo_Elegido = $_REQUEST["opc2"];
        // Verificar si "materia_id" está presente antes de usarlo
        if (isset($_REQUEST["materia_id"])) {
            $Materia_Elegida = $_REQUEST["materia_id"];
        } else {
            echo "Error: 'materia_id' no está definido.";
            exit; // Detener la ejecución si es necesario
        }
        $resultado = $obj->Listar_Alumnos($Grupo_Elegido);
        if ($resultado->num_rows > 0) {
            while ($alumno = $resultado->fetch_assoc()) {
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

        if (isset($_POST["calificacion_parcial_1"]) && isset($_POST["calificacion_parcial_2"]) && isset($_POST["calificacion_parcial_3"])) {
            $calificacion_parcial_1 = $_POST["calificacion_parcial_1"];
            $calificacion_parcial_2 = $_POST["calificacion_parcial_2"];
            $calificacion_parcial_3 = $_POST["calificacion_parcial_3"];

            include("Conexion.php");
            //$conexion = new Conexion();

            // Verificar existencia de calificaciones
            $query_existencia_calificaciones = "SELECT COUNT(*) AS num_filas FROM calificaciones WHERE matricula_alumno = $alumno_id AND id_materia = $materia_id";
            $conexion->sentencia = $query_existencia_calificaciones;
            $resultado_existencia_calificaciones = $conexion->obtener_sentencia();
            $fila_existencia_calificaciones = $resultado_existencia_calificaciones->fetch_assoc();
            $num_filas = $fila_existencia_calificaciones['num_filas'];

            if ($num_filas == 0) {
                // Insertar calificaciones nuevas
                $query_insert_calificaciones = "INSERT INTO calificaciones (parcial_uno, parcial_dos, parcial_tres, matricula_alumno, id_materia) VALUES ($calificacion_parcial_1, $calificacion_parcial_2, $calificacion_parcial_3, $alumno_id, $materia_id)";
                $conexion->sentencia = $query_insert_calificaciones;
                $conexion->ejecutar_sentencia();
            } else {
                // Actualizar calificaciones existentes
                $query_update_calificaciones = "UPDATE calificaciones SET parcial_uno = $calificacion_parcial_1, parcial_dos = $calificacion_parcial_2, parcial_tres = $calificacion_parcial_3 WHERE matricula_alumno = $alumno_id AND id_materia = $materia_id";
                $conexion->sentencia = $query_update_calificaciones;
                $conexion->ejecutar_sentencia();
            }

            echo "¡Las calificaciones parciales se han guardado correctamente!";
        } else {
            ?>
            <!-- Formulario de ingreso de calificaciones -->
            <form action="" method="post">
                <input type="hidden" name="alumno_id" value="<?php echo $alumno_id; ?>">
                <input type="hidden" name="materia_id" value="<?php echo $materia_id; ?>">
                <div class="parcial">
                    <label for="calificacion_parcial_1">Calificación Parcial 1:</label>
                    <input type="text" name="calificacion_parcial_1" id="calificacion_parcial_1">
                </div>
                <div class="parcial">
                    <label for="calificacion_parcial_2">Calificación Parcial 2:</label>
                    <input type="text" name="calificacion_parcial_2" id="calificacion_parcial_2">
                </div>
                <div class="parcial">
                    <label for="calificacion_parcial_3">Calificación Parcial 3:</label>
                    <input type="text" name="calificacion_parcial_3" id="calificacion_parcial_3">
                </div>
                <div class="parcial">
                    <input type="submit" value="Guardar Calificaciones">
                </div>
            </form>
            <?php
        }
    }
    ?>
</div>
</body>
</html>
