<form action="" method="post">
    Alumno a modificar:
    <select name="idmodificar">
        <?php
        require_once 'contacto.php';
        $obj = new Contacto();
        $resultado = $obj->consultar_alumnos();
        if ($resultado) {
            while ($registro = $resultado->fetch_assoc()) {
                $selected = (isset($_POST['idmodificar']) && $_POST['idmodificar'] == $registro['matricula_alumno']) ? 'selected' : '';
                // Mostrar la matrícula y el nombre completo del alumno en el select
                echo "<option value='" . $registro["matricula_alumno"] . "' $selected> " . $registro["matricula_alumno"] . " - " . $registro["nombre_completo"] . "</option>";
            }
        } else {
            echo "No hay registros de alumnos para modificar.";
        }
        ?>
    </select>
    <input type="submit" name="cargar" value="Cargar Datos del alumno">
</form>

<?php

if (isset($_POST["cargar"]) && isset($_POST["idmodificar"])) {
    $obj = new Contacto();
    $resultado = $obj->consultar_alumnos($_POST["idmodificar"]);
    if ($registro = $resultado->fetch_assoc()) {
?>
        <form action="" method="post">
            <!-- Campo oculto para matricula_alumno -->
            <input type="hidden" name="matricula_alumno" value="<?php echo $registro["matricula_alumno"]; ?>">
            Nombre Completo: <input type="text" name="nombre_completo" value="<?php echo $registro["nombre_completo"]; ?>"><br>
            Correo del alumno: <input type="text" name="correo" value="<?php echo $registro["correo"]; ?>"><br>
            Contraseña: <input type="text" name="contraseña" value="<?php echo $registro["contraseña"]; ?>"><br>

            <!-- Campo oculto para idmodificar -->
            <input type="hidden" name="idmodificar" value="<?php echo $_POST["idmodificar"]; ?>">
            <input type="submit" name="modificar" value="Modificar alumno">
        </form>

<?php
    } else {
        echo "No se encontraron datos para el alumno seleccionado.";
    }
}

if (isset($_POST["modificar"])) {
    // Verificar que todos los campos estén llenos
    if (isset($_POST['matricula_alumno'], $_POST['nombre_completo'], $_POST['correo'], $_POST['contraseña'])) {
        $matricula_alumno = $_POST['matricula_alumno'];
        $nombre_completo = $_POST['nombre_completo'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $obj = new Contacto();
        $obj->modificar_alumno($matricula_alumno, $contraseña, $nombre_completo, $correo);
        $obj->modificar_login($correo, $contraseña);

        echo "Alumno y datos de login modificados";
    } else {
        echo "Faltan campos por llenar.";
    }
}

?>