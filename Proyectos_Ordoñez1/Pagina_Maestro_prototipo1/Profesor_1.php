<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio Montellano</title>
    <link rel="stylesheet" type="text/css" href="ProfesorCSS_1.css">
</head>
<body>
<div id ="agrupar">

    <div id="Color_arriba0"></div>
    <div id="Color_arriba1"></div>

    <Header id="cabeza"> <!-- esta es la cabeza-->
        <article id="Info_usuario">
            <input id="Imagen0" type="image" src="icon_usuario.PNG" alt="Enviar" width="60px" height="60px">
            <div id="Info_usuario1">
                <p>Nombre del Profesor:</p>
                <p>Numero de cuenta:</p>
            </div>
        </article>

        <article id="cerrar_secion0">
            <a id="Info_Cerrar_secion" href="?opc=Cerrar_sesión1">Cerrar Secion</a>
            <input id="Imagen0" type="image" src="Icon_salir.PNG" alt="Enviar" width="30px" height="30px">
        </article>
    </Header>

    <nav>
    </nav>

    <section>
        <article id="Acciones">
            <div id="Tabla0"><!--listar-->
                <header id="Titulo_tablas0">
                    <p>Listar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <br>
                        <a id="Botones" href="Profesor_Listar_Alumnos_3.php">Listar Alumnos</a><br><br><br>
                        <a id="Botones" href="Profesor_Listar_Profesores_1.php">Listar Profesores</a><br><br><br>
                        <a id="Botones" href="Profesor_Listar_Faltas_1.php">Listar Faltas</a><br><br><br>
                </section>
            </div>

            <div id="Tabla1"><!--agragar-->
                <header id="Titulo_tablas0">
                    <p>Agregar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <br>
                    <a id="Botones" href="Poner_Calificaciones.php">Poner Calificaciones</a><br><br><br>
                    <a id="Botones" href="Poner_Faltas_De_Asistencia.php">Poner Faltas Asistencia</a><br><br><br>
                </section>
            </div>

            <div id="Tabla2"><!--modificar-->
                <header id="Titulo_tablas0">
                    <p>Modificar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <br>
                    <a id="Botones" href="Modificar_Calificaciones.php">Modificar Calificaciones</a><br><br><br>
                    <a id="Botones" href="Modificar_Faltas_De_Asistencia.php">Modificar Faltas Asistencia</a><br><br><br>
                </section>
            </div>
        </article>
    </section>

    <footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com              Celular: 312- 345 - 4321</p> </footer>



</div>
</body>
</html>