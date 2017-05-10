


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
	<form method="post" id="form-registro">
		<p>RFC:</p>
		<input class="form-control" type="text" placeholder="RFC:" name="RFC" required>
		<p>Nombre del cliente:</p>
		<input class="form-control" type="text" placeholder="Nombre:" name="nombreCliente" required>
		<p>Dominio:</p>
		<input class="form-control" type="text" placeholder="Dominio:" name="dominio" required>
		<p>Pago:</p>
		<input class="form-control" type="number" placeholder="Pago:" name="totalPago" required>
		<p>Nombre de la empresa:</p>
		<input class="form-control" type="text" placeholder="NombreEmpresa:" name="nombreEmpresa" required>
		<p>Telefono del cliente:</p>
		<input class="form-control" type="tel" placeholder="Telefono" name="telefonoClienteEmpresa" required>
		<p>Direccion del cliente:</p>
		<input class="form-control" type="text" placeholder="Direcion" name="direccionClienteEmpresa" required>
		<p>Correo del cliente</p>
		<input class="form-control" type="email" placeholder="Correo" name="correoClienteEmpresa" required>
		<button type="submit" class="btn btn-primary">Agregar</button>
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
