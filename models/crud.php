<?php

require_once "conexion.php";

class Datos extends Conexion{


    #INGRESO USUARIO

	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT UserAdmin, password FROM $tabla WHERE UserAdmin = :UserAdmin");
		$stmt->bindParam(":UserAdmin", $datosModel["UserAdmin"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA CLIENTE
	#-------------------------------------

	public function vistaClienteModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();

	}

	#EDITAR CLIENTE
	#-------------------------------------

	public function editarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM $tabla WHERE RFC= :RFC");
		$stmt->bindParam(":RFC", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET RFC = :rfc, nombreCliente = :nombrecliente, dominio = :dominioh, totalPago = :totalpago, nombreEmpresa = :nombreempresa, telefonoClienteEmpresa = :telefonoclienteempresa, direccionClienteEmpresa = :direccionclienteempresa,correoClienteEmpresa = :correoclienteempresa WHERE RFC = :rfc");

		$stmt->bindParam(":rfc", $datosModel["RFC"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrecliente", $datosModel["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":dominioh", $datosModel["dominio"], PDO::PARAM_STR);
		$stmt->bindParam(":totalpago", $datosModel["totalPago"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreempresa", $datosModel["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":telefonoclienteempresa", $datosModel["telefonoClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":direccionclienteempresa", $datosModel["direccionClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":correoclienteempresa", $datosModel["correoClienteEmpresa"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#AGREGAR CLIENTE
	#---------------------------------------------------
	public function registroClienteModel($datosModel, $tabla){



		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO $tabla (
			
			RFC,nombreCliente,dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa ) 

			VALUES (
			:rfc,:nombrecliente,:dominioh,:totalpago,:nombreempresa,:telefonoclienteempresa,:direccionclienteempresa,:correoclienteempresa");	

		$stmt->bindParam(":rfc", $datosModel["RFC"], PDO::PARAM_STR);
		$stmt->bindParam(":nombrecliente", $datosModel["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":dominioh", $datosModel["dominio"], PDO::PARAM_STR);
		$stmt->bindParam(":totalpago", $datosModel["totalPago"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreempresa", $datosModel["nombreEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":telefonoclienteempresa", $datosModel["telefonoClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":direccionclienteempresa", $datosModel["direccionClienteEmpresa"], PDO::PARAM_STR);
		$stmt->bindParam(":correoclienteempresa", $datosModel["correoClienteEmpresa"], PDO::PARAM_STR);


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