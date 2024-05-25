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
      $resultado= $obj->istarcalificaciones_padrealumno();
      
echo "<table>";
echo "<tr>
<th>Materia</th>
<th>Parcial 1</th>
<th>Parcial 2</th>
<th>Parcial 3</th>
</tr>";

while($registro = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$registro["nombre"]."</td>";
    echo "<td>".$registro["parcial_uno"]."</td>";
    echo "<td>".$registro["parcial_dos"]."</td>";
    echo "<td>".$registro["parcial_tres"]."</td>";
    echo "</tr>";
    ?>
         
	</div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>