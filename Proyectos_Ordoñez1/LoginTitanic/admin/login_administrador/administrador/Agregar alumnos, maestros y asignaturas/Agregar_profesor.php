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
             <!--esto del label es solo para agregar un comentario al usuario de lo que esta pidiendo-->
            <label for="matricula_profesor">Ingrese la matricula del profesor:</label>
            <input type="number" id="matricula_profesor" name="matricula_profesor" min="1" required><br>
            <label for="nombre_completo">Ingrese el nombre completo del profesor:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" required><br>
            <label for="correo">Ingrese el correo del profesor:</label>
            <input type="email" id="correo" name="correo" required><br>
            <label for="contraseña">Ingrese la contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required><br>

            <input type="submit" name="agregar_profesor" value="Agregar Profesor">
        </form>
    </div>

    <?php
    if (isset($_REQUEST['agregar_profesor'])) { 
        $matricula_profesor = $_REQUEST['matricula_profesor'];
        $nombre_completo = $_REQUEST['nombre_completo'];
        $correo = $_REQUEST['correo'];
        $contraseña = $_REQUEST['contraseña'];

        require_once 'contacto.php';

        $obj = new Contacto();

        // Primero agregar el correo a la tabla login
        $obj->agregar_correo_a_login($correo, $contraseña);

        // Luego agregar el profesor a la tabla profesores
        $obj->agregar_profesor($matricula_profesor, $contraseña, $nombre_completo, $correo);

        echo "Profesor agregado";
    }
    ?>
</body>
</html>
</html>