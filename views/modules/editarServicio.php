<h1 class="text-center title-form-cli">Editar Servicio</h1>
   <div >
		<form method="post" id="form-registro">
				<?php

				$editarServicio = new MvcControllerServicio();
				$editarServicio -> editarServicioController();
    			$editarServicio->actualizarServicioController();

				?>
		</form>
   </div>



