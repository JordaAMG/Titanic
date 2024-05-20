<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Justificantes de faltas</title>
</head>
<body>
	<div>
		<h1 id="titulo">Justificante de faltas</h1>
	</div>
	<div id="contenedor">
		<div id="datos">
			<h6>Ingrese sus datos</h6>
		</div>
		<div id="nom">
			Nombre Completo: <input type="text" name="nombre" placeholder="Nombre"> 
	
		</div>
		<div id="sem">
			Selecciona en que semestre vas: 
			<select name="Semestre">
<option selected="selected" value="Segundo semestre">Segundo semestre</option>
  
  <option value="Cuarto Semestre" >Cuarto Semestre</option>
  
  <option value="Sexto Semestre" >Sexto Semestre</option>
  </select>
  <br></br>
		</div>
		<div id="grup">
			<select name="Grupo">
		Selecciona tu grupo:
	<option value="A" >A</option>
  <option value="B" >B</option>
  <option value="C" >C</option>
  </select>
		</div>
		<div id="Mot">
	<textarea cols="50" rows="20" name="motivo" placeholder="Ingresa los motivos por los cuales faltaste a clases"></textarea><br><br/>
		</div>
		<div id="enviar">
			<input type="submit" name='informacion'  value="Guardar Informacion">
		</div>
		
		

	</div>
	


</body>
</html>


<?php

if(isset($_POST['informacion'])){
$Nombre=$_POST['Nombre'];
$Semestre=$_POST['Semestre'];
$Grupo=$_POST['Grupo'];
$Motivo=$_POST['Motivo'];

require_once("conexion.php");//aqui se llama a la pagina para guardar los datos
$obj = new conexion();
$obj->justificante($Nombre,$Semestre,$Grupo,$Motivo);
echo "El envio del justificante fue un exito";

}
?>