<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Profesor</title>
    <link rel="stylesheet" type="text/css" href="css/Eliminar_profesor.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <fieldset>
            <legend>Eliminar Profesor</legend>
            <form action="" method="post">
                Profesor a eliminar:
                <select name="ideliminar" required>
                    <option value="">Seleccione un profesor</option>
                    <?php
                    require_once 'contacto.php';
                    $obj = new Contacto();
                    if (isset($_POST['eliminar']) && isset($_POST['ideliminar'])) {
                        $obj->eliminar_profesor($_POST['ideliminar']);
                    }

                    // Obtener los datos de los profesores
                    $resultado = $obj->consultar_profesores();
                    
                    while ($registro = $resultado->fetch_assoc()) {
                         // Esto de aquí va a cargar la matrícula del profesor y el nombre para que el administrador seleccione cuál quiere eliminar
                        echo "<option value='" . $registro["matricula_profesor"] . "'> " . $registro["matricula_profesor"] . " - " . $registro["nombre_completo"] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="eliminar" value="Eliminar">
            </form>

            <?php
            if (isset($_POST['eliminar'])) {
                echo "<p>Profesor eliminado</p>";
            }
            ?>
        </fieldset>
    </div>
</body>
</html>