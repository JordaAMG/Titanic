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
            		Poner Faltas de Asistencia:
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
    					<p>Poner Faltas de Asistencia:</p>
    				</header>


                <!--legend>Elegir materia</legend>
                <form  method="post" action="">
                    Seleccione la materia:
                    <!-- Crear un select de las películas >
                    <select name="Materias" id="id_materia">
                    <!--?php
                        include("Contacto.php");
                        // Obtener la lista de faltas
                        $obj = new Contacto();
                        $matricula_profesor = 1001;
                        $resultado = $obj->consultar_Materias($matricula_profesor);

                        if ($resultado->num_rows > 0) {
                            // Iterar sobre las faltas y crear opciones en el select
                            while ($falta = $resultado->fetch_assoc()) {
                                echo "<option value='" . $falta['id_materia'] . "'>" . $falta['nombre'] . "</option>";
                            }
                        }else{
                            echo "<option value='-1'> No se encontro materias </option>";
                        }
                    ?>
                    </select>
                    
                    <input type="submit" value="ELiger">
                </form>


                <legend>Elegir Grupo</legend>
                <form  method="post" action="">
                    Seleccione la Grupo:
                    <!-- Crear un select de las grupos>
                    <select name="Semestre" id="id_semestre">
                    <!--?php
                        include("Contacto.php");
                        // Obtener la lista de faltas
                        $obj = new Contacto();
                        $matricula_profesor = 1001;
                        $resultado = $obj->consultar_Grupos($matricula_profesor);

                        if ($resultado->num_rows > 0) {
                            // Iterar sobre las faltas y crear opciones en el select
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<option value='" . $fila['id_semestre'] . "'>" . $fila['semestre'] . "</option>";
                            }
                        }else{
                            echo "<option value='-1'> No se encontro Grupos </option>";
                        }
                    ?>
                    </select>
                    
                    <input type="submit" value="ELiger">
                </form-->

                <?php
                    require_once("Contacto.php");
                       $obj = new contacto();
                       $matricula_profesor = 1010;
                       $resultado = $obj->Listar_Alumnos($matricula_profesor);
                       echo "<table>";
                       echo "<tr>";
                       echo "<th>nombre_completo</th>";
                       echo "</tr>";

                       while ($alumno = $resultado->fetch_assoc()) {
                          echo "<tr>";
                          echo '<a href="?opc=Grupo">' . $alumno["nombre_completo"] . '</a>';
                            echo '<br>';
                          echo "</tr>";
                        }
                ?>
            

            <fieldset>
            <legend>Alta Calificacion</legend>
            <form name="Formulario" method="post" action=""> 

                Fecha de falta: <input type="date" name="Fecha_Falta" value="">
                
                Falta: <select name="Falta">
                <option value="Asistencia">Asistencia, el alumno asistio</option>
                <option value="Falta">Falta, el alumno falto</option>

                Justificante: <select name="Justificante">
                <option value="Si">Si, el alumno tiene justificante</option>
                <option value="No">No, el alumno no tiene justificante</option>
    
                <input type="submit" name="Guardar" value="Guardar">
                <br><br>

            </form>
    
        <!--//////// Apartado de php //////-->
        <?php
            //Realizar acciones si se hace click en el boton 'Guardar'
            if(isset($_REQUEST['Guardar'])){
                

                include("Contacto.php");
                $obj = new Contacto();

                //Usaremos una condición para  validar que se haya brindado la información que requerimos
                if (empty($_POST['Fecha_Falta']) || empty($_POST['Falta']) || empty($_POST['Justificante'])) 
                {   
                    echo "<br>ERROR: Por favor eliga una opcion ";
                    echo "<br><br>";
                }
                else
                {
                    $V_Fecha_Fecha = $_REQUEST['Fecha_Falta'];
                    $Asistencia;
                    $Falta_de_Asistencia;
                    //Hacer diferentes condiciones para optener el Genero de la Pelicula
                    if($_REQUEST['Falta'] == 'Falta'){
                        $Falta_de_Asistencia = true;
                    }
                    else if($_REQUEST['Falta'] == 'Asistencia'){
                        $Asistencia = true;
                    }
                    $Justificante;
                    if($_REQUEST['Justificante'] == 'Si'){
                        $Falta_de_Asistencia = false;
                        $Asistencia = true;
                        $Justificante = $_REQUEST['Justificante'];
                    }
                    $Alumno_de_Falta = $_REQUEST["opc_alumno"];
                    $Materia_de_Falta = $_REQUEST["opc_materia"];

                    /*asistencia ,
    falta,
    justificante,
    matricula_alumno,
    id_materia,*/


                    $obj->Alta_Faltas($V_Fecha_Fecha, $Asistencia, $Falta_de_Asistencia, $Justificante, $Alumno_de_Falta, $Materia_de_Falta);

                    echo "<br> Registrado con exito <br><br>";

                }
                
            }
        
        ?>       
</fieldset>
                

    			</div>
    		</article>
    	</section>    

    	<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>


    </div>
    </div>	
</body>
</html>