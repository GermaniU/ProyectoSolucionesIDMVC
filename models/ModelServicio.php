
<?php 
require_once 'conexionBD.php';
class ModelServicio extends Conexion{
	#VISTA SERVICIO	
	#---------------------------------
	public static function visualizarServicioModel(){
		$stmt = Conexion::conectar()->prepare("SELECT idServicio,RFC,nombrePaquete,costoServicio,descripcion,inicioServicio,fechadeRenovacion,descripcionServicioExtra FROM Servicio");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}
	#TRAER INFORMACION DEL SERVICIO A EDITAR
	#-----------------------------------------------------
	public static function editarServicioModel($idServicio){

		$stmt = Conexion::conectar()->prepare("SELECT idServicio,RFC,nombrePaquete,costoServicio,descripcion,inicioServicio,fechadeRenovacion,descripcionServicioExtra FROM Servicio WHERE idServicio= :idServicio");
		$stmt->bindParam(":idServicio", $idServicio, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	#EDITAR INFORMACION DEL SERVICIO A LA BASE DE DATOS
	#------------------------------------------------------------
	public static function actualizarServicioModel($datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE Servicio SET 
			idServicio = :idservicio,
			RFC = :rfc, 
			nombrePaquete = :nombrepaquete,
			costoServicio = :costoservicio,
			descripcion = :descripcion,
		    inicioServicio = :inicioservicio,
			fechadeRenovacion = :fechaderenovacion,
			descripcionServicioExtra = :descripcionservicioextra,
			WHERE idServicio = :idservicio");

		$stmt->bindParam(":idservicio", $datosModel["idServicio"], PDO::PARAM_STR);
        $stmt->bindParam(":rfc", $datosModel["RFC"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrepaquete", $datosModel["nombrePaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":costoservicio", $datosModel["costoServicio"], PDO::PARAM_INT);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":inicioservicio", $datosModel["inicioServicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaderenovacion", $datosModel["fechadeRenovacion"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionservicioextra", $datosModel["descripcionServicioExtra"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#AGREGAR SERVICIO
	#-----------------------------------
	public static function registrarServicioModel($datosModel){
		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO Servicio(RFC,nombrePaquete,costoServicio,descripcion,inicioServicio,fechadeRenovacion,descripcionServicioExtra) 
		
			VALUES (
			:rfc,:nombrepaquete,:costoservicio,:descripcion,:inicioservicio,:fechaderenovacion,:descripcionservicioextra,)");	
		//$stmt->bindParam(":idservicio", $datosModel["idServicio"], PDO::PARAM_STR);
		$stmt->bindParam(":rfc", $datosModel["RFC"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrepaquete", $datosModel["nombrePaquete"], PDO::PARAM_STR);
		$stmt->bindParam(":costoservicio", $datosModel["costoServicio"], PDO::PARAM_INT);
		
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);

		$stmt->bindParam(":inicioservicio", $datosModel["inicioServicio"], PDO::PARAM_STR);
		
		$stmt->bindParam(":fechaderenovacion", $datosModel["fechadeRenovacion"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcionservicioextra", $datosModel["descripcionServicioExtra"], PDO::PARAM_STR);
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