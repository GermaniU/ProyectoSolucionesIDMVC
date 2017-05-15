<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=IngresarAdministrador");
}

?>
<h1 class="text-center animated fast fadeIn">Servicio</h1>
	<div class="table-responsive col-sm-12 margin-bottom">
		<table id="tdServicios" class="table table-striped table-bordered table-hover animated  fadeIn">
			<thead class="">
			<tr class="table-success">
				<th>RFC</th>
				<th>Nombre del paquete</th>
				<th>Costo del servicio</th>
				<th>Descripci&oacute;n del servicio</th>
				<th>Inicio del servico</th>
				<th>Fecha de renovaci&oacute;n</th>
				<th>Complemento extra</th>
				<th></th>

			</tr>
			</thead>
			<tbody>
			<?php

                 $vistaServicio = new MvcControllerServicio();
                 $vistaServicio ->visualizarServicioController();

			 ?>

			</tbody>
		</table>
</div>