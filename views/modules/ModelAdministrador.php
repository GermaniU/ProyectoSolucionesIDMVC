<?php
require_once "conexionBD.php";

class ModelAdministrador extends Conexion{

	#INGRESO USUARIO
		
	#-------------------------------------
	public static function ingresoAdministradorModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT UserAdmin, password FROM Administrador WHERE UserAdmin = :UserAdmin");	
		$stmt->bindParam(":UserAdmin", $datosModel["UserAdmin"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	public static function DatosAdministrador(){

		$stmt = Conexion::conectar()->prepare("SELECT UserAdmin, password FROM Administrador");	
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}
	#Modificar contraseña
	#-----------------------------------
	public static function actualizarContrasena($datosModel){

	    $stmt = Conexion::conectar()->prepare("UPDATE Administrador SET UserAdmin = :UserAdmin, password = :password WHERE UserAdmin = :UserAdmin");

		$stmt->bindParam(":UserAdmin", $datosModel["UserAdmin"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


   

}

?>