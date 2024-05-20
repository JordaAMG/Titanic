<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hanabi x Montellano</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="cuerpo">
	
	<input id="btnregresar" type="submit" value="Regresar">

	<h1>HANBI X MONTELLANO</h1>

<div class="login">
	<div class="login-box">

		<h1>Inicio Sesión</h1>
		<form method="POST">
			<label for="username">Usuario</label>
			<input type="text" id="username" name="correo" placeholder="Ingrese su correo">

			<label for="password">Contraseña</label>
			<input type="password" name="contraseña" id="password" placeholder="Ingrese su contraseña">
			<?php
				if(isset($_POST["btn_login"]))
				{
				include("conexion.php");
				include("controlador.php");
				}
			?>
			<input type="submit" name="btn_login" value="Iniciar Sesión">

		</form>
	</div>
</div>
	
</body>
</html>
