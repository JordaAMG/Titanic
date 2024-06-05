<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio Montellano</title>
    <link rel="stylesheet" type="text/css" href="Index_AlumnoPadre.css">
</head>
<body>
<div id ="agrupar">

    <div id="Color_arriba0"></div>
    <div id="Color_arriba1"></div>

    <Header id="cabeza"> 
        <article id="Info_usuario">
            <input id="Imagen0" type="image" src="icon_usuario.PNG" alt="Enviar" width="60px" height="60px">
            <div id="Info_usuario1">
                <p>Nombre del Alumno:</p>
                <!--<input type="number" name="parcial_uno" value="<!?php echo isset($registro["parcial_uno"]) ? $registro["parcial_uno"] : ''; ?>" id="parcial_uno" step="0.1" min="0" max="10" required>-->
                <p>Numero de cuenta:</p>
            </div>
        </article>

        <article id="cerrar_secion0">
            <a id="Info_Cerrar_secion" href="?opc=Cerrar_sesión1">Cerrar Sesion</a>
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
                        <a id="Botones" href="Listar_alumnos.php">Listar Alumnos de Clase:</a><br><br><br>
                        <a id="Botones" href="Listar_profesores_alumnopadre.php">Listar Profesores:</a><br><br><br>
                        <a id="Botones" href="Listarcalificacionespadrealumno.php">Listar calificaciones:</a><br><br><br>
                </section>
            </div>

            <div id="Tabla1"><!--agragar-->
                <header id="Titulo_tablas0">
                    <p>Consultar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <br>
                    <a id="Botones" href="mostrarhorario.php">Consultar horario:</a><br><br><br>
                </section>
            </div>

            <div id="Tabla2"><!--modificar-->
                <header id="Titulo_tablas0">
                    <p>Modificar:</p>
                </header>
                <section id="Contenedor_Botones">
                    <br>
                    <a id="Botones" href="Listar_Faltas_AlumnoPadre.php">Listar Faltas de Asistencia:</a><br><br><br>
                    <a id="Botones" href="Justificantes_alumno.php">Verificar justificante:</a><br><br><br>
                </section>
            </div>
        </article>
    </section>

    <footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com              Celular: 312- 345 - 4321</p> </footer>



</div>
</body>
</html>