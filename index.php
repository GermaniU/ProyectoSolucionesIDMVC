<?php

require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controllerAdministrador.php";
require_once 'controllers/controllerCliente.php';

$mvc = new MvcControllerAdministrador();
$mvc -> pagina();


?>
