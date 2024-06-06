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
        <h1 id="t">Bienvenido al Apartado de Listar Profesores</h1>
    </div>
    <div id="caja2">
    <?php
        require_once("Contacto.php");
        $obj = new Contacto();
        $Matricula_Alumno = $_COOKIE['matricula'];
        $Grupo_Alumno = $_COOKIE['Grupo'];

        $resultado = $obj->Listar_Profesores($Matricula_Alumno);
        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Profesor</th><th>Asignatura</th></tr>";
            
            while ($registro = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $registro["nombre_completo"] . "</td>";
                echo "<td>" . $registro["nombre"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron profesores para este alumno.";
        }
    ?>

    </div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>
