<?php

 class MvcControllerPaquete{
   public $nombrePaquete;
   public $idPaquete;
   public $costoPaquete;
   public $tipoPaquete;
   public $descripcionPaquete;
   

    public function set_nombrePaquete($nombrePaquete) {
		$this->nombrePaquete = $nombrePaquete;
	}
	public function set_idPaquete($idPaquete) {
			$this->idPaquete = $idPaquete;
	}
	public function set_costoPaquete($costoPaquete) {
			$this->costoPaquete = $costoPaquete;
	}
	public function set_tipoPaquete($tipoPaquete) {
			$this->tipoPaquete = $tipoPaquete;
	}
	public function set_descripcionPaquete($descripcionPaquete) {
			$this->descripcionPaquete = $descripcionPaquete;
	}
	public function set_estado($estado) {
			$this->estado = $estado;
	}

	public function __construct() {
			 if (isset($_POST["idPaquete"])) {

			$this->set_nombrePaquete( $_POST["nombrePaquete"]);
			$this->set_idPaquete($_POST["idPaquete"]);
			$this->set_costoPaquete( $_POST["costoPaquete"]);
			$this->set_tipoPaquete($_POST["tipoPaquete"]);
			$this->set_descripcionPaquete( $_POST["descripcionPaquete"]);
			
			}
	}

	  #MOSTRAT PAQUETES
	  #----------------------------------------------------------
	  public function visualizarPaqueteController(){

		$respuesta = ModelPaquete::visualizarPaqueteModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombrePaquete"].'</td>
				<td>'.$item["tipoPaquete"].'</td>
				<td>'.$item["descripcionPaquete"].'</td>
				<td>'.$item["costoPaquete"].'</td>
								<td><a href="index.php?action=EditarPaquete&idPaquete='.$item["idPaquete"].'"><button class="btn btn-outline-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

					</td>
				</tr>';

		}

	}
	#EDITAR PAQUETE
	#------------------------------------

	public function editarPaqueteController(){

		$idPaquete = $_GET["idPaquete"];
		$respuesta = ModelPaquete::editarPaqueteModel($idPaquete);

		return $respuesta;



	}
	#ACTUALIZAR PAQUETE
	#------------------------------------
	public function actualizarPaqueteController(){
      $errores ='';
    if(isset($_POST["nombrePaquete"])){
		//-----Obtener datos del formulario-----
   				$nombrePaquete=$this->nombrePaquete;
   				$idPaquete=$this->idPaquete;
    			$costoPaquete=$this->costoPaquete;
   				$tipoPaquete=$this->tipoPaquete;
  				$descripcionPaquete=$this->descripcionPaquete;
   				if (isset($_POST["nombreAnterior"])) {
   					$nombreAnterior = $_POST["nombreAnterior"];
   				}

          #metodos de validacion
	      //---------------------------------------------------------------------
			    if ($costoPaquete < 0) {
			        $errores = "Ingresa una cantidad válida positiva";
			    }
			    elseif (!preg_match("/[a-zA-Z].[0-9]|[a-zA-Z]+([,])$/",$descripcionPaquete))
			    {
			        $errores = "Ingresa una descripcion válida";
			    }
			    elseif (!preg_match("/{^[_a-zA-Z].[0-9]|[a-zA-Z]$/",$nombrePaquete))
			    {
			        $errores = "Ingresa un nombre de paquete válido";
			    }
			    elseif (!preg_match("/^[_a-zA-Z].[0-9]|[a-zA-Z]$/",$tipoPaquete))
			    {
			        $errores = "Ingresa un nombre de paquete válido";
			    }
			    if ($nombrePaquete == $nombreAnterior) {  	
	            
	            }else{
	            	$respuesta1 = ModelPaquete::visualizarPaqueteModel();
				    foreach($respuesta1 as $row => $item){
	                  if ($item["nombrePaquete"]==$nombrePaquete) {
	              	  		$errores ="Paquete existente";
	              	  }
	             }
	            }
	        #--------------------------------------------------------------------
           //-----------------------guardar datos en un arreglo para la base de datos------------------

			     $datosController = array( "nombrePaquete"=>$nombrePaquete,
							          "idPaquete"=>$idPaquete,
				                      "costoPaquete"=>$costoPaquete,
				                      "tipoPaquete"=>$tipoPaquete,
				                      "descripcionPaquete"=>$descripcionPaquete
				                          );

		 // ---------------------Si no hay errores enviar a la base de datos------------------------------

           if(!$errores){

                  $respuesta = ModelPaquete::actualizarPaqueteModel($datosController);

                  if($respuesta == "success"){
					header("location:index.php?action=cambioPaquete");
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



 #Agregar Paquete
	#-----------------------------------------------
	public function agregarPaqueteBDController(){
         $errores ='';
		if(isset($_POST["nombrePaquete"])){
          //-----Obtener datos del formulario-----
		        $nombrePaquete=$this->nombrePaquete;
   				$idPaquete=$this->idPaquete;
    			$costoPaquete=$this->costoPaquete;
   				$tipoPaquete=$this->tipoPaquete;
  				$descripcionPaquete=$this->descripcionPaquete;
          #metodos de validacion
	      //---------------------------------------------------------------------

			    if ($costoPaquete < 0) {
			        $errores = "Ingresa una cantidad válida positiva";
			    }
			    elseif (!preg_match("/[a-zA-Z].[0-9]|[a-zA-Z]$/",$descripcionPaquete))
			    {
			        $errores = "Ingresa una descripcion válida";
			    }
			    elseif (!preg_match("/^[a-zA-Z].[0-9]|[a-zA-Z]$/",$nombrePaquete))
			    {
			        $errores = "Ingresa un nombre de paquete válido";
			    }
			    elseif (!preg_match("/^[a-zA-Z].[0-9]|[a-zA-Z]$/",$tipoPaquete))
			    {
			        $errores = "Ingresa un nombre de paquete válido";
			    }
			    #VALIDAR nombres IGUAL
	            #-------------------------------------------------------------------
	             $respuesta1 = ModelPaquete::visualizarPaqueteModel();
				 foreach($respuesta1 as $row => $item){
	                  if ($item["nombrePaquete"]== $nombrePaquete) {
	              	  		$errores ="Nombre de paquete Existente";
	              	  }
	             }

	            #--------------------------------------------------------------------
       //-----------------------guardar datos en un arreglo para la base de datos------------------

			     $datosController = array( "nombrePaquete"=>$nombrePaquete,
							          "idPaquete"=>$idPaquete,
				                      "costoPaquete"=>$costoPaquete,
				                      "tipoPaquete"=>$tipoPaquete,
				                      "descripcionPaquete"=>$descripcionPaquete
				                         );

		 // ---------------------Si no hay errores enviar a la base de datos------------------------------
           if(!$errores){

                  $respuesta = ModelPaquete::registrarPaqueteModel($datosController);
                  if($respuesta == "success"){

					header("location:index.php?action=cambioPaquete");
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