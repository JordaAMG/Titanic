<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Asignatura</title>
    <link rel="stylesheet" type="text/css" href="css/Agregar_asignatura.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <h1>Agregar Asignatura</h1>
        <form action="" method="post">
            
            Ingrese id de la asignatura:
            <input type="number" id="id_materia" name="id_materia" min="1" required><br>

            Ingrese el nombre de la asignatura:
            <input type="text" id="nombre" name="nombre" required><br>

            Ingrese la matrícula del profesor que da la asignatura:
            <input type="text" id="matricula_profesor" name="matricula_profesor" required><br>

            <input type="submit" name="agregar_asignatura" value="Agregar Asignatura">
        </form>
    </div>

    <?php
    if (isset($_REQUEST['agregar_asignatura'])) { 
        $id_materia = $_REQUEST['id_materia'];
        $nombre = $_REQUEST['nombre'];
        $matricula_profesor = $_REQUEST['matricula_profesor'];

        require_once 'contacto.php';

        $obj = new Contacto();

        // llamamos al método para agregar la asignatura a la tabla asignatura
        $obj->agregar_asignatura($id_materia, $nombre, $matricula_profesor);
        
        echo "Asignatura agregada";
    }
    ?>
</body>
</html>