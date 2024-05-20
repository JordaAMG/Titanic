<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eliminar profesor</title>
</head>
<body>
    <fieldset>
    	<legend>Eliminar</legend>
    	<form action="" method="post"> 
         Profesor a eliminar:

            <select name="ideliminar">


               <?php 
                  require_once '../../../contacto.php';
                  $obj = new Contacto();
                  if(isset($_POST['eliminar']) && isset($_POST['ideliminar'])){
                    $obj->eliminar_profesor($_POST['ideliminar']);
                  }
                   
                  //esto obiene los datos del profesor
                  $resultado= $obj->consultar_profesores();

                  while ($registro = $resultado->fetch_assoc()) {
                     echo "<option value='" . $registro["matricula_profesor"] . "'> " . $registro["matricula_profesor"] . " - " . $registro["nombre_completo"] . "</option>";
                  }
     

               ?>

            </select>
    		<input type="submit" name="eliminar" value="Eliminar">

    	</form>

        <?php 
           if(isset($_POST['eliminar'])){
            echo "<br> Profesor eliminado";

           }
        ?>

    </fieldset>

</body>
</html>