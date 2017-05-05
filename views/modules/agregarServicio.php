


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
<div class="container text-center">
	

<h1 class="text-center title-form-cli">Agregar Servicio</h1>
	  <h1>Orden de Registro</h1>

<form method="post">
	
	<input type="text" class="form-group form-control"  placeholder="RFC:" name="RFC" required>

	<input type="text"  class="form-group form-control" placeholder="Nombre:" name="nombreCliente" required>
	
	<input type="text"  class="form-group form-control" placeholder="Dominio:" name="dominio" required>
	
	<input type="text" class="form-group form-control"  placeholder="Pago:" name="totalPago" required>

	<input type="text" class="form-group form-control"  placeholder="NombreEmpresa:" name="nombreEmpresa" required>

	<input type="tel"  class="form-group form-control" placeholder="Telefono" name="telefonoClienteEmpresa" required>

	<input type="text"  class="form-group form-control" placeholder="Dirrecion" name="direccionClienteEmpresa" required>
	
	<input type="text"  class="form-group form-control" placeholder="Correo" name="correoClienteEmpresa" required>

	<input type="submit" class="btn btn-outline-primary" value="Enviar">

</form>
</div>

<?php

/*$registro = new MvcControllerCliente();
$registro -> agregarClienteBDController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}*/

?>
