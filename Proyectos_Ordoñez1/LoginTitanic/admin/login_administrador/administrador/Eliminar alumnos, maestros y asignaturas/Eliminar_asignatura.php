<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Asignatura</title>
</head>
<body>
    <fieldset>
        <legend>Eliminar Asignatura</legend>
        <form action="" method="post">
            Asignatura a eliminar:

            <select name="ideliminar">
                <?php
                require_once 'contacto.php';
                $obj = new Contacto();
                if (isset($_POST['eliminar']) && isset($_POST['ideliminar'])) {
                    $obj->eliminar_asignatura($_POST['ideliminar']);
                }

                // Obtener los datos de los alumnos
                $resultado = $obj->consultar_asignaturas();
                
                while ($registro = $resultado->fetch_assoc()) {
                     //Esto de aqui va a cargar el id de la materia y el nombre para que el uadministrador seleccione cual quiere Eliminar
                    echo "<option value='" . $registro["id_materia"] . "'> " . $registro["id_materia"] . " - " . $registro["nombre"] . "</option>";
                }
                ?>
            </select>
            <input type="submit" name="eliminar" value="Eliminar">
        </form>

        <?php
        if (isset($_POST['eliminar'])) {
            
            echo "<br>Asignatura eliminada";
        }
        ?>
        
    </fieldset>
</body>
</html>