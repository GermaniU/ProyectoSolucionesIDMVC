<?php 

require_once "conexionBD.php";

class ModelPaquete extends Conexion{

    #VISTA PAQUETE
	#-------------------------------
	public static function visualizarPaqueteModel(){

		$stmt = Conexion::conectar()->prepare("SELECT idPaquete,nombrePaquete,costoPaquete,tipoPaquete,descripcionPaquete FROM Paquete");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}	
	#EDITAR PAQUETE
	#-------------------------------------
  public static function editarPaqueteModel($idPaquete){

		$stmt = Conexion::conectar()->prepare("SELECT idPaquete,nombrePaquete,costoPaquete,tipoPaquete,descripcionPaquete FROM Paquete WHERE idPaquete= :idPaquete");
		$stmt->bindParam(":idPaquete", $idPaquete, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
   #BUSCAR PAQUETE PARA EL SERVICIO
   #-------------------------------------------------
   public static function buscarPaquete($nombrepaquete){
       
		$stmt = Conexion::conectar()->prepare("SELECT nombrePaquete,costoPaquete,tipoPaquete,descripcionPaquete FROM Paquete WHERE nombrePaquete= :nombrepaquete");

		$stmt->bindParam(":nombrepaquete",$nombrepaquete, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	
	#ACTUALIZAR PAQUETE
	#-------------------------------------
	public static function actualizarPaqueteModel($datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE Paquete SET idPaquete = :idpaquete, nombrePaquete = :nombrepaquete, costoPaquete = :costopaquete, tipoPaquete = :tipopaquete, descripcionPaquete = :descripcionpaquete WHERE idPaquete = :idpaquete");

		$stmt->bindParam(":idpaquete", $datosModel["idPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrepaquete", $datosModel["nombrePaquete"], PDO::PARAM_STR);
		//$stmt->bindParam(":idservicio", $datosModel["idServicio"], PDO::PARAM_STR);
		$stmt->bindParam(":costopaquete", $datosModel["costoPaquete"], PDO::PARAM_INT);
		$stmt->bindParam(":tipopaquete", $datosModel["tipoPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionpaquete", $datosModel["descripcionPaquete"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#AGREGAR PAQUETE
	#----------------------------------------
	public static function registrarPaqueteModel($datosModel){



		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO Paquete (nombrePaquete,costoPaquete,tipoPaquete,descripcionPaquete ) 

			VALUES (
			:nombrepaquete,:costopaquete,:tipopaquete,:descripcionpaquete)");	

		//$stmt->bindParam(":idpaquete", $datosModel["idPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrepaquete", $datosModel["nombrePaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":costopaquete", $datosModel["costoPaquete"], PDO::PARAM_INT);
		$stmt->bindParam(":tipopaquete", $datosModel["tipoPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionpaquete", $datosModel["descripcionPaquete"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "success";

		}

		else{

			return $stmt->errorInfo();

		}

		$stmt->close();

	}

	
}




?>