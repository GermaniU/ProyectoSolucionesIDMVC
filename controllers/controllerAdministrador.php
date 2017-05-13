<?php

class ControllerAdministrador{

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
	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuariof"])){

			$datosController = array( "UserAdmin"=>$_POST["usuariof"], 
								      "password"=>$_POST["passwordf"]);

			$respuesta = ModelAdministrador::ingresoAdministradorModel($datosController, "Administrador");

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

	#--------------------------------------------
	# CAMBIAR CONTRASEÑA
    public function cambiarContraseñaAdministrador(){
         //$usuario = $_POST["usuario"];
        $errores ='';
		if(isset($_POST["contrasenaActual"])){

         	$password = $_POST["contrasenaActual"];
         	$contraseñaActual = $_POST["contrasenaActual"];
            $VerificarContrasena= $_POST["verificarContrasena"];
            $respuesta1	= ModelAdministrador::ingresoAdministradorModel($datosController, "Administrador");
            
            if ($respuesta["password"] == $_POST["passwordf"]) {

            }else{
                $errores = "Las Contraseñas actual no coincide";

            }
            if (!$password == $VerificarContrasena) {
               $errores = "Las Contraseñas no coinciden";
            }

            if (!$errores) {
            	
            }else{
            	echo "<div id='errorAgregarCliente'></div>
				     		<div class='modal fade' id='modalError' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
							  <div class='modal-dialog' role='document'>
							    <div class='modal-content'>
							      <div class='modal-header'>
							        <h5 class='modal-title' id='exampleModalLabel'>Error</h5>
							        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
							          <span aria-hidden='true'>&times;</span>
							        </button>
							      </div>
							      <div class='modal-body'>
							          $errores
							      </div>
							      <div class='modal-footer'>
							        <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
							      </div>
							    </div>
							  </div>
							</div>";
            }

            $datosController = array("password"=>$password);
	
	        print_r($datosController);

		}
         
    }

}

?>