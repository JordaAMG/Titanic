<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Asignatura</title>
</head>
<body>
    <fieldset>
    <legend>Agregar Asignatura</legend>

    <form action="" method="post">
        Ingrese id de la asignatura: <input type="number" name="id_materia" min="1" required><br>
        Ingrese el nombre de la asignatura: <input type="text" name="nombre" required><br>
        Ingrese la matricual del profesor que da la asignatura: <input type="text" name="matricula_profesor" required><br>

        <input type="submit" name="agregar_asignatura" value="Agregar Asignatura">
    </form>

<?php
if (isset($_REQUEST['agregar_asignatura'])) { 
    $id_materia = $_REQUEST['id_materia'];
    $nombre = $_REQUEST['nombre'];
    $matricula_profesor = $_REQUEST['matricula_profesor'];

    require_once 'contacto.php';

    $obj = new Contacto();

    // llamamos al metodo para agregar el la asignatura a la tabla asignatura
    $obj->agregar_asignatura($id_materia, $nombre, $matricula_profesor);
    
    echo "Asignatrua agregada";
}
?>
    </fieldset>
</body>
</html>