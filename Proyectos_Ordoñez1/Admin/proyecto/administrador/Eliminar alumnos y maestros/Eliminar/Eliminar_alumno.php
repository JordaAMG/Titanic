<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Alumno</title>
</head>
<body>
    <fieldset>
        <legend>Eliminar Alumno</legend>
        <form action="" method="post">
            Alumno a eliminar:

            <select name="ideliminar">
                <?php
                require_once '../../../contacto.php';
                $obj = new Contacto();
                if (isset($_POST['eliminar']) && isset($_POST['ideliminar'])) {
                    $obj->eliminar_alumno($_POST['ideliminar']);
                }

                // Obtener los datos de los alumnos
                $resultado = $obj->consultar_alumnos();
                
                while ($registro = $resultado->fetch_assoc()) {
                     //Esto de aqui va a cargar la matricula del alumno y el nombre para que el uadministrador seleccione cual quiere Eliminar
                    echo "<option value='" . $registro["matricula_alumno"] . "'> " . $registro["matricula_alumno"] . " - " . $registro["nombre_completo"] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="eliminar" value="Eliminar">
        </form>

        <?php
        if (isset($_POST['eliminar'])) {
            echo "<br>Alumno eliminado";
        }
        ?>
    </fieldset>
</body>
</html>