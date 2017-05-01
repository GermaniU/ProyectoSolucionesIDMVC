<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "clientes" || $enlaces == "paquetes" || $enlaces == "servicios" ||  $enlaces == "salir" ||  $enlaces == "editarCliente"||  $enlaces == "agregarCliente"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else{

			$module =  "views/modules/ingresar.php";

		}
		
		return $module;

	}

}

?>