<?php 

require_once "conexionBD.php";

class ModelPaquete extends Conexion{
	
    #VISTA PAQUETE
	#-------------------------------
	public function vistaPaqueteModel(){

		$stmt = Conexion::conectar()->prepare("SELECT idPaquete,nombrePaquete, idServicio,costoPaquete,tipoPaquete,descripcionPaquete,estado FROM Paquete");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}	
	#EDITAR PAQUETE
	#-------------------------------------
  public function editarPaqueteModel($rfc){

		$stmt = Conexion::conectar()->prepare("SELECT idPaquete,nombrePaquete,nombrePaquete, idServicio,costoPaquete,tipoPaquete,descripcionPaquete,estado FROM Paquete WHERE idPaquete= :idPaquete");
		$stmt->bindParam(":idPaquete", $rfc, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	#ACTUALIZAR PAQUETE
	#-------------------------------------
	public function actualizarPaqueteModel($datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE Paquete SET idPaquete = :idpaquete, nombrePaquete = :nombrepaquete, idServicio = :idservicio, costoPaquete = :costopaquete, tipoPaquete = :tipopaquete, descripcionPaquete = :descripcionpaquete, estado = :estado WHERE idPaquete = :idpaquete");

		$stmt->bindParam(":idpaquete", $datosModel["idPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrepaquete", $datosModel["nombrePaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":idservicio", $datosModel["idServicio"], PDO::PARAM_STR);
		$stmt->bindParam(":costopaquete", $datosModel["costoPaquete"], PDO::PARAM_INT);
		$stmt->bindParam(":tipopaquete", $datosModel["tipoPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionpaquete", $datosModel["descripcionPaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datosModel["estado"], PDO::PARAM_STR);
	

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