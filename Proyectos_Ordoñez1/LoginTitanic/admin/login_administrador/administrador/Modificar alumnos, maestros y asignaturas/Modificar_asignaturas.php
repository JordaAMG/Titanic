<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Asignatura</title>
    <link rel="stylesheet" type="text/css" href="css/Modificar_asignatura.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <fieldset>
            <legend>Modificar Asignatura</legend>
            <form action="" method="post">
                Asignatura a modificar:
                <select name="idmodificar" required>
                    <option value="">Seleccione una asignatura</option>
                    <?php
                    require_once 'contacto.php';
                    $obj = new Contacto();
                    $resultado = $obj->consultar_asignaturas();
                    if ($resultado) {
                        while ($registro = $resultado->fetch_assoc()) {
                            $selected = (isset($_POST['idmodificar']) && $_POST['idmodificar'] == $registro['id_materia']) ? 'selected' : '';
                            echo "<option value='" . $registro["id_materia"] . "' $selected> " . $registro["id_materia"] . " - " . $registro["nombre"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay registros de materias para modificar.</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="cargar" value="Cargar Datos de la asignatura">
            </form>

            <?php
            if (isset($_POST["cargar"]) && isset($_POST["idmodificar"])) {
                $resultado = $obj->consultar_asignaturas($_POST["idmodificar"]);
                if ($registro = $resultado->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_materia" value="<?php echo $registro["id_materia"]; ?>">
                        Nombre de la materia: <input type="text" name="nombre" value="<?php echo $registro["nombre"]; ?>" required><br>
                        Matrícula del maestro que da la materia: <input type="text" name="matricula_profesor" value="<?php echo $registro["matricula_profesor"]; ?>" required><br>
                        <input type="hidden" name="idmodificar" value="<?php echo $_POST["idmodificar"]; ?>">
                        <input type="submit" name="modificar" value="Modificar asignatura">
                    </form>
            <?php
                } else {
                    echo "<p>No se encontraron datos para la asignatura seleccionada.</p>";
                }
            }

            if (isset($_POST["modificar"])) {
                if (isset($_POST['id_materia'], $_POST['nombre'], $_POST['matricula_profesor'])) {
                    $id_materia = $_POST['id_materia'];
                    $nombre = $_POST['nombre'];
                    $matricula_profesor = $_POST['matricula_profesor'];

                    if ($obj->modificar_asignatura($id_materia, $nombre, $matricula_profesor)) {
                        echo "<p>Asignatura modificada</p>";
                    } else {
                        echo "<p>No existe un profesor con esa matrícula.</p>";
                    }
                } else {
                    echo "<p>Faltan campos por llenar.</p>";
                }
            }
            ?>
        </fieldset>
    </div>
</body>
</html>
