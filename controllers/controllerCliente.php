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

	public function visualizarClienteController(){

		$respuesta = ModelCliente::visualizarClienteModel();

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
				<td>
				<p><a href="index.php?action=editarCliente&RFC='.$item["RFC"].'"><button class="btn btn-outline-primary" ><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
				</p>
				<p><a href="index.php?action=agregarServicio&RFC='.$item["RFC"].'"><button class="btn btn-outline-primary" ><i class="fa fa-suitcase" aria-hidden="true"></i></button></a>
				</p>
				</td>
				</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarClienteController(){

		$datosController = $_GET["RFC"];
		$respuesta = ModelCliente::editarClienteModel($datosController);

		return $respuesta;
	}

#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarClienteController(){
        $errores ='';
		if(isset($_POST["nombreCliente"])){
         //-----Obtener datos del formulario-----
		         $rfc = $this->rfc;
		         $cliente =$this->nombreCliente;
		         $dominio = $this->dominio;
		         $totalpago =$this->totalPago;
		         $nombreempresa =$this->nombreEmpresa;
		         $telefono = $_POST["telefonoClienteEmpresa"];
		         $direccioncliente = $this->direccionCliente;
		         $correo = $this->correo;
		         $rfcAnterior = $_POST["rfcAnterior"];

          #metodos de validacion
	      //---------------------------------------------------------------------
				if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
				 		  $errores .= 'Por favor ingresa un correo valido <br />';
			     }
			    elseif (!preg_match("/[a-zA-Z-]$/",$cliente))
			    {
			        $errores = "Ingresa un nombre  valido";
			    }
			    elseif (!preg_match("/[a-zA-Z-.-]$/",$dominio))
			    {
			        $errores = "Ingresa un domino valido";
			    }
			    elseif (!preg_match("/^[0-9]{10}$/",$telefono))
			    {
			        $errores = "Ingresa un telefono valido";
			    }

			    elseif($totalpago < 0 ) //check for a pattern of 91-0123456789
			    {
			        $errores = "Ingresa un numero valido";
			    }
			    elseif (!preg_match("/[a-zA-Z-0-9]$/",$direccioncliente))
			    {
			        $errores = "Ingresa una direccion valida";
			    }
			    
			    //------------------------GUARDAR DATOS PARA LA BASE DE DATOS---------

			     $datosController = array( "RFC"=>$rfc,
							          "nombreCliente"=>$cliente,
				                      "dominio"=>$dominio,
				                      "totalPago"=>$totalpago,
				                      "nombreEmpresa"=>$nombreempresa,
				                      "telefonoClienteEmpresa"=>$telefono,
				                      "direccionClienteEmpresa"=>$direccioncliente,
				                      "correoClienteEmpresa"=>$correo,
				                      "rfcAnterior" =>$rfcAnterior); // LINEA AGREGADA

			     if ($rfc == $rfcAnterior) {
			     	
			     	
	            }else{
	            	$respuesta1 = ModelCliente::visualizarClienteModel();
				    foreach($respuesta1 as $row => $item){
	                  if ($item["RFC"]==$rfc) {
	              	  		$errores ="Cliente existente";
	              	  }
	             }
	            }
			

           if(!$errores){

                    $respuesta = ModelCliente::actualizarClienteModel($datosController);
                    echo $respuesta;
	                if($respuesta == "success"){

					header("location:index.php?action=cambioCliente");
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
 #Agregar Cliente
 #-----------------------------
 #AGREGAR CLIENTE A LA BASE DE DATOS
	#-----------------------------------------------
	public function agregarClienteController(){
        $errores ='';
		if(isset($_POST["nombreCliente"])){
         //-----Obtener datos del formulario-----
		         $rfc = $this->rfc;
		         $cliente =$this->nombreCliente;
		         $dominio =$this->dominio;
		         $totalpago =$this->totalPago;
		         $nombreempresa =$this->nombreEmpresa;
		         $telefono = $this->telefonoCliente;
		         $direccioncliente = $this->direccionCliente;
		         $correo = $this->correo;

				 #metodos de validacion
				//---------------------------------------------------------------------
				if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
				 		  $errores .= 'Por favor ingresa un correo valido <br />';
			     }
			    elseif (!preg_match("/[a-zA-Z-]$/",$cliente))
			    {
			        $errores = "Ingresa un nombre  valido";
			    }
			    elseif (!preg_match("/[a-zA-Z-.-]$/",$dominio))
			    {
			        $errores = "Ingresa un domino valido";
			    }
			    elseif (!preg_match("/^[0-9]{10}$/",$telefono))
			    {
			        $errores = "Ingresa un telefono valido";
			    }
			    elseif($totalpago < 0 ) //check for a pattern of 91-0123456789
			    {
			        $errores = "Ingresa un numero valido";
			    }
			      elseif (!preg_match("/[a-zA-Z-0-9]$/",$direccioncliente))
			    {
			        $errores = "Ingresa una direccion valida";
			    }

				 #VALIDAR RFC IGUAL
	             #-------------------------------------------------------------------
	             $respuesta1 = ModelCliente::visualizarClienteModel();
				 foreach($respuesta1 as $row => $item){
	                  if ($item["RFC"]==$rfc) {
	              	  		$errores ="Cliente existente";
	              	  }
	             }

	            #--------------------------------------------------------------------
			    //------------------------GUARDAR DATOS PARA LA BASE DE DATOS---------

			     $datosController = array( "RFC"=>$rfc,
							          "nombreCliente"=>$cliente,
				                      "dominio"=>$dominio,
				                      "totalPago"=>$totalpago,
				                      "nombreEmpresa"=>$nombreempresa,
				                      "telefonoClienteEmpresa"=>$telefono,
				                      "direccionClienteEmpresa"=>$direccioncliente,
				                      "correoClienteEmpresa"=>$correo);


			     if(!$errores){

                    $respuesta = ModelCliente::registrarClienteModel($datosController);
	                if($respuesta == "success"){

					header("location:index.php?action=cambioCliente");
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