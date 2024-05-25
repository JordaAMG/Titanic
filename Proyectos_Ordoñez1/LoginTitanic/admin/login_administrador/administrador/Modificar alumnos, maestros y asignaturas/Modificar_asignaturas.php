<form action="" method="post">
    Asignatura a modificar:
    <select name="idmodificar">
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
            echo "No hay registros de materias para modificar.";
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
            <!-- Campo oculto para id_materia -->
            <input type="hidden" name="id_materia" value="<?php echo $registro["id_materia"]; ?>">
            Nombre de la materia: <input type="text" name="nombre" value="<?php echo $registro["nombre"]; ?>"><br>
            Matricula del maestro que da la materia: <input type="text" name="matricula_profesor" value="<?php echo $registro["matricula_profesor"]; ?>"><br>

            <!-- Campo oculto para idmodificar -->
            <input type="hidden" name="idmodificar" value="<?php echo $_POST["idmodificar"]; ?>">
            <input type="submit" name="modificar" value="Modificar asignatura">
        </form>
        <?php
    } else {
        echo "No se encontraron datos para la asignatura seleccionada.";
    }
}

if (isset($_POST["modificar"])) {
    if (isset($_POST['id_materia'], $_POST['nombre'], $_POST['matricula_profesor'])) {
        $id_materia = $_POST['id_materia'];
        $nombre = $_POST['nombre'];
        $matricula_profesor = $_POST['matricula_profesor'];

        if ($obj->modificar_asignatura($id_materia, $nombre, $matricula_profesor)) {
            echo "Asignatura modificada";
        } else {
            echo "No existe un profesor con esa matrícula.";
        }
    } else {
        echo "Faltan campos por llenar.";
    }
}
?>