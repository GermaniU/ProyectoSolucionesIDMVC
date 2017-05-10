<?php
	session_start();
	if(!$_SESSION["validar"]){
		header("location:index.php?action=IngresarAdministrador");
	}
?>
<h1 class="text-center margin-20 animated fast fadeIn">Paquetes</h1>
	<div class="table-responsive col-sm-12 margin-bottom ">
		<table id="tdPaquetes" class="table table-striped table-bordered table-hover animated  fadeIn ">
			<thead>
			<tr>
				<th>Tipo de paquete</th>
				<th>Nombre del paquete</th>
				<th>Descripcion del paquete</th>
				<th>Costo del paquete</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
				$vistaCliente = new MvcControllerPaquete();
				$vistaCliente -> vistaPaqueteController();
			?>
			</tbody>
		</table>
	</div>