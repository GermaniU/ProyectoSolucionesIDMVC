<h1 class="animated fadeIn">INGRESAR</h1>
<div class="container animated fast fadeIn">
<img src="https://randomuser.me/api/portraits/med/men/83.jpg" class="rounded mx-auto d-block" >
<form method="post" action="">
  <div class="form-group">
    <input type="text" class="form-control"  placeholder="Ingrese su usuario" name="usuariof" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="passwordf" required="">
  </div>
  <input type="submit" class="btn btn-outline-primary" value="Enviar">
</form>
</div>



<?php

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";

	}

}
session_start();
if($_SESSION == true){
	header("location:index.php?action=clientes");
}

?>