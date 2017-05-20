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
		<input class="form-control" type="password" name="contrasenaActual" value="" required>
	</div>
	<div class="form-group">
		<label>Introducir contraseña nueva</label>
		<input class="form-control" type="password" name="contrasenaNueva" value="" required>
	</div>
	<div class="form-group">
		<label>Confirmar contraseña nueva:</label>
		<input class="form-control" type="password" name="verificarContrasena" value="" required>
	</div>
	<button type="submit" class="btn btn-primary">Actualizar</button>
    <button type="button" class="btn btn-primary"  onClick="location.href ='index.php?action=RegistrosClientes'">Cancelar</button>

</div>
</form>

<?php 

  $cambiarcontraseña = new ControllerAdministrador();
  $cambiarcontraseña -> cambiarContraseñaAdministradorController();


?>