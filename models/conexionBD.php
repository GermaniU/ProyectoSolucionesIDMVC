<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=u700675089_soluc","u700675089_germa","ger3uicab");
		return $link;

	}

}

?>
