<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Profesor</title>
    <link rel="stylesheet" type="text/css" href="css/Modificar_profesor.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <fieldset>
            <legend>Modificar Profesor</legend>
            <form action="" method="post">
                Profesor a modificar:
                <select name="idmodificar" required>
                    <option value="">Seleccione un profesor</option>
                    <?php
                    require_once 'contacto.php';
                    $obj = new Contacto();
                    $resultado = $obj->consultar_profesores();
                    if ($resultado) {
                        while ($registro = $resultado->fetch_assoc()) {
                            $selected = (isset($_POST['idmodificar']) && $_POST['idmodificar'] == $registro['matricula_profesor']) ? 'selected' : '';
                            echo "<option value='" . $registro["matricula_profesor"] . "' $selected> " . $registro["matricula_profesor"] . " - " . $registro["nombre_completo"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay registros de profesores para modificar.</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="cargar" value="Cargar Datos del profesor">
            </form>

            <?php
            if (isset($_POST["cargar"]) && isset($_POST["idmodificar"])) {
                $obj = new Contacto();
                $resultado = $obj->consultar_profesores($_POST["idmodificar"]);
                if ($registro = $resultado->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <input type="hidden" name="matricula_profesor" value="<?php echo $registro["matricula_profesor"]; ?>">
                        Nombre Completo: <input type="text" name="nombre_completo" value="<?php echo $registro["nombre_completo"]; ?>" required><br>
                        Correo del Profesor: <input type="email" name="correo" value="<?php echo $registro["correo"]; ?>" required><br>
                        Contraseña: <input type="password" name="contraseña" value="<?php echo $registro["contraseña"]; ?>" required><br>
                        <input type="hidden" name="idmodificar" value="<?php echo $_POST["idmodificar"]; ?>">
                        <input type="submit" name="modificar" value="Modificar profesor">
                    </form>
            <?php
                } else {
                    echo "<p>No se encontraron datos para el profesor seleccionado.</p>";
                }
            }

            if (isset($_POST["modificar"])) {
                if (isset($_POST['matricula_profesor'], $_POST['nombre_completo'], $_POST['correo'], $_POST['contraseña'])) {
                    $matricula_profesor = $_POST['matricula_profesor'];
                    $nombre_completo = $_POST['nombre_completo'];
                    $correo = $_POST['correo'];
                    $contraseña = $_POST['contraseña'];

                    $obj = new Contacto();
                    $obj->modificar_profesor($matricula_profesor, $contraseña, $nombre_completo, $correo);
                    $obj->modificar_login($correo, $contraseña);

                    echo "<p>Profesor y datos de login modificados</p>";
                } else {
                    echo "<p>Faltan campos por llenar.</p>";
                }
            }
            ?>
        </fieldset>
    </div>
</body>
</html>
