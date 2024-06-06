<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de Administrador</title>
    <link rel="stylesheet" href="interfaz_administrador.css">
</head>
<body>
    <div class="titulo">
        <h1>Administrador</h1>
        
        <div class="section">
            <h2 class="subtitulo">Alumnos</h2>
            <div class="button-group">
                <form action="controlador.php" method="post">
                    <input type="submit" name="agregar_alumno" value="Agregar alumno">
                </form>
                <form action="controlador.php" method="post">
                    <input type="submit" name="eliminar_alumno" value="Eliminar alumno">
                </form>
                <form action="controlador.php" method="post">
                    <input type="submit" name="modificar_alumno" value="Modificar alumno">
                </form>
                <form action="controlador.php" method="post">
                    <input type="submit" name="matricular_alumno" value="Matricular alumno en asignatura">
                </form>
            </div>
        </div>

        <div class="section">
            <h2 class="subtitulo">Profesores</h2>
            <div class="button-group">
                <form action="controlador.php" method="post">
                    <input type="submit" name="agregar_profesor" value="Agregar profesor">
                </form>
                <form action="controlador.php" method="post">
                    <input type="submit" name="eliminar_profesor" value="Eliminar profesor">
                </form>
                <form action="controlador.php" method="post">
                    <input type="submit" name="modificar_profesor" value="Modificar profesor">
                </form>
            </div>
        </div>

        <div class="section">
            <h2 class="subtitulo">Asignaturas</h2>
            <div class="button-group">
                <form action="controlador.php" method="post">
                    <input type="submit" name="agregar_asignatura" value="Agregar asignatura">
                </form>
                <form action="controlador.php" method="post">
                    <input type="submit" name="eliminar_asignatura" value="Eliminar asignatura">
                </form>
                <form action="controlador.php" method="post">
                    <input type="submit" name="modificar_asignatura" value="Modificar asignatura">
                </form>
            </div>
        </div>
    
        <div class="section">
            <h2 class="subtitulo">Justificantes</h2>
            <div class="button-group">
                <form action="controlador.php" method="post">
                    <input type="submit" name="justificantes" value="Aceptar o Rechazar justificantes">
                </form>
            </div>
        </div>
    </div>

    <a class="logout-button" href="../../login.php">Cerrar Sesión</a>
</body>
</html>