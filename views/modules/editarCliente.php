<h1 class="text-center title-form-cli">Editar Cliente</h1>
	<div >
		<form method="post" id="form-registro">
				<?php
					$editarCliente = new MvcControllerCliente();
					$editarCliente -> editarUsuarioController();
					$editarCliente -> actualizarUsuarioController();
				?>
		</form>
</div>




