<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Horarios</title>
  <link rel="stylesheet" type="text/css" href="css/Listar_alumnos.css">
</head>
<body>
  <div id="header">
    <a href="../Alumno_Padre/Index_AlumnoPadre.php" id="btnSalir">Salir</a>
    <h1 id="t">Bienvenido al Apartado de Listar Alumnos</h1>
  </div>
  <div id="caja2">
    <?php
      require_once("Contacto.php");
      $obj = new Contacto();
      $Matricula_Alumno = $_COOKIE['matricula'];
      $Grupo_Alumno = $_COOKIE['Grupo'];
      $resultado= $obj->Listar_Alumnos($Grupo_Alumno);
      echo "<table>";
      echo "<tr>";
      echo "<th>Nombre Completo</th>";
      echo "</tr>";
      while($registro=$resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$registro["nombre_completo"]."</td>";
        echo "<td></td>";
        echo "</tr>";

      }
      echo "</table>";
?>
  </div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>