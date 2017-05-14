<h1 class="text-center title-form-cli">Editar Paquete</h1>
<?php 

	 $traerdatos = new MvcControllerPaquete();
	 $respuesta= $traerdatos -> editarPaqueteController();

 ?>
   <div >
		<form method="post" id="form-registro">
			
			<input class="form-control" readonly="" value="<?php echo $respuesta["idPaquete"]; ?>" name="idPaquete">
			<div class="form-group">
				<label>Tipo del paquete:</label>
             	<input class="form-control" type="text" value="<?php echo $respuesta["tipoPaquete"]; ?>" name="tipoPaquete" required>
			</div>
			<div class="form-group">
				<label>Nombre del paquete:</label>
			 	<input class="form-control" type="text" value="<?php echo $respuesta["nombrePaquete"]; ?>" name="nombrePaquete" required>
			</div>
			<div class="form-group">
				<label>Costo del paquete:</label>
			 	<input class="form-control" type="text" value="<?php echo $respuesta["costoPaquete"]; ?>" name="costoPaquete" required>
			</div>
			<div class="form-group">
				<label>Descripcion del paquete:</label>
				<input class="form-control" type="text" value="<?php echo $respuesta["descripcionPaquete"]; ?>" name="descripcionPaquete" required>
			</div>
			<div class="form-group">
				<label>Estado del paquete:</label>
			 	<input class="form-control" type="text" value="<?php echo $respuesta["descripcionPaquete"]; ?>" name="estado" required>
			</div>
			 <button type="submit" class="btn btn-primary">Actualizar</button>
		
		</form>
    </div>



<?php
    $actualizardatos = new MvcControllerPaquete();
	$actualizardatos->actualizarPaqueteController();
?>