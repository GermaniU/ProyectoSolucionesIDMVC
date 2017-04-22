<h1 class="text-center title-form-cli">Agregar Cliente</h1>

       

	    <div >
			<form method="post" class="form-cliente">
              <div class="container">
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Rfc: </label>
  				<div class="col-10">
  				<input type="text" class="form-control" value=" <?php if(isset($_POST["RFC"])){echo $_POST["RFC"]; } ?>  "  name="RFC" required>
				</div>
		</div>
		

		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Nombre: </label>
  				<div class="col-10">
             <input type="text" class="form-control" value="<?php if(isset($_POST["nombreCliente"])){echo $_POST["nombreCliente"]; } ?>" name="nombreCliente" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Dominio: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="<?php if(isset($_POST["dominio"])){echo $_POST["dominio"]; } ?>" name="dominio" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Total pagado: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="<?php if(isset($_POST["totalPago"])){echo $_POST["totalPago"]; } ?>" name="totalPago" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Nombre de la Empresa: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="<?php if(isset($_POST["nombreEmpresa"])){echo $_POST["nombreEmpresa"]; } ?>" name="nombreEmpresa" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Telefono: </label>
  				<div class="col-10">
			 <input type="text" class="form-control"" value="<?php if(isset($_POST["telefonoClienteEmpresa"])){echo $_POST["telefonoClienteEmpresa"]; } ?>" name="telefonoClienteEmpresa" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Direccion: </label>
  				<div class="col-10">
			 <input type="text" class="form-control" value="<?php if(isset($_POST["direccionClienteEmpresa"])){echo $_POST["direccionClienteEmpresa"]; } ?>" name="direccionClienteEmpresa" required>
				</div>
		</div>
		<div class="form-group row">
  			<label for="example-search-input" class="col-2 col-form-label">Correo: </label>
  				<div class="col-10">
			 <input type="email" class="form-control" value="<?php if(isset($_POST["correoClienteEmpresa"])){echo $_POST["correoClienteEmpresa"]; } ?>" name="correoClienteEmpresa" required>
				</div>
		</div><br>
			 <input type="submit" class=" btn btn-warning text-center" value="AgregarCliente">
		</div>
			</form>

				<?php

				$editarCliente = new MvcController();
				$editarCliente -> agregarClienteBDController();
				//$editarCliente -> actualizarClienteController();
				?>
			</form>
	    </div>