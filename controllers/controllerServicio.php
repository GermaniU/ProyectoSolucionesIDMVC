<?php 
 class MvcControllerServicio{

 	   public $idServicio;
 	   public $RFC;
 	   public $nombrePaquete;
 	   public $costoServicio;
 	   public $descripcion;
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
	    public function set_descripcion($descripcion) {
		
		$this->descripcion = $descripcion;
	    
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
	    		$this->set_descripcion($_POST["descripcion"]);
	    		$this->set_fechaInicioServicio($_POST["inicioServicio"]);
	    		$this->set_fechaRenovacion($_POST["fechadeRenovacion"]);
	    		$this->set_descripcionServicioExtra($_POST["descripcionServicioExtra"]);
	    		$this->set_estadoServicio($_POST["estadoServicio"]);
	    	    
	    	}
	    }  



      #MOSTRAR SERVICIOS
	  #----------------------------------------------------------
	 /* <td>'.$item["estado"].'</td>
		<td>'.$item["idServicio"].'</td>*/

	  public function vistaServicioController(){

		$respuesta = ModelServicio::vistaServicioModel();
		//	<td>'.$item["estadoServicio"].'</td>


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["RFC"].'</td>
				<td>'.$item["nombrePaquete"].'</td>
				<td>'.$item["costoServicio"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>'.$item["inicioServicio"].'</td>
				<td>'.$item["fechadeRenovacion"].'</td>
				<td>'.$item["descripcionServicioExtra"].'</td>
								

				<td><a href="index.php?action=editarServicio&idServicio='.$item["idServicio"].'"><button class="btn btn-outline-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

					</td>
				</tr>';

		}

	}

     #Obtener datos de los paquetes existentes en la base de datos para desplegarlos en el 
     #select option en HTML
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
 	   			 $descripcion = $this->descripcion;
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
            	"descripcion" =>$descripcion,
            	"inicioServicio" =>$inicioServicio,
            	"fechadeRenovacion" =>$fechadeRenovacion,
            	"descripcionServicioExtra" =>$descripcionServicioExtra,
            	"estadoServicio" =>$estadoServicio

           	);
             

             #VALIDAR QUE UN CLIENTE SOLO PUEDA TENER UN SERVICIO
             #---------------------------------------------------
             $respuesta1 = ModelServicio::vistaServicioModel();
			 foreach($respuesta1 as $row => $item){
                  if ($item["RFC"]==$RFC) {
              	  		$errores ="Ya se ha agregado un servicio a este clientes";
              	  }
             }
             #SI NO HAY ERRORES ENTONCES GUARDAR EN LA BASE DE DATOS
             #---------------------------------------------------

           	if(!$errores){
				$respuesta = ModelServicio::registroServicioModel($datosController);
	                 if($respuesta == "success"){

					header("location:index.php?action=RegistrosServicios");

				}

				else{
				/*	echo '<div id="errorActualizarPaquete"></div>
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
							</div>';*/
					//echo "error";
					echo $errores;
				}
			}else{
				echo $errores;
			}
    
	      }

	}
	#FORMULARIO QUE MUESTRA EN PANTALLA LOS DATOS DEL SERVICIO
	#--------------------------------------------------------------------------
	public function editarServicioController(){

		$idServicio = $_GET["idServicio"];
		$respuesta = ModelServicio::editarServicioModel($idServicio);
		echo
		'
			<input class="form-control" type="hidden" value="'.$respuesta["idServicio"].'" name="idServicio">
			
			<div class="form-group">
				
				<label>RFC:</label>
             	<input class="form-control"  readonly="readonly" type="text" value="'.$respuesta["RFC"].'" name="RFC" required>
			</div>
			<div class="form-group">
				<label>Nombre del paquete:</label>
			 	<input class="form-control" type="text" value="'.$respuesta["nombrePaquete"].'" name="nombrePaquete" required>
			</div>
			<div class="form-group">
				<label>Costo del servicio:</label>
			 	<input class="form-control" type="text" value="'.$respuesta["costoServicio"].'" name="costoServicio" required>
			</div>
			<div class="form-group">
				<label>Descripcion del servicio:</label>
				<input class="form-control" type="text" value="'.$respuesta["descripcion"].'" name="descripcion" required>
			</div>
			<div class="form-group">
				<label>Fecha inicio servicio:</label>
				<input class="form-control" type="text" value="'.$respuesta["inicioServicio"].'" name="inicioServicio" required>
			</div>
			<div class="form-group">
				<label>Fecha renovacion servicio:</label>
				<input class="form-control" type="text" value="'.$respuesta["fechadeRenovacion"].'" name="fechadeRenovacion" required>
			</div>
			<div class="form-group">
				<label>Descripcion complemento extra:</label>
				<input class="form-control" type="text" value="'.$respuesta["descripcionServicioExtra"].'" name="descripcionServicioExtra" required>
			</div>
			<div class="form-group">
				<label>Estado del servicio:</label>
			 	<input class="form-control" type="text" value="'.$respuesta["estadoServicio"].'" name="estadoServicio" required>
			</div>
			 <button type="submit" class="btn btn-primary">Actualizar</button>';

	}
	#EDITAR INFORMACION DEL SERVICIO A LA BASE DE DATOS
	#------------------------------------
	public function actualizarServicioController(){
        $errores ='';
		if (isset($_POST["RFC"])) {

       			 $idServicio = $this->idServicio;
 	   			 $RFC = $this->RFC;
 	   			 $nombrePaquete = $this->nombrePaquete;
 	   			 $costoServicio = $this->costoServicio;
 	   			 $descripcion = $this->descripcion;
 	   			 $inicioServicio = $this->inicioServicio;
 	   			 $fechadeRenovacion = $this->fechadeRenovacion;
 	   			 $descripcionServicioExtra = $this->descripcionServicioExtra;
 	   			 $estadoServicio = $this->estadoServicio;
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

			    
           $datosController = array
            (   
                "idServicio"=>$idServicio, 
            	"RFC" =>$RFC,
            	"nombrePaquete" =>$nombrePaquete,
            	"costoServicio" =>$costoServicio,
            	"descripcion" =>$descripcion,
            	"inicioServicio" =>$inicioServicio,
            	"fechadeRenovacion" =>$fechadeRenovacion,
            	"descripcionServicioExtra" =>$descripcionServicioExtra,
            	"estadoServicio" =>$estadoServicio

           	);
             

			if(!$errores){
               $respuesta = ModelServicio::actualizarServicioModel($datosController);
	                 if($respuesta == "success"){

					header("location:index.php?action=cambioServicio");

				}

				else{
					/*echo '<div id="errorActualizarPaquete"></div>
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
							</div>';*/
					//echo "error";
					echo $errores;
				}
			}else{
				echo $errores;
			}




     }
 }



 }


 ?>