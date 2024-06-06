<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio Montellano</title>
    <link rel="stylesheet" type="text/css" href="ProfesorCSS_1.css">
</head>
<body>
<div class="container">
    <div class="titulo">
        <h1>Interfaz Profesor</h1>
    </div>

    <div class="info-usuario">
        <div id="Info_usuario">
            <div id="Info_usuario1">
                <p>Nombre del Profesor:</p>
                <p>
                    <?php
                        if (isset($_COOKIE['username'])) {
                            $username = htmlspecialchars($_COOKIE['username']);
                            echo "$username";
                        } else {
                            echo "No se ha encontrado el nombre.";
                        }
                    ?>
                </p>
                <p>Numero de cuenta:</p>
                <p>
                    <?php
                        if (isset($_COOKIE['matricula'])) {
                            $matricula = htmlspecialchars($_COOKIE['matricula']);
                            echo "$matricula";
                        } else {
                            echo "No se ha encontrado la matrícula.";
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="section">
        <h2>Listar</h2>
        <div class="button-group">
            <form action="Profesor_Listar_Alumnos_3.php" method="get">
                <input type="submit" value="Listar Alumnos">
            </form>
            <form action="Profesor_Listar_Profesores_1.php" method="get">
                <input type="submit" value="Listar Profesores">
            </form>
            <form action="Profesor_Listar_Faltas_1.php" method="get">
                <input type="submit" value="Listar Faltas">
            </form>
        </div>
    </div>

    <div class="section">
        <h2>Agregar</h2>
        <div class="button-group">
            <form action="agregar_calificaciones.php" method="get">
                <input type="submit" value="Poner Calificaciones">
            </form>
            <form action="faltas.php" method="get">
                <input type="submit" value="Poner Faltas Asistencia">
            </form>
        </div>
    </div>

    <div class="section">
        <h2>Modificar</h2>
        <div class="button-group">
            <form action="Modificar_calificaciones.php" method="get">
                <input type="submit" value="Modificar Calificaciones">
            </form>
            <form action="Modificar_Faltas_De_Asistencia.php" method="get">
                <input type="submit" value="Modificar Faltas Asistencia">
            </form>
        </div>
    </div>

    <a class="cerrar_sesion" href="../login.php">Cerrar Sesión</a>

    <footer>
        <p>Correo: Montellano@mtn.com | Celular: 312-345-4321</p>
    </footer>
</div>
</body>
</html>
