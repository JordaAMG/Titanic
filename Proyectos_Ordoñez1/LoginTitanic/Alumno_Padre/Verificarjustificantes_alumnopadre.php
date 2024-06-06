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
        $Matricula_Alumno = $_COOKIE['matricula'];

        $resultado = $obj->consultar_Materias($Matricula_Alumno); // Llama al método consultar_Materias de la clase Contacto
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo '<a href="?opc1=' . $fila["id_materia"] . '">' . $fila["nombre"] . '</a><br>';
            }
        } else {
            echo "El alumno no esta matriculado en ninguna materia.";
        }
        ?>

        <?php
if (isset($_REQUEST["opc1"])) {
    ?>
    <form action="" method="post" id="falta">
    <p>Fechas en las que a faltado</p>
    <select id="Lista_falta" name="Faltas_justificante" value="Fecha_Falta"> 
    <?php
    $Materia_Elegida = $_REQUEST["opc1"];
    $resultado = $obj->Listar_Faltas($Matricula_Alumno);
    if ($resultado->num_rows > 0) {
        echo "Fechas en las que a faltado";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<option value='" . $fila["fecha"] . "'>" . $fila["fecha"] . "</option>";
        }
        ?>
        <input type="submit" id="btn_faltas" value="Pedir justificante" name="Pedir justificante">
        <?php
    }
    if (isset($_REQUEST['Pedir justificante'])) {
        $Fecha_Justificante = $_REQUEST['Faltas_justificante'];
        $Fase_Justificante = 'Proceso';

        require_once("Contacto.php");
        $obj = new Contacto();
        $obj->Solicitud_JustificanteF1($Fecha_Justificante, $Fase_Justificante);

        $obj->verificar_Justificante($Fecha_Justificante);
        if($Fase_Justificante == 'Proceso'){
            echo "$Fase_Justificante";
        }else if($Fase_Justificante == 'Aceptado'){
            echo "$Fase_Justificante";
        }else if($Fase_Justificante == 'Rechazado'){
            echo "$Fase_Justificante";
        }

        
    }
}
?>

        </select>
    </form>

    

    </div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>