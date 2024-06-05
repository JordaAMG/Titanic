<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Asignatura</title>
    <link rel="stylesheet" type="text/css" href="css/Eliminar_asignatura.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <fieldset>
            <legend>Eliminar Asignatura</legend>
            <form action="" method="post">
                Asignatura a eliminar:
                <select name="ideliminar" required>
                    <option value="">Seleccione una asignatura</option>
                    <?php
                    require_once 'contacto.php';
                    $obj = new Contacto();

                    // Obtener los datos de las asignaturas
                    $resultado = $obj->consultar_asignaturas();
                    
                    while ($registro = $resultado->fetch_assoc()) {
                         // Esto de aquí va a cargar el id de la materia y el nombre para que el administrador seleccione cuál quiere eliminar
                        echo "<option value='" . $registro["id_materia"] . "'> " . $registro["id_materia"] . " - " . $registro["nombre"] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="eliminar" value="Eliminar">
            </form>

            <?php
            if (isset($_POST['eliminar']) && isset($_POST['ideliminar'])) {
                $obj->eliminar_asignatura($_POST['ideliminar']);
                echo "<p class='eliminada'>Asignatura eliminada</p>";

                // Esto es para recargar la página y actualizar la lista de las materias a eliminar
                header("Location: Eliminar_asignatura.php");
                exit();
            }
            ?>
        </fieldset>
    </div>
</body>
</html>