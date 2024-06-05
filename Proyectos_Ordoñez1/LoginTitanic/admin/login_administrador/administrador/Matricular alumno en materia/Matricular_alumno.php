<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular Alumno en Asignatura</title>
    <link rel="stylesheet" href="Matricular_alumno.css">
</head>
<body>
    <a href="../../../login_administrador/interfaz_administrador.php" class="button">Volver</a>
    <div class="container">
        <h1>Matricular Alumno en Asignatura</h1>
        <form action="matricular_alumno.php" method="POST">

            <label for="alumno">Seleccionar Alumno:</label>
            <select name="alumno" id="alumno" required>
                <option value="">Seleccione un alumno</option>
                <?php
                require_once 'contacto.php';
                $obj = new Contacto();
                $resultado = $obj->consultar_alumnos();
                while ($registro = $resultado->fetch_assoc()) {
                    echo "<option value='" . $registro["matricula_alumno"] . "'> " . $registro["matricula_alumno"] . " - " . $registro["nombre_completo"] . "</option>";
                }
                ?>
            </select>

            <br><br><label for="materia">Seleccionar Materia:</label>
            <select name="materia" id="materia" required>
                <option value="">Seleccione una materia</option>
                <?php
                $resultado = $obj->consultar_materias();
                while ($registro = $resultado->fetch_assoc()) {
                    echo "<option value='" . $registro["id_materia"] . "'> " . $registro["id_materia"] . " - " . $registro["nombre"] . "</option>";
                }
                ?>
            </select>
            
            <br><br>
            <input type="submit" name="matricular_alumno" value="Matricular Alumno">
        </form>

        <?php
        if (isset($_POST['matricular_alumno'])) {
            $matricula_alumno = $_POST['alumno'];
            $id_materia = $_POST['materia'];
            $mensaje = $obj->matricular_alumno($matricula_alumno, $id_materia);
            echo "<p>$mensaje</p>";
        }
        ?>
    </div>
</body>
</html>