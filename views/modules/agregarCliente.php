


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


<h1 class="text-center title-form-cli">Agregar Cliente</h1>
	  <h1>REGISTRO DE USUARIO</h1>

<form method="post">
	
	<input type="text" placeholder="RFC:" name="RFC" required>

	<input type="text" placeholder="Nombre:" name="nombreCliente" required>
	
	<input type="text" placeholder="Dominio:" name="dominio" required>
	
	<input type="text" placeholder="Pago:" name="totalPago" required>

	<input type="text" placeholder="NombreEmpresa:" name="nombreEmpresa" required>

	<input type="text" placeholder="Telefono" name="telefonoClienteEmpresa" required>

	<input type="text" placeholder="Dirrecion" name="direccionClienteEmpresa" required>
	
	<input type="text" placeholder="Correo" name="correoClienteEmpresa" required>

	<input type="submit" value="Enviar">

</form>

<?php

$registro = new MvcControllerCliente();
$registro -> agregarClienteBDController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
