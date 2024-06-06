<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio Montellano - Alumno</title>
    <link rel="stylesheet" type="text/css" href="Index_AlumnoPadre.css">
</head>
<body>
<div id="agrupar">

    <header id="cabeza">
        <h1>Interfaz Alumno</h1>
    </header>

    <div id="info-usuario">
        <img src="icon_usuario.PNG" alt="Usuario" width="60px" height="60px">
        <div id="Info_usuario1">
            <p>Nombre del Alumno:</p>
            <p>
                <?php
                    if (isset($_COOKIE['username'])) {
                        $username = $_COOKIE['username'];
                        echo "$username";
                    } else {
                        echo "No se ha encontrado el nombre.";
                    }
                ?>
            </p>
            <p>Número de cuenta:</p>
            <p>
                <?php
                    if (isset($_COOKIE['matricula'])) {
                        $matricula = $_COOKIE['matricula'];
                        echo "$matricula";
                    } else {
                        echo "No se ha encontrado la matrícula.";
                    }
                ?>
            </p>
        </div>
    </div>

    <section>
        <article id="Acciones">
            <div id="Tabla0" class="tabla">
                <header id="Titulo_tablas0">
                    <p>Listar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <a id="Botones" href="Listar_alumnos.php">Listar Alumnos de Clase</a>
                    <a id="Botones" href="Listar_profesores_alumnopadre.php">Listar Profesores</a>
                    <a id="Botones" href="Listarcalificacionespadrealumno.php">Listar Calificaciones</a>
                </section>
            </div>

            <div id="Tabla1" class="tabla">
                <header id="Titulo_tablas0">
                    <p>Consultar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <a id="Botones" href="Consultar_horario/consultar_horario.php">Consultar Horario</a>
                </section>
            </div>

            <div id="Tabla2" class="tabla">
                <header id="Titulo_tablas0">
                    <p>Modificar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <a id="Botones" href="Listar_Faltas_AlumnoPadre.php">Listar Faltas de Asistencia</a>
                    <a id="Botones" href="Justificantes_alumno.php">Verificar Justificante</a>
                </section>
            </div>
        </article>
    </section>

    <footer id="Pie_Pagina">
        <p>Correo: Montellano@mtn.com | Celular: 312-345-4321</p>
    </footer>

</div>

<!-- Botón de cerrar sesión -->
<a class="logout-button" href="../login.php">Cerrar Sesión</a>
</body>
</html>