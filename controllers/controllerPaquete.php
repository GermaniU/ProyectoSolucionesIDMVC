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
			$this->set_estado( $_POST["estado"]);
			 }
	  }

	  #MostrarPaquetes
	  #----------------------------------------------------------
	 /* <td>'.$item["estado"].'</td>
		<td>'.$item["idServicio"].'</td>*/

	  public function vistaPaqueteController(){

		$respuesta = ModelPaquete::vistaPaqueteModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["idPaquete"].'</td>
				<td>'.$item["tipoPaquete"].'</td>
				<td>'.$item["nombrePaquete"].'</td>
				<td>'.$item["descripcionPaquete"].'</td>
				<td>'.$item["costoPaquete"].'</td>
				<td><a href="index.php?action=editarPaquete&idPaquete='.$item["idPaquete"].'"><button class="btn btn-outline-primary" >Editar</button></a></td>
				</tr>';

		}

	}
	#EDITAR USUARIO
	#------------------------------------

	public function editarPaqueteController(){

		$idPaquete = $_GET["idPaquete"];
		$respuesta = ModelPaquete::editarPaqueteModel($idPaquete);

		echo'<input type="hidden" value="'.$respuesta["idPaquete"].'" name="idPaquete">

             <input type="text" value="'.$respuesta["tipoPaquete"].'" name="tipoPaquete" required>

			 <input type="text" value="'.$respuesta["nombrePaquete"].'" name="nombrePaquete" required>

			 <input type="text" value="'.$respuesta["costoPaquete"].'" name="costoPaquete" required>

			 <input type="text" value="'.$respuesta["descripcionPaquete"].'" name="descripcionPaquete" required>

			 <input type="text" value="'.$respuesta["estado"].'" name="estado" required>

			 <input type="submit" value="Actualizar">';

	}
	#ACTUALIZAR PAQUETE
	#------------------------------------
	public function actualizarPaqueteController(){
        $errores ='';
		if(isset($_POST["nombrePaquete"])){
         //-----Obtener datos del formulario-----
   				$nombrePaquete=$this->nombrePaquete;         
   				$idPaquete=$this->idPaquete;      
/*   				$idServicio=$this->idServicio;     
*/   				$costoPaquete=$this->costoPaquete;   
   				$tipoPaquete=$this->tipoPaquete;          
  				$descripcionPaquete=$this->descripcionPaquete;   
   				$estado=$this->estado;
           
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
       
			$datosController = array( "nombrePaquete"=>$nombrePaquete,
							          "idPaquete"=>$idPaquete,
/*				                      "idServicio"=>$idServicio,
*/				                      "costoPaquete"=>$costoPaquete,
				                      "tipoPaquete"=>$tipoPaquete,
				                      "descripcionPaquete"=>$descripcionPaquete,
				                      "estado"=>$estado);
			
			if(!$errores){
               $respuesta = ModelPaquete::actualizarPaqueteModel($datosController);
	                 if($respuesta == "success"){

					header("location:index.php?action=cambioPaquete");

				}

				else{

					echo "error";
				}
			}else{
				echo $errores;
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
/*   				$idServicio=$this->idServicio;     
*/   				$costoPaquete=$this->costoPaquete;   
   				$tipoPaquete=$this->tipoPaquete;          
  				$descripcionPaquete=$this->descripcionPaquete;   
   				$estado=$this->estado;
           

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

			     $datosController = array( "nombrePaquete"=>$nombrePaquete,
							          "idPaquete"=>$idPaquete,
/*				                      "idServicio"=>$idServicio,
*/				                      "costoPaquete"=>$costoPaquete,
				                      "tipoPaquete"=>$tipoPaquete,
				                      "descripcionPaquete"=>$descripcionPaquete,
				                      "estado"=>$estado);


        //------------------------Comprobar que no contenga errores--------------------

			if(!$errores){
                     $respuesta = ModelPaquete::registroPaqueteModel($datosController);
	                 if($respuesta == "success"){

					header("location:index.php?action=RegistrosPaquete");

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