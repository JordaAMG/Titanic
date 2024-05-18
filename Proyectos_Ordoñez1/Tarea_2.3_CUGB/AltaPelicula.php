
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dar de alta una Pelicula</title>
</head>

<body>
    
    <fieldset>
        <legend>Alta de Pelicula</legend>
            <form name="Formulario" method="post" action=""> 

                Titulo: <input type="text" name="titulo" value="">
                Actores: <input type="text" name="actores" value=""><br><br>

                Director: <input type="text" name="director" value="">
                Guión: <input type="text" name="guion" value=""><br><br>

                Producción: <input type="text" name="produccion" value="">
                Año: <input type="text" name="anio" value=""><br><br>

                Nacionalidad: <input type="text" name="nacionalidad" value="">
                Duración: <input type="number" name="duracion" value="" > en minutos<br><br>
                

                Género: <select name="generos">
                <option value="Ninguno">Ninguno</option>
                <option value="Comedia">Comedia</option>
                <option value="Drama">Drama</option>
                <option value="Accion">Acción</option>
                <option value="Terror">Terror</option>
                <option value="suspenso">Suspenso</option>
                <option value="otras">Otras</option>
                </select> <br> <br>
                

                Resticciones de edad: <br>
                <input type="radio" name="opcion" value="Tpublico">Todo los publicos 
                <input type="radio" name="opcion" value="Mayores7">Mayores de 7 años 
                <input type="radio" name="opcion" value="Mayores18">Mayores de 18 años <br><br>

                Sinópsis: <br>
                <textarea name="sinopsis" cols="40" rows="10"></textarea> <br><br>
            
                <input type="submit" name="Guardar" value="Guardar">
                <br><br>
            </form>
    
        <!--//////// Apartado de php //////-->
        <?php
            //Realizar acciones si se hace click en el boton 'Guardar'
            if(isset($_REQUEST['Guardar'])){
                
                //Incluir el Script gestion.php
                include("gestion.php");
                $obj_gestion = new gestion(); //Crear objeto en base al archivo a la clase para gestionar los datos

                //Usaremos una condición para  validar que se haya brindado la información que requerimos

                if (empty($_POST['titulo']) || empty($_POST['actores']) || empty($_POST['director'] || empty($_POST['guion']) || empty($_POST['nacionalidad']) || empty($_POST['duracion']) || empty($_POST['generos']) || empty($_POST['opcion']) || empty($_POST['sinopsis']) ||  empty($_POST['produccion']) || empty($_POST['anio']))) 
                {   
                    echo "<br>ERROR: Por favor llene todos los campos, para registrar la pelicula ";
                    
                    echo "<br><br>";
                   

                }
                else
                {


                    //Obtener información de los inputs y elementos del formulario
                    $titulo = $_REQUEST['titulo']; //Titulo de la Pelicula
                    $actores = $_REQUEST['actores']; //Actores de la Pelicula
                    $director = $_REQUEST['director']; //Director de la Pelicula
                    $produccion =  $_REQUEST['produccion']; //Produccion de la Pelicula
                    $guion = $_REQUEST['guion']; //Guion de la Pelicula
                    $anio = $_REQUEST['anio']; //Año de la Pelicula
                    $nacionalidad = $_REQUEST['nacionalidad']; //Nacionalidad de la Pelicula
                    $duracion = $_REQUEST['duracion']." minutos"; //Duración en minutos de la Pelicula

                    $genero;
                    //Hacer diferentes condiciones para optener el Genero de la Pelicula
                    if($_REQUEST['generos'] == 'Comedia'){
                        $genero ="Comedia";
                    }
                    else if($_REQUEST['generos'] == 'Drama'){
                        $genero = "Drama";
                    }
                    else if($_REQUEST['generos'] == 'Accion'){
                        $genero = "Accion";
                    }
                    else if($_REQUEST['generos'] == 'Terror'){
                        $genero = "Terror";
                    }
                    else if($_REQUEST['generos'] == 'suspenso'){ 
                        $genero = "Suspenso";
                    }
                    else if($_REQUEST['generos'] == 'otras'){
                        $genero = "Otras";
                    }
                    
                    //Hacer diferentes condiciones para optener las Restricciones de la Pelicula
                    if($_REQUEST['opcion'] == 'Tpublico'){
                        $restriccion = "Apto para Todos los públicos"; 
                    }
                    if($_REQUEST['opcion'] == 'Mayores7'){
                        $restriccion = "Apto para Mayores de 7 años";
                    }
                    else if($_REQUEST['opcion'] == 'Mayores18'){
                        $restriccion = "Apto para Mayores de 18 años";
                    }

                    $sinopsis = $_REQUEST['sinopsis']; //Sinopsis de la Pelicula


                    $obj_gestion->alta($titulo, $actores, $director, $guion, $produccion, $anio, $nacionalidad, $duracion, $genero, $restriccion, $sinopsis);

                    echo "<br> Registrado con exito <br><br>";

                }
                
            }
        
        ?>       
</fieldset>

</body>

</html>


