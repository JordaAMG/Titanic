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

                    <!--<section id="Contenedor_Tabla">
    					<a href="?opc=Grupo_1" id="Botones">Grupo 1</a>
    					<a href="?opc=Grupo_2" id="Botones">Grupo 2</a>
    					<a href="?opc=Grupo_3" id="Botones">Grupo 3</a>
    				</section>-->
    			</div>
    		</article>
    	</section>    

    	<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>

    </div>
    </div>	
</body>
</html>