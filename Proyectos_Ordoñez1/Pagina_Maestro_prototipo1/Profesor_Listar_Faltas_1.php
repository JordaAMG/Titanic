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
                        <p>Materias:</p>
                    </header>

                    <section id="Contenedor_Tabla">
                        <a id="Botones" href="Profesor_Listar_Faltas_2.php">Materia 1</a><br><br><br>
                        <a id="Botones" href="Profesor_Listar_Faltas_2.php">Materia 2</a><br><br><br>
                        <a id="Botones" href="Profesor_Listar_Faltas_2.php">Materia 3</a><br><br><br>
                    </section>
                </div>
            </article>
        </section>    

        <footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>

        
        <!--?php
                        require_once("Contacto.php");
                        $obj = new contacto();
                        $resultado = $obj->consultar_id_maestro();
                        if ($resultado->num_rows > 0) {
                            // Mostrar las materias
                            while ($fila = $resultado->fetch_assoc()) {
                                echo '<a href="?opc=materia&id_materia=' . $fila["id_materia"] . 
                                '" id="Botones"><li>' . $fila["nombre"] . '</li></a>';
                            }
                        } else {
                            echo "El profesor no imparte ninguna materia.";
                        } 
                    ?>-->

    </div>
    </div>  
</body>
</html>