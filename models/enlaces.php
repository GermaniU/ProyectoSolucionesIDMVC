<?php 

// clase para redireccionamiento de vistas

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "IngresarAdministrador" || $enlaces == "RegistrosClientes" || $enlaces == "paquetes" || $enlaces == "servicios" ||  $enlaces == "salir" ||  $enlaces == "editarCliente"||  $enlaces == "agregarCliente"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/IngresarAdministrador.php";
		
		}

		else{

			$module =  "views/modules/IngresarAdministrador.php";

		}
		
		return $module;

	}

}

?>