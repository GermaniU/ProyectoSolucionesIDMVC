<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=u700675089_soluc","root","ger3uicab");
		return $link;

	}

}

?>
