<!DOCTYPE html>
<html lang="es"> <!-- idioma de la pagina -->
<head>
     <meta charset="UTF-8"> <!-- Configuración de caracteres UTF-8-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- para que se vea bien en celulares -->
    <meta name="description" content="Pagina web para registrar peliculas"> <!-- Descripción de la pagina -->
    <meta name="keywords" content="HTML, CSS, Javascript, PHP, MySQL"> <!-- Palabras clave de la pagina -->
    <title>Cinemas Colima</title> <!-- Titulo de la pagina -->
</head>

<body>
    <header> <h2>Bienvenido a Cinem@s Colima, ¿que desea hacer ? </h2> </header>

    <nav>
    
     <ul>
        <a href="?opc=alta"> <li>Registrar una pelicula</li> </a>
        <a href="?opc=baja"> <li>Eliminar una pelicula</li> </a>
        <a href="?opc=consulta"> <li>Mostrar peliculas</li> </a>
        <a href="?opc=modificacion"> <li>Modificar datos una Pelicula</li> </a>
     </ul>

    </nav>
    
    <section> 
      
       <?php
         
         //Verificar si existe el parametro opc
         if(isset($_GET['opc'])){

            //Incluir un script diferente dependiendo de la variable opc
            switch($_GET['opc']){
                case 'alta':
                    include('AltaPelicula.php');
                    break;
                case 'baja':
                    include('BajaPelicula.php');
                    break;
                    
                case 'consulta':
                    //Poner bordes a las etiquetas de la tabla
                    echo"<style>
                      td, tr, th {
                        border: 1px solid black;
                      }
                    </style>";

                    include('ConsultarPeliculas.php');

                    break;

                case 'modificacion':
                    include('ModificarPelicula.php');
                    break;
            }
         }
       
       ?>

    </section>

</body>

</html>