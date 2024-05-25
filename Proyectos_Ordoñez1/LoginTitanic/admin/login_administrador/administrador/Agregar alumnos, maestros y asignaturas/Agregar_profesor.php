<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar profesor</title>
</head>
<body>
    <fieldset>
    <legend>Agregar profesor</legend>

    <form action="" method="post">
        Ingrese la matricula del profesor  <input type="number" name="matricula_profesor"><br>
        Ingrese el nombre compelto del profesor: <input type="text" name="nombre_completo"><br>
        Ingrese el correo del profesor<input type="text" name="correo"><br>
        Ingrese la contraseña<input type="text" name="contraseña"><br>

        <input type="submit" name="agregar_profesor" value="Agregar profesor">
    </form>
            

<?php
    if(isset($_REQUEST['agregar_profesor'])){ 
       $matricula_profesor = $_REQUEST['matricula_profesor'];
        $nombre_completo = $_REQUEST['nombre_completo'];
        $correo = $_REQUEST['correo'];
        $contraseña= $_REQUEST['contraseña'];

        require_once 'contacto.php';

        $obj = new Contacto();

        // Primero agregar el correo a la tabla login
        $obj->agregar_correo_a_login($correo, $contraseña);

        // Luego agregar el profesor a la tabla profesores
       
        $obj->agregar_profesor($matricula_profesor, $contraseña,$nombre_completo, $correo);
        echo "Profesor agregado";


    }

?>

    </fieldset>

</body>
</html>