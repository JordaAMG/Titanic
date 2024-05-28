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
      	$Matricula_Alumno = 1;

        $resultado = $obj->Consultar_Calificaciones($Matricula_Alumno);
        while ($registro = $resultado->fetch_assoc()) {
            echo "<option value='".$registro['id_calificacion_parcial']."'>".$registro["parcial_uno"].".".$registro["parcial_dos"].".".$registro["parcial_tres"]."</option>";
        }

    ?>
         
	</div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>