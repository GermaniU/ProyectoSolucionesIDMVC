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

       			 $idServicio = 1;//$this->idServicio;
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
            	"idServicio"=>$idServicio,
            	"RFC" =>$RFC,
            	"nombrePaquete" =>$nombrePaquete,
            	"costoServicio" =>$costoServicio,
            	"descripcionServicio" =>$descripcionServicio,
            	"inicioServicio" =>$inicioServicio,
            	"fechadeRenovacion" =>$fechadeRenovacion,
            	"descripcionServicioExtra" =>$descripcionServicioExtra,
            	"estadoServicio" =>$estadoServicio

           	);

           	print_r($datosController);
	      }

	}


 }


 ?>