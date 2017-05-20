<?php 

require_once "conexionBD.php";

class ModelCliente extends Conexion{

 #VISTA USUARIOS
	#-------------------------------------

	public static function visualizarClienteModel(){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM Cliente");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public static function editarClienteModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM Cliente WHERE RFC= :RFC");
		$stmt->bindParam(":RFC", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR CLIENTE
	#-------------------------------------
	public static function actualizarClienteModel($datosModel){

	  $stmt = Conexion::conectar()->prepare(
	    	"UPDATE Cliente SET 
	    	RFC = :rfc, 
	    	nombreCliente = :nombrecliente, 
	    	dominio = :dominio, 
	    	nombreEmpresa = :nombreempresa, 
	    	telefonoClienteEmpresa = :telefono, 
	    	direccionClienteEmpresa = :direccion,
	    	correoClienteEmpresa = :correo
	    	WHERE RFC = :rfcant");

		$stmt->bindParam(":rfc", $datosModel["RFC"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrecliente", $datosModel["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":dominio", $datosModel["dominio"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreempresa", $datosModel["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefonoClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datosModel["direccionClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datosModel["correoClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":rfcant", $datosModel["rfcAnterior"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();
	}

	#AGREGAR CLIENTE
	#----------------------------------------
	public static function registrarClienteModel($datosModel){



		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO Cliente (RFC,nombreCliente,dominio,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa ) 

			VALUES (
			:rfc,:nombrecliente,:dominioh,:nombreempresa,:telefonoclienteempresa,:direccionclienteempresa,:correoclienteempresa)");	

		$stmt->bindParam(":rfc", $datosModel["RFC"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrecliente", $datosModel["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":dominioh", $datosModel["dominio"], PDO::PARAM_STR);
		$stmt->bindParam(":nombreempresa", $datosModel["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":telefonoclienteempresa", $datosModel["telefonoClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":direccionclienteempresa", $datosModel["direccionClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":correoclienteempresa", $datosModel["correoClienteEmpresa"], PDO::PARAM_STR);


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