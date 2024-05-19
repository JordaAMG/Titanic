
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de baja una pelicula</title>
</head>
<body>
      <fieldset>
          <legend>Dar de baja una pelicula</legend>
          <form  method="post" action="">
                Seleccione la película a dar de baja:

                <!-- Crear un select de las películas -->
                <select name="peliculas" id="peliculas">
                    <?php
                    include("gestion.php");
                    // Obtener la lista de películas
                    $gestion = new gestion();
                    $informacion = $gestion->consultar();

                    // Iterar sobre las películas y crear opciones en el select
                    while ($pelicula = $informacion->fetch_assoc()) {
                        echo "<option value='" . $pelicula['id_pelicula'] . "'>" . $pelicula['titulo'] . "</option>";
                    }
                    ?>
                </select>
                    
                <input type="submit" value="Dar de baja">
           </form>

     <?php   

         // Verificar si se envió el parámetro "mensaje de exito" a la URL
         //Si se cumple la condición significa que ya se ha borrada una pelicula
         if (isset($_GET["mensaje"])) {
            // Mostrar un mensaje de éxito
            echo "<br>¡La baja se ha realizado correctamente!";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el ID de la película enviado desde el formulario
            $id_pelicula = $_POST["peliculas"];

            $gestion = new gestion();

            // Llamar al método de baja 
            $gestion->baja($id_pelicula);

            // Redirigir a esta sección de la página para refrescar la opciones del select
            header("Location: ".$_SERVER['PHP_SELF']."?opc=baja&mensaje=exito");
            exit;
 
        }
     ?>


      </fieldset>


</body>
</html>

