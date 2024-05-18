<?php
if(isset($_REQUEST['Guardar'])){
    // Procesar los datos enviados para guardar cambios en la base de datos
    $id_pelicula = $_REQUEST['peliculas'];
    $titulo = $_REQUEST['titulo'];
    $actores = $_REQUEST['actores'];
    $director = $_REQUEST['director'];
    $guion = $_REQUEST['guion'];
    $produccion = $_REQUEST['produccion'];
    $anio = $_REQUEST['anio'];
    $nacionalidad = $_REQUEST['nacionalidad'];
    $duracion = $_REQUEST['duracion'];
    $genero = $_REQUEST['generos'];
    $restriccion = $_REQUEST['opcion'];
    $sinopsis = $_REQUEST['sinopsis'];

    // Actualizar los datos en la base de datos
    require_once("gestion.php");
    $gestion = new gestion();
    $resultado = $gestion->actualizar($id_pelicula, $titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $duracion, $genero, $restriccion, $sinopsis);
    echo "------------------------- Los datos se han actualizado correctamente. ------------------ <br><br>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos de películas</title>
</head>

<body>
    <fieldset>
        <legend>Modificación de películas</legend>
        <form action="" method="post">
            <!-- Select de las películas -->
            <label>Película a modificar:</label>
            <select name="peliculas" id="peliculas">
                <?php
                require_once("gestion.php");
                $gestion = new gestion();
                $informacion = $gestion->consultar();

                while ($pelicula = $informacion->fetch_assoc()) {
                    echo "<option value='" . $pelicula['id_pelicula'] . "'>" . $pelicula['titulo'] . "</option>";
                }
                ?>
            </select>

            <input type="submit" name="cargar" value="Cargar datos"><br><br>

            <?php 
            if(isset($_REQUEST['cargar'])){
                $id_pelicula = $_REQUEST['peliculas'];
                $resultado = $gestion->cargar($id_pelicula);
                while ($registro = $resultado->fetch_assoc()) {
            ?>
            <form name="Datos" method="post" action=""> 
                Titulo: <input type="text" name="titulo" value="<?php echo $registro['titulo']; ?>">
                Actores: <input type="text" name="actores" value="<?php echo $registro['actores']; ?>"><br><br>

                Director: <input type="text" name="director" value="<?php echo $registro['director']; ?>">
                Guión: <input type="text" name="guion" value="<?php echo $registro['guion']; ?>"><br><br>

                Producción: <input type="text" name="produccion" value="<?php echo $registro['produccion']; ?>">
                Año: <input type="text" name="anio" value="<?php echo $registro['anio']; ?>"><br><br>

                Nacionalidad: <input type="text" name="nacionalidad" value="<?php echo $registro['nacionalidad']; ?>">
                Duración: <input type="text" name="duracion" value="<?php echo $registro['duracion']; ?>" ><br><br>

                Género: <select name="generos">
                    <option value="Ninguno">Ninguno</option>
                    <option value="Comedia">Comedia</option>
                    <option value="Drama">Drama</option>
                    <option value="Accion">Acción</option>
                    <option value="Terror">Terror</option>
                    <option value="suspenso">Suspenso</option>
                    <option value="otras">Otras</option>
                </select> <br> <br>

                Restricciones de edad: <br>
                <input type="radio" name="opcion" value="Tpublico">Todo los públicos 
                <input type="radio" name="opcion" value="Mayores7">Mayores de 7 años 
                <input type="radio" name="opcion" value="Mayores18">Mayores de 18 años <br><br>

                Sinópsis: <br>
                <textarea name="sinopsis" cols="40" rows="10"><?php echo $registro['sinopsis']; ?></textarea> <br><br>

                <input type="submit" name="Guardar" value="Guardar cambios">
                <br><br>
            <?php 
                }
            }
            ?>
            </form>
        </form>
    </fieldset>
</body>
</html>