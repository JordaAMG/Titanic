<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>horarios</title>
	<link rel="stylesheet" type="text/css" href="principalhorario.css">
</head>
<body>
	<div id="caja1">
		<h1 id="t">Consulta tu horarios tu horario</h1>
	</div>
	<div id="caja2">
    <div id="cj">
		<h3 id="s">Selecciona tu grupo</h3>
      </div>
    <br></br>
		<nav>
		<ul ><!--prueba-->
    		<a href="?opc=a" id="se"><h3>Cuarto A</h3></a>
    		<a href="?opc=b" id="cu"><h3>Cuarto B</h3></a>
    		<a href="?opc=c" id="sex"><h3>Cuarto C</h3></a>
             
    		
    
    	</ul> 
    </nav>
    <section>
    	<?php 
           if(isset($_GET['opc'])){
              switch ($_GET['opc']) {
              	case 'a':
              		include("cuartoa.php");
              		break;
              	case 'b':
                     include("cuartob.php");
              	     break;
              	case 'c':
                     include("cuartoc.php");
              	      break;

              	
              }

           }

    	?>
	</div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>