<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar Faltas de Asistencia</title>
    <link rel="stylesheet" type="text/css" href="css/Profesor_Listar_Faltas.css">
</head>
<body>
    <div id="total">
        <h1 id="Titulo_Principal">Listar Faltas de Asistencia</h1>
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
                    </div>
                </article>
            </header>

            <section>
                <article id="Acciones">
                    <div id="Tabla0">
                        <header id="Titulo_Tabla">
                            <p>Faltas:</p>
                        </header>

                        <section>
                        <?php
                            require_once("Contacto.php"); // Incluye el archivo Contacto.php que contiene la definición de la clase Contacto

                            $obj = new contacto(); // Crea una nueva instancia de la clase Contacto

                            $matricula_profesor = $_COOKIE['matricula']; // Define la matrícula del profesor a consultar 

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
                                        echo '<a href="?opc2=' . $fila["id_grupo"] . '">' . $fila["nombre_grupo"] . ' ' . $fila["semestre"] .'</a>';
                                        echo '<br>';
                                    }
                                } else {
                                    echo "La materia no tiene grupos";
                                }
                            }

                            if (isset($_REQUEST["opc2"])) {
                                $Grupo_Elegido = $_REQUEST["opc2"];
                                $resultado = $obj->Listar_Faltas($Grupo_Elegido);
                                if ($resultado->num_rows > 0) {
                                    // Mostrar las faltas
                                    echo "<table>";
                                    echo "<tr>";
                                    echo "<th>Nombre Completo</th>";
                                    echo "<th>Fecha</th>";
                                    echo "<th>Falta</th>";
                                    echo "</tr>";
                                    while ($fila = $resultado->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $fila["nombre_completo"] . "</td>";
                                        echo "<td>" . $fila["fecha"] . "</td>";
                                        echo "<td>" . ($fila["falta"] ? 'Sí' : 'No') . "</td>"; // 'falta' es un valor booleano
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "El grupo no tiene alumnos";
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