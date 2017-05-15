<h1 class="text-center title-form-cli">Registro Paquete</h1>
<form method="post" id="form-registro">
	<div class="form-group">
	<input class="form-control" type="Hidden" name="idPaquete" required>
	<div class="form-group">
		<label for="Nombre del paquete">Nombre del paquete:</label>
		<input class="form-control" type="text" name="nombrePaquete" value="<?php if(isset($_POST["nombrePaquete"])){echo $_POST["nombrePaquete"]; } ?>" required>
	</div>
	<div class="form-group">
		<label for="Tipo del paquete">Tipo del paquete:</label>
		<input class="form-control" type="text" name="tipoPaquete"  value="<?php if(isset($_POST["tipoPaquete"])){echo $_POST["tipoPaquete"]; } ?>" required>
	</div>
	<div class="form-group">
		<label for="Descripcion del paquete">Descripcion del paquete:</label>
		<input class="form-control" type="text" name="descripcionPaquete" value="<?php if(isset($_POST["descripcionPaquete"])){echo $_POST["descripcionPaquete"]; } ?>" required>
	</div>
	<div class="form-group">
		<label for="Costo del paquete">Costo del paquete:</label>
		<input class="form-control" type="text" name="costoPaquete"  value="<?php if(isset($_POST["costoPaquete"])){echo $_POST["costoPaquete"]; } ?>" required>
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
	<button type="button" class="btn btn-primary"  onClick="location.href ='index.php?action=RegistrosPaquetes'">Cancelar</button>
</div>
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
