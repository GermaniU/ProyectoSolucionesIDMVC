<?php 

require_once 'conexionBD.php';

class ModelServicio extends Conexion{
	#VISTA SERVICIO	
	#---------------------------------
	public function vistaServicioModel(){

		$stmt = Conexion::conectar()->prepare("SELECT idServicio,RFC,nombrePaquete,costoServicio,descripcionServicio,inicioServicio,fechadeRenovacion,descripcionServicioExtra,estadoServicio FROM Servicio");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#AGREGAR SERVICIO
	#-----------------------------------
	public function registroServicioModel($datosModel){

		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO Servicio(RFC,nombrePaquete,costoServicio,descripcionServicio,inicioServicio,fechadeRenovacion,descripcionServicioExtra,estadoServicio) 
		
			VALUES (
			:rfc,:nombrepaquete,:costoservicio,:descripcionservicio,:inicioservicio,:fechaderenovacion,:descripcionservicioextra,:estadoservicio)");	

		//$stmt->bindParam(":idservicio", $datosModel["idServicio"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datosModel["RFC"], PDO::PARAM_STR);

		$stmt->bindParam(":nombrepaquete", $datosModel["nombrePaquete"], PDO::PARAM_STR);

		$stmt->bindParam(":costoservicio", $datosModel["costoServicio"], PDO::PARAM_INT);
		
		$stmt->bindParam(":descripcionservicio", $datosModel["
			descripcionServicio"], PDO::PARAM_STR);
		
		$stmt->bindParam(":inicioservicio", $datosModel["inicioServicio"], PDO::PARAM_STR);
		
		$stmt->bindParam(":fechaderenovacion", $datosModel["fechadeRenovacion"], PDO::PARAM_STR);

		$stmt->bindParam(":descripcionservicioextra", $datosModel["descripcionServicioExtra"], PDO::PARAM_STR);

		$stmt->bindParam(":estadoservicio", $datosModel["estadoServicio"], PDO::PARAM_STR);

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

