<form action="" method="post">
        <label for="titulo">Matricula:</label><br>
        <input type="text" id="matricula_profesor" name="matricula_profesor" size="36" required><br>
        
        <label for="actores">Contraseña:</label><br>
        <input type="text" id="contraseña" name="contraseña" size="36"><br>
        
        <label for="director">Nombre Completo:</label><br>
        <input type="text" id="nombre_completo" name="nombre_completo" size="36" required><br>
        
        <label for="guion">Correo:</label><br>
        <input type="text" id="correo" name="correo" size="36" required><br>
        
        <input type="submit" name="btnagregarprof" value="Agregar">
</form>
         <?php
        if(isset($_POST['guardar'])){
            $matricula_profesor = $_POST['matricula_profesor'];
            $contraseña = $_POST['contraseña'];
            $nombre_completo = $_POST['nombre_completo'];
            $correo = $_POST['correo'];
            require_once("datos.php");
            $obj = new datos();
            $obj->guardar($matricula_profesor,$contraseña,$nombre_completo,$correo);
            echo "Información Almacenada";
        }
        ?>