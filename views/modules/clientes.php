<style >
table {
    position: relative;
    margin: auto;
    width: 100%;
    left: -10%;
    border: 1px black;

}

table thead tr th {
    padding: 10px;
    background-color:green;
    color: white;
}

table tbody tr td {
    padding: 10px;
    background-color: #e8503a;
}
button{
	margin: auto;
	font-size: 20px;
}
 
</style>

<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

	<div class="container">
	   <div id="tablaClientes">
	   	<h1>Cliente</h1> 
<button> a</button>
	 <table>
		
		<thead>
			
			<tr>
				<th>RFC</th>
				<th>nombreCliente</th>
				<th>dominio</th>
				<th>totalPago</th>
				<th>nombreEmpresa</th>
				<th>telefonoClienteEmpresa</th>
				<th>direccionClienteEmpresa</th>
				<th>correoClienteEmpresa</th>	
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