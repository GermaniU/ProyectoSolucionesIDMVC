<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=IngresarAdministrador");
}

?>

<h1 class="text-center title-form-cli">Cambiar Contraseña</h1>
<form method="post" id="form-registro">
<div class="form-group">
	<div class="form-group">
		<label>Contraseña actual:</label>
		<input class="form-control" type="text" name="contrasenaActual" value="" required>
	</div>
	<div class="form-group">
		<label>Introducir contraseña nueva</label>
		<input class="form-control" type="text" name="contrasenaNueva" value="" required>
	</div>
	<div class="form-group">
		<label>Confirmar contraseña nueva:</label>
		<input class="form-control" type="text" name="verificarContrasena" value="" required>
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>