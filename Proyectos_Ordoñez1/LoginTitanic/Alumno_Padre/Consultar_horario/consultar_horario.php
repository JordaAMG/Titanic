<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Horario</title>
    <link rel="stylesheet" type="text/css" href="consultar_horario.css">
</head>
<body>
    <a href="../../Alumno_Padre/Index_AlumnoPadre.php" class="button">Volver</a>
    <div class="container">
        <h1>Consultar Horario</h1>
        Materias a las que estas registrado: 
        <?php
        require_once 'Contacto.php';
        session_start();

        $matricula_alumno = $_COOKIE['matricula'];
            $obj = new Contacto();
            $asignaturas = $obj->consultar_asignaturas_alumno($matricula_alumno);

            if ($asignaturas && $asignaturas->num_rows > 0) {
                echo "<ul>";
                while ($asignatura = $asignaturas->fetch_assoc()) {
                    echo "<li><a href='consultar_horario.php?id_materia=" . $asignatura['id_materia'] . "'>" . $asignatura['nombre'] . "</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No estás matriculado en ninguna asignatura.</p>";
            }

            if (isset($_GET['id_materia'])) {
                $id_materia = $_GET['id_materia'];
                $horario = $obj->consultar_horario($id_materia);
                if ($horario && $horario->num_rows > 0) {
                    echo "<h2>Horario de la Asignatura</h2>";
                    echo "<table>";
                    echo "<tr><th>Día</th><th>Hora de Inicio</th><th>Hora de Fin</th></tr>";
                    while ($row = $horario->fetch_assoc()) {
                        echo "<tr><td>" . $row['dia'] . "</td><td>" . $row['inicio'] . "</td><td>" . $row['fin'] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No se encontró horario para esta asignatura.</p>";
                }
            }

        // Asegúrate de que el alumno esté conectado
        /*if (isset($_SESSION['matricula']) && isset($_SESSION['role']) && $_SESSION['role'] === 'alumno') {
            
        } else {
            echo "<p>No tienes permiso para ver esta página. Por favor, inicia sesión como alumno.</p>";
        }*/
        ?>
    </div>
</body>
</html>