<?php
session_start();
if(!$_SESSION["validar"]){
  header("location:index.php?action=IngresarAdministrador");
}
?>
<?php
    $actualizardatos = new MvcControllerServicio();
    $actualizardatos->agregarServicioBDController();
?>
<?php
   $nombrepaquete = new MvcControllerServicio();
   $nombrespaquetes= $nombrepaquete->ObtenerDatosPaquetes();
?>
<div class="text-center">

<h1 class="text-center title-form-cli">Agregar Servicio</h1>
</div>

<div class="container text-center form-group">
  <form method="post" id="form-registro">
            <div class="form-group">
                    <label>Nombre Paquete </label>
                     <select class="form-control" name="nombrePaquete">
                            <?php
                                foreach($nombrespaquetes as $row => $item) {
                            ?>
                            <option value = " <?php   echo $seleccion = $item['nombrePaquete']; ?> "><?php echo $item['nombrePaquete']; ?></option>
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
<div class="container text-center form-group">
       <form method="post" id="form-registro">
              <div class="form-group">
              	<input type="Hidden" placeholder="idServicio:" name="idServicio" required>
              </div>

              <div class="form-group">
                     <input type="Hidden" placeholder="nombrePaquete:" name="nombrePaquete" value="<?php echo $infopaquete["nombrePaquete"]; ?>" required>
              </div>

              <div class="form-group">
                     <label>RFC</label>
              	<input type="text" readonly="readonly"  class="form-control"  value="<?php echo $_GET["RFC"]; ?>" name="RFC">
              </div>
              <div class="form-group">
                     <label>Precio del Paquete: </label>
              	<input type="number" readonly="readonly" class="form-control" value="<?php echo $infopaquete["costoPaquete"];  ?>" name="costoServicio" >
              </div>
              <div class="form-group">
                     <label>Descripcion del Paquete</label>
              <!-- 	<input type="text" class="form-control" value="" name="descripcion" > -->
                <textarea name="descripcion" class="form-control"  readonly="readonly" rows="5"><?php echo $infopaquete["descripcionPaquete"];  ?></textarea>
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
            <!--   	<input type="text" maxlength="150" class="form-control" value="" name="descripcionServicioExtra" required> -->
                <textarea name="descripcionServicioExtra" class="form-control" rows="3"><?php if(isset($_POST["descripcionServicioExtra"])){echo $_POST["descripcionServicioExtra"]; } ?></textarea>
              </div>
              <div class="form-group">
                     <!-- <label>Estado del servicio</label> -->
              	<input type="hidden" class="form-control"  name="estadoServicio" required>
              </div>
              <div class="form-group">
              	<button type="submit" class="btn btn-primary">Agregar</button>
                <button type="button" class="btn btn-primary"  onClick="location.href ='index.php?action=RegistrosServicios'">Cancelar</button>
              </div>
</form>


