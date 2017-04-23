<h1 class="text-center title-form-cli">Agregar Cliente</h1>
	    <div >
			<form method="post" class="form-cliente">
		              <div class="container">
				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Rfc: </label>
		  				<div class="col-10">
		  				<input type="text" class="form-control" value=" <?php if(isset($_POST["RFC"])){echo $_POST["RFC"]; } ?>  " name="RFC" placeholder="RFC" required>
						</div>
				</div>


				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Nombre: </label>
		  				<div class="col-10">
		             <input type="text" class="form-control" value="<?php if(isset($_POST["nombreCliente"])){echo $_POST["nombreCliente"]; } ?>" name="nombreCliente" placeholder="Nombre" required>
						</div>
				</div>
				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Dominio: </label>
		  				<div class="col-10">
					 <input type="text" class="form-control" value="<?php if(isset($_POST["dominio"])){echo $_POST["dominio"]; } ?>" name="dominio" placeholder="Dominio" required>
						</div>
				</div>
				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Total pagado: </label>
		  				<div class="col-10">
					 <input type="text" class="form-control" value="<?php if(isset($_POST["totalPago"])){echo $_POST["totalPago"]; } ?>" name="totalPago" placeholder="Total pagado" required>
						</div>
				</div>
				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Nombre de la Empresa: </label>
		  				<div class="col-10">
					 <input type="text" class="form-control" value="<?php if(isset($_POST["nombreEmpresa"])){echo $_POST["nombreEmpresa"]; } ?>" name="nombreEmpresa" placeholder="Nombre de la empresa" required>
						</div>
				</div>
				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Telefono: </label>
		  				<div class="col-10">
					 <input type="text" class="form-control"" value="<?php if(isset($_POST["telefonoClienteEmpresa"])){echo $_POST["telefonoClienteEmpresa"]; } ?>" name="telefonoClienteEmpresa" placeholder="Telefono"required>
						</div>
				</div>
				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Direccion: </label>
		  				<div class="col-10">
					 <input type="text" class="form-control" value="<?php if(isset($_POST["direccionClienteEmpresa"])){echo $_POST["direccionClienteEmpresa"]; } ?>" name="direccionClienteEmpresa" placeholder="Direccion" required>
						</div>
				</div>
				<div class="hid-label form-group row">
		  			<label for="example-search-input" class="col-2 col-form-label">Correo: </label>
		  				<div class="col-10">
					 <input type="email" class="form-control" value="<?php if(isset($_POST["correoClienteEmpresa"])){echo $_POST["correoClienteEmpresa"]; } ?>" name="correoClienteEmpresa" placeholder="Correo" required>
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