<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/areas.controlador.php";
require_once "controladores/areasderecho.controlador.php";
require_once "controladores/servicios.controlador.php";
require_once "controladores/leads.controlador.php";
require_once "controladores/sedes.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/suscripciones.controlador.php";

require_once "modelos/clientes.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/areas.modelo.php";
require_once "modelos/areaderecho.modelo.php";
require_once "modelos/servicios.modelo.php";
require_once "modelos/leads.modelo.php";
require_once "modelos/sedes.modelo.php";
require_once "modelos/suscripciones.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();