

<h1 class="text-center title-form-cli">Editar Cliente</h1>



	    <div >
			<form method="post" class="form-cliente">
				<?php

				$editarUsuario = new MvcController();
				$editarUsuario -> editarUsuarioController();
				$editarUsuario -> actualizarUsuarioController();
				?>
			</form>
	    </div>



