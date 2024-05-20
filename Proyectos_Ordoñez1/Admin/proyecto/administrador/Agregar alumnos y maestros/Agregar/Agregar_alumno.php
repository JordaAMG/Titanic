<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Alumno</title>
</head>
<body>
    <fieldset>
    <legend>Agregar Alumno</legend>

    <form action="" method="post">
        Ingrese la matricula del alumno: <input type="number" name="matricula_alumno" min="1" required><br>
        Ingrese el nombre completo del alumno: <input type="text" name="nombre_completo" required><br>
        Ingrese el correo del alumno: <input type="text" name="correo" required><br>
        Ingrese la contraseña: <input type="text" name="contraseña" required><br>
        Ingrese el número del semestre: <input type="number" name="id_semestre" min="1" max="6" required><br><br>

        <input type="submit" name="agregar_alumno" value="Agregar Alumno">
    </form>

<?php
if (isset($_REQUEST['agregar_alumno'])) { 
    $matricula_alumno = $_REQUEST['matricula_alumno'];
    $contraseña = $_REQUEST['contraseña'];
    $nombre_completo = $_REQUEST['nombre_completo'];
    $correo = $_REQUEST['correo'];
    $id_semestre = $_REQUEST['id_semestre'];

    require_once 'contacto.php';

    $obj = new Contacto();
    
    // Primero agregar el correo a la tabla login
    $obj->agregar_correo_a_login($correo, $contraseña);

    // Luego agregar el alumno a la tabla alumnos
    $obj->agregar_alumno($matricula_alumno, $contraseña, $nombre_completo, $correo, $id_semestre);
    
    echo "Alumno agregado";
}
?>
    </fieldset>
</body>
</html>