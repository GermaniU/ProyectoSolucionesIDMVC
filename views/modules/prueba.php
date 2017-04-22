<table id="example" class="table table-responsive table-striped table-bordered table-hover animated  fadeIn" >
        <thead>
            <tr>
				<th>RFC</th>
				<th>Cliente</th>
				<th>Dominio</th>
				<th>PagoTotal</th>
				<th>Empresa</th>
				<th>Tel - Cliente</th>
				<th>Direccion Cliente</th>
				<th>Correo</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaUsuariosController();
			/*$vistaUsuario -> borrarUsuarioController();*/

			?>
		</tbody>
</table>



