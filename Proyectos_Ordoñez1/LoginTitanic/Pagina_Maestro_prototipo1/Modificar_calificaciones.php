<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Calificaciones</title>
    <link rel="stylesheet" type="text/css" href="css/Modificar_calificaciones.css">
</head>
<body>
    <div id="total">
        <h1 id="Titulo_Principal">Modificar Calificaciones</h1>
        <div id="Prinsipal">

            <div id="Color_arriba0"></div>
            <div id="Color_arriba1"></div>

            <header id="cabeza">
                <article id="Info_usuario">
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
                        Modificar Calificaciones:
                    </div>
                </article>
            </header>

            <section>
                <article id="Acciones">
                    <div id="Tabla0">
                        <header id="Titulo_Tabla">
                            <p>Calificaciones:</p>
                        </header>

                        <section>
                            <?php
                            require_once("Contacto.php");

                            $obj = new contacto();
                            $matricula_profesor = $_COOKIE['matricula']; 

                            $resultado = $obj->consultar_Materias($matricula_profesor);

                            if ($resultado->num_rows > 0) {
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo '<a href="?opc1=' . $fila["id_materia"] . '">' . $fila["nombre"] . '</a>';
                                    echo '<br>';
                                }
                            } else {
                                echo "El profesor no imparte ninguna materia.";
                            }

                            if (isset($_REQUEST["opc1"])) {
                                $Materia_Elegida = $_REQUEST["opc1"];
                                $resultado = $obj->consultar_Grupos($matricula_profesor, $Materia_Elegida);
                                if ($resultado->num_rows > 0) {
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
                                        echo '<a href="?matricula_alumno=' . $alumno["matricula_alumno"] . '">' . $alumno["nombre_completo"] . '</a>';
                                        echo '<br>';
                                    }
                                } else {
                                    echo "El grupo no tiene alumnos";
                                }
                            }

                            if (isset($_REQUEST["matricula_alumno"])) {
                                $matricula_alumno = $_REQUEST["matricula_alumno"];
                                ?>

                                <legend>Modificación Calificaciones</legend>
                                <form action="" method="post">
                                    <label for="parcial_uno">Calificación Parcial 1:</label>
                                    <input type="number" name="parcial_uno" id="parcial_uno" step="0.1" min="0" max="10" required><br>
                                    <label for="parcial_dos">Calificación Parcial 2:</label>
                                    <input type="number" name="parcial_dos" id="parcial_dos" step="0.1" min="0" max="10" required><br>
                                    <label for="parcial_tres">Calificación Parcial 3:</label>
                                    <input type="number" name="parcial_tres" id="parcial_tres" step="0.1" min="0" max="10" required><br>

                                    <input type="hidden" name="Materia_Elegida" value="<?php echo $Materia_Elegida; ?>">
                                    <input type="hidden" name="id_calificacion_parcial" value="<?php echo $id_calificacion_parcial; ?>">
                                    <input type="submit" name="Guardar" value="Guardar Calificaciones">
                                </form>
                                <?php
                            }

                            if (isset($_REQUEST["Guardar"])) {
                                $parcial_uno = $_REQUEST['parcial_uno'];
                                $parcial_dos = $_REQUEST['parcial_dos'];
                                $parcial_tres = $_REQUEST['parcial_tres'];
                                $matricula_alumno = $_REQUEST['matricula_alumno'];
                                $Materia_Elegida = $_REQUEST['Materia_Elegida'];
                                $id_calificacion_parcial = $_REQUEST['id_calificacion_parcial'];

                                if ($parcial_uno !== null && $parcial_dos !== null && $parcial_tres !== null && $id_calificacion_parcial !== null && $matricula_alumno !== null && $Materia_Elegida !== null) {

                                    $conexion = new Conexion();

                                    $query_update_calificaciones = 
                                    "UPDATE calificaciones 
                                    SET parcial_uno = $parcial_uno, parcial_dos = $parcial_dos, parcial_tres = $parcial_tres 
                                    WHERE matricula_alumno = $matricula_alumno 
                                    AND id_materia = $Materia_Elegida
                                    AND id_calificacion_parcial= '$id_calificacion_parcial'";
                                    $conexion->sentencia = $query_update_calificaciones;
                                    $conexion->ejecutar_sentencia(); 

                                    echo "Calificación Modificada";
                                } else {
                                    echo "Todos los campos son obligatorios.";
                                }
                            }
                            ?>
                        </section>
                    </div>
                </article>
            </section>    

            <footer id="Pie_Pagina"> 
                <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> 
            </footer>
        </div>

        <article id="volver">
            <a href="../Pagina_Maestro_prototipo1/Profesor_1.php"> Volver</a>
        </article>
    </div>  
</body>
</html>