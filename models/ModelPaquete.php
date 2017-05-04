<?php 

require_once "conexionBD.php";

class ModelPaquete extends Conexion{
    #VISTA USUARIOS
	#-------------------------------
	public function vistaPaqueteModel(){

		$stmt = Conexion::conectar()->prepare("SELECT idPaquete,nombrePaquete, idServicio,costoPaquete,tipoPaquete,descripcionPaquete,estado FROM Paquete");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}	
}

?>