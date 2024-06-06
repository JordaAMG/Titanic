<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titanic x Montellano</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body class="cuerpo">
    <form method="POST" action="controlador.php">
        <input id="btnregresar" type="submit" name="btn_regresar" value="Regresar">
    </form>

    <h1>Titanic X MONTELLANO</h1>

    <div class="login">
        <div class="login-box">
            <h1>Inicio de Sesión</h1>
            <?php
            session_start();
            if (isset($_SESSION['error_message'])) {
                echo "<p style='color:red;'>" . $_SESSION['error_message'] . "</p>";
                unset($_SESSION['error_message']);
            }
            ?>
            <form method="POST" action="controlador.php">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="correo" placeholder="Ingrese su correo" required>

                <label for="password">Contraseña</label>
                <input type="password" name="contraseña" id="password" placeholder="Ingrese su contraseña" required>
                
                <input type="submit" name="btn_login" value="Iniciar Sesión">
            </form>
        </div>
    </div>
    
</body>
</html>