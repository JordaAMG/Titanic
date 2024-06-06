<?php
include("conexion.php");

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
                    // Usuario no encontrado en ninguna tabla
                    echo "Usuario no encontrado.";
                }
            }
        }
    } else {
        // Credenciales incorrectas
        echo "Correo o contraseña incorrectos.";
    }
}
?>