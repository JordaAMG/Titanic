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

       
    
    <?php
                        require_once("Contacto.php"); // Incluye el archivo Contacto.php que contiene la definición de la clase Contacto

                        $obj = new contacto(); // Crea una nueva instancia de la clase Contacto

                        $matricula_profesor = 2; // Define la matrícula del profesor a consultar 
                        //hola brian

                        $resultado = $obj->consultar_Materias($matricula_profesor); // Llama al método consultar_Materias de la clase Contacto, pasando la matrícula del profesor como parámetro y almacena el resultado en la variable $resultado

                        // Verifica si la consulta devolvió algún resultado
                        if ($resultado->num_rows > 0) {
                        // Si hay resultados, recorre cada fila del resultado
                        while ($fila = $resultado->fetch_assoc()) {
                        // Muestra el nombre de la materia como un enlace HTML
                            echo '<a href="?opc1=' . $fila["id_materia"] . '">' . $fila["nombre"] . '</a>';
                            echo '<br>'; // Salto de línea para separar cada materia
                        }
                        } else {
                            // Si no hay resultados, muestra un mensaje indicando que el profesor no imparte ninguna materia
                            echo "El profesor no imparte ninguna materia.";
                        }


                        if (isset($_REQUEST["opc1"])) {

                            $Materia_Elegida = $_REQUEST["opc1"];
                            $resultado = $obj->consultar_Grupos($matricula_profesor, $Materia_Elegida);
                            if ($resultado->num_rows > 0) {
                            // Mostrar las materias
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo '<a href="?opc2=' . $fila["id_grupo"] . '">' . $fila["nombre_grupo"] . '</a>';
                                    echo '<br>';
                                }
                            } else {
                                echo "La materia no tiene grupos";
                            }
                        } 
                        if (isset($_REQUEST["opc2"])) {

                                $Grupo_Elegido = $_REQUEST["opc2"];
                                $resultado = $obj->Listar_Alumnos($Grupo_Elegido);
                                if ($resultado->num_rows > 0) {
                                    while ($alumno = $resultado->fetch_assoc()) {
                                        echo '<a href="?opc3=' . $alumno["matricula_alumno"] . '">' . $alumno["nombre_completo"] . '</a>';
                                    echo'<br>';
                                    }
                                } else {
                                    echo " EL ALUMNO NO TIENE CALIFICACION";
                                }
                            }
                        if (isset($_REQUEST["opc3"])) {
                            ?>

                             <!-- Formulario de selección de alumno y de ingreso de calificaciones por parcial -->
        <form action="" method="post">
          
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
                            if (isset($_POST["alumno_id"]) && isset($_POST["calificacion_parcial_1"]) && isset($_POST["calificacion_parcial_2"]) && isset($_POST["calificacion_parcial_3"])) {
            $alumno_id = $_POST["alumno_id"];
            $calificacion_parcial_1 = $_POST["calificacion_parcial_1"];
            $calificacion_parcial_2 = $_POST["calificacion_parcial_2"];
            $calificacion_parcial_3 = $_POST["calificacion_parcial_3"];

            // Se verifica si ya existen calificaciones
            $query_existencia_calificaciones = "SELECT COUNT(*) AS num_filas FROM calificaciones WHERE matricula_alumno = $alumno_id AND id_materia = $materia_id";
            $conexion->sentencia = $query_existencia_calificaciones;
            $resultado_existencia_calificaciones = $conexion->obtener_sentencia();
            $fila_existencia_calificaciones = $resultado_existencia_calificaciones->fetch_assoc();
            $num_filas = $fila_existencia_calificaciones['num_filas'];

            if ($num_filas == 0) {
                // Si no existen calificaciones para este alumno y esta materia, se insertan las calificaciones nuevas
                $query_insert_calificaciones = "INSERT INTO calificaciones (parcial_uno, parcial_dos, parcial_tres, matricula_alumno, id_materia) VALUES ($calificacion_parcial_1, $calificacion_parcial_2, $calificacion_parcial_3, $alumno_id, $materia_id)";
                $conexion->sentencia = $query_insert_calificaciones;
                $conexion->ejecutar_sentencia();
            } else {
                // Si ya existen calificaciones para este alumno y esta materia, se actualizan las calificaciones existentes
                $query_update_calificaciones = "UPDATE calificaciones SET parcial_uno = $calificacion_parcial_1, parcial_dos = $calificacion_parcial_2, parcial_tres = $calificacion_parcial_3 WHERE matricula_alumno = $alumno_id AND id_materia = $materia_id";
                $conexion->sentencia = $query_update_calificaciones;
                $conexion->ejecutar_sentencia();
            }

            echo "¡Las calificaciones parciales se han guardado correctamente!";
        } else {
            echo "sin guardar";
        }
    

                                
                            }
                    ?>
</div>
</body>
</html>

