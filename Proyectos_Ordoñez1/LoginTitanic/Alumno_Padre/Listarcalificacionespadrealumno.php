<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>horarios</title>
	<link rel="stylesheet" type="text/css" href="principalhorario.css">
</head>
<body>
	<div id="caja">
		<h1 id="t">Bienvenido al Apartado de Mostrar Calificaciones</h1>
	</div>
	<div id="caja2">
    <?php
 		require_once("Contacto.php");
      	$obj= new Contacto();
      	$Matricula_Alumno = $_COOKIE['matricula'];

        $resultado = $obj->consultar_Materias($Matricula_Alumno); // Llama al método consultar_Materias de la clase Contacto
    	if ($resultado->num_rows > 0) {
        	while ($fila = $resultado->fetch_assoc()) {
           		echo '<a href="?opc1=' . $fila["id_materia"] . '">' . $fila["nombre"] . '</a><br>';
        	}
    	} else {
        	echo "El alumno no esta matriculado en ninguna materia.";
    	}

    	if (isset($_REQUEST["opc1"])) {
        	$Materia_Elegida = $_REQUEST["opc1"];
        	$resultado = $obj->Consultar_Calificaciones($Matricula_Alumno);
                while ($registro = $resultado->fetch_assoc()) {
                    echo "<option value='".$registro['id_calificacion_parcial']."'>".
                    'Parcial I: '.
                    $registro["parcial_uno"].".".
                    '  '.'Parcial II: '.
                    $registro["parcial_dos"].".".
                    '  '.'Parcial III: '.
                    $registro["parcial_tres"]."</option>";
                }
    	}

    ?>
         
	</div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>