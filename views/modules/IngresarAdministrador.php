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

<?php

$ingreso = new ControllerAdministrador();
$ingreso -> ingresarAdministradorController();

if(isset($_GET["action"])){

  if($_GET["action"] == "fallo"){

    echo "Fallo al ingresar";

  }

}
session_start();
if($_SESSION == true){
  header("location:index.php?action=RegistrosClientes");
} 
?>