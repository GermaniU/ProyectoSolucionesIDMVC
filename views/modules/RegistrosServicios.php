<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=IngresarAdministrador");
}

?>
<h1 class="text-center margin-20 animated fast fadeIn">Servicio</h1>

	<div class="table-responsive col-sm-12 margin-bottom">
		<table id="tdServicios" class="table table-striped table-bordered table-hover animated  fadeIn text-center ">
			<thead class="">
			<tr>
				<th>RFC</th>
				<th>NombrePaquete</th>
				<th>CostoServicio</th>
				<th>DesripcionServicio</th>
				<th>InicioServico</th>
				<th>FechadeRenovacion</th>
				<th>ComplementoExtra</th>
				<th></th>

			</tr>
			</thead>
			<tbody>
			<?php 

                 $vistaServicio = new MvcControllerServicio();
                 $vistaServicio ->vistaServicioController();

			 ?>

			</tbody>
		</table>
</div>