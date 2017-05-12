<?php 

// clase para redireccionamiento de vistas

class Paginas{
	
	public static function enlacesPaginasModel($enlaces){


		if($enlaces == "IngresarAdministrador" || $enlaces == "RegistrosClientes" || $enlaces == "RegistrosPaquetes" || $enlaces == "RegistrosServicios" ||  $enlaces == "salir" ||  $enlaces == "editarCliente"||  $enlaces == "agregarCliente" ||$enlaces == "agregarPaquete"|| $enlaces == "editarPaquete"||$enlaces == "agregarServicio"||$enlaces == "editarServicio"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/IngresarAdministrador.php";
		
		}
		else if($enlaces == "cambioPaquete"){

			$module =  "views/modules/RegistrosPaquetes.php";
		
		}
		else if($enlaces == "cambioCliente"){

			$module =  "views/modules/RegistrosClientes.php";
		
		}
		else if($enlaces == "cambioServicio"){

			$module =  "views/modules/RegistrosServicios.php";
		
		}



		else{

			$module =  "views/modules/IngresarAdministrador.php";

		}
		
		return $module;

	}

}

?>