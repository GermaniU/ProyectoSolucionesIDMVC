


<?php
// Motrar todos los errores de PHP
error_reporting(-1);
 
// No mostrar los errores de PHP
error_reporting(0);
 
// Motrar todos los errores de PHP
error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);
?>


<h1 class="text-center title-form-cli">Registro Paquete</h1>
	  <h1>REGISTRO DE PAQUETE</h1>

<form method="post">
	
	<input type="text" placeholder="idPaquete:" name="idPaquete" required>

	<input type="text" placeholder="nombrePaquete:" name="nombrePaquete" required>
	
	<input type="text" placeholder="tipoPaquete:" name="tipoPaquete" required>
	
	<input type="text" placeholder="descripcionPaquete:" name="descripcionPaquete" required>

	<input type="text" placeholder="costoPaquete:" name="costoPaquete" required>

	<input type="text" placeholder="estado" name="estado" required>

	<input type="submit" value="Enviar">

</form>

	  
<?php

$registro = new MvcControllerPaquete();
$registro -> agregarPaqueteBDController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
