<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

/*	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario,:password,:email)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

*/

		#INGRESO USUARIO

	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT UserAdmin, password FROM $tabla WHERE UserAdmin = :UserAdmin");
		$stmt->bindParam(":UserAdmin", $datosModel["UserAdmin"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		//return $stmt->fetchAll(PDO::FETCH_CLASS);
		return $stmt->fetchAll();
		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT RFC,nombreCliente, dominio,totalPago,nombreEmpresa,telefonoClienteEmpresa,direccionClienteEmpresa,correoClienteEmpresa FROM $tabla WHERE RFC= :RFC");
		$stmt->bindParam(":RFC", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarUsuarioModel($datosModel, $tabla){

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


/*	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE RFC = :rfc");
		$stmt->bindParam(":rfc", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}*/

}

?>