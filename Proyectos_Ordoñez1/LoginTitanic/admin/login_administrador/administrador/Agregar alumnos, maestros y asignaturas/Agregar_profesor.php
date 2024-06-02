<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Profesor</title>
    <link rel="stylesheet" type="text/css" href="css/Agregar_profesor.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <h1>Agregar Profesor</h1>
        <form action="" method="post">
            Ingrese la matricula del profesor:
            <input type="number" id="matricula_profesor" name="matricula_profesor" min="1" required><br>
            Ingrese el nombre completo del profesor:
            <input type="text" id="nombre_completo" name="nombre_completo" required><br>
            Ingrese el correo del profesor:
            <input type="email" id="correo" name="correo" required><br>
            Ingrese la contraseña:
            <input type="password" id="contraseña" name="contraseña" required><br>

            Seleccione el grupo:
            <select id="id_grupo" name="id_grupo" required>
                <option value="">Seleccione un grupo</option>
                <?php
                require_once 'contacto.php';
                $obj = new Contacto();
                $result = $obj->consultar_grupos();
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id_grupo']."'>".$row['nombre_grupo']."</option>";
                }
                ?>
            </select><br>

            <input type="submit" name="agregar_profesor" value="Agregar Profesor">
        </form>
    </div>

    <?php
    if (isset($_REQUEST['agregar_profesor'])) { 
        $matricula_profesor = $_REQUEST['matricula_profesor'];
        $nombre_completo = $_REQUEST['nombre_completo'];
        $correo = $_REQUEST['correo'];
        $contraseña = $_REQUEST['contraseña'];
        $id_grupo = $_REQUEST['id_grupo'];

        require_once 'contacto.php';

        $obj = new Contacto();

        // Primero agregar el correo a la tabla login
        $obj->agregar_correo_a_login($correo, $contraseña);

        // Luego agregar el profesor a la tabla profesores
        $obj->agregar_profesor($matricula_profesor, $contraseña, $nombre_completo, $correo);

        // Luego agregar la relación profesor-grupo a la tabla profesores_grupos
        $obj->agregar_profesor_grupo($matricula_profesor, $id_grupo);

        echo "Profesor agregado y asignado al grupo";
    }
    ?>
</body>
</html>
