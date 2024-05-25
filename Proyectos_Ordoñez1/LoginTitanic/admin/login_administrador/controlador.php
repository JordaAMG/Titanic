<?php
include("conexion.php");

//ALUMNO
if (isset($_POST["agregar_alumno"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Agregar alumnos, maestros y asignaturas/Agregar_alumno.php");
            exit();
}
if (isset($_POST["eliminar_alumno"])) {
    // Redirigir a eliminar alumno
            header("Location: administrador/Eliminar alumnos, maestros y asignaturas/Eliminar_alumno.php");
            exit();
}
if (isset($_POST["modificar_alumno"])) {
    // Redirigir a modificar alumno
            header("Location: administrador/Modificar alumnos, maestros y asignaturas/Modificar_alumnos.php");
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
            header("Location: administrador/Agregar alumnos, maestros y asignaturas/Agregar_profesor.php");
            exit();
}

if (isset($_POST["eliminar_profesor"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Eliminar alumnos, maestros y asignaturas/Eliminar_profesor.php");
            exit();
}

if (isset($_POST["modificar_profesor"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Modificar alumnos, maestros y asignaturas/Modificar_profesores.php");
            exit();
}

//ASIGNATURAS

if (isset($_POST["agregar_asignatura"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Agregar alumnos, maestros y asignaturas/Agregar_asignatura.php");
            exit();
}

if (isset($_POST["eliminar_asignatura"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Eliminar alumnos, maestros y asignaturas/Eliminar_asignatura.php");
            exit();
}

if (isset($_POST["modificar_asignatura"])) {
    // Redirigir a agregar alumno
            header("Location: administrador/Modificar alumnos, maestros y asignaturas/Modificar_asignaturas.php");
            exit();
}




    

?>