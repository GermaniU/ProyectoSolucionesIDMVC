<?php
	session_start();
	if(!$_SESSION["validar"]){
		header("location:index.php?action=IngresarAdministrador");
	}
?>
<h1 class="text-center animated fast fadeIn">Paquetes</h1>
	<div class="table-responsive col-sm-12 margin-bottom ">
		<table id="tdPaquetes" class="table table-responsive table-striped table-bordered table-hover animated  fadeIn ">
			<thead>
			<tr class="table-success">
				<th>Nombre del paquete</th>
				<th>Tipo de paquete</th>
				<th>Descripci&oacute;n del paquete</th>
				<th>Costo del paquete</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
				$vistaCliente = new MvcControllerPaquete();
				$vistaCliente -> visualizarPaqueteController();
			?>
			</tbody>
		</table>
	</div>