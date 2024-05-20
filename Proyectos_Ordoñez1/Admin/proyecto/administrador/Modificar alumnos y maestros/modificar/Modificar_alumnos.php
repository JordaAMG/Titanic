<form action="" method="post">
    Alumno a modificar:
    <select name="idmodificar">
        
        <?php
        require_once '../../../contacto.php';
        $obj = new Contacto();

        $resultado = $obj->consultar_alumnos();
        if ($resultado) {
    while ($registro = $resultado->fetch_assoc()) {
        // Esto de aquí va a cargar la matrícula del alumno y el nombre para que el administrador seleccione cuál quiere modificar
        echo "<option value='" . $registro["matricula_alumno"] . "'> " . $registro["matricula_alumno"] . " - " . $registro["nombre_completo"] . "</option>";
    }
} else {
    echo "No se encontraron registros de alumnos.";
}
                
        ?>
    </select>

    <input type="submit" name="cargar" value="Cargar Datos del alumno">

</form>

<?php
if (isset($_POST["cargar"])) {
    require_once '../../../contacto.php';
    $obj = new Contacto();
    $resultado = $obj->consultar_alumnos($_POST["idmodificar"]);

    if ($registro = $resultado->fetch_assoc()) {
        ?>
        <form action="" method="post">
    Matricula del alumno: <input type="text" name="matricula_alumno" value="<?php echo $registro["matricula_alumno"]; ?>" readonly><br>
    Nombre Completo: <input type="text" name="nombre_completo" value="<?php echo $registro["nombre_completo"]; ?>"><br>
    Correo del alumno: <input type="text" name="correo" value="<?php echo $registro["correo"]; ?>"><br>
    Contraseña: <input type="text" name="contraseña" value="<?php echo $registro["contraseña"]; ?>"><br>
    Numero de semestre: <input type="text" name="id_semestre" value="<?php echo $registro["id_semestre"]; ?>"><br>

    <input type="hidden" name="idmodificar" value="<?php echo $_POST["idmodificar"]; ?>"><br>
    <input type="submit" name="modificar" value="Modificar">
</form>
        <?php
    }
}

if (isset($_POST["modificar"])) {
    $matricula_alumno = $_POST['matricula_alumno'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $id_semestre = $_POST['id_semestre'];

    require_once '../../../contacto.php';
    $obj = new Contacto();
    $obj->modificar_alumnos($matricula_alumno, $contraseña, $nombre_completo, $correo, $id_semestre);

    echo "Alumno modificado";
}
?>