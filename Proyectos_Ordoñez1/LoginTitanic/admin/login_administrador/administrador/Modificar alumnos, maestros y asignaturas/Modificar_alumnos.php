<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" type="text/css" href="css/Modificar_alumno.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <fieldset>
            <legend>Modificar Alumno</legend>
            <form action="" method="post">
                Alumno a modificar:
                <select name="idmodificar" required>
                    <option value="">Seleccione un alumno</option>
                    <?php
                    require_once 'contacto.php';
                    $obj = new Contacto();
                    $resultado = $obj->consultar_alumnos();
                    if ($resultado) {
                        while ($registro = $resultado->fetch_assoc()) {
                            $selected = (isset($_POST['idmodificar']) && $_POST['idmodificar'] == $registro['matricula_alumno']) ? 'selected' : '';
                            echo "<option value='" . $registro["matricula_alumno"] . "' $selected> " . $registro["matricula_alumno"] . " - " . $registro["nombre_completo"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay registros de alumnos para modificar.</option>";
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
                        <input type="hidden" name="matricula_alumno" value="<?php echo $registro["matricula_alumno"]; ?>">
                        Nombre Completo: <input type="text" name="nombre_completo" value="<?php echo $registro["nombre_completo"]; ?>" required><br>
                        Correo del alumno: <input type="email" name="correo" value="<?php echo $registro["correo"]; ?>" required><br>
                        Contraseña: <input type="password" name="contraseña" value="<?php echo $registro["contraseña"]; ?>" required><br>
                        <input type="hidden" name="idmodificar" value="<?php echo $_POST["idmodificar"]; ?>">
                        <input type="submit" name="modificar" value="Modificar alumno">
                    </form>
            <?php
                } else {
                    echo "<p>No se encontraron datos para el alumno seleccionado.</p>";
                }
            }

            if (isset($_POST["modificar"])) {
                if (isset($_POST['matricula_alumno'], $_POST['nombre_completo'], $_POST['correo'], $_POST['contraseña'])) {
                    $matricula_alumno = $_POST['matricula_alumno'];
                    $nombre_completo = $_POST['nombre_completo'];
                    $correo = $_POST['correo'];
                    $contraseña = $_POST['contraseña'];

                    $obj = new Contacto();
                    $obj->modificar_alumno($matricula_alumno, $contraseña, $nombre_completo, $correo);
                    $obj->modificar_login($correo, $contraseña);

                    echo "<p>Datos del Alumno modificados</p>";
                } 
            }
            ?>
        </fieldset>
    </div>
</body>
</html>
