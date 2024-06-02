<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Alumno</title>
    <link rel="stylesheet" type="text/css" href="css/Eliminar_alumno.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <fieldset>
            <legend>Eliminar Alumno</legend>
            <form action="" method="post">
                Alumno a eliminar:
                <select name="ideliminar" required>
                    <option value="">Seleccione un alumno</option>
                    <?php
                    require_once 'contacto.php';
                    $obj = new Contacto();
                    if (isset($_POST['eliminar']) && isset($_POST['ideliminar'])) {
                        $obj->eliminar_alumno($_POST['ideliminar']);
                    }

                    // Obtener los datos de los alumnos
                    $resultado = $obj->consultar_alumnos();
                    
                    while ($registro = $resultado->fetch_assoc()) {
                         // Esto de aquí va a cargar la matrícula del alumno y el nombre para que el administrador seleccione cuál quiere eliminar
                        echo "<option value='" . $registro["matricula_alumno"] . "'> " . $registro["matricula_alumno"] . " - " . $registro["nombre_completo"] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="eliminar" value="Eliminar">
            </form>

            <?php
            if (isset($_POST['eliminar'])) {
                echo "<p>Alumno eliminado</p>";
            }
            ?>
        </fieldset>
    </div>
</body>
</html>
