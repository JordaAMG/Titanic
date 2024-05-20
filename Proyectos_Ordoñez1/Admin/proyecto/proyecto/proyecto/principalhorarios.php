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
		<h3 id="s">Selecciona tu semestre</h3>
      </div>
    <br></br>
		<nav>
		<ul >
    		<a href="?opc=segundo" id="se"><li>Segundo Semestre</li></a>
    		<a href="?opc=cuarto" id="cu"><li>Cuarto Semestre</li></a>
    		<a href="?opc=sexto" id="sex"><li>Sexto Semestre</li></a>
             
    		
    
    	</ul> 
    </nav>
    <section>
    	<?php 
           if(isset($_GET['opc'])){
              switch ($_GET['opc']) {
              	case 'segundo':
              		include("segundo.php");
              		break;
              	case 'cuarto':
                     include("cuarto.php");
              	     break;
              	case 'sexto':
                     include("sexto.php");
              	      break;

              	
              }

           }

    	?>
	</div>
<footer id="Pie_Pagina"> <p>Correo: Motellano@mtn.com             Celular: 312- 345 - 4321</p> </footer>
</body>
</html>