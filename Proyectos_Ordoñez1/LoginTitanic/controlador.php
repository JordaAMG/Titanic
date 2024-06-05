<!--?php
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
                // Redirigir a la interfaz de profesor
                header("Location: Pagina_Maestro_prototipo1/Profesor_1.php");
                setcookie("username", $resultado_prof, time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días en todo el dominio
                exit();
            } else {
                $conexion->sentencia = "SELECT nombre_completo, matricula_alumno FROM alumnos WHERE correo = '$correo'";
                $resultado_alumno = $conexion->obtener_sentencia();
                
                if ($resultado_alumno->num_rows > 0) {
                    // Redirigir a la interfaz de alumno
                    header("Location: inicioalumno.php");
                    setcookie("username", $resultado_alumno, time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días en todo el dominio y borrarla cuando se cierre secion
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
?-->

<?php
include("conexion.php");

if (isset($_POST["btn_login"])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    $conexion = new Conexion();
    
    // Preparar la consulta para verificar las credenciales
    $conexion->sentencia = $conexion->conexion->prepare("SELECT * FROM login WHERE correo = ? AND contraseña = ?");
    $conexion->sentencia->bind_param("ss", $correo, $contraseña);
    $conexion->sentencia->execute();
    $resultado = $conexion->sentencia->get_result();
    
    if ($resultado->num_rows > 0) {
        // Verificar el rol del usuario
        $conexion->sentencia = $conexion->conexion->prepare("SELECT * FROM administradores WHERE correo = ?");
        $conexion->sentencia->bind_param("s", $correo);
        $conexion->sentencia->execute();
        $resultado_admin = $conexion->sentencia->get_result();
        
        if ($resultado_admin->num_rows > 0) {
            // Redirigir a la interfaz de administrador
            header("Location: admin/login_administrador/interfaz_administrador.php");
            exit();
        } else {
            $conexion->sentencia = $conexion->conexion->prepare("SELECT nombre_completo, matricula_profesor FROM profesores WHERE correo = ?");
            $conexion->sentencia->bind_param("s", $correo);
            $conexion->sentencia->execute();
            $resultado_prof = $conexion->sentencia->get_result();
            
            if ($resultado_prof->num_rows > 0) {
                $row_prof = $resultado_prof->fetch_assoc();
                // Crear cookies con el nombre de usuario y matrícula
                setcookie("username", $row_prof['nombre_completo'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                setcookie("matricula", $row_prof['matricula_profesor'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                // Redirigir a la interfaz de profesor
                header("Location: Pagina_Maestro_prototipo1/Profesor_1.php");
                exit();
            } else {
                $conexion->sentencia = $conexion->conexion->prepare("SELECT nombre_completo, matricula_alumno FROM alumnos WHERE correo = ?");
                $conexion->sentencia->bind_param("s", $correo);
                $conexion->sentencia->execute();
                $resultado_alumno = $conexion->sentencia->get_result();
                
                if ($resultado_alumno->num_rows > 0) {
                    $row_alumno = $resultado_alumno->fetch_assoc();
                    // Crear cookies con el nombre de usuario y matrícula
                    setcookie("username", $row_alumno['nombre_completo'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                    setcookie("matricula", $row_alumno['matricula_alumno'], time() + (60 * 60 * 24 * 30), "/"); // Cookie válida por 30 días
                    // Redirigir a la interfaz de alumno
                    header("Location: inicioalumno.php");
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
