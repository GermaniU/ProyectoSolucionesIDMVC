

<h1 class="text-center title-form-cli">Editar Cliente</h1>



	    <div >
			<form method="post" class="form-cliente">
				<?php

				$editarCliente = new MvcController();
				$editarCliente -> editarClienteController();
				$editarCliente -> actualizarClienteController();
				?>
			</form>
	    </div>



