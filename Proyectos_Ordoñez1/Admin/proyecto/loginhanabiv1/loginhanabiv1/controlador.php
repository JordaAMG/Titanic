<?php
    if(empty($_POST["btnlogin"])){
        if (empty($_POST["correo"]) and empty($_POST["contraseña"])) {
            echo "<span style='color:red;'>LOS CAMPOS ESTAN VACIOS</span>";
        } else {
            $correo= $_POST["correo"];
            $contraseña= $_POST["contraseña"];
            $conexion = new Conexion;
            $conexion->sentencia = "SELECT * FROM profesores WHERE correo='$correo' AND contraseña='$contraseña' ";
            $result = $conexion->obtener_sentencia();
            if ($result->num_rows > 0) {
                header("location:inicioprofe.php");
            } else {
                echo "<span style='color:red;'>Correo u contraseña incorrectos</span>";
            }

            $conexion->sentencia = "SELECT * FROM alumnos WHERE correo='$correo' AND contraseña='$contraseña' ";
            $result = $conexion->obtener_sentencia();
            if ($result->num_rows > 0) {
                header("location:inicioalumno.php");
            } else {
                echo "<span style='color:red;'>Correo u contraseña incorrectos</span>";
            }

            $conexion->sentencia = "SELECT * FROM administradores WHERE correo='$correo' AND contraseña='$contraseña' ";
            $result = $conexion->obtener_sentencia();
            if ($result->num_rows > 0) {
                header("location:inicioadmin.php");
            } else {
                echo "<span style='color:red;'>Correo u contraseña incorrectos</span>";
            }
            
        }
        
    }
?>