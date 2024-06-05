<?php
include("conexion.php");

//sesion start sirve para iniciar una nueva sesion para el usuario
 session_start();

if (isset($_POST["btn_login"])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    $conexion = new Conexion();
    $conn = $conexion->getConexion();
    
    // Preparar la consulta para verificar las credenciales
    $sentencia = $conn->prepare("SELECT * FROM login WHERE correo = ? AND contraseña = ?");
    $sentencia->bind_param("ss", $correo, $contraseña);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    
    if ($resultado->num_rows > 0) {
        // Verificar el rol del usuario
        $sentencia = $conn->prepare("SELECT * FROM administradores WHERE correo = ?");
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $resultado_admin = $sentencia->get_result();
        
        if ($resultado_admin->num_rows > 0) {
            // Redirigir a la interfaz de administrador
            header("Location: admin/login_administrador/interfaz_administrador.php");
            exit();
        } else {
            $sentencia = $conn->prepare("SELECT nombre_completo, matricula_profesor FROM profesores WHERE correo = ?");
            $sentencia->bind_param("s", $correo);
            $sentencia->execute();
            $resultado_prof = $sentencia->get_result();
            
            if ($resultado_prof->num_rows > 0) {
                $row_prof = $resultado_prof->fetch_assoc();
                // Crear cookies con el nombre de usuario y matrícula
                setcookie("username", $row_prof['nombre_completo'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                setcookie("matricula", $row_prof['matricula_profesor'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                // Redirigir a la interfaz de profesor
                header("Location: Pagina_Maestro_prototipo1/Profesor_1.php");
                exit();
            } else {
                $sentencia = $conn->prepare("SELECT nombre_completo, matricula_alumno FROM alumnos WHERE correo = ?");
                $sentencia->bind_param("s", $correo);
                $sentencia->execute();
                $resultado_alumno = $sentencia->get_result();
                
                if ($resultado_alumno->num_rows > 0) {
                    $row_alumno = $resultado_alumno->fetch_assoc();
                    // Crear cookies con el nombre de usuario y matrícula
                    setcookie("username", $row_alumno['nombre_completo'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                    setcookie("matricula", $row_alumno['matricula_alumno'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                    // Redirigir a la interfaz de alumno
                    header("Location: Alumno_padre/Index_AlumnoPadre.php");
                    exit();
                } else {
                    // Usuario no encontrado en ninguna tabla
                    $_SESSION['error_message'] = "Usuario no encontrado.";
                    header("Location: login.php");
                    exit();
                }
            }
        }
    } else {
        // Credenciales incorrectas
        $_SESSION['error_message'] = "Correo o contraseña incorrectos.";
        header("Location: login.php");
        exit();
    }
}
?>