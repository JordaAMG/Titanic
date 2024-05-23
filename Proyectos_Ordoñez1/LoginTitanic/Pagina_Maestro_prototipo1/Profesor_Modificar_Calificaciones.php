<!DOCTYPE html>
<html>
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
                    Modificar Calificaciones:
                </div>
            </article>

            <article id="cerrar_secion0">
                <a href="?opc=cerrar_secion"> <li>Cerrar Secion</li> </a>
                <input id="Imagen0" type="image" src="Icon_salir.PNG" alt="Enviar" width="30px" height="30px">
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
                                    // Mostrar las materias
                                    while ($alumno = $resultado->fetch_assoc()) {
                                        echo '<a href="?opc3=' . $alumno["matricula_alumno"] . '">' . $alumno["nombre_completo"] . '</a>';
                                        echo '<br>';
                                    }
                                } else {
                                    echo "El grupo no tiene alumnos";
                                }
                        }

                        if (isset($_REQUEST["opc3"])) {
                            $matricula_alumno = $_REQUEST["opc3"];
                            ?>
                            <form action="" method="post" >
                            <select name="idmodificar">
                            <?php
                                require_once("Contacto.php");
                                $obj = new contacto();
                                $resultado = $obj->Consultar_Calificaciones($matricula_alumno);
                                while ($registro = $resultado->fetch_assoc()) {
                                    echo "<option value='".$registro['id_calificacion_parcial']."'>".$registro["parcial_uno"].".".$registro["parcial_dos"].".".$registro["parcial_tres"]."</option>";
                                }
                            ?>
                            </select>
                            <input type="submit" name="cargar" value="Cargar Datos">
                            </form>

                            <?php
                                if (isset($_REQUEST["cargar"])) {
                                require_once("Contacto.php");
                                $obj = new contacto();
                                $resultado = $obj->Consultar_Calificaciones($_REQUEST["idmodificar"]);
                                while ($registro=$resultado->fetch_assoc()) {
                            ?>

                            <form action="" method="post">
                                <div class="parcial">
                                    <label for="parcial_uno">Calificación Parcial 1:</label>
                                    <input type="number" name="parcial_uno" value="<?php echo isset($registro["parcial_uno"]) ? $registro["parcial_uno"] : ''; ?>" id="parcial_uno" step="0.1" min="0" max="10" required>
                                </div>
                                <div class="parcial">
                                    <label for="parcial_dos">Calificación Parcial 2:</label>
                                    <input type="number" name="parcial_dos" value="<?php echo isset($registro["parcial_dos"]) ? $registro["parcial_dos"] : ''; ?>" id="parcial_dos" step="0.1" min="0" max="10" required>
                                </div>
                                <div class="parcial">
                                    <label for="parcial_tres">Calificación Parcial 3:</label>
                                    <input type="number" name="parcial_tres" value="<?php echo isset($registro["parcial_tres"]) ? $registro["parcial_tres"] : ''; ?>" id="parcial_tres" step="0.1" min="0" max="10" required>

                                </div>

                                <input type="hidden" name="id_calificacion_parcial" value="<?php echo $id_calificacion_parcial; ?>">
                                <input type="submit" name="Guardar" value="Guardar Calificaciones">
                            </form>
                            <?php
                        }
                        ?>

                        <?php
                        }
                        }

                        if (isset($_REQUEST["Guardar"])) {
                            $parcial_uno = $_REQUEST['parcial_uno'];
                            $parcial_dos = $_REQUEST['parcial_dos'];
                            $parcial_tres = $_REQUEST['parcial_tres'];
                            $id_calificacion_parcial = $_REQUEST['id_calificacion_parcial'];

                            if ($parcial_uno !== null && $parcial_dos !== null && $parcial_tres !== null && $id_calificacion_parcial !== null) {
                                require_once("Contacto.php");
                                $obj = new contacto();
                                $obj->Modificar_Calificaciones($parcial_uno, $parcial_dos, $parcial_tres, $id_calificacion_parcial);
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

        <footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>


    </div>
    </div>  
</body>
</html>