<?php

//----------Llamar los modelos-----------------
require_once "models/enlaces.php";
require_once "models/ModelAdministrador.php";
require_once 'models/ModelCliente.php';


//----------Llamar los controladores------------
require_once "controllers/controllerAdministrador.php";
require_once 'controllers/controllerCliente.php';

//----------Mostrar Pagina-------------------------
$mvc = new ControllerAdministrador();
$mvc -> pagina();


?>
