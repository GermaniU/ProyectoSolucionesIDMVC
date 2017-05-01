<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");
}

?>
<h1 class="text-center margin-20 animated fast fadeIn">Cliente</h1>

	<div class="table-responsive col-sm-12 margin-bottom">
		<table id="tdClientes" class="table table-responsive table-striped table-bordered table-hover animated  fadeIn ">
			<thead class="">
			<tr>
				<th>RFC</th>
				<th>Cliente</th>
				<th>Dominio</th>
				<th>Pago total</th>
				<th>Empresa</th>
				<th>Teléfono</th>
				<th>Dirección</th>
				<th>Correo</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			<?php
			$vistaCliente = new MvcControllerCliente();
			$vistaCliente -> vistaUsuariosController();
			?>
			</tbody>
		</table>
</div>