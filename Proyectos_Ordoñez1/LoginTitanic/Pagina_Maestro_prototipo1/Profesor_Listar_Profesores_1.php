<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/Profesor_Listar_Profesores.css">
</head>
<body>
    <div id="total">
        <h1 id="Titulo_Principal">Listar Profesores</h1>
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
                            <p>Profesores</p>
                        </header>

                        <section>
                        <?php
                            require_once("Contacto.php");
                                $obj = new contacto();
                                //$matricula_profesor = 1010;
                                $resultado = $obj->Listar_Profesores();
                                echo "<table>";
                                echo "<tr>";
                                echo "<th>nombre_completo</th>";
                                echo "</tr>";

                                while ($Profesor = $resultado->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$Profesor["nombre_completo"]."</td>";
                                    echo "</tr>";
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