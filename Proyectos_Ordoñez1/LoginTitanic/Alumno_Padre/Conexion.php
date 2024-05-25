<?php
class Conexion{
	private $host = 'localhost';//se establece conexion con el servidor se declara el servidor

	private $usuario = 'root';//declara rl usuario en phpmyadmin



	private $password = '';//dice que no tine contraseña

	private $base ='Titanic';//aqui se hace la conexxion con la base de datos

	public $sentencia;//esta variable nos ayudara a hacer sentencias en mysql

	private $rows = array();//estra la utilizaremos para la consulta

	private $conexion;//esta nos ayudara a traer un metodo a mi clase conexion

//aqui se esta haciendo el metodo
	private function abrir_conexion(){
		$this->conexion=new mysqli($this->host,$this->usuario,$this->password,$this->base);
	}

	//aqi se esta cerrando la conexion con la base de datos
	private function cerrar_conexion(){
		$this->conexion->close();
	}

	public function ejecutar_sentencia(){

		$this->abrir_conexion();
		//bandea se declara para ejecutar la conexion query es para ejecutar la sentencia
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