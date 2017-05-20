<?php

// clase para redireccionamiento de vistas

class Paginas{

	public static function enlacesPaginasModel($enlaces){


		if($enlaces == "IngresarAdministrador" || $enlaces == "RegistrosClientes" || $enlaces == "RegistrosPaquetes" || $enlaces == "RegistrosServicios" ||  $enlaces == "salir" ||  $enlaces == "EditarCliente"||  $enlaces == "AgregarCliente" ||$enlaces == "AgregarPaquete"|| $enlaces == "EditarPaquete"||$enlaces == "AgregarServicio"||$enlaces == "CambiarContrasena"|| $enlaces == "EditarServicio"){

			$module =  "views/modules/".$enlaces.".php";

		}

		else if($enlaces == "index"){

			$module =  "views/modules/IngresarAdministrador.php";

		}
		else if($enlaces == "cambioPaquete"){

			$module =  "views/modules/RegistrosPaquetes.php";

		}


		else{

			$module =  "views/modules/IngresarAdministrador.php";

		}

		return $module;

	}

}

?>