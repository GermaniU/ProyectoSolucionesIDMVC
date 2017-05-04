<?php 

 class MvcControllerCliente{
     public $rfc;
     public $nombreCliente;
     public $dominio;
     public $totalPago;
     public $telefonoCliente;
     public $nombreEmpresa;
     public $direccionCliente;
     public $correo;
   
	 
	 public function set_rfc($rfc) {
			$this->rfc = $rfc;
	  }
	 public function set_nombreCliente($nombreCliente) {
			$this->nombreCliente = $nombreCliente;
	  }
	 public function set_dominio($dominio) {
			$this->dominio = $dominio;
	  }
	 public function set_totalPago($totalPago) {
			$this->totalPago = $totalPago;
	  }
	 public function set_telefonoCliente($telefonoCliente) {
			$this->telefonoCliente = $telefonoCliente;
	  }
	 public function set_nombreEmpresa($nombreEmpresa) {
			$this->nombreEmpresa = $nombreEmpresa;
	  }
	  public function set_direccionCliente($direccionCliente) {
			$this->direccionCliente = $direccionCliente;
	  }
	  public function set_correo($correo) {
			$this->correo = $correo ;
	  }
	 
	 public function __construct() {
			 if (isset($_POST["RFC"])) {
			 	
			$this->set_rfc( $_POST["RFC"]);
			$this->set_nombreCliente($_POST["nombreCliente"]);
			$this->set_dominio( $_POST["dominio"]);
			$this->set_totalPago( $_POST["totalPago"]);
			$this->set_nombreEmpresa( $_POST["nombreEmpresa"]);
			$this->set_telefonoCliente( $_POST["telefonoClienteEmpresa"]);
			$this->set_direccionCliente( $_POST["direccionClienteEmpresa"]);
			$this->set_correo( $_POST["correoClienteEmpresa"]);
			 }
	  }
		
    #MOSTRAR CLIENTES
    #-----------------------			   

	public function vistaUsuariosController(){

		$respuesta = ModelCliente::vistaUsuariosModel();

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
				<td><a href="index.php?action=editarCliente&RFC='.$item["RFC"].'"><button class="btn btn-outline-primary" >Editar</button></a></td>
				</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["RFC"];
		$respuesta = ModelCliente::editarUsuarioModel($datosController);

		echo'<input type="hidden" value="'.$respuesta["RFC"].'" name="RFC">

             <input type="text" value="'.$respuesta["nombreCliente"].'" name="nombreCliente" required>

			 <input type="text" value="'.$respuesta["dominio"].'" name="dominio" required>

			 <input type="text" value="'.$respuesta["totalPago"].'" name="totalPago" required>

			 <input type="text" value="'.$respuesta["nombreEmpresa"].'" name="nombreEmpresa" required>

			 <input type="text" value="'.$respuesta["telefonoClienteEmpresa"].'" name="telefonoClienteEmpresa" required>

			 <input type="text" value="'.$respuesta["direccionClienteEmpresa"].'" name="direccionClienteEmpresa" required>

			 <input type="email" value="'.$respuesta["correoClienteEmpresa"].'" name="correoClienteEmpresa" required>

			 <input type="submit" value="Actualizar">';

	}

#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){
        $errores ='';
		if(isset($_POST["nombreCliente"])){
         //-----Obtener datos del formulario-----
		         $rfc = $this->rfc;
		         $cliente =$this->nombreCliente;
		         $dominio = $this->dominio;
		         $totalpago =$this->totalPago;
		         $nombreempresa =$this->nombreEmpresa;
		         $telefono = $this->telefonoCliente;
		         $direccioncliente = $this->direccionCliente;
		         $correo = $this->correo;
           
         //--------Metodos para validar que los datos ingresados sean correctos
         
				
				 /*$cliente = trim($cliente);
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
				}*/
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
               $respuesta = ModelCliente::actualizarUsuarioModel($datosController);
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
 #Agregar Cliente
 #-----------------------------
 #AGREGAR CLIENTE A LA BASE DE DATOS
	#-----------------------------------------------
	public function agregarClienteBDController(){
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


		/*		 $cliente = trim($cliente);
				 $cliente = filter_var($cliente, FILTER_SANITIZE_STRING);

				 $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

				 if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
						$errores .= 'Por favor ingresa un correo valido <br />';
				 }

				 $dominio = trim($dominio);
				 $dominio = filter_var($dominio, FILTER_SANITIZE_STRING);

				 $totalpago = trim($totalpago);*/


         //-----------------------guardar datos en un arreglo para la clase CRUD

			     $datosController = array( "RFC"=>$rfc,
							          "nombreCliente"=>$cliente,
				                      "dominio"=>$dominio,
				                      "totalPago"=>$totalpago,
				                      "nombreEmpresa"=>$nombreempresa,
				                      "telefonoClienteEmpresa"=>$telefono,
				                      "direccionClienteEmpresa"=>$direccioncliente,
				                      "correoClienteEmpresa"=>$correo);


        //------------------------Comprobar que no contenga errores--------------------

			if(!$errores){
                     $respuesta = ModelCliente::registroClienteModel($datosController);
	                 if($respuesta == "success"){

					header("location:index.php?action=IngresarAdministrador");

				     }else{

					  print_r($respuesta);
				    }
			}else{
				echo $errores;
			}
		}
    }


}

 ?>