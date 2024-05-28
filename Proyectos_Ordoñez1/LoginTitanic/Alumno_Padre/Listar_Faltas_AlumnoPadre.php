<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profesores de un Alumno</title>
    <link rel="stylesheet" type="text/css" href="principalhorario.css">
</head>
<body>
    <div id="caja">
        <h1 id="t">Bienvenido al Apartado de Listar Calificaciones</h1>
    </div>
    <div id="caja2">
    <?php
        require_once("Contacto.php");
        $obj = new Contacto();
        $Matricula_Alumno = 1;

        $resultado = $obj->Listar_Faltas($Matricula_Alumno);
        if ($resultado->num_rows > 0) {
        // Mostrar las faltas
        echo "<table>";
        echo "<tr>";
        echo "<th>Nombre Completo</th>";
        echo "<th>Fecha</th>";
        echo "<th>Falta</th>";
        echo "</tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila["nombre_completo"] . "</td>";
            echo "<td>" . $fila["fecha"] . "</td>";
            echo "<td>" . ($fila["falta"] ? 'Sí' : 'No') . "</td>"; // 'falta' es un valor booleano
            echo "</tr>";
        }
            echo "</table>";
        }else {
            echo "El grupo no tiene alumnos";
        }
    ?>

    </div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>
