<?php
include("conexion.php");

//ALUMNO
if (isset($_POST["agregar_alumno"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Agregar alumnos y maestros/Agregar_alumno.php");
            exit();
}
if (isset($_POST["eliminar_alumno"])) {
    // Redirigir a eliminar alumno
            header("Location: administrador/Eliminar alumnos y maestros/Eliminar_alumno.php");
            exit();
}
if (isset($_POST["modificar_alumno"])) {
    // Redirigir a modificar alumno
            header("Location: administrador/Modificar alumnos y maestros/Modificar_alumnos.php");
            exit();
}
if (isset($_POST["matricular_alumno"])) {
    // Redirigir a matricular_alumno alumno
            header("Location: administrador/Agregar alumnos y maestros/Agregar_alumno.php");
            exit();
}

//MAESTROS

if (isset($_POST["agregar_profesor"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Agregar alumnos y maestros/Agregar_profesor.php");
            exit();
}

if (isset($_POST["eliminar_profesor"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Eliminar alumnos y maestros/Eliminar_profesor.php");
            exit();
}

if (isset($_POST["modificar_profesor"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Modificar alumnos y maestros/Modificar_pro-+fesores.php");
            exit();
}
    

?>