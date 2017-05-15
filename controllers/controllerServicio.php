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

     #Obtener nombre de todos los paquetes para el select
      public function ObtenerDatosPaquetes(){

		$respuesta = ModelPaquete::vistaPaqueteModel();
		return $respuesta;

	}
	 #Obtener los datos del paquete seleccionado
	public function ObtenerDatosPaquete(){
		if (isset( $_POST["nombrePaquete"])) {
	    $nombrePaquete = $_POST["nombrePaquete"];

	    $nombrePaquete= trim($nombrePaquete);
		
		$respuesta2 = ModelPaquete::buscarpaquete($nombrePaquete);
         
        return $respuesta2;
		}
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

 	   			//------------------Metodos de validacion------------------------------
 	   			  $fechaInicioServicio= explode("-", $inicioServicio); 
 	   			  $fechaRenovacionServicio= explode("-" ,$fechadeRenovacion);
  
                  if ($fechaInicioServicio[0]<2008) {
                  	 $errores = "ingresa un año valido";
                  }
                  elseif($fechaRenovacionServicio[0]<2008) {
                  	 $errores = "ingresa un año valido";
                  }
                  elseif($costoServicio < 0 ) //check for a pattern of 91-0123456789 
			      { 
			        $errores = "Ingresa un numero valido"; 
			      }
			      elseif (!preg_match("/[a-zA-Z-0-9]/",$descripcion)) 
			      { 
			        $errores = "Ingresa una descripcion valida"; 
			      }
			      elseif (!preg_match("/[a-zA-Z-0-9]$/",$descripcionServicioExtra)) 
			      { 
			        $errores = "Ingresa una descripcion valida"; 
			      }    

                     
	            #--------------------------------------------------------------------  
			    //------------------------GUARDAR DATOS PARA LA BASE DE DATOS---------

	              $datosController = array(
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

       			 if(!$errores){
                    
                    $respuesta = ModelServicio::registroServicioModel($datosController);
	                 if($respuesta == "success"){

					header("location:index.php?action=RegistrosServicios");
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
	#FORMULARIO QUE MUESTRA EN PANTALLA LOS DATOS DEL SERVICIO
	#--------------------------------------------------------------------------
	public function editarServicioController(){

		$idServicio = $_GET["idServicio"];
		$respuesta = ModelServicio::editarServicioModel($idServicio);
		
		return $respuesta;

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
                  $fechaInicioServicio= explode("-", $inicioServicio); 
 	   			  $fechaRenovacionServicio= explode("-" ,$fechadeRenovacion);
  
                  if ($fechaInicioServicio[0]<2008) {
                  	 $errores = "ingresa un año valido";
                  }
                  elseif($fechaRenovacionServicio[0]<2008) {
                  	 $errores = "ingresa un año valido";
                  }
                  elseif($costoServicio < 0 ) //check for a pattern of 91-0123456789 
			      { 
			        $errores = "Ingresa un numero valido"; 
			      }
			      elseif (!preg_match("/[a-zA-Z-0-9]$/",$descripcion)) 
			      { 
			        $errores = "Ingresa una descripcion valida"; 
			      }
			      elseif (!preg_match("/[a-zA-Z-0-9]$/",$descripcionServicioExtra)) 
			      { 
			        $errores = "Ingresa una descripcion valida"; 
			      }
			      elseif ($estadoServicio > 1 || $estadoServicio < 0) {
			    	$errores = "Ingresa un estado valido 1 = Activo  0 =Suspendido ";
			      }    
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