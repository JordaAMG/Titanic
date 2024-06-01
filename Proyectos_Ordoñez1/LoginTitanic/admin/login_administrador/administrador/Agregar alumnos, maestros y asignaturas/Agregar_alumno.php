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
            Ingrese la matricula del alumno:
            <input type="number" id="matricula_alumno" name="matricula_alumno" min="1" required><br>
            Ingrese el nombre completo del alumno:
            <input type="text" id="nombre_completo" name="nombre_completo" required><br>
            Ingrese el correo del alumno:
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

            <input type="submit" name="agregar_alumno" value="Agregar Alumno">
        </form>
    </div>
</body>
</html>
