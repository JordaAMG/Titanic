<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <tie></title>
    <link rel="stylesheet" type="text/css" href="Listar_Alumnos_Profesor.css">
</head>
<body>
    <div id="total">
    <div id="Prinsipal">

        <div id="Color_arriba0"></div>
        <div id="Color_arriba1"></div>

        <header id="cabeza">
            <article id="Info_usuario">
                <input id="Imagen0" type="image" src="icon_usuario.PNG" alt="Enviar" width="60px" height="60px">
                <a href=""></a>
                <div id="Info_usuario1">
                    <p>Nombre del Profesor:</p>
                    <p>Numero de cuenta:</p>
               </div>
            </article>

            <article id="Info_ListAlumn">
                <div>
                    Listar Faltas de Asistencia:
                </div>
            </article>

            <article id="cerrar_secion0">
                <a href="?opc=cerrar_secion"> Cerrar Secion</a>
                <input id="Imagen0" type="image" src="Icon_salir.PNG" alt="Enviar" width="30px" height="30px">
            </article>
        </header>

        <section>
            <article id="Acciones">
                <div id="Tabla0">
                    <header id="Titulo_Tabla">
                        <p>Faltas:</p>
                    </header>

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
                </div>
            </article>
        </section>    

        <footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>

    </div>
    </div>  
</body>
</html>