<style type="text/css">
	#formularioeditar{
    width:980px;
    margin: 0 auto;
/*     border: 1px red solid;
 */   }
   #labels{
   	  float: left;
   	  width: 375px;
/*    	  border: 1px red solid;
 */   	  text-align: right;
   	  line-height: 49px;
   	  font-size: 25px;
   }
   #inputeditar{
   	 float: right;
   	 width: 600px;
/*    	 border: 1px red solid;
 */   }
   #fom{
   	   float: left
   }
</style>
<div class="container">
	<div id="formularioeditar">
		<h1>Editar Cliente</h1>

	    <div id="labels">
	    	<label for="">Nombre: </label><br>
	    	<label for="">Dominio: </label><br>
	    	<label for="">TotalPagado:</label><br>
	    	<label for="">NombreEmpresa:</label><br>
	    	<label for="">Telefono:</label><br>
	    	<label for="">Direccion</label><br>
	    	<label for="">Correo:</label><br>
	    </div>

	    <div id="inputeditar">
			<form method="post" id="fom">	
				<?php

				$editarUsuario = new MvcController();
				$editarUsuario -> editarUsuarioController();
				$editarUsuario -> actualizarUsuarioController();

				?>

			</form>
	    </div>

	</div>
	
</div>



