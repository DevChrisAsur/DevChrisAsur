<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/areas.controlador.php";
require_once "controladores/sedes.controlador.php";
require_once "controladores/estudiantes.controlador.php";
require_once "controladores/cursos.controlador.php";
require_once "controladores/acudientes.controlador.php";
require_once "controladores/matriculas.controlador.php";
require_once "controladores/curso_estudiante.controlador.php";
require_once "controladores/pension.controlador.php";
require_once "controladores/telefono_padre.controlador.php";
require_once "controladores/grupos.controlador.php";
require_once "controladores/clientes.controlador.php";


require_once "modelos/clientes.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/areas.modelo.php";
require_once "modelos/sedes.modelo.php";
require_once "modelos/estudiantes.modelo.php";
require_once "modelos/cursos.modelo.php";
require_once "modelos/acudientes.modelo.php";
require_once "modelos/matriculas.modelo.php";
require_once "modelos/curso_estudiante.modelo.php";
require_once "modelos/pension.modelo.php";
require_once "modelos/telefono_padre.modelo.php";
require_once "modelos/grupos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();