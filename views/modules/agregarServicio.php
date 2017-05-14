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
</div>
<div class="container text-center form-group">
       <form method="post" id="form-registro">
              <div class="form-group">
              	<input type="Hidden" placeholder="idServicio:" name="idServicio" required>
              </div>
              <div class="form-group">
                     <label>RFC</label>
              	<input type="text" readonly="readonly"  class="form-control"  value="<?php echo $_GET["RFC"]; ?>" name="RFC">
              </div>
              <div class="form-group">
                     <select class="form-control" name="nombrePaquete" id="paqueteOpcion">
                     	<?php
       			    foreach($respuesta2 as $row => $item) {
       			?>
       			<option id="paqueteOpcion" value = " <?php   echo $seleccion = $item['nombrePaquete']; ?> "><?php echo $item['nombrePaquete']; ?></option>
       			<?php
       			    }
       		      ?>
       		     <option value="otro"> Otro</option>
                     </select>
              </div>

              <div class="form-group">
                     <label>Precio del servicio: </label>
              	<input type="text"  class="form-control" value="<?php if(isset($_POST["costoServicio"])){echo $_POST["costoServicio"]; } ?>" name="costoServicio" required>
              </div>
              <div class="form-group">
                     <label>Descripcion del servicio</label>
              	<input type="text"  class="form-control" value="<?php if(isset($_POST["descripcion"])){echo $_POST["descripcion"]; } ?>"  name="descripcion" required>
              </div>
	      <div class="form-group">
                     <label>Inicio del servicio</label>
	      		<input type="date" class="form-control" value="<?php if(isset($_POST["inicioServicio"])){echo $_POST["inicioServicio"]; } ?>" name="inicioServicio">
	      </div>
	      <div class="form-group">
                     <label>Fecha de renovacion</label>
	      		<input type="date" class="form-control" value="<?php if(isset($_POST["fechadeRenovacion"])){echo $_POST["fechadeRenovacion"]; } ?>" name="fechadeRenovacion">
	      </div>
              <div class="form-group">
                     <label>Descripcion del servicio extra</label>
              	<input type="text"  class="form-control" value="<?php if(isset($_POST["descripcionServicioExtra"])){echo $_POST["descripcionServicioExtra"]; } ?>" name="descripcionServicioExtra" required>
              </div>
              <div class="form-group">
                     <!-- <label>Estado del servicio</label> -->
              	<input type="hidden" class="form-control"  name="estadoServicio" required>
              </div>
              <div class="form-group">
              	<button type="submit" class="btn btn-primary">Agregar</button>
              </div>


</form>

<?php

$registro = new MvcControllerServicio();
$registro -> agregarServicioBDController();

/*if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";

	}

}*/

?>
