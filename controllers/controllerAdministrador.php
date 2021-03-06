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
	public function ingresarAdministradorController(){

		if(isset($_POST["usuariof"])){

			$datosController = array( "UserAdmin"=>$_POST["usuariof"], 
								      "password"=>$_POST["passwordf"]);

			$respuesta = ModelAdministrador::ingresarAdministradorModel($datosController, "Administrador");

			if($respuesta["UserAdmin"] == $_POST["usuariof"] && $respuesta["password"] == $_POST["passwordf"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=RegistrosClientes");

			}

			else{
				$errores = "Falló al iniciar sesión";

				//header("location:index.php?action=fallo");
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

		}	

	}

	#--------------------------------------------
	# CAMBIAR CONTRASEÑA
    public function cambiarContraseñaAdministradorController(){
         //$usuario = $_POST["usuario"];
        $errores ='';
		if(isset($_POST["contrasenaActual"])){

         	$password = $_POST["contrasenaActual"];
         	$contrasenaNueva = $_POST["contrasenaNueva"];
            $VerificarContrasena= $_POST["verificarContrasena"];

            $respuesta1	= ModelAdministrador::DatosAdministradorModel();
            

            if ($respuesta1["password"] == $password) {
               
            }else {
               $errores = "La contraseña Actual no concide";
            }


         
            if ($contrasenaNueva == $VerificarContrasena) {
           
            }else{

                $errores = "Las Contraseñas no coinciden";

            }


            $datosController = array( "UserAdmin"=>$respuesta1["UserAdmin"], 
								      "password"=>$contrasenaNueva);

            if (!$errores) {
        

                 $respuesta=ModelAdministrador::actualizarContrasena($datosController);

                 if($respuesta == "success"){

					header("location:index.php?action=cambioContraseña");
			      }


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

	


		}
         
    }

}

?>