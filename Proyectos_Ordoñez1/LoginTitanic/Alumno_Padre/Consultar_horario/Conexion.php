<?php
class Conexion {
    protected $host = 'localhost';
    protected $usuario = 'root';
    protected $password = '';
    protected $base = 'titanic'; 
    protected $conexion;

    public function __construct() {
        $this->abrir_conexion();
    }

    protected function abrir_conexion() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->base);

        // Verificar si hay un error en la conexión
        if ($this->conexion->connect_error) {
            die('Error de conexión: (' . $this->conexion->connect_errno . ') ' . $this->conexion->connect_error);
        }
    }

    public function ejecutar_sentencia() {
        return $this->conexion->query($this->sentencia);
    }

    public function obtener_sentencia() {
        return $this->conexion->query($this->sentencia);
    }

    public function cerrar_conexion() {
        $this->conexion->close();
    }
}
?>