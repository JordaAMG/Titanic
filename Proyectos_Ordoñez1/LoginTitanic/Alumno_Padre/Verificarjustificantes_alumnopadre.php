<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>horarios</title>
	<link rel="stylesheet" type="text/css" href="Verificarjustificantes_alumnopadre.css">
</head>
<body>
	<div id="caja">
		<h1 id="t">Bienvenido al Apartado de Verificar Justificantes</h1>
	</div>
	<div id="caja2">
    <?php
 require_once("Contacto.php");
      $obj= new Contacto();
      $resultado= $obj->obtenerjustificantes_padrealumno();
      
      while($registro=$resultado->fetch_assoc()){

      	echo "<table>";
            echo"<tr>";
                echo "<th>Nombre Completo</th>";
                echo "<th>Estado del Justificante</th>";
            echo "</tr>";
            echo"<tr>";

echo "<td>".$registro["nombre_completo"]."</td>";


                echo "<td>".$registro["nombre_completo"]."</td>";
                echo "<td>". $registro["justificante"]. "Aceptado" : "Rechazado"; "/td>"
            echo "</tr>"
        echo "</table>"
      }
    ?>
         
	</div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>






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
        <h1 id="t">Bienvenido al Apartado de Verificar Justificantes</h1>
    </div>
    <div id="caja2">
        <?php
        require_once("Contacto.php");
        $obj= new Contacto();
        $resultado= $obj->obtenerjustificantes_padrealumno();
        
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre Completo</th>";
        echo "<th>Estado del Justificante</th>";
        echo "</tr>";
        
        while($registro=$resultado->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$registro["nombre_completo"]."</td>";
            echo "<td>". $registro["justificante"] ? "Aceptado" : "Rechazado" . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        ?>
    </div>
    <footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com Celular: 312-345-4321</p> </footer>
</body>
</html>