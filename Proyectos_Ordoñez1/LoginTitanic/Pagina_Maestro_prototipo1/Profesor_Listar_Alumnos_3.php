<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar Alumnos</title>
    <link rel="stylesheet" type="text/css" href="css/Profesor_Listar_Alumnos.css">
</head>
<body>
    <div id="total">
        <h1 id="Titulo_Principal">Listar Alumnos</h1>
        <div id="Prinsipal">

            <div id="Color_arriba0"></div>
            <div id="Color_arriba1"></div>

            <header id="cabeza">
                <article id="Info_usuario">
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
                            <p>Alumnos:</p>
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
                                        echo '<a href="?opc2=' . $fila["id_grupo"] . '">' . $fila["nombre_grupo"] . ' ' . $fila["semestre"] .'</a>';
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
                                    echo "<table>";
                                    echo "<tr>";
                                    echo "<th>nombre_completo</th>";
                                    echo "</tr>";
                                    while ($alumno = $resultado->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>".$alumno["nombre_completo"]."</td>";
                                        echo "</tr>";
                                    }
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
            <a href="../Pagina_Maestro_prototipo1/Profesor_1.php"> <li>Volver</li> </a>
        </article>
    </div>  
</body>
</html>