
<?php

 $nombrepaquete = new MvcControllerServicio();
 $nombrespaquetes= $nombrepaquete->ObtenerDatosPaquetes();

?>
<div class="text-center">

<h1 class="text-center title-form-cli">Editar Servicio</h1>

</div>

<div class="container text-center form-group">
  <form method="post" id="form-registro">
            <div class="form-group">
                    <label>Nombre Paquete </label>
                     <select class="form-control" name="nombrePaquete">
                            <?php
                                foreach($nombrespaquetes as $row => $item) {
                            ?>
                            <option value = " <?php   echo $item['nombrePaquete']; ?> "><?php echo $item['nombrePaquete']; ?></option>
                            <?php
                                }
                           ?>
                     </select>
              </div>
               <div class="form-group">
                     <button type="submit" class="btn btn-primary">Seleccionar</button>

              </div>

  </form>

</div>

<?php
$paquete = new MvcControllerServicio();
$infopaquete = $paquete -> ObtenerDatosPaquete();

 ?>

<?php

$traerdatos = new MvcControllerServicio();
$respuesta = $traerdatos -> editarServicioController();

?>
 <div >
		<form method="post" id="form-registro">
   
			<input class="form-control" type="hidden" value="<?php echo $respuesta["idServicio"]; ?>" name="idServicio">

			<div class="form-group">

				<label>RFC:</label>
             	<input class="form-control"  readonly="readonly" type="text" value="<?php echo $respuesta["RFC"]; ?>" name="RFC" required>
			</div>
			<div class="form-group">
                     <input type="hidden" placeholder="nombrePaquete:" name="nombrePaquete" value="<?php if (!isset($infopaquete["nombrePaquete"])){
                     	echo $respuesta["nombrePaquete"];
                     }else{
                     	echo $infopaquete["nombrePaquete"];
                     	} ?>" required>
            </div>
			<div class="form-group">
				<label>Costo del Paquete:</label>
			 	<input class="form-control" type="number" value="<?php if(isset($infopaquete["costoPaquete"])){
			 		echo $infopaquete["costoPaquete"];
			 	}else{
                    echo  $respuesta["costoServicio"];
			 	} 
			 		# code...
			 	 ?>" name="costoServicio" readonly="readonly">
			</div>
			<div class="form-group">
				<label>Descripcion del Paquete:</label>
				<input class="form-control" type="text" value="<?php if (isset( $infopaquete["descripcionPaquete"])) {
				        echo  $infopaquete["descripcionPaquete"]; 	
				}else{
					echo $respuesta["descripcion"];
					} ?>" name="descripcion" readonly="readonly" >
			</div>
			<div class="form-group">
				<label>Fecha inicio servicio:</label>
				<input class="form-control" type="date" value="<?php echo $respuesta["inicioServicio"]; ?>" name="inicioServicio" required>
			</div>
			<div class="form-group">
				<label>Fecha renovacion servicio:</label>
				<input class="form-control" type="date" value="<?php echo $respuesta["fechadeRenovacion"]; ?>" name="fechadeRenovacion" required>
			</div>
			<div class="form-group">
				<label>Descripcion complemento extra:</label>
				<input class="form-control" type="text" value="<?php echo $respuesta["descripcionServicioExtra"]; ?>" name="descripcionServicioExtra" required>
			</div>
			<div class="form-group">
<!-- 				<label>Estado del servicio:</label>
 -->			 	<input class="form-control" type="hidden" value="<?php echo $respuesta["estadoServicio"]; ?>" name="estadoServicio" required>
			</div>
			 <button type="submit" class="btn btn-primary">Actualizar</button>
			 <button type="button" class="btn btn-primary"  onClick="location.href ='index.php?action=RegistrosServicios'">Cancelar</button>
       </form>
   </div>

<?php
$actualizardatos = new MvcControllerServicio();
$actualizardatos->actualizarServicioController();
?>

