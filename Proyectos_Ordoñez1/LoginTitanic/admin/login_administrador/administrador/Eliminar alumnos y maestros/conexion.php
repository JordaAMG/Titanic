<?php
   class Conexion{
    private $host = 'localhost';
    private $usuario= 'root';
    private $password = '';
    private $base = 'titanic';
    public $sentencia;
    private $rows = array();
    private $conexion;

    private function abrir_conexion(){
      $this->conexion = new mysqli($this->host,$this->usuario,$this->password,$this->base);

       // Verificar si hay un error en la conexión
        if ($this->conexion->connect_error) {
            die('Error de conexión: (' . $this->conexion->connect_errno . ') ' . $this->conexion->connect_error);
        }
    }
    
    private function cerrar_conexion(){
      $this->conexion->close();
    }

    public function ejecutar_sentencia(){
      $this->abrir_conexion();
      $bandera = $this->conexion->query($this->sentencia);
      $this->cerrar_conexion();
      return $bandera;
    }

    public function obtener_sentencia(){
      $this->abrir_conexion();
      $result = $this->conexion->query($this->sentencia);
      return $result;
    }
  }
?>