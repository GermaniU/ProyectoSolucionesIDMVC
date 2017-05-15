<h1 class="text-center title-form-cli">Editar Servicio</h1>

<?php

$traerdatos = new MvcControllerServicio();
$respuesta = $traerdatos -> editarServicioController();

?>
 <div >
		<form method="post" id="form-registro">

			<input class="form-control" type="hidden" value="<?php echo $respuesta["idServicio"]; ?>" name="idServicio">

			<div class="form-group">

				<label>RFC:</label>
             	<input class="form-control"  readonly="readonly" type="text" value="<?php echo $respuesta["RFC"]; ?>" name="RFC" required>
			</div>
			<div class="form-group">
				<label>Nombre del paquete:</label>
			 	<input class="form-control" type="text" value="<?php echo $respuesta["nombrePaquete"]; ?>" name="nombrePaquete" required>
			</div>
			<div class="form-group">
				<label>Costo del servicio:</label>
			 	<input class="form-control" type="text" value="<?php echo $respuesta["costoServicio"]; ?>" name="costoServicio" required>
			</div>
			<div class="form-group">
				<label>Descripcion del servicio:</label>
				<input class="form-control" type="text" value="<?php echo $respuesta["descripcion"]; ?>" name="descripcion" required>
			</div>
			<div class="form-group">
				<label>Fecha inicio servicio:</label>
				<input class="form-control" type="text" value="<?php echo $respuesta["inicioServicio"]; ?>" name="inicioServicio" required>
			</div>
			<div class="form-group">
				<label>Fecha renovacion servicio:</label>
				<input class="form-control" type="text" value="<?php echo $respuesta["fechadeRenovacion"]; ?>" name="fechadeRenovacion" required>
			</div>
			<div class="form-group">
				<label>Descripcion complemento extra:</label>
				<input class="form-control" type="text" value="<?php echo $respuesta["descripcionServicioExtra"]; ?>" name="descripcionServicioExtra" required>
			</div>
			<div class="form-group">
				<label>Estado del servicio:</label>
			 	<input class="form-control" type="text" value="<?php echo $respuesta["estadoServicio"]; ?>" name="estadoServicio" required>
			</div>
			 <button type="submit" class="btn btn-primary">Actualizar</button>
			 <button type="button" class="btn btn-primary"  onClick="location.href ='index.php?action=RegistrosServicios'">Cancelar</button>
       </form>
   </div>

<?php
$actualizardatos = new MvcControllerServicio();
$actualizardatos->actualizarServicioController();
?>

