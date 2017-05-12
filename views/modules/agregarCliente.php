


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
		<input class="form-control" type="text" placeholder="RFC:" name="RFC" value="<?php if(isset($_POST["RFC"])){echo $_POST["RFC"]; } ?>" required>

		<p>Nombre del cliente:</p>
		<input class="form-control" type="text" placeholder="Nombre:" name="nombreCliente" value="<?php if(isset($_POST["nombreCliente"])){echo $_POST["nombreCliente"]; } ?>" required>

		<p>Dominio:</p>
		<input class="form-control" type="text" placeholder="Dominio:" name="dominio" value="<?php if(isset($_POST["dominio"])){echo $_POST["dominio"]; } ?>" required>

		<p>Pago:</p>
		<input class="form-control" type="number" placeholder="Pago:" name="totalPago" value="<?php if(isset($_POST["totalPago"])){echo $_POST["totalPago"]; } ?>" required>

		<p>Nombre de la empresa:</p>
		<input class="form-control" type="text" placeholder="NombreEmpresa:" name="nombreEmpresa"   value="<?php if(isset($_POST["nombreEmpresa"])){echo $_POST["nombreEmpresa"]; } ?>" required>

		<p>Telefono del cliente:</p>
		<input class="form-control" type="tel" placeholder="Telefono" name="telefonoClienteEmpresa"  value="<?php if(isset($_POST["telefonoClienteEmpresa"])){echo $_POST["telefonoClienteEmpresa"]; } ?>"  required>

		<p>Direccion del cliente:</p>
		<input class="form-control" type="text" placeholder="Direcion" name="direccionClienteEmpresa"  value="<?php if(isset($_POST["direccionClienteEmpresa"])){echo $_POST["direccionClienteEmpresa"]; } ?>" required>

		<p>Correo del cliente</p>
		<input class="form-control" type="email" placeholder="Correo" name="correoClienteEmpresa" value="<?php if(isset($_POST["correoClienteEmpresa"])){echo $_POST["correoClienteEmpresa"]; } ?>" required>
		
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
