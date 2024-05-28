<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Alumno</title>
    <link rel="stylesheet" type="text/css" href="css/Agregar_alumno.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <h1>Agregar Alumno</h1>
        <form action="" method="post">
             <!--esto del label es solo para agregar un comentario al usuario de lo que esta pidiendo-->
            <label for="matricula_alumno">Ingrese la matricula del alumno:</label>
            <input type="number" id="matricula_alumno" name="matricula_alumno" min="1" required><br>
            <label for="nombre_completo">Ingrese el nombre completo del alumno:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" required><br>
            <label for="correo">Ingrese el correo del alumno:</label>
            <input type="email" id="correo" name="correo" required><br>
            <label for="contraseña">Ingrese la contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required><br>

            <input type="submit" name="agregar_alumno" value="Agregar Alumno">
        </form>
    </div>

<?php
if (isset($_REQUEST['agregar_alumno'])) { 
    $matricula_alumno = $_REQUEST['matricula_alumno'];
    $contraseña = $_REQUEST['contraseña'];
    $nombre_completo = $_REQUEST['nombre_completo'];
    $correo = $_REQUEST['correo'];

    require_once 'contacto.php';

    $obj = new Contacto();
    
    // Primero agregar el correo a la tabla login
    $obj->agregar_correo_a_login($correo, $contraseña);

    // Luego agregar el alumno a la tabla alumnos
    $obj->agregar_alumno($matricula_alumno, $contraseña, $nombre_completo, $correo);
    
    echo "Alumno agregado";
}
?>
</body>
</html>
