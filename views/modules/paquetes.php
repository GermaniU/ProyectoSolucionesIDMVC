<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=IngresarAdministrador");

	exit();

}


?>
<h1>paquete</h1>