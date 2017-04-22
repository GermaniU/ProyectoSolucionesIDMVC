<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}
?>
<h1 class="text-center margin-20 animated fast fadeIn">Cliente</h1>
<div class="container">
	<div class="contenedorBotonAgregar">
		<a href="index.php?action=agregarCliente" class="text-right botonagregar">Agregar Cliente</a>
   </div><br>
</div>
	<div class="container">
<table id="tdClientes" class="table table-responsive table-striped table-bordered table-hover animated  fadeIn">

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
			$vistaCliente = new MvcController();
			$vistaCliente -> vistaClienteController();
			?>
			</tbody>
		</table>
</div>