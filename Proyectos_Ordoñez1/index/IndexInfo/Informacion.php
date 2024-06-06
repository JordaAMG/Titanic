<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/informacion.css">
    <title>Informacion</title>
</head>
    <div id="cuadrado">
    <H1>Información</H1>
    </div>
<body>
    <ul>
    <div class="contenedor">
    <a href="../Index.php"><li>Volver al índice</li></a>
    </div>
    </ul>
    <?php
 require_once("contacto.php");
      $obj= new consultar_profesores();
      $resultado= $obj->consultar();
      echo "<table>";
      echo "<tr>";
      echo "<th>Maestros</th>";
      echo "<th></th>";
      
      while($registro=$resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$registro["profesores"]."</td>";
          echo "<td></td>";
      
        echo "</tr>";
      }
      echo "</table>";
?>
  
    <footer>
    <div class="copyright">
        © 2024 Titanic x Instituto Montellano. Todos los derechos reservados.
    </div>
    </footer>
    
</body>
</html>