<?php
include("conexion.php");
session_start();


if (isset($_POST["btn_regresar"])) {
    header("Location: ../index/Index.php"); 
    exit();
}

if (isset($_POST["btn_login"])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    $conexion = new Conexion();
    $conexion->sentencia = "SELECT * FROM login WHERE correo = '$correo' AND contraseña = '$contraseña'";
    $resultado = $conexion->obtener_sentencia();
    
    if ($resultado->num_rows > 0) {
        // Verificar el rol del usuario
        $conexion->sentencia = "SELECT * FROM administradores WHERE correo = '$correo'";
        $resultado_admin = $conexion->obtener_sentencia();
        
        if ($resultado_admin->num_rows > 0) {
            // Redirigir a la interfaz de administrador
            header("Location: admin/login_administrador/interfaz_administrador.php");
            exit();
        } else {
            $conexion->sentencia = "SELECT nombre_completo, matricula_profesor  FROM profesores WHERE correo = '$correo'";
            $resultado_prof = $conexion->obtener_sentencia();
            
            if ($resultado_prof->num_rows > 0) {
                $row_prof = $resultado_prof->fetch_assoc(); // Convertir la fila resultante en un array asociativo

                setcookie("username", $row_prof['nombre_completo'], time() + (60 * 60 * 24 * 30), "/");
                setcookie("matricula", $row_prof['matricula_profesor'], time() + (60 * 60 * 24 * 30), "/");//borrrar en cerrar secion

                // Redirigir a la interfaz de profesor
                header("Location: Pagina_Maestro_prototipo1/Profesor_1.php");
                exit();
            } else {
                $conexion->sentencia = "SELECT nombre_completo, matricula_alumno, id_grupo FROM alumnos WHERE correo = '$correo'";
                $resultado_alumno = $conexion->obtener_sentencia();
                
                if ($resultado_alumno->num_rows > 0) {
                    $resultado_alum = $resultado_alumno->fetch_assoc(); // Convertir la fila resultante en un array asociativo
                    setcookie("username", $resultado_alum['nombre_completo'], time() + (60 * 60 * 24 * 30), "/");
                    setcookie("matricula", $resultado_alum['matricula_alumno'], time() + (60 * 60 * 24 * 30), "/");
                    setcookie("Grupo", $resultado_alum['id_grupo'], time() + (60 * 60 * 24 * 30), "/");//borrrar en cerrar secion
                    // Redirigir a la interfaz de alumno
                    header("Location: Alumno_padre/Index_AlumnoPadre.php");
                    exit();
                } else {
                    $error_message = "Usuario no encontrado.";
                }
            }
        }
    } else {
        $error_message = "Correo o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titanic x Montellano</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body class="cuerpo">
    <form method="POST" action="">
        <input id="btnregresar" type="submit" name="btn_regresar" value="Regresar">
    </form>

    <h1>Titanic X MONTELLANO</h1>

    <div class="login">
        <div class="login-box">
            <h1>Inicio de Sesión</h1>
            <?php
            if (isset($error_message)) {
                echo "<p class='error-message'>$error_message</p>";
            }
            ?>
            <form method="POST" action="">
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