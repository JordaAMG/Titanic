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
        <h1 id="t">Bienvenido al Apartado de Mostrar Horarios</h1>
    </div>
    <div id="caja2">
    <?php
require_once("Contacto.php");

$obj = new Contacto();
$resultado= $obj->consultar_horario_por_matricula();

echo "<table>";
echo "<tr>
<th>Día</th>
<th>Hora de Inicio</th>
<th>Hora de Finalización</th>
<th>Materia</th>
</tr>";

while($registro = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$registro["dia"]."</td>";
    echo "<td>".$registro["inicio"]."</td>";
    echo "<td>".$registro["fin"]."</td>";
    echo "<td>".$registro["materia"]."</td>";
    echo "</tr>";
}

echo "</table>";
?>
