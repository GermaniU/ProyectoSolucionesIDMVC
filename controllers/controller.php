<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	/*#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      "email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}
*/
	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuariof"])){

			$datosController = array( "UserAdmin"=>$_POST["usuariof"], 
								      "password"=>$_POST["passwordf"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "Administrador");

			if($respuesta["UserAdmin"] == $_POST["usuariof"] && $respuesta["password"] == $_POST["passwordf"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=clientes");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("Cliente");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["RFC"].'</td>
				<td>'.$item["nombreCliente"].'</td>
				<td>'.$item["dominio"].'</td>
				<td>'.$item["totalPago"].'</td>
				<td>'.$item["nombreEmpresa"].'</td>
				<td>'.$item["telefonoClienteEmpresa"].'</td>
				<td>'.$item["direccionClienteEmpresa"].'</td>
				<td>'.$item["correoClienteEmpresa"].'</td>
				<td><a href="index.php?action=editarUsuario&RFC='.$item["RFC"].'"><button>Editar</button></a></td>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["RFC"];
		$respuesta = Datos::editarUsuarioModel($datosController, "Cliente");

		echo'<input type="hidden" value="'.$respuesta["RFC"].'" name="RFC">

			 <input type="text" value="'.$respuesta["nombreCliente"].'" name="nombreCliente" required>

			 <input type="text" value="'.$respuesta["dominio"].'" name="dominio" required>

			 <input type="email" value="'.$respuesta["totalPago"].'" name="totalPago" required>

			 <input type="text" value="'.$respuesta["nombreEmpresa"].'" name="nombreEmpresa" required>

			 <input type="text" value="'.$respuesta["telefonoClienteEmpresa"].'" name="telefonoClienteEmpresa" required>

			 <input type="email" value="'.$respuesta["direccionClienteEmpresa"].'" name="direccionClienteEmpresa" required>

			 <input type="email" value="'.$respuesta["correoClienteEmpresa"].'" name="correoClienteEmpresa" required>

			 <input type="submit" value="Actualizar">';

	}

/*	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "Cliente");

			if($respuesta == "success"){

				header("location:index.php?action=clientes");
			
			}

		}

	}*/

}

?>