<?php
/*// Motrar todos los errores de PHP
error_reporting(-1);
 
// No mostrar los errores de PHP
error_reporting(0);
 
// Motrar todos los errores de PHP
error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);*/
?>
<?php 

 $respuesta = new MvcControllerServicio();
 $respuesta2= $respuesta->ObtenerDatosPaquetes();
 
?>
<div class="text-center">
	
<h1 class="text-center title-form-cli">Agregar Servicio</h1>
	  <h1>Orden de Registro</h1>

</div>
<div class="container text-center form-group">
<form method="post">
              <div class="form-group">
              		<input type="Hidden" placeholder="idServicio:" name="idServicio" required>

              </div>
              <div class="form-group">
              	 <input type="text" readonly="readonly"  class="form-control"  value="<?php echo $_GET["RFC"]; ?>" name="RFC">
              </div>
              <div class="form-group">
              	  <select class="form-control" name="nombrePaquete">
              	  	<?php
					
						foreach($respuesta2 as $row => $item) { 
						?> 
						
						<option value = " <?php   echo $seleccion = $item['nombrePaquete']; ?> "><?php echo $item['nombrePaquete']; ?></option> 
						
						<?php 
						
						}
				   ?>
				   <option value="otro"> Otro</option>
              	  </select>

              </div>
              <div class="form-group">
                    <?php 
						echo $seleccion;
					

                     ?>
              	   <input type="text"  class="form-control" placeholder="PrecioServicio:" name="costoServicio" required>

              </div>
              <div class="form-group">
              	   <input type="text"  class="form-control" placeholder="Descripcion:" name="descripcionServicio" value="" required>

              </div>
	          <div class="form-group">
			      <div class="row">
			        <div class='col-sm-6'>
			            <div class="form-group">
			                <div class='input-group date' id='datetimepicker1'>
			                    <input type='text' class="form-control" name="inicioServicio" />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			        </div>
			        <script type="text/javascript">
			            $(function () {
			                $('#datetimepicker1').datetimepicker();
			            });
			        </script>
			    </div>
		      </div>
              <div class="form-group">
			      <div class="row">
			        <div class='col-sm-6'>
			            <div class="form-group">
			                <div class='input-group date' id='datetimepicker2'>
			                    <input type='text' class="form-control" name="fechadeRenovacion" />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			            </div>
			        </div>
			        <script type="text/javascript">
			            $(function () {
			                $('#datetimepicker2').datetimepicker2();
			            });
			        </script>
			    </div>
		      </div>
              <div class="form-group">
              	   <input type="text"  class="form-control" placeholder="Complemento:" name="descripcionServicioExtra" required>
              </div>
              <div class="form-group">
              	   	<input type="text" class="form-control" placeholder="Estado:" name="estadoServicio" required>
              </div>
              <div class="form-group">
              	   <input type="submit"  class="form-control btn btn-outline-primary" value="Agregar Servicio">

              </div> 
            

</form>

<?php

$registro = new MvcControllerServicio();
 print_r($registro -> agregarServicioBDController());

/*if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}*/

?>
