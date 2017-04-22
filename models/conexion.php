<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=solucionesid","root","ger3uicab");
		return $link;

	}

}

?>