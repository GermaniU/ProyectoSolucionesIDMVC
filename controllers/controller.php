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
				<td><a href="index.php?action=editarUsuario&RFC='.$item["RFC"].'"><button class="btn btn-outline-primary">Editar</button></a></td>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["RFC"];
		$respuesta = Datos::editarUsuarioModel($datosController, "Cliente");

		echo'
		<div class="container">
		<input type="hidden" class="form-control" value="'.$respuesta["RFC"].'" name="RFC">

		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Nombre: </label>
  				<div class="col-10">
             <input type="text" class="form-control" value="'.$respuesta["nombreCliente"].'" name="nombreCliente" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Dominio: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="'.$respuesta["dominio"].'" name="dominio" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Total pagado: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="'.$respuesta["totalPago"].'" name="totalPago" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Nombre de la Empresa: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="'.$respuesta["nombreEmpresa"].'" name="nombreEmpresa" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Telefono: </label>
  				<div class="col-10">
			 <input type="text" class="form-control"" value="'.$respuesta["telefonoClienteEmpresa"].'" name="telefonoClienteEmpresa" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Direccion: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="'.$respuesta["direccionClienteEmpresa"].'" name="direccionClienteEmpresa" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Correo: </label>
  				<div class="col-10">
			 <input type="email" class="form-control" value="'.$respuesta["correoClienteEmpresa"].'" name="correoClienteEmpresa" required>
				</div>
		</div>
			 <input type="submit" class=" btn btn-warning" value="Actualizar">
		</div>
			 ';

	}

#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){
        $errores ='';
		if(isset($_POST["nombreCliente"])){
         //-----Obtener datos del formulario-----
		         $rfc = $_POST["RFC"];
		         $cliente =$_POST["nombreCliente"];
		         $dominio = $_POST["dominio"];
		         $totalpago =$_POST["totalPago"];
		         $nombreempresa =$_POST["nombreEmpresa"];
		         $telefono = $_POST["telefonoClienteEmpresa"];
		         $direccioncliente = $_POST["direccionClienteEmpresa"];
		         $correo = $_POST["correoClienteEmpresa"];

         //--------Metodos para validar que los datos ingresados sean correctos


				 $cliente = trim($cliente);
				 $cliente = filter_var($cliente, FILTER_SANITIZE_STRING);

				 $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

				 if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
					$errores .= 'Por favor ingresa un correo valido <br />';
				}

				 $dominio = trim($dominio);
				 $dominio = filter_var($dominio, FILTER_SANITIZE_STRING);

				 $totalpago = trim($totalpago);

				 if(!filter_var($correo, FILTER_SANITIZE_NUMBER_FLOAT)){
					$errores .= 'Por favor ingresa una cantidad valida <br />';
				}
         //-----------------------------------

			$datosController = array( "RFC"=>$rfc,
							          "nombreCliente"=>$cliente,
				                      "dominio"=>$dominio,
				                      "totalPago"=>$totalpago,
				                      "nombreEmpresa"=>$nombreempresa,
				                      "telefonoClienteEmpresa"=>$telefono,
				                      "direccionClienteEmpresa"=>$direccioncliente,
				                      "correoClienteEmpresa"=>$correo);

			if(!$errores){
               $respuesta = Datos::actualizarUsuarioModel($datosController, "Cliente");
	                 if($respuesta == "success"){

					header("location:index.php?action=cambio");

				}

				else{

					echo "error";
				}
			}else{
				echo $errores;
			}




     }
}
	/*

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