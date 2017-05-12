<?php

//----------Llamar los modelos-----------------
require_once "models/enlaces.php";
require_once "models/ModelAdministrador.php";
require_once 'models/ModelCliente.php';
require_once 'models/ModelPaquete.php';
require_once 'models/ModelServicio.php';


//----------Llamar los controladores------------
require_once "controllers/controllerAdministrador.php";
require_once 'controllers/controllerCliente.php';
require_once 'controllers/controllerPaquete.php';
require_once 'controllers/controllerServicio.php';

//----------Mostrar Pagina-------------------------
$mvc = new ControllerAdministrador();
$mvc -> pagina();


?>
