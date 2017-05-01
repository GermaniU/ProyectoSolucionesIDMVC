<?php 

require_once "conexionBD.php";

class ModelCliente extends Conexion{

 #VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel(){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM Cliente");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public function editarUsuarioModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM Cliente WHERE RFC= :RFC");
		$stmt->bindParam(":RFC", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR CLIENTE
	#-------------------------------------
	public function actualizarUsuarioModel($datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE Cliente SET RFC = :rfc, nombreCliente = :nombrecliente, dominio = :dominioh, totalPago = :totalpago, nombreEmpresa = :nombreempresa, telefonoClienteEmpresa = :telefonoclienteempresa, direccionClienteEmpresa = :direccionclienteempresa,correoClienteEmpresa = :correoclienteempresa WHERE RFC = :rfc");

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
	#----------------------------------------
	public function registroClienteModel($datosModel){



		$stmt = Conexion::conectar()->prepare(
			"INSERT INTO Cliente (RFC,nombreCliente,dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa ) 

			VALUES (
			:rfc,:nombrecliente,:dominioh,:totalpago,:nombreempresa,:telefonoclienteempresa,:direccionclienteempresa,:correoclienteempresa)");	

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

			return $stmt->errorInfo();

		}

		$stmt->close();

	}

}
?>