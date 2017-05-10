<h1 class="text-center title-form-cli">Editar Paquete</h1>
   <div >
		<form method="post" id="form-registro">
				<?php

				$editarPaquete = new MvcControllerPaquete();
				$editarPaquete -> editarPaqueteController();
				$editarPaquete->actualizarPaqueteController();

				?>
		</form>
    </div>



