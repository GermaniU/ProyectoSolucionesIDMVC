<h1 class="text-center title-form-cli">Agregar Cliente</h1>
	<form method="post" id="form-registro">
		<p>RFC:</p>
		<input class="form-control" type="text"   placeholder="RFC:" name="RFC" value="<?php if(isset($_POST["RFC"])){echo $_POST["RFC"]; } ?>" required>

		<p>Nombre del cliente:</p>
		<input class="form-control" type="text" placeholder="Nombre:" name="nombreCliente" value="<?php if(isset($_POST["nombreCliente"])){echo $_POST["nombreCliente"]; } ?>" required>

		<p>Dominio:</p>
		<input class="form-control" type="text" placeholder="Dominio:" name="dominio" value="<?php if(isset($_POST["dominio"])){echo $_POST["dominio"]; } ?>" required>

<!-- 		<p>Pago:</p>
 -->		<input class="form-control" type="hidden" placeholder="Pago:" name="totalPago" value="<?php if(isset($_POST["totalPago"])){echo $_POST["totalPago"]; } ?>" required>

		<p>Nombre de la empresa:</p>
		<input class="form-control" type="text" placeholder="NombreEmpresa:" name="nombreEmpresa"   value="<?php if(isset($_POST["nombreEmpresa"])){echo $_POST["nombreEmpresa"]; } ?>" required>

		<p>Telefono del cliente:</p>
		<input class="form-control" type="tel" placeholder="Telefono" name="telefonoClienteEmpresa"  value="<?php if(isset($_POST["telefonoClienteEmpresa"])){echo $_POST["telefonoClienteEmpresa"]; } ?>"  required>

		<p>Direccion del cliente:</p>
		<input class="form-control" type="text" placeholder="Ejemplo: C 32 x 13 y 15 Num 567" name="direccionClienteEmpresa"  value="<?php if(isset($_POST["direccionClienteEmpresa"])){echo $_POST["direccionClienteEmpresa"]; } ?>" required>

		<p>Correo del cliente</p>
		<input class="form-control" type="email" placeholder="Correo" name="correoClienteEmpresa" value="<?php if(isset($_POST["correoClienteEmpresa"])){echo $_POST["correoClienteEmpresa"]; } ?>" required>

		<button type="submit" class="btn btn-primary">Agregar</button>
		<button type="button" class="btn btn-primary"  onClick="location.href ='index.php?action=RegistrosClientes'">Cancelar</button>
	</form>

<?php

$registro = new MvcControllerCliente();
$registro -> agregarClienteController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";

	}

}

?>
