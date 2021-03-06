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
	    	}
	    }  



      #MOSTRAR SERVICIOS
	  #----------------------------------------------------------
	  public function visualizarServicioController(){

		$respuesta = ModelServicio::visualizarServicioModel();

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["RFC"].'</td>
				<td>'.$item["nombrePaquete"].'</td>
				<td>'.$item["costoServicio"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>'.$item["inicioServicio"].'</td>
				<td>'.$item["fechadeRenovacion"].'</td>
				<td>'.$item["descripcionServicioExtra"].'</td>
								

				<td><a href="index.php?action=EditarServicio&idServicio='.$item["idServicio"].'"><button class="btn btn-outline-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

					</td>
				</tr>';

		}

	}

     #Obtener nombre de todos los paquetes para el select
      public function ObtenerDatosPaquetes(){

		$respuesta = ModelPaquete::visualizarPaqueteModel();
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
 	   			 $RFC = $this->RFC;
 	   			 $nombrePaquete = $this->nombrePaquete;
 	   			 $costoServicio = $this->costoServicio;
 	   			 $descripcion = $this->descripcion;
 	   			 $inicioServicio = $this->inicioServicio;
 	   			 $fechadeRenovacion = $this->fechadeRenovacion;
 	   			 $descripcionServicioExtra = $this->descripcionServicioExtra;
 	   		
 	   	       	//------------------Metodos de validacion------------------------------
 	   			  $fechaInicioServicio= explode("-", $inicioServicio); 
 	   			  $fechaRenovacionServicio= explode("-" ,$fechadeRenovacion);

 	   			  if($fechaRenovacionServicio[0]>$fechaInicioServicio[0]||$fechaRenovacionServicio[1]>$fechaInicioServicio[1]||$fechaRenovacionServicio[2]>$fechaInicioServicio[2]) {
                  }else{
                  	 $errores = "La fecha de renovacion debe ser mayor a fecha inicio servicio";

                  }
  
                  if ($fechaInicioServicio[0]<2008) {
                  	 $errores = "Ingresa un año válido";
                  }
                  elseif($fechaRenovacionServicio[0]<2008) {
                  	 $errores = "Ingresa un año válido";
                  }

                  elseif($costoServicio < 0 ) //check for a pattern of 91-0123456789 
			      { 
			        $errores = "Ingresa un numero válido"; 
			      }
			/*      elseif (!preg_match("/[a-zA-Z-0-9]/",$descripcion)) 
			      { 
			        $errores = "Por favor selecciona un paquete"; 
			      }*/
				  elseif (!preg_match("/[a-zA-Z].[0-9]|[a-zA-Z]+([,]|[a-zA-Z].[0-9]|[a-zA-Z])$/",$descripcion))
				  {
				      $errores = "Ingresa una descripcion válida";
				  }
				   elseif (!preg_match("/^[a-zA-Z]|[0-9]|[a-zA-Z]+([,]|[a-zA-Z].[0-9]|[a-zA-Z])$/",$descripcionServicioExtra))
				  {
				      $errores = "Ingresa una descripcion servicio extra válida";
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
	            	"descripcionServicioExtra" =>$descripcionServicioExtra
	           	     );

 	   			 
	             #VALIDAR QUE UN CLIENTE SOLO PUEDA TENER UN SERVICIO
	             #---------------------------------------------------
	             $respuesta1 = ModelServicio::visualizarServicioModel();
				 foreach($respuesta1 as $row => $item){
	                  if ($item["RFC"]==$RFC) {
	              	  		$errores ="Ya se ha agregado un servicio a este cliente";
	              	  }
	             }

       			 if(!$errores){
                    
                    $respuesta = ModelServicio::registrarServicioModel($datosController);
                    print_r($respuesta);

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
         //--------Metodos para validar que los datos ingresados sean correctos
                  $fechaInicioServicio= explode("-", $inicioServicio); 
 	   			  $fechaRenovacionServicio= explode("-" ,$fechadeRenovacion);

 	   			   if($fechaRenovacionServicio[0]>$fechaInicioServicio[0]||$fechaRenovacionServicio[1]>$fechaInicioServicio[1]||$fechaRenovacionServicio[2]>$fechaInicioServicio[2]) {
                  }else{
                  	 $errores = "La fecha de renovacion debe ser mayor a fecha inicio servicio";

                  }
                  if ($fechaInicioServicio[0] < 2008 || $fechaInicioServicio[1]<0 ||$fechaInicioServicio[2]<0) {
                  	 $errores = "Ingresa un año válido";
                  }
                  elseif($fechaRenovacionServicio[0] < 2008 || $fechaRenovacionServicio[1]<0 ||$fechaInicioServicio[2]<0) {
                  	 $errores = "Ingresa un año válido";
                  }
                  elseif($costoServicio < 0 ) //check for a pattern of 91-0123456789 
			      { 
			        $errores = "Ingresa un numero válido"; 
			      }
			      
		/*	      
			      elseif (!preg_match("/[a-zA-Z-0-9]$/",$descripcionServicioExtra)) 
			      { 
			        $errores = "Ingresa una descripcion válida"; 
			      }*/
			      elseif (!preg_match("/^[a-zA-Z]|[0-9]|[a-zA-Z]+([,]|[a-zA-Z].[0-9]|[a-zA-Z])$/",$descripcionServicioExtra))
				  {
				      $errores = "Ingresa una descripcion servicioextra válida";
				  }
				    elseif (!preg_match("/[a-zA-Z].[0-9]|[a-zA-Z]+([,])$/",$descripcion))
				  {
				      $errores = "Ingresa una descripcion válida";
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
            	"descripcionServicioExtra" =>$descripcionServicioExtra
           	);
             

			if(!$errores){
               $respuesta = ModelServicio::actualizarServicioModel($datosController);
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

}


?>