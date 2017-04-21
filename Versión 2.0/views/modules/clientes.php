<style >
table {
    position: relative;
    margin: auto;
    width: 100%;


}

.margin-20{
	margin-top: 30px;
	margin-bottom: 50px;
}

h1{
    font-size: 30px;
    font-weight: bold;
}

#tdClientes{
	font-family: 'Open Sans', sans-serif;
}



</style>

<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<h1 class="text-center margin-20 animated fast fadeIn">Cliente</h1>
	<div class="container">
	   <div id="tablaClientes" >

<!-- <button> a</button>
 --><table id="tdClientes" class="table table-responsive table-striped table-bordered table-hover animated  fadeIn">
			<thead class="">
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
	</div>
</div>