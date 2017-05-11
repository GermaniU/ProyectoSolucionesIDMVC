<?php 
 class MvcControllerServicio{

 	   public $idServicio;
 	   public $RFC;
 	   public $nombrePaquete;
 	   public $costoServicio;
 	   public $descripcionServicio;
 	   public $inicioServicio;
 	   public $fechadeRenovacion;
 	   public $descripcionServicioExtra;
 	   public $estadoServicio;

 	    public function set_idServicio($idServicio) {
		
		$this->idServicio = $idServicio;
	    
	    }
	    public function set_RFC($RFC) {
		
		$this->RFC = $RFC;
	    
	    } 
	    public function set_nombrePaquete($nombrePaquete) {
		
		$this->nombrePaquete = $nombrePaquete;
	    
	    } 
	    public function set_costoServicio($costoServicio) {
		
		$this->costoServicio = $costoServicio;
	    
	    } 
	    public function set_descripcionServicio($descripcionServicio) {
		
		$this->descripcionServicio = $descripcionServicio;
	    
	    } 
	    public function set_fechaInicioServicio($inicioServicio) {
		
		$this->inicioServicio = $inicioServicio;
	    
	    } 
	    public function set_fechaRenovacion($fechadeRenovacion) {
		
		$this->fechadeRenovacion = $fechadeRenovacion;
	    
	    }
	    public function set_descripcionServicioExtra($descripcionServicioExtra) {
		
		$this->descripcionServicioExtra = $descripcionServicioExtra;
	    
	    }  
	    public function set_estadoServicio($estadoServicio) {
		
		$this->estadoServicio = $estadoServicio;
	    
	    }
         

	    public function __construct(){
	    	if (isset($_POST["RFC"])) {

	    		$this->set_idServicio($_POST["idServicio"]);
	    		$this->set_RFC($_POST["RFC"]);
	    		$this->set_nombrePaquete($_POST["nombrePaquete"]);
	    		$this->set_costoServicio($_POST["costoServicio"]);
	    		$this->set_descripcionServicio($_POST["descripcionServicio"]);
	    		$this->set_fechaInicioServicio($_POST["inicioServicio"]);
	    		$this->set_fechaRenovacion($_POST["fechadeRenovacion"]);
	    		$this->set_descripcionServicioExtra($_POST["descripcionServicioExtra"]);
	    		$this->set_estadoServicio($_POST["estadoServicio"]);
	    	    
	    	}
	    }  



      	  #MOSTRAT PAQUETES
	  #----------------------------------------------------------
	 /* <td>'.$item["estado"].'</td>
		<td>'.$item["idServicio"].'</td>*/

	  public function vistaServicioController(){

		$respuesta = ModelServicio::vistaServicioModel();
		//		<td>'.$item["idPaquete"].'</td>

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["RFC"].'</td>
				<td>'.$item["nombrePaquete"].'</td>
				<td>'.$item["costoServicio"].'</td>
				<td>'.$item["descripcionServicio"].'</td>
				<td>'.$item["inicioServicio"].'</td>
				<td>'.$item["fechadeRenovacion"].'</td>
				<td>'.$item["descripcionServicioExtra"].'</td>
				<td>'.$item["estadoServicio"].'</td>
								<td><a href="index.php?action=editarServicio&idServicio='.$item["idServicio"].'"><button class="btn btn-outline-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>

					</td>
				</tr>';

		}

	}

      //Obtener datos de los paquetes existentes en la base de datos para desplegarlos en el 
      //select option en HTML
      public function ObtenerDatosPaquetes(){

		$respuesta = ModelPaquete::vistaPaqueteModel();
		return $respuesta;

	}

	//Agregar un nuevoServicio
	//------------------------------
	public function agregarServicioBDController(){
		$errores = '';

          if (isset($_POST["RFC"])) {

       			 //$idServicio = 1;//$this->idServicio;
 	   			 $RFC = $this->RFC;
 	   			 $nombrePaquete = $this->nombrePaquete;
 	   			 $costoServicio = $this->costoServicio;
 	   			 $descripcionServicio = $this->descripcionServicio;
 	   			 $inicioServicio = $this->inicioServicio;
 	   			 $fechadeRenovacion = $this->fechadeRenovacion;
 	   			 $descripcionServicioExtra = $this->descripcionServicioExtra;
 	   			 $estadoServicio = 1;//$this->estadoServicio;

	    		
           
           #METODOS PARA VALIDAR LA INFORMACION ANTES DE SER ENVIADA A LA BASE DE DATOS
           #---------------------------------------------------------------------------
           
           #---------------------------------------------------------------------------
           
           $datosController = array
            (
            	"RFC" =>$RFC,
            	"nombrePaquete" =>$nombrePaquete,
            	"costoServicio" =>$costoServicio,
            	"descripcionServicio" =>$descripcionServicio,
            	"inicioServicio" =>$inicioServicio,
            	"fechadeRenovacion" =>$fechadeRenovacion,
            	"descripcionServicioExtra" =>$descripcionServicioExtra,
            	"estadoServicio" =>$estadoServicio

           	);
             $respuesta1 = ModelServicio::vistaServicioModel();

             #VALIDAR QUE UN CLIENTE SOLO PUEDA TENER UN SERVICIO
             #---------------------------------------------------
             if ($respuesta1["RFC" == $RFC ]) {
             	  $errores ="Ya se ha agregado un servicio a este clientes";
             }
             #SI NO HAY ERRORES ENTONCES GUARDAR EN LA BASE DE DATOS
             #---------------------------------------------------

           	if(!$errores){
				$respuesta = ModelServicio::registroServicioModel($datosController);
	                 if($respuesta == "success"){

					header("location:index.php?action=RegistroCliente");

				}

				else{
					echo '<div id="errorActualizarPaquete"></div>
				     		<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Error</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							       Los datos son demasiado largos o son datos incompatibles
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
							      </div>
							    </div>
							  </div>
							</div>';
					//echo "error";
				}
			}else{
				echo $errores;
			}
    
	      }

	}


 }


 ?>