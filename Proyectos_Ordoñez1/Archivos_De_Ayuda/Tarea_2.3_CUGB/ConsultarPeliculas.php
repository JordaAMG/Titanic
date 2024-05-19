<?php   

require_once("gestion.php");

$obj_gestion = new gestion();

$informacion = $obj_gestion->consultar();

//Hacer tabla con informacion obtenida de la consulta
echo "<table>";
      echo "<tr>";
      echo "<th>Titulo</th>";
      echo "<th>Actores</th>";
      echo "<th>Director</th>";
      echo "<th>Guión</th>";
      echo "<th>Producción</th>";
      echo "<th>Año</th>";
      echo "<th>Nacionalidad</th>";
      echo "<th>Duracion</th>";
      echo "<th>Genero</th>";
      echo "<th>Resticciones de edad</th>";
      echo "<th>Sinopsis</th>";
      echo "</tr>";
      while($registro=$informacion->fetch_assoc()){
          echo "<tr>";
          echo "<td>" . $registro['titulo'] . "</td>";
          echo "<td>" . $registro['actores'] . "</td>";
          echo "<td>" . $registro['director'] . "</td>";
          echo "<td>" . $registro['guion'] . "</td>";
          echo "<td>" . $registro['produccion'] . "</td>";
          echo "<td>" . $registro['anio'] . "</td>";
          echo "<td>" . $registro['nacionalidad'] . "</td>";
          echo "<td>" . $registro['duracion'] . "</td>";
          echo "<td>" . $registro['genero'] . "</td>";
          echo "<td>" . $registro['restriccion'] . "</td>";
          echo "<td>" . $registro['sinopsis'] . "</td>";
          echo"</tr>";
      }
      
     echo "</table>";


?>