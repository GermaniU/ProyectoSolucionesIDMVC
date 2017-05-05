<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=IngresarAdministrador");
}

?>
<h1 class="text-center margin-20 animated fast fadeIn">Paquetes</h1>

	<div class="table-responsive col-sm-12 margin-bottom">
		<table id="tdClientes" class="table table-responsive table-striped table-bordered table-hover animated  fadeIn text-center ">
			<thead class="">
			<tr>
				<th>idPaquete</th>
				<th>TipoPaquete</th>
				<th>NombrePaquete</th>
				<th>DescripcionPaquete</th>
				<th>CostoPaquete</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
/*			$vistaCliente = new MvcControllerPaquete();
			$vistaCliente -> vistaPaqueteController();*/
			?>
			</tbody>
		</table>
</div>