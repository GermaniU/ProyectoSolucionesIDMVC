<h1 class="text-center title-form-cli">Editar Cliente</h1>

<?php
  $traerdatos = new MvcControllerCliente();
  $respuesta = $traerdatos-> editarClienteController();
 ?>

<div >
		<form method="post" id="form-registro">

				<input class="form-control" type="hidden" value="<?php echo $respuesta["RFC"]; ?>" name="rfcAnterior" required>

				<p>RFC: </p>
		          <input class="form-control" type="text" value="<?php echo $respuesta["RFC"]; ?>" name="RFC" required>

				<p>Nombre del cliente: </p>
            	<input class="form-control" type="text" value="<?php echo $respuesta["nombreCliente"]; ?>" name="nombreCliente" required>


				<p>Dominio: </p>
				 <input class="form-control" type="text" value="<?php echo $respuesta["dominio"]; ?>" name="dominio" required>


				<p>Total de pago: </p>
				 <input class="form-control" type="text" value="<?php echo $respuesta["totalPago"]; ?>" name="totalPago" required>

				<p>Nombre del Empresa: </p>
				 <input class="form-control" type="text" value="<?php echo $respuesta["nombreEmpresa"]; ?>" name="nombreEmpresa" required>

				<p>Telefono del cliente: </p>
				<input class="form-control" type="text" value="<?php echo $respuesta["telefonoClienteEmpresa"]; ?>" name="telefonoClienteEmpresa" required>


				<p>Direccion del cliente: </p>
				<input class="form-control" type="text" placeholder="Ejemplo: C 32 x 13 y 15 Num 567" value="<?php echo $respuesta["direccionClienteEmpresa"]; ?>" name="direccionClienteEmpresa" required>

				<p>Correo del cliente</p>
				<input class="form-control" type="email" value="<?php echo $respuesta["correoClienteEmpresa"]; ?>" name="correoClienteEmpresa" required>

			  <button type="submit" class="btn btn-primary">Actualizar</button>
			  <button type="button" class="btn btn-primary"  onClick="location.href ='index.php?action=RegistrosClientes'">Cancelar</button>

		</form>
</div>

<?php
  $actualizardatos = new MvcControllerCliente();
  $actualizardatos -> actualizarClienteController();
?>