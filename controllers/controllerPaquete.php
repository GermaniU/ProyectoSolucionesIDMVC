<?php

 class MvcControllerPaquete{
   public $nombrePaquete;
   public $idPaquete;
   #public $idServicio;
   public $costoPaquete;
   public $tipoPaquete;
   public $descripcionPaquete;
   public $estado;

    public function set_nombrePaquete($nombrePaquete) {
		$this->nombrePaquete = $nombrePaquete;
	}
	public function set_idPaquete($idPaquete) {
			$this->idPaquete = $idPaquete;
	}
/*	public function set_idServicio($idServicio) {
			$this->idServicio = $idServicio;
	}*/
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
/*			$this->set_idServicio( $_POST["idServicio"]);
*/			$this->set_costoPaquete( $_POST["costoPaquete"]);
			$this->set_tipoPaquete($_POST["tipoPaquete"]);
			$this->set_descripcionPaquete( $_POST["descripcionPaquete"]);
			  if (isset( $_POST["estado"])) {
			  	 $this->set_estado( $_POST["estado"]);
			  }
			 }
	  }

	  #MOSTRAT PAQUETES
	  #----------------------------------------------------------
	 /* <td>'.$item["estado"].'</td>
		<td>'.$item["idServicio"].'</td>*/

	  public function vistaPaqueteController(){

		$respuesta = ModelPaquete::vistaPaqueteModel();
		//		<td>'.$item["idPaquete"].'</td>

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["tipoPaquete"].'</td>
				<td>'.$item["nombrePaquete"].'</td>
				<td>'.$item["descripcionPaquete"].'</td>
				<td>'.$item["costoPaquete"].'</td>
								<td><a href="index.php?action=editarPaquete&idPaquete='.$item["idPaquete"].'"><button class="btn btn-outline-primary"><i class="fa fa-cubes" aria-hidden="true"></i></button></a>

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
/*   			$idServicio=$this->idServicio;
*/   			$costoPaquete=$this->costoPaquete;
   				$tipoPaquete=$this->tipoPaquete;
  				$descripcionPaquete=$this->descripcionPaquete;
   				$estado=$this->estado;
          
          #metodos de validacion
	      //---------------------------------------------------------------------
				  
			    if ($costoPaquete < 0) {
			        $errores = "ingresa una cantidad valida positiva";
			    }
			    elseif (!preg_match("/[_a-zA-Z].[0-9]|[a-zA-Z]$/",$descripcionPaquete)) 
			    { 
			        $errores = "Ingresa una descripcion valida"; 
			    }
			    elseif (!preg_match("/[_a-zA-Z].[0-9]|[a-zA-Z]$/",$nombrePaquete)) 
			    { 
			        $errores = "Ingresa un nombre de paquete valido"; 
			    }
			    elseif (!preg_match("/[_a-zA-Z].[0-9]|[a-zA-Z]$/",$tipoPaquete)) 
			    { 
			        $errores = "Ingresa un nombre de paquete valido"; 
			    }elseif ($estado > 1 || $estado < 0) {
			    	$errores = "Ingresa un estado valido 1 = Activo  0 =Suspendido ";
			    }
         //-----------------------guardar datos en un arreglo para la base de datos------------------

			     $datosController = array( "nombrePaquete"=>$nombrePaquete,
							          "idPaquete"=>$idPaquete,
/*				                      "idServicio"=>$idServicio,
*/				                      "costoPaquete"=>$costoPaquete,
				                      "tipoPaquete"=>$tipoPaquete,
				                      "descripcionPaquete"=>$descripcionPaquete,
				                      "estado"=>$estado);

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
/*   			$idServicio=$this->idServicio;
*/   			$costoPaquete=$this->costoPaquete;
   				$tipoPaquete=$this->tipoPaquete;
  				$descripcionPaquete=$this->descripcionPaquete;
   				$estado=1;
          
          #metodos de validacion
	      //---------------------------------------------------------------------
				  
			    if ($costoPaquete < 0) {
			        $errores = "ingresa una cantidad valida positiva";
			    }
			    elseif (!preg_match("/[_a-zA-Z].[0-9]|[a-zA-Z]$/",$descripcionPaquete)) 
			    { 
			        $errores = "Ingresa una descripcion valida"; 
			    }
			    elseif (!preg_match("/[_a-zA-Z].[0-9]|[a-zA-Z]$/",$nombrePaquete)) 
			    { 
			        $errores = "Ingresa un nombre de paquete valido"; 
			    }
			    elseif (!preg_match("/[_a-zA-Z].[0-9]|[a-zA-Z]$/",$tipoPaquete)) 
			    { 
			        $errores = "Ingresa un nombre de paquete valido"; 
			    }
         //-----------------------guardar datos en un arreglo para la base de datos------------------

			     $datosController = array( "nombrePaquete"=>$nombrePaquete,
							          "idPaquete"=>$idPaquete,
/*				                      "idServicio"=>$idServicio,
*/				                      "costoPaquete"=>$costoPaquete,
				                      "tipoPaquete"=>$tipoPaquete,
				                      "descripcionPaquete"=>$descripcionPaquete,
				                      "estado"=>$estado);

		 // ---------------------Si no hay errores enviar a la base de datos------------------------------	     

           if(!$errores){
                    
                  $respuesta = ModelPaquete::registroPaqueteModel($datosController);	              
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