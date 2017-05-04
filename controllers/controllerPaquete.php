<?php 

 class MvcControllerPaquete{
   public $nombrePaquete;         
   public $idPaquete;      
   public $idServicio;     
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
	public function set_idServicio($idServicio) {
			$this->idServicio = $idServicio;
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
			$this->set_idServicio( $_POST["idServicio"]);
			$this->set_costoPaquete( $_POST["costoPaquete"]);
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
				<td><a href="index.php?action=editarPaquete&RFC='.$item["idPaquete"].'"><button class="btn btn-outline-primary" >Editar</button></a></td>
				</tr>';

		}

	}
	#EDITAR USUARIO
	#------------------------------------

	public function editarPaqueteController(){

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
	

			   




 }


 ?>