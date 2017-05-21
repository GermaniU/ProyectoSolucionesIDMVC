<?php

$ingreso = new ControllerAdministrador();
$ingreso -> ingresarAdministradorController();

if(isset($_GET["action"])){
  if($_GET["action"] == "fallo"){
                  echo "<div id='errorAgregarCliente'></div>
                          <div class='modal fade' id='modalError' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Error</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>
                                  Fallo al ingresar
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-warning' data-dismiss='modal'>Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>";
                      }
                    }
      session_start();
      if($_SESSION == true){
        header("location:index.php?action=RegistrosClientes");
}
?>
<h1 class="login-title animated fadeIn">INGRESAR</h1>
<div class="container animated fast fadeIn cont-form">
<img src="views/assets/img/fotoadmin.svg" class="rounded mx-auto d-block" >
<form id="form-login" method="post" action="">
  <div class="form-group">
    <input type="text" class="form-control login-input"  placeholder="Ingrese su usuario" name="usuariof" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control login-input" placeholder="Ingrese su contraseña" name="passwordf" required>
  </div>
  <button type="submit" class="btn btn-outline-primary" value="Enviar">
    <i class="fa fa-sign-in" aria-hidden="true"></i>
  </button>
</form>
</div>

